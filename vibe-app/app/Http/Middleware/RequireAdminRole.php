<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireAdminRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $account = $request->attributes->get('adminAccount');

        abort_unless($account && in_array($account->role, $roles, true), 403, 'Your admin role does not have access to this page.');

        return $next($request);
    }
}
