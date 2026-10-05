<?php

namespace App\Http\Middleware;

use App\Models\Membership;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireMembershipMember
{
    public function handle(Request $request, Closure $next): Response
    {
        $application = $request->session()->get('membership_application', []);
        $membershipId = $application['membership_id'] ?? null;

        $isActiveMember = $request->session()->get('membership_logged_in') === true
            && ($application['account_status'] ?? null) === 'active'
            && $membershipId
            && Membership::query()->whereKey($membershipId)->where('status', 'active')->exists();

        if (! $isActiveMember) {
            return redirect()->to(route('membership') . '#login')
                ->with('merch_login_notice', 'Log in to your active FLAME PH member account to visit the merch shop.');
        }

        return $next($request);
    }
}
