@extends('admin.layouts.panel')

@section('title', 'Reports')

@section('content')
<div class="admin-topbar"><div><p style="margin:0 0 5px;color:#bc000c;font-weight:700;letter-spacing:.08em;text-transform:uppercase;font-size:12px">FLAME PH • REPORTS</p><h1 class="admin-brand" style="margin:0;font-size:32px">Membership overview</h1><p style="margin:7px 0 0;color:#5c6070">Summary metrics only. Report-viewing accounts cannot edit or export member records.</p></div><div class="admin-nav"><a href="{{ route('admin.dashboard') }}">Dashboard</a><form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="admin-button">Log out</button></form></div></div>
<div class="admin-grid">
  <article class="admin-card"><p style="margin:0;color:#5c6070">All registrations</p><strong style="display:block;margin-top:8px;font-size:34px;color:#003289">{{ number_format(\App\Models\Membership::count()) }}</strong></article>
  <article class="admin-card"><p style="margin:0;color:#5c6070">Active memberships</p><strong style="display:block;margin-top:8px;font-size:34px;color:#155c31">{{ number_format(\App\Models\Membership::where('status','active')->count()) }}</strong></article>
  <article class="admin-card"><p style="margin:0;color:#5c6070">Free plan</p><strong style="display:block;margin-top:8px;font-size:34px;color:#003289">{{ number_format(\App\Models\Membership::where('plan','free')->count()) }}</strong></article>
  <article class="admin-card"><p style="margin:0;color:#5c6070">Paid plan</p><strong style="display:block;margin-top:8px;font-size:34px;color:#bc000c">{{ number_format(\App\Models\Membership::where('plan','paid')->count()) }}</strong></article>
</div>
@endsection
