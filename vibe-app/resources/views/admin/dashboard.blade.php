@extends('admin.layouts.panel')

@section('title', 'Admin dashboard')

@section('content')
<div class="admin-topbar">
  <div><p style="margin:0 0 5px;color:#bc000c;font-weight:700;letter-spacing:.08em;text-transform:uppercase;font-size:12px">FLAME PH • ADMIN WORKSPACE</p><h1 class="admin-brand" style="margin:0;font-size:32px">Welcome, {{ $admin->name }}</h1><p style="margin:7px 0 0;color:#5c6070">{{ \App\Models\AdminAccount::ROLES[$admin->role] }} access</p></div>
  <div class="admin-nav">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a class="secondary" href="{{ route('admin.reports') }}">Reports</a>
    <a class="secondary" href="{{ route('admin.profile') }}">My profile</a>
    @if(in_array($admin->role, ['founder','super_admin','regular_admin'], true))<a class="secondary" href="{{ route('admin.members') }}">Member list</a>@endif
    @if(in_array($admin->role, ['founder','super_admin'], true))<a class="secondary" href="{{ route('admin.accounts') }}">Admin accounts</a>@endif
    <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="admin-button" type="submit">Log out</button></form>
  </div>
</div>
<section class="admin-grid" aria-label="Membership overview">
  <article class="admin-card"><p style="margin:0;color:#5c6070">Registered memberships</p><strong style="display:block;margin-top:8px;font-size:34px;color:#003289">{{ number_format($memberCount) }}</strong></article>
  <article class="admin-card"><p style="margin:0;color:#5c6070">Active members</p><strong style="display:block;margin-top:8px;font-size:34px;color:#155c31">{{ number_format($activeMemberCount) }}</strong></article>
  <article class="admin-card"><p style="margin:0;color:#5c6070">Paid plan</p><strong style="display:block;margin-top:8px;font-size:34px;color:#bc000c">{{ number_format($paidMemberCount) }}</strong></article>
  @if(in_array($admin->role, ['founder','super_admin'], true))<article class="admin-card"><p style="margin:0;color:#5c6070">Admin accounts</p><strong style="display:block;margin-top:8px;font-size:34px;color:#003289">{{ number_format($adminCount) }}</strong></article>@endif
</section>
<section class="admin-card" style="margin-top:18px">
  <h2 class="admin-brand" style="margin:0 0 10px;font-size:22px">Your access</h2>
  @if($admin->role === 'basic_user')
    <p style="margin:0 0 16px;color:#434653">You have report-viewing access only. Member contact details and editing controls are not available to this role.</p><a class="admin-button" href="{{ route('admin.reports') }}">View reports</a>
  @else
    <p style="margin:0 0 16px;color:#434653">Review member records, update membership status and plan, and use reports. Personal ID files are not exposed in this list.</p><a class="admin-button" href="{{ route('admin.members') }}">Open member list</a>
  @endif
  @if($admin->role === 'founder')<p style="margin:18px 0 0;padding-top:14px;border-top:1px solid #eaedff;color:#5c6070">Founder-level system access is reserved for this account. Database file import/export controls are not enabled in this initial release; a verified backup/restore workflow should be added before enabling them.</p>@endif
</section>
<section class="admin-card" style="margin-top:18px"><h2 class="admin-brand" style="margin:0 0 8px;font-size:22px">Provincial chapter counter</h2><p style="margin:0 0 14px;color:#5c6070">Each distinct province + city/municipality in member profiles counts as one recorded chapter location. This is a location proxy, not a verified chapter roster.</p><div class="admin-table-wrap"><table class="admin-table"><thead><tr><th>Province</th><th>City/municipality locations</th><th>Member records with location</th></tr></thead><tbody>@forelse($membershipStats['chapters_by_province'] as $province)<tr><td>{{ $province['province'] }}</td><td>{{ number_format($province['chapter_locations']) }}<br><span style="color:#737685">{{ $province['cities']->implode(', ') }}</span></td><td>{{ number_format($province['member_count']) }}</td></tr>@empty<tr><td colspan="3">No complete province and city/municipality locations have been added to member profiles yet.</td></tr>@endforelse</tbody></table></div></section>
<section class="admin-card" style="margin-top:18px"><h2 class="admin-brand" style="margin:0 0 8px;font-size:22px">Future FLAME PH databases</h2><p style="margin:0;color:#5c6070">This protected workspace is ready to host additional FLAME PH reports and database modules as they are connected. No other datasets are currently available.</p></section>
@endsection
