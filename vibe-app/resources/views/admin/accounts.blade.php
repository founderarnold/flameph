@extends('admin.layouts.panel')

@section('title', 'Admin accounts')

@section('content')
<div class="admin-topbar"><div><p style="margin:0 0 5px;color:#bc000c;font-weight:700;letter-spacing:.08em;text-transform:uppercase;font-size:12px">FLAME PH • ACCESS CONTROL</p><h1 class="admin-brand" style="margin:0;font-size:32px">Admin accounts</h1><p style="margin:7px 0 0;color:#5c6070">Founder manages all roles; super admins can manage regular admins and basic users only.</p></div><div class="admin-nav"><a href="{{ route('admin.dashboard') }}">Dashboard</a><form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="admin-button">Log out</button></form></div></div>
<section class="admin-card" style="margin-bottom:18px"><h2 class="admin-brand" style="margin:0 0 15px;font-size:22px">Create admin account</h2><form method="POST" action="{{ route('admin.accounts.create') }}" class="admin-grid">@csrf
<div class="admin-field"><label for="new-admin-name">Full name</label><input id="new-admin-name" name="name" required maxlength="120" value="{{ old('name') }}"></div>
<div class="admin-field"><label for="new-admin-email">Email</label><input id="new-admin-email" type="email" name="email" required maxlength="254" value="{{ old('email') }}"></div>
<div class="admin-field"><label for="new-admin-role">Role</label><select id="new-admin-role" name="role" required>@foreach($roles as $key => $label)<option value="{{ $key }}">{{ $label }}</option>@endforeach</select></div>
<div class="admin-field"><label for="new-admin-password">Temporary password (12+ characters)</label><input id="new-admin-password" type="password" name="password" minlength="12" required autocomplete="new-password"></div>
<div class="admin-field"><label for="new-admin-password-confirmation">Confirm password</label><input id="new-admin-password-confirmation" type="password" name="password_confirmation" minlength="12" required autocomplete="new-password"></div>
<div style="align-self:end;margin-bottom:14px"><button class="admin-button" type="submit">Create account</button></div>
</form><p style="margin:0;color:#737685;font-size:13px">No invitation or password-reset email is sent yet. Send initial credentials privately and require each admin to use a unique password.</p></section>
<section class="admin-card"><h2 class="admin-brand" style="margin:0 0 14px;font-size:22px">Existing accounts</h2><div class="admin-table-wrap"><table class="admin-table" style="min-width:860px"><thead><tr><th>Name / Email</th><th>Role</th><th>Access</th><th>Last sign-in</th><th>Actions</th></tr></thead><tbody>
@foreach($accounts as $account)
@php($canManageTarget = $admin->role === 'founder' || ($admin->role === 'super_admin' && in_array($account->role, ['regular_admin','basic_user'], true)))
<tr><td>{{ $account->name }}<br><span style="color:#737685">{{ $account->email }}</span></td><td>{{ \App\Models\AdminAccount::ROLES[$account->role] ?? $account->role }}</td><td>{{ $account->active ? 'Active' : 'Disabled' }}</td><td>{{ $account->last_login_at?->format('Y-m-d H:i') ?? 'Never' }}</td><td>
@if($canManageTarget)
<details><summary style="cursor:pointer;color:#003289;font-weight:700">Edit access / password</summary><form method="POST" action="{{ route('admin.accounts.update', $account) }}" style="min-width:280px;padding-top:12px">@csrf @method('PATCH')
<div class="admin-field"><label>Name</label><input name="name" value="{{ $account->name }}" required maxlength="120"></div><div class="admin-field"><label>Email</label><input type="email" name="email" value="{{ $account->email }}" required maxlength="254"></div><div class="admin-field"><label>Role</label><select name="role" required>@foreach($roles as $key => $label)<option value="{{ $key }}" @selected($account->role === $key)>{{ $label }}</option>@endforeach</select></div><div class="admin-field"><label>Access</label><select name="active"><option value="1" @selected($account->active)>Active</option><option value="0" @selected(!$account->active)>Disabled</option></select></div><div class="admin-field"><label>New password (leave blank to keep current)</label><input type="password" name="password" minlength="12" autocomplete="new-password"></div><div class="admin-field"><label>Confirm new password</label><input type="password" name="password_confirmation" minlength="12" autocomplete="new-password"></div><button class="admin-button">Save account</button></form>
@if(!$account->is($admin))<form method="POST" action="{{ route('admin.accounts.delete', $account) }}" style="margin-top:9px" onsubmit="return confirm('Delete this admin account?')">@csrf @method('DELETE')<button class="admin-button" style="background:#a4000a">Delete account</button></form>@endif
</details>
@else<span style="color:#737685">Managed by founder</span>@endif
</td></tr>
@endforeach
</tbody></table></div></section>
@endsection
