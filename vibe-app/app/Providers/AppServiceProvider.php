<?php

namespace App\Providers;

use App\Models\Membership;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.mobile-navigation', function ($view): void {
            $application = session('membership_application', []);
            $membershipId = $application['membership_id'] ?? null;

            $isActiveMember = session('membership_logged_in') === true
                && ($application['account_status'] ?? null) === 'active'
                && $membershipId
                && Membership::query()->whereKey($membershipId)->where('status', 'active')->exists();

            $view->with('showMemberShop', (bool) $isActiveMember);
        });
    }
}
