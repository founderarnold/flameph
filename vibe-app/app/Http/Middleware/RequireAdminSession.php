<?php

namespace App\Http\Middleware;

use App\Models\AdminAccount;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireAdminSession
{
    public function handle(Request $request, Closure $next): Response
    {
        $account = AdminAccount::query()
            ->whereKey($request->session()->get('admin_account_id'))
            ->where('active', true)
            ->first();

        if (!$account) {
            $request->session()->forget('admin_account_id');

            return redirect()->to('/about#admin-access')->with('admin_login_notice', 'Please sign in with an active FLAME PH admin account.');
        }

        $request->attributes->set('adminAccount', $account);

        return $next($request);
    }
}
