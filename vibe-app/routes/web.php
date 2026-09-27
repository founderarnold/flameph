<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::post('/membership/register', [HomeController::class, 'registerMembership'])->name('membership.register');
Route::post('/membership/register/mobile', [HomeController::class, 'registerMobileMembership'])->name('membership.register.mobile');
Route::get('/auth/google/redirect', [HomeController::class, 'redirectToGoogle'])->name('membership.google.redirect');
Route::get('/auth/google/callback', [HomeController::class, 'handleGoogleCallback'])->name('membership.google.callback');
Route::get('/auth/facebook/redirect', [HomeController::class, 'redirectToFacebook'])->name('membership.facebook.redirect');
Route::get('/auth/facebook/callback', [HomeController::class, 'handleFacebookCallback'])->name('membership.facebook.callback');
Route::post('/membership/login', [HomeController::class, 'login'])->name('membership.login');
Route::get('/directory', [HomeController::class, 'directory'])->name('directory');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/legal', [HomeController::class, 'legal'])->name('legal');
Route::post('/generate', [HomeController::class, 'generate'])->name('generate');
