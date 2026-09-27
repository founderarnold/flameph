<?php

namespace App\Http\Controllers;

use App\Models\AdminAccount;
use App\Models\Membership;
use App\Services\MembershipStatistics;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'string', 'max:200'],
        ]);

        $account = AdminAccount::query()->where('email', strtolower(trim($credentials['email'])))->where('active', true)->first();

        if (!$account || !Hash::check($credentials['password'], $account->password)) {
            return back()->withErrors(['admin_login' => 'The email or password is incorrect, or this admin account is inactive.'])->withInput($request->only('email'));
        }

        $request->session()->regenerate();
        $request->session()->put('admin_account_id', $account->id);
        $account->forceFill(['last_login_at' => now()])->save();

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('admin_account_id');
        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect()->to('/about#admin-access')->with('admin_login_notice', 'You have been signed out.');
    }

    public function dashboard(Request $request, MembershipStatistics $statistics): View
    {
        $admin = $request->attributes->get('adminAccount');
        $membershipStats = $statistics->summary();

        return view('admin.dashboard', [
            'admin' => $admin,
            'memberCount' => $membershipStats['registered_members'],
            'activeMemberCount' => $membershipStats['active_members'],
            'paidMemberCount' => Membership::where('plan', 'paid')->count(),
            'adminCount' => AdminAccount::count(),
            'membershipStats' => $membershipStats,
        ]);
    }

    public function reports(Request $request, MembershipStatistics $statistics): View
    {
        return view('admin.reports', [
            'admin' => $request->attributes->get('adminAccount'),
            'membershipStats' => $statistics->summary(),
        ]);
    }

    public function members(Request $request): View
    {
        $members = Membership::query()
            ->with('user:id,name,email')
            ->orderByDesc('created_at')
            ->paginate(25);

        return view('admin.members', [
            'admin' => $request->attributes->get('adminAccount'),
            'members' => $members,
        ]);
    }

    public function updateMember(Request $request, Membership $membership): RedirectResponse
    {
        $validated = $request->validate([
            'plan' => ['required', Rule::in(['free', 'paid'])],
            'status' => ['required', Rule::in(['active', 'pending', 'suspended'])],
        ]);

        $membership->update($validated);

        return back()->with('status', 'Member record updated.');
    }

    public function accounts(Request $request): View
    {
        $accounts = AdminAccount::query()->orderBy('name')->get();
        $accountEmails = $accounts->pluck('email')->map(fn ($email) => strtolower($email));
        $memberSinceByEmail = Membership::query()
            ->with('user:id,email')
            ->whereHas('user', fn ($query) => $query->whereIn('email', $accountEmails))
            ->get()
            ->filter(fn ($membership) => $membership->user)
            ->mapWithKeys(fn ($membership) => [strtolower($membership->user->email) => $membership->created_at]);

        return view('admin.accounts', [
            'admin' => $request->attributes->get('adminAccount'),
            'accounts' => $accounts,
            'roles' => $this->assignableRoles($request->attributes->get('adminAccount')),
            'memberSinceByEmail' => $memberSinceByEmail,
        ]);
    }

    public function profile(Request $request): View
    {
        $admin = $request->attributes->get('adminAccount');
        $memberSince = Membership::query()->whereHas('user', fn ($query) => $query->where('email', $admin->email))->value('created_at');

        return view('admin.profile', [
            'admin' => $admin,
            'memberSince' => $memberSince,
            'rights' => $admin->rights(),
        ]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $admin = $request->attributes->get('adminAccount');
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'sponsored_by' => ['nullable', 'string', 'max:160'],
            'invited_by' => ['nullable', 'string', 'max:160'],
            'hired_by' => ['nullable', 'string', 'max:160'],
            'hired_at' => ['nullable', 'date', 'before_or_equal:today'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
        ]);

        $admin->fill(collect($validated)->except('avatar')->all());
        if ($request->hasFile('avatar')) {
            $admin->avatar_path = $request->file('avatar')->store('admin-avatars', 'local');
        }
        $admin->save();

        return back()->with('status', 'Your admin profile was updated.');
    }

    public function changeOwnPassword(Request $request): RedirectResponse
    {
        $admin = $request->attributes->get('adminAccount');
        $validated = $request->validate([
            'current_password' => ['required', 'string', 'max:200'],
            'password' => ['required', 'string', 'min:12', 'max:200', 'confirmed'],
        ]);

        if (!Hash::check($validated['current_password'], $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password did not match.']);
        }

        $admin->password = $validated['password'];
        $admin->save();

        return back()->with('status', 'Password changed. Use the new password next time you sign in.');
    }

    public function resetAccountPassword(Request $request, AdminAccount $account): RedirectResponse
    {
        $admin = $request->attributes->get('adminAccount');
        abort_unless($this->mayManage($admin, $account), 403);

        $validated = $request->validate([
            'password' => ['required', 'string', 'min:12', 'max:200', 'confirmed'],
        ]);

        $account->password = $validated['password'];
        $account->save();

        return back()->with('status', 'Account password reset. Notify the account holder through a secure channel.');
    }

    public function avatar(Request $request, AdminAccount $account)
    {
        $admin = $request->attributes->get('adminAccount');
        abort_unless($account->is($admin) || $this->mayManage($admin, $account), 403);
        abort_unless($account->avatar_path && Storage::disk('local')->exists($account->avatar_path), 404);

        return Storage::disk('local')->response($account->avatar_path);
    }

    public function createAccount(Request $request): RedirectResponse
    {
        $admin = $request->attributes->get('adminAccount');
        $roles = $this->assignableRoles($admin);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:254', 'unique:admin_accounts,email'],
            'role' => ['required', Rule::in(array_keys($roles))],
            'password' => ['required', 'string', 'min:12', 'max:200', 'confirmed'],
        ]);

        AdminAccount::create($validated + ['active' => true]);

        return back()->with('status', 'Admin account created. Share its credentials through a secure channel.');
    }

    public function updateAccount(Request $request, AdminAccount $account): RedirectResponse
    {
        $admin = $request->attributes->get('adminAccount');
        abort_unless($this->mayManage($admin, $account), 403);

        $roles = $this->assignableRoles($admin);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:254', Rule::unique('admin_accounts', 'email')->ignore($account->id)],
            'role' => ['required', Rule::in(array_keys($roles))],
            'active' => ['required', 'boolean'],
            'sponsored_by' => ['nullable', 'string', 'max:160'],
            'invited_by' => ['nullable', 'string', 'max:160'],
            'hired_by' => ['nullable', 'string', 'max:160'],
            'hired_at' => ['nullable', 'date', 'before_or_equal:today'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'password' => ['nullable', 'string', 'min:12', 'max:200', 'confirmed'],
        ]);

        if ($account->is($admin) && (!$validated['active'] || $validated['role'] !== $admin->role)) {
            return back()->withErrors(['account' => 'You cannot deactivate or change your own role.']);
        }

        if ($account->role === 'founder' && $account->active
            && (!$validated['active'] || $validated['role'] !== 'founder')
            && AdminAccount::where('role', 'founder')->where('active', true)->count() <= 1) {
            return back()->withErrors(['account' => 'The only active founder account cannot be disabled or demoted.']);
        }

        if ($validated['role'] === 'founder' && $account->role !== 'founder') {
            abort_unless($admin->role === 'founder', 403);
        }

        $account->fill(collect($validated)->except(['password', 'avatar'])->all());
        if (!empty($validated['password'])) {
            $account->password = $validated['password'];
        }
        if ($request->hasFile('avatar')) {
            $account->avatar_path = $request->file('avatar')->store('admin-avatars', 'local');
        }
        $account->save();

        return back()->with('status', 'Admin account updated.');
    }

    public function deleteAccount(Request $request, AdminAccount $account): RedirectResponse
    {
        $admin = $request->attributes->get('adminAccount');
        abort_unless($this->mayManage($admin, $account), 403);
        abort_if($account->is($admin), 422, 'You cannot delete your own account.');
        abort_if($account->role === 'founder' && $account->active && AdminAccount::where('role', 'founder')->where('active', true)->count() <= 1, 422, 'The only active founder account cannot be deleted.');

        $account->delete();

        return back()->with('status', 'Admin account deleted.');
    }

    private function assignableRoles(AdminAccount $admin): array
    {
        return $admin->role === 'founder'
            ? AdminAccount::ROLES
            : array_intersect_key(AdminAccount::ROLES, ['regular_admin' => true, 'basic_user' => true]);
    }

    private function mayManage(AdminAccount $admin, AdminAccount $target): bool
    {
        if ($admin->role === 'founder') {
            return true;
        }

        return $admin->role === 'super_admin' && in_array($target->role, ['regular_admin', 'basic_user'], true);
    }
}
