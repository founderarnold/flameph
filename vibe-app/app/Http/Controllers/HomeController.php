<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function learn(): View
    {
        return view('learn');
    }

    public function membership(): View
    {
        return view('membership');
    }

    public function events(): View
    {
        return view('events');
    }

    public function registerMembership(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'business_name' => ['required', 'string', 'max:160'],
            'plan' => ['required', 'in:free,starter,micro,neo,pro,champion'],
            'billing' => ['required', 'in:monthly,annual'],
            'payment_method' => ['required', 'in:none,gcash,maya,bank_transfer'],
            'consent' => ['accepted'],
        ]);

        session(['membership_application' => $validated]);

        return redirect()->to(route('membership') . '#next-steps')
            ->with('registration_success', 'Your FLAME PH membership request is ready.');
    }

    public function registerMobileMembership(Request $request)
    {
        $validated = $request->validate([
            'mobile_number' => ['required', 'string', 'max:24', 'regex:/^[+]?[0-9][0-9 ()-]{7,19}$/'],
            'mobile_consent' => ['accepted'],
        ], [
            'mobile_number.regex' => 'Enter a valid mobile number, such as 0917 123 4567 or +63 917 123 4567.',
        ]);

        $mobileNumber = trim($validated['mobile_number']);

        session([
            'membership_application' => [
                'name' => null,
                'email' => null,
                'business_name' => null,
                'mobile_number' => $mobileNumber,
                'plan' => 'free',
                'billing' => 'monthly',
                'payment_method' => 'none',
                'consent' => true,
                'auth_provider' => 'mobile',
                'profile_completion' => 'pending_owner_assistance',
            ],
        ]);

        return redirect()->to(route('membership') . '#next-steps')
            ->with('registration_success', 'Your free FLAME PH profile was started with your mobile number. The FLAME PH team can help verify and complete the remaining details.');
    }

    public function redirectToGoogle(Request $request)
    {
        $clientId = config('services.google.client_id');

        if (!$clientId) {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'Google registration is being connected by the FLAME PH team. You can use the short form below for now.');
        }

        $state = bin2hex(random_bytes(16));
        $request->session()->put('google_oauth_state', $state);

        $redirectUri = config('services.google.redirect');
        if (!str_starts_with($redirectUri, 'http')) {
            $redirectUri = url($redirectUri);
        }

        return redirect()->away('https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'scope' => 'openid email profile',
            'state' => $state,
            'access_type' => 'online',
            'prompt' => 'select_account',
        ]));
    }

    public function handleGoogleCallback(Request $request)
    {
        if (!$request->filled('code') || !hash_equals((string) $request->session()->pull('google_oauth_state'), (string) $request->string('state'))) {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'We could not verify that Google sign-in request. Please try again.');
        }

        $redirectUri = config('services.google.redirect');
        if (!str_starts_with($redirectUri, 'http')) {
            $redirectUri = url($redirectUri);
        }

        $tokenResponse = Http::asForm()->post('https://oauth2.googleapis.com/token', [
            'code' => $request->string('code'),
            'client_id' => config('services.google.client_id'),
            'client_secret' => config('services.google.client_secret'),
            'redirect_uri' => $redirectUri,
            'grant_type' => 'authorization_code',
        ]);

        if (!$tokenResponse->successful() || !$tokenResponse->json('access_token')) {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'Google could not complete registration. Please use the short form below.');
        }

        $profileResponse = Http::withToken($tokenResponse->json('access_token'))
            ->get('https://openidconnect.googleapis.com/v1/userinfo');

        if (!$profileResponse->successful() || !$profileResponse->json('email')) {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'We could not read the selected Google profile. Please try again.');
        }

        $profile = $profileResponse->json();
        session([
            'membership_application' => [
                'name' => $profile['name'] ?? $profile['email'],
                'email' => $profile['email'],
                'business_name' => null,
                'plan' => 'free',
                'billing' => 'monthly',
                'payment_method' => 'none',
                'consent' => true,
                'auth_provider' => 'google',
                'profile_completion' => 'pending_owner_assistance',
            ],
        ]);

        return redirect()->to(route('membership') . '#next-steps')
            ->with('registration_success', 'Your free FLAME PH profile was started with Google. The FLAME PH team can help complete the remaining details.');
    }

    public function redirectToFacebook(Request $request)
    {
        $clientId = config('services.facebook.client_id');

        if (!$clientId) {
            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'Facebook registration is being connected by the FLAME PH team. You can use the short form below for now.');
        }

        $state = bin2hex(random_bytes(16));
        $request->session()->put('facebook_oauth_state', $state);
        $redirectUri = config('services.facebook.redirect');
        if (!str_starts_with($redirectUri, 'http')) {
            $redirectUri = url($redirectUri);
        }

        return redirect()->away('https://www.facebook.com/' . config('services.facebook.graph_version') . '/dialog/oauth?' . http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'state' => $state,
            'scope' => 'public_profile,email',
            'response_type' => 'code',
        ]));
    }

    public function handleFacebookCallback(Request $request)
    {
        if (!$request->filled('code') || $request->has('error') || !hash_equals((string) $request->session()->pull('facebook_oauth_state'), (string) $request->string('state'))) {
            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'We could not verify that Facebook sign-in request. Please try again.');
        }

        $redirectUri = config('services.facebook.redirect');
        if (!str_starts_with($redirectUri, 'http')) {
            $redirectUri = url($redirectUri);
        }
        $graphBase = 'https://graph.facebook.com/' . config('services.facebook.graph_version');

        $tokenResponse = Http::get($graphBase . '/oauth/access_token', [
            'client_id' => config('services.facebook.client_id'),
            'client_secret' => config('services.facebook.client_secret'),
            'redirect_uri' => $redirectUri,
            'code' => $request->string('code'),
        ]);

        if (!$tokenResponse->successful() || !$tokenResponse->json('access_token')) {
            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'Facebook could not complete registration. Please use the short form below.');
        }

        $profileResponse = Http::get($graphBase . '/me', [
            'fields' => 'id,name,email',
            'access_token' => $tokenResponse->json('access_token'),
        ]);

        if (!$profileResponse->successful() || !$profileResponse->json('email')) {
            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'Facebook did not provide an email address. Please use the short form below.');
        }

        $profile = $profileResponse->json();
        session([
            'membership_application' => [
                'name' => $profile['name'] ?? $profile['email'],
                'email' => $profile['email'],
                'business_name' => null,
                'plan' => 'free',
                'billing' => 'monthly',
                'payment_method' => 'none',
                'consent' => true,
                'auth_provider' => 'facebook',
                'profile_completion' => 'pending_owner_assistance',
            ],
        ]);

        return redirect()->to(route('membership') . '#next-steps')
            ->with('registration_success', 'Your free FLAME PH profile was started with Facebook. The FLAME PH team can help complete the remaining details.');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'login_email' => ['required', 'email', 'max:255'],
            'login_password' => ['required', 'string', 'min:6'],
        ]);

        $application = session('membership_application');

        if (!$application || empty($application['email']) || strtolower($application['email']) !== strtolower($validated['login_email'])) {
            return redirect()->to(route('membership') . '#login')
                ->withErrors(['login_email' => 'No prototype account was found for this email. Start with registration first.']);
        }

        session(['membership_logged_in' => true]);

        return redirect()->to(route('membership') . '#next-steps')
            ->with('login_success', 'You are signed in to the prototype membership area.');
    }

    public function directory(): View
    {
        return view('directory');
    }

    public function about(): View
    {
        return view('about');
    }

    public function legal(): View
    {
        return view('legal');
    }

    public function generate(Request $request): string
    {
        $request->validate([
            'business_type' => ['required', 'string', 'max:255'],
        ]);

        return 'Generated successfully';
    }
}
