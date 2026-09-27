<?php

namespace App\Http\Controllers;

use App\Models\AdminAccount;
use App\Models\Membership;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function dashboard(Request $request): View
    {
        $admin = $request->attributes->get('adminAccount');

        return view('admin.dashboard', [
            'admin' => $admin,
            'memberCount' => Membership::count(),
            'activeMemberCount' => Membership::where('status', 'active')->count(),
            'paidMemberCount' => Membership::where('plan', 'paid')->count(),
            'adminCount' => AdminAccount::count(),
        ]);
    }

    public function reports(Request $request): View
    {
        return view('admin.reports', ['admin' => $request->attributes->get('adminAccount')]);
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
        return view('admin.accounts', [
            'admin' => $request->attributes->get('adminAccount'),
            'accounts' => AdminAccount::query()->orderBy('name')->get(),
            'roles' => $this->assignableRoles($request->attributes->get('adminAccount')),
        ]);
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

        $account->fill(collect($validated)->except('password')->all());
        if (!empty($validated['password'])) {
            $account->password = $validated['password'];
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
