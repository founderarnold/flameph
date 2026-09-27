@extends('admin.layouts.panel')

@section('title', 'Reports')

@section('content')
<div class="admin-topbar"><div><p style="margin:0 0 5px;color:#bc000c;font-weight:700;letter-spacing:.08em;text-transform:uppercase;font-size:12px">FLAME PH • REPORTS</p><h1 class="admin-brand" style="margin:0;font-size:32px">Membership overview</h1><p style="margin:7px 0 0;color:#5c6070">Summary metrics only. Report-viewing accounts cannot edit or export member records.</p></div><div class="admin-nav"><a href="{{ route('admin.dashboard') }}">Dashboard</a><form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="admin-button">Log out</button></form></div></div>
<div class="admin-grid">
  <article class="admin-card"><p style="margin:0;color:#5c6070">All registrations</p><strong style="display:block;margin-top:8px;font-size:34px;color:#003289">{{ number_format($membershipStats['registered_members']) }}</strong></article>
  <article class="admin-card"><p style="margin:0;color:#5c6070">Active memberships</p><strong style="display:block;margin-top:8px;font-size:34px;color:#155c31">{{ number_format($membershipStats['active_members']) }}</strong></article>
  <article class="admin-card"><p style="margin:0;color:#5c6070">Provinces represented</p><strong style="display:block;margin-top:8px;font-size:34px;color:#003289">{{ number_format($membershipStats['represented_provinces']) }}</strong></article>
  <article class="admin-card"><p style="margin:0;color:#5c6070">Recorded chapter locations</p><strong style="display:block;margin-top:8px;font-size:34px;color:#bc000c">{{ number_format($membershipStats['chapter_locations']) }}</strong></article>
</div>
<section class="admin-card" style="margin-top:18px"><h2 class="admin-brand" style="margin:0 0 10px;font-size:22px">Locations by province</h2><p style="margin:0 0 12px;color:#5c6070">Counts are grouped by distinct province and city/municipality entries in registered member profiles; they do not certify chapter status.</p><div class="admin-table-wrap"><table class="admin-table"><thead><tr><th>Province</th><th>Locations</th><th>Member records</th></tr></thead><tbody>@forelse($membershipStats['chapters_by_province'] as $province)<tr><td>{{ $province['province'] }}</td><td>{{ $province['chapter_locations'] }} — {{ $province['cities']->implode(', ') }}</td><td>{{ $province['member_count'] }}</td></tr>@empty<tr><td colspan="3">No location data recorded yet.</td></tr>@endforelse</tbody></table></div></section>
@endsection
