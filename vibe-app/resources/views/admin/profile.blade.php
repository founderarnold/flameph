@extends('admin.layouts.panel')

@section('title', 'My admin profile')

@section('content')
<div class="admin-topbar"><div><p style="margin:0 0 5px;color:#bc000c;font-weight:700;letter-spacing:.08em;text-transform:uppercase;font-size:12px">FLAME PH • ADMIN PROFILE</p><h1 class="admin-brand" style="margin:0;font-size:32px">My profile</h1><p style="margin:7px 0 0;color:#5c6070">Review your account information, access level, and policy reminders.</p></div><div class="admin-nav"><a href="{{ route('admin.dashboard') }}">Dashboard</a><form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="admin-button">Log out</button></form></div></div>
<div class="admin-grid" style="align-items:start">
<section class="admin-card"><h2 class="admin-brand" style="margin:0 0 14px;font-size:22px">Personal information</h2>
@if($admin->avatar_path)<img src="{{ route('admin.accounts.avatar', $admin) }}" alt="Admin profile photo" style="width:96px;height:96px;object-fit:cover;border-radius:50%;margin-bottom:14px">@else<div aria-hidden="true" style="width:96px;height:96px;border-radius:50%;display:grid;place-items:center;background:#f2f3ff;color:#003289;font-size:40px;margin-bottom:14px">{{ strtoupper(substr($admin->name,0,1)) }}</div>@endif
<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">@csrf
<div class="admin-field"><label for="admin-profile-name">Full name</label><input id="admin-profile-name" name="name" required maxlength="120" value="{{ old('name',$admin->name) }}"></div>
<div class="admin-field"><label for="admin-profile-photo">Choose Avatar or Upload Photo</label><input id="admin-profile-photo" type="file" name="avatar" accept="image/jpeg,image/png,image/webp"><small style="color:#737685">JPG, PNG, or WebP; maximum 3 MB. Photo is private and only available to authorized admins.</small></div>
<div class="admin-field"><label for="admin-sponsored-by">Sponsored by</label><input id="admin-sponsored-by" name="sponsored_by" maxlength="160" value="{{ old('sponsored_by',$admin->sponsored_by) }}"></div>
<div class="admin-field"><label for="admin-invited-by">Invited by</label><input id="admin-invited-by" name="invited_by" maxlength="160" value="{{ old('invited_by',$admin->invited_by) }}"></div>
<div class="admin-field"><label for="admin-hired-by">Hired / appointed by</label><input id="admin-hired-by" name="hired_by" maxlength="160" value="{{ old('hired_by',$admin->hired_by) }}"></div>
<div class="admin-field"><label for="admin-hired-at">Hired / appointed date (if any)</label><input id="admin-hired-at" type="date" name="hired_at" value="{{ old('hired_at',$admin->hired_at?->format('Y-m-d')) }}"></div>
<button class="admin-button" type="submit">Save profile</button></form>
</section>
<div style="display:grid;gap:16px">
<section class="admin-card"><h2 class="admin-brand" style="margin:0 0 10px;font-size:22px">Account and access</h2><p style="margin:5px 0"><strong>User level:</strong> {{ \App\Models\AdminAccount::ROLES[$admin->role] ?? $admin->role }}</p><p style="margin:5px 0"><strong>Admin email:</strong> {{ $admin->email }}</p><p style="margin:5px 0 12px"><strong>Member registration date:</strong> {{ $memberSince ? \Illuminate\Support\Carbon::parse($memberSince)->format('F j, Y') : 'No linked member registration found' }}</p><h3 style="margin:0 0 6px;font-size:15px">Admin rights</h3><ul style="padding-left:20px;margin:0;color:#434653">@foreach($rights as $right)<li style="margin:5px 0">{{ $right }}</li>@endforeach</ul></section>
<section class="admin-card"><h2 class="admin-brand" style="margin:0 0 8px;font-size:22px">Privacy and conduct reminders</h2><p style="margin:0 0 9px;color:#434653">Please review and follow FLAME PH’s privacy, confidentiality / NDA, and non-compete policies before accessing or using member and organization information.</p><p style="margin:0;color:#737685;font-size:13px">Policy documents and formal acknowledgement workflow: Update Soon. This reminder is informational and does not replace approved policy documents or legal advice.</p></section>
<section class="admin-card"><h2 class="admin-brand" style="margin:0 0 12px;font-size:22px">Change my password</h2><form method="POST" action="{{ route('admin.profile.password') }}">@csrf
<div class="admin-field"><label for="current-password">Current password</label><input id="current-password" type="password" name="current_password" required autocomplete="current-password"></div>
<div class="admin-field"><label for="new-password">New password (12+ characters)</label><input id="new-password" type="password" name="password" required minlength="12" autocomplete="new-password"></div>
<div class="admin-field"><label for="confirm-password">Confirm new password</label><input id="confirm-password" type="password" name="password_confirmation" required minlength="12" autocomplete="new-password"></div>
<button class="admin-button" type="submit">Change password</button></form></section>
</div></div>
@endsection
