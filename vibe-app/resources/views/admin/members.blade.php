@extends('admin.layouts.panel')

@section('title', 'Member list')

@section('content')
<div class="admin-topbar"><div><p style="margin:0 0 5px;color:#bc000c;font-weight:700;letter-spacing:.08em;text-transform:uppercase;font-size:12px">FLAME PH • MEMBERS</p><h1 class="admin-brand" style="margin:0;font-size:32px">Member list</h1><p style="margin:7px 0 0;color:#5c6070">{{ $members->total() }} records • Only authorized admin roles can access identifiable member details.</p></div><div class="admin-nav"><a href="{{ route('admin.dashboard') }}">Dashboard</a><a class="secondary" href="{{ route('admin.reports') }}">Reports</a><form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="admin-button">Log out</button></form></div></div>
<div class="admin-card"><div class="admin-table-wrap"><table class="admin-table"><thead><tr><th>ID / Registered</th><th>Member</th><th>Business</th><th>Plan</th><th>Status</th><th>Update</th></tr></thead><tbody>
@forelse($members as $member)
<tr><td>#{{ $member->id }}<br><span style="color:#737685">{{ $member->created_at?->format('Y-m-d') }}</span></td><td>{{ $member->user?->name ?? $member->full_name ?? 'Name not provided' }}<br><a href="mailto:{{ $member->user?->email }}" style="color:#003289">{{ $member->user?->email ?? 'Email unavailable' }}</a></td><td>{{ $member->business_name ?: 'Not provided' }}<br><span style="color:#737685">{{ $member->mobile_number ?: '' }}</span></td><td>{{ ucfirst($member->plan) }}<br><span style="color:#737685">{{ ucfirst(str_replace('_',' ',$member->payment_status ?? 'unpaid')) }}</span></td><td>{{ ucfirst($member->status) }}</td><td>
<form method="POST" action="{{ route('admin.members.update', $member) }}" style="display:flex;gap:6px;align-items:center;min-width:245px">@csrf @method('PATCH')<select name="plan" aria-label="Plan for member {{ $member->id }}" style="padding:7px;border:1px solid #c3c6d6;border-radius:7px"><option value="free" @selected($member->plan === 'free')>Free</option><option value="paid" @selected($member->plan === 'paid')>Paid</option></select><select name="status" aria-label="Status for member {{ $member->id }}" style="padding:7px;border:1px solid #c3c6d6;border-radius:7px"><option value="active" @selected($member->status === 'active')>Active</option><option value="pending" @selected($member->status === 'pending')>Pending</option><option value="suspended" @selected($member->status === 'suspended')>Suspended</option></select><button class="admin-button" style="padding:8px 10px">Save</button></form>
</td></tr>
@empty<tr><td colspan="6">No registered memberships yet.</td></tr>@endforelse
</tbody></table></div><div class="admin-pagination">{{ $members->links() }}</div></div>
@endsection
