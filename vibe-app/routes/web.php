<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', function () {
    $urls = [
        'https://www.flameph.org/',
        'https://www.flameph.org/about',
        'https://www.flameph.org/learn',
        'https://www.flameph.org/membership',
        'https://www.flameph.org/membership/terms',
        'https://www.flameph.org/events',
        'https://www.flameph.org/directory',
        'https://www.flameph.org/legal',
    ];

    $entries = collect($urls)->map(fn (string $url) => '<url><loc>' . e($url) . '</loc></url>')->implode('');

    return response('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . $entries . '</urlset>')
        ->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

Route::get('/favicon.png', function () {
    $iconPath = public_path('favicon.png');
    abort_unless(is_file($iconPath), 404);

    return response()->file($iconPath, [
        'Content-Type' => 'image/png',
        'Cache-Control' => 'public, max-age=604800',
    ]);
})->name('favicon');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/learn', [HomeController::class, 'learn'])->name('learn');
Route::redirect('/community', '/directory', 301)->name('community');
Route::get('/membership', [HomeController::class, 'membership'])->name('membership');
Route::get('/membership/terms', [HomeController::class, 'membershipTerms'])->name('membership.terms');
Route::get('/membership/terms/download', [HomeController::class, 'downloadMembershipTerms'])->name('membership.terms.download');
Route::post('/membership/start', [HomeController::class, 'startMembership'])->name('membership.start');
Route::get('/membership/activate', [HomeController::class, 'activation'])->name('membership.activate');
Route::post('/membership/activate', [HomeController::class, 'completeActivation'])->name('membership.activate.complete');
Route::get('/membership/profile', [HomeController::class, 'membershipProfile'])->name('membership.profile');
Route::post('/membership/profile', [HomeController::class, 'saveMembershipProfile'])->name('membership.profile.save');
Route::post('/membership/profile/upgrade', [HomeController::class, 'requestMembershipUpgrade'])->name('membership.profile.upgrade');
Route::post('/membership/profile/contact', [HomeController::class, 'contactFounder'])->middleware('throttle:5,1')->name('membership.profile.contact');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::post('/membership/register', [HomeController::class, 'registerMembership'])->middleware('throttle:3,10')->name('membership.register');
Route::post('/membership/register/mobile', [HomeController::class, 'registerMobileMembership'])->middleware('throttle:3,10')->name('membership.register.mobile');
Route::post('/membership/register/verify', [HomeController::class, 'verifyMembershipEmailOtp'])->middleware('throttle:10,10')->name('membership.register.verify');
Route::post('/membership/register/resend', [HomeController::class, 'resendMembershipEmailOtp'])->middleware('throttle:3,10')->name('membership.register.resend');
Route::get('/auth/google/redirect', [HomeController::class, 'redirectToGoogle'])->name('membership.google.redirect');
Route::get('/auth/google/callback', [HomeController::class, 'handleGoogleCallback'])->name('membership.google.callback');
Route::get('/auth/facebook/redirect', [HomeController::class, 'redirectToFacebook'])->name('membership.facebook.redirect');
Route::get('/auth/facebook/callback', [HomeController::class, 'handleFacebookCallback'])->name('membership.facebook.callback');
Route::post('/membership/login', [HomeController::class, 'login'])->name('membership.login');
Route::post('/membership/password/email', [HomeController::class, 'sendMembershipPasswordResetLink'])->middleware('throttle:3,10')->name('membership.password.email');
Route::get('/membership/password/reset/{token}', [HomeController::class, 'showMembershipPasswordResetForm'])->name('password.reset');
Route::post('/membership/password/reset', [HomeController::class, 'resetMembershipPassword'])->middleware('throttle:5,10')->name('membership.password.reset');
Route::get('/directory', [HomeController::class, 'directory'])->name('directory');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::middleware('membership.member')->prefix('/about/merch-shop')->name('merch-shop.')->group(function () {
    Route::get('/', function (\Illuminate\Http\Request $request) {
        $application = $request->session()->get('membership_application', []);

        return view('merch-shop', ['memberName' => $application['name'] ?? 'Member']);
    })->name('index');
    Route::get('/{path}', fn () => abort(404))->where('path', '.*')->name('subpage');
});
Route::get('/legal', [HomeController::class, 'legal'])->name('legal');
Route::get('/admin/login', fn () => redirect()->to('/about#admin-access'))->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->middleware('throttle:5,1')->name('admin.login');
Route::middleware('admin.session')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [AdminController::class, 'changeOwnPassword'])->middleware('throttle:5,1')->name('profile.password');
    Route::get('/accounts/{account}/avatar', [AdminController::class, 'avatar'])->name('accounts.avatar');
    Route::middleware('admin.role:founder,super_admin,regular_admin')->group(function () {
        Route::get('/members', [AdminController::class, 'members'])->name('members');
        Route::patch('/members/{membership}', [AdminController::class, 'updateMember'])->name('members.update');
    });
    Route::middleware('admin.role:founder,super_admin')->group(function () {
        Route::get('/accounts', [AdminController::class, 'accounts'])->name('accounts');
        Route::post('/accounts', [AdminController::class, 'createAccount'])->name('accounts.create');
        Route::patch('/accounts/{account}', [AdminController::class, 'updateAccount'])->name('accounts.update');
        Route::post('/accounts/{account}/password', [AdminController::class, 'resetAccountPassword'])->middleware('throttle:5,1')->name('accounts.password');
        Route::delete('/accounts/{account}', [AdminController::class, 'deleteAccount'])->name('accounts.delete');
    });
});
Route::post('/generate', [HomeController::class, 'generate'])->name('generate');
