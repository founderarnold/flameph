<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Client\ConnectionException;
use App\Models\Membership;
use App\Models\User;
use App\Services\MembershipStatistics;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(MembershipStatistics $statistics): View
    {
        return view('home', ['membershipStats' => $statistics->summary()]);
    }

    public function learn(): View
    {
        return view('learn');
    }

    public function membership(MembershipStatistics $statistics): View
    {
        return view('membership', ['membershipStats' => $statistics->summary()]);
    }

    public function membershipTerms(): View
    {
        return view('membership-terms');
    }

    public function downloadMembershipTerms()
    {
        return response()->streamDownload(
            fn () => print(view('membership-terms-document')->render()),
            'FLAME-PH-Membership-Terms-v1.0.html',
            ['Content-Type' => 'text/html; charset=UTF-8']
        );
    }

    public function startMembership(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'provider' => ['required', 'in:google,facebook'],
            'membership_terms_accepted' => ['accepted'],
            'marketing_consent' => ['sometimes', 'accepted'],
        ]);

        $request->session()->put('membership_terms_consent', [
            'accepted_at' => now()->toIso8601String(),
            'version' => '1.0',
            'marketing_consent_at' => $request->boolean('marketing_consent') ? now()->toIso8601String() : null,
        ]);

        return redirect()->route($validated['provider'] === 'google'
            ? 'membership.google.redirect'
            : 'membership.facebook.redirect');
    }

    public function activation(Request $request): View|\Illuminate\Http\RedirectResponse
    {
        $application = $request->session()->get('membership_application');

        if (!$application || !in_array($application['auth_provider'] ?? null, ['google', 'facebook'], true)) {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'Start with Google or Facebook first so FLAME PH can prepare your activation profile.');
        }

        return view('activation', compact('application'));
    }

    public function completeActivation(Request $request): \Illuminate\Http\RedirectResponse
    {
        $application = $request->session()->get('membership_application');

        if (!$application || !in_array($application['auth_provider'] ?? null, ['google', 'facebook'], true)) {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'Your social sign-in session has expired. Please try again.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'business_name' => ['required', 'string', 'max:160'],
            'mobile_number' => ['nullable', 'string', 'max:24', 'regex:/^[+]?[0-9][0-9 ()-]{7,19}$/'],
            'activation_consent' => ['accepted'],
        ], [
            'mobile_number.regex' => 'Enter a valid mobile number, such as 0917 123 4567 or +63 917 123 4567.',
        ]);
        $mobileNumber = trim((string) ($validated['mobile_number'] ?? '')) ?: null;

        try {
            $member = DB::transaction(function () use ($application, $validated, $mobileNumber) {
                $email = strtolower(trim($application['email']));
                $user = User::firstOrNew(['email' => $email]);

                if (!$user->exists) {
                    $user->name = trim($validated['name']);
                    $user->password = Str::random(64);
                }

                $user->email_verified_at ??= now();
                $user->save();

                return Membership::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'business_name' => trim($validated['business_name']),
                        'mobile_number' => $mobileNumber,
                        'plan' => 'free',
                        'status' => 'active',
                        'registration_source' => 'google',
                        'activated_at' => now(),
                        'terms_accepted_at' => $application['terms_accepted_at'] ?? null,
                        'terms_version' => $application['terms_version'] ?? null,
                        'marketing_consent_at' => $application['marketing_consent_at'] ?? null,
                    ],
                );
            });
        } catch (\Throwable $exception) {
            report($exception);

            return back()->withInput()->withErrors([
                'activation' => 'We could not save your membership right now. Please try again in a moment.',
            ]);
        }

        $request->session()->put('membership_application', array_merge($application, [
            'name' => trim($validated['name']),
            'business_name' => trim($validated['business_name']),
            'mobile_number' => $mobileNumber,
            'profile_completion' => 'pending_member_profile',
            'account_status' => 'active',
            'membership_id' => $member->id,
        ]));
        $request->session()->put('membership_logged_in', true);

        return redirect()->to(route('membership') . '#next-steps')
            ->with('registration_success', 'Your FLAME PH account is active. Welcome to the FLAME PH Free Community.');
    }

    public function membershipProfile(Request $request): View|RedirectResponse
    {
        $application = $request->session()->get('membership_application');

        if (empty($application['membership_id']) || ($application['account_status'] ?? null) !== 'active') {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'Activate your Free Community account before continuing to Step 2.');
        }

        $membership = Membership::findOrFail($application['membership_id']);

        return view('membership-profile', compact('application', 'membership'));
    }

    public function saveMembershipProfile(Request $request): RedirectResponse
    {
        $application = $request->session()->get('membership_application');

        if (empty($application['membership_id']) || ($application['account_status'] ?? null) !== 'active') {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'Activate your Free Community account before continuing to Step 2.');
        }

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:160'],
            'complete_address' => ['required', 'string', 'max:600'],
            'city_municipality' => ['required', 'string', 'max:100'],
            'province' => ['required', 'string', 'max:100'],
            'business_name' => ['required', 'string', 'max:160'],
            'entrepreneur_stage' => ['required', 'in:idea,preparing,selling,established'],
            'business_registration_status' => ['required', 'in:not_started,planning,registered,not_sure'],
            'industry' => ['nullable', 'string', 'max:100'],
            'products_services' => ['nullable', 'string', 'max:1200'],
            'primary_goal' => ['required', 'in:validate_idea,first_sales,registration,marketing,operations,connections,finance_skills'],
            'support_needs' => ['nullable', 'array', 'max:7'],
            'support_needs.*' => ['string', 'in:idea_validation,pricing_bookkeeping,permits,marketing,connections,funding_readiness,digital_tools'],
            'preferred_language' => ['required', 'in:filipino,english,both'],
            'id_document' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'id_document_consent' => ['required_with:id_document', 'accepted'],
        ]);
        $validated['support_needs'] = $validated['support_needs'] ?? [];

        $membership = Membership::findOrFail($application['membership_id']);
        $idDocument = $request->file('id_document');
        unset($validated['id_document'], $validated['id_document_consent']);
        $previousIdPath = $membership->id_document_path;
        $newIdPath = null;

        if ($idDocument) {
            $newIdPath = $idDocument->storeAs(
                'membership-identifications',
                Str::uuid() . '.' . $idDocument->extension(),
                'local'
            );

            if (!$newIdPath) {
                return back()->withErrors(['id_document' => 'We could not securely save the ID file. Please try again.']);
            }

            $membership->id_document_path = $newIdPath;
            $membership->id_uploaded_at = now();
        }

        $membership->fill($validated);
        $membership->profile_completed_at = now();
        try {
            $membership->save();
        } catch (\Throwable $exception) {
            if ($newIdPath) {
                Storage::disk('local')->delete($newIdPath);
            }
            report($exception);

            return back()->withErrors(['profile' => 'We could not save your profile right now. Please try again.']);
        }

        if ($newIdPath && $previousIdPath) {
            Storage::disk('local')->delete($previousIdPath);
        }
        $membership->user()->update(['name' => $validated['full_name']]);

        $request->session()->put('membership_application', array_merge($application, [
            'profile_completion' => 'complete',
            'profile_completed' => true,
        ]));

        return redirect()->route('membership.profile')->with('profile_saved', true);
    }

    public function requestMembershipUpgrade(Request $request): RedirectResponse
    {
        $application = $request->session()->get('membership_application');

        if (empty($application['membership_id']) || ($application['account_status'] ?? null) !== 'active') {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'Activate your Free Community account before requesting a paid membership.');
        }

        $membership = Membership::findOrFail($application['membership_id']);
        if ($membership->plan !== 'free') {
            return back()->withErrors(['upgrade' => 'This account is already on a paid plan. Please contact FLAME PH to change your plan.']);
        }

        $validated = $request->validate([
            'requested_plan' => ['required', 'in:starter,micro,neo,pro,champion'],
            'billing_cycle' => ['required', 'in:monthly,annual'],
            'payment_method' => ['required', 'in:gcash,maya,bank_transfer,cash'],
            'amount_paid' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
        ]);

        $monthlyPrices = ['starter' => 50, 'micro' => 100, 'neo' => 500, 'pro' => 1000, 'champion' => 2000];
        $membership->requested_plan = $validated['requested_plan'];
        $membership->billing_cycle = $validated['billing_cycle'];
        $membership->amount_due = $monthlyPrices[$validated['requested_plan']] * ($validated['billing_cycle'] === 'annual' ? 10 : 1);
        $membership->payment_method = $validated['payment_method'];
        $membership->amount_paid = $validated['amount_paid'];
        $membership->payment_status = (float) $validated['amount_paid'] > 0
            ? 'pending_verification'
            : 'awaiting_payment';
        $membership->save();

        return redirect()->route('membership.profile')->with('upgrade_requested', true);
    }

    public function contactFounder(Request $request): RedirectResponse
    {
        $application = $request->session()->get('membership_application');
        if (empty($application['membership_id']) || ($application['account_status'] ?? null) !== 'active') {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'Activate your Free Community account before contacting the FLAME PH Founder.');
        }

        $validated = $request->validate([
            'contact_name' => ['required', 'string', 'max:120'],
            'contact_email' => ['required', 'email', 'max:255'],
            'contact_mobile' => ['nullable', 'string', 'max:24'],
            'contact_address' => ['nullable', 'string', 'max:500'],
            'contact_business_name' => ['nullable', 'string', 'max:160'],
            'contact_business_type' => ['nullable', 'string', 'max:120'],
            'contact_business_position' => ['nullable', 'string', 'max:120'],
            'contact_facebook_name' => ['nullable', 'string', 'max:120'],
            'contact_facebook_page' => ['nullable', 'url', 'max:255'],
            'contact_website' => ['nullable', 'url', 'max:255'],
            'contact_topic' => ['required', 'in:business,personal,msme_ecosystem,website,other'],
            'contact_message' => ['required', 'string', 'max:5000'],
            'contact_consent' => ['accepted'],
        ]);

        if (in_array(config('mail.default'), ['log', 'array'], true)) {
            return redirect()->to(route('membership.profile') . '#founder-contact')
                ->withInput($request->only('contact_name', 'contact_email', 'contact_mobile', 'contact_address', 'contact_business_name', 'contact_business_type', 'contact_business_position', 'contact_facebook_name', 'contact_facebook_page', 'contact_website', 'contact_topic', 'contact_message'))
                ->with('contact_send_failed', 'Email delivery is not configured on this website yet. Your message was not sent. Please email federationofmsmes@gmail.com directly for now.');
        }

        try {
            Mail::raw(
                "FLAME PH Free Community member inquiry\n\nName: {$validated['contact_name']}\nEmail: {$validated['contact_email']}\nMobile phone: " . ($validated['contact_mobile'] ?? 'Not provided') . "\nAddress: " . ($validated['contact_address'] ?? 'Not provided') . "\nBusiness name: " . ($validated['contact_business_name'] ?? 'Not provided') . "\nType of business: " . ($validated['contact_business_type'] ?? 'Not provided') . "\nPosition in business: " . ($validated['contact_business_position'] ?? 'Not provided') . "\nFacebook account name: " . ($validated['contact_facebook_name'] ?? 'Not provided') . "\nFacebook page: " . ($validated['contact_facebook_page'] ?? 'Not provided') . "\nWebsite: " . ($validated['contact_website'] ?? 'Not provided') . "\nTopic: {$validated['contact_topic']}\nMembership ID: {$application['membership_id']}\n\nMessage:\n{$validated['contact_message']}",
                function ($message) use ($validated) {
                    $message->to('federationofmsmes@gmail.com')
                        ->replyTo($validated['contact_email'], $validated['contact_name'])
                        ->subject('FLAME PH member inquiry: ' . $validated['contact_topic']);
                }
            );
        } catch (\Throwable $exception) {
            report($exception);
            return redirect()->to(route('membership.profile') . '#founder-contact')
                ->withInput($request->only('contact_name', 'contact_email', 'contact_mobile', 'contact_address', 'contact_business_name', 'contact_business_type', 'contact_business_position', 'contact_facebook_name', 'contact_facebook_page', 'contact_website', 'contact_topic', 'contact_message'))
                ->with('contact_send_failed', 'Your message could not be sent right now. Please try again later or email federationofmsmes@gmail.com directly.');
        }

        return redirect()->route('membership.profile')->with('contact_sent', true);
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
            'mobile_number' => ['required', 'string', 'max:24', 'regex:/^[+]?[0-9][0-9 ()-]{7,19}$/'],
            'payment_method' => ['required', 'in:none,gcash,maya,bank_transfer'],
            'consent' => ['accepted'],
            'membership_terms_accepted' => ['accepted'],
            'marketing_consent' => ['sometimes', 'accepted'],
        ], [
            'mobile_number.regex' => 'Enter a valid mobile number, such as 0917 123 4567 or +63 917 123 4567.',
        ]);

        if (($validated['plan'] === 'free') !== ($validated['payment_method'] === 'none')) {
            return back()->withInput()->withErrors(['payment_method' => $validated['plan'] === 'free'
                ? 'Select the free community payment option for a free membership.'
                : 'Choose a payment method for a paid membership tier.']);
        }

        return $this->sendMembershipEmailOtp($request, [
            'name' => trim($validated['name']),
            'email' => strtolower(trim($validated['email'])),
            'business_name' => trim($validated['business_name']),
            'mobile_number' => trim($validated['mobile_number']),
            'plan' => $validated['plan'],
            'billing' => $validated['billing'],
            'payment_method' => $validated['payment_method'],
            'terms_accepted_at' => now()->toIso8601String(),
            'terms_version' => '1.0',
            'marketing_consent_at' => $request->boolean('marketing_consent') ? now()->toIso8601String() : null,
            'registration_source' => 'membership_form_email_otp',
        ]);
    }

    public function registerMobileMembership(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:24', 'regex:/^[+]?[0-9][0-9 ()-]{7,19}$/'],
            'business_name' => ['nullable', 'string', 'max:160'],
            'mobile_consent' => ['accepted'],
            'membership_terms_accepted' => ['accepted'],
            'marketing_consent' => ['sometimes', 'accepted'],
        ], [
            'mobile_number.regex' => 'Enter a valid mobile number, such as 0917 123 4567 or +63 917 123 4567.',
        ]);

        return $this->sendMembershipEmailOtp($request, [
            'name' => trim($validated['name']),
            'email' => strtolower(trim($validated['email'])),
            'business_name' => trim($validated['business_name'] ?? ''),
            'mobile_number' => trim($validated['mobile_number']),
            'plan' => 'free',
            'billing' => 'monthly',
            'payment_method' => 'none',
            'terms_accepted_at' => now()->toIso8601String(),
            'terms_version' => '1.0',
            'marketing_consent_at' => $request->boolean('marketing_consent') ? now()->toIso8601String() : null,
            'registration_source' => 'mobile_email_otp',
        ]);
    }

    private function sendMembershipEmailOtp(Request $request, array $application): RedirectResponse
    {
        if (in_array(config('mail.default'), ['log', 'array'], true)) {
            return back()->withInput()->withErrors(['email' => 'Email delivery is not configured, so we could not send a verification code. Please try again later.']);
        }
        if (User::where('email', $application['email'])->whereHas('membership')->exists()) {
            return back()->withInput()->withErrors(['email' => 'An account already exists for this email. Please use the sign-in option or contact FLAME PH for help.']);
        }

        $code = (string) random_int(100000, 999999);
        try {
            Mail::raw("Your FLAME PH membership verification code is {$code}. It expires in 10 minutes. If you did not request this code, you can ignore this email.", function ($message) use ($application) {
                $message->to($application['email'], $application['name'])->subject('Your FLAME PH membership verification code');
            });
        } catch (\Throwable $exception) {
            report($exception);
            return back()->withInput()->withErrors(['email' => 'We could not send the verification email right now. Please check your email address and try again.']);
        }

        $request->session()->put('membership_email_otp', [
            'hash' => Hash::make($code), 'application' => $application,
            'expires_at' => now()->addMinutes(10)->timestamp, 'attempts' => 0, 'sent_at' => now()->timestamp,
        ]);
        return redirect()->to(route('membership') . '#registration')->with('membership_otp_sent', true);
    }

    public function resendMembershipEmailOtp(Request $request): RedirectResponse
    {
        $pending = $request->session()->get('membership_email_otp');
        if (!$pending || empty($pending['application'])) {
            return redirect()->to(route('membership') . '#registration')->withErrors(['email' => 'Start the membership form again to request a new code.']);
        }
        if (now()->timestamp - (int) ($pending['sent_at'] ?? 0) < 60) {
            return redirect()->to(route('membership') . '#registration')->withErrors(['email' => 'Please wait one minute before requesting another code.']);
        }
        return $this->sendMembershipEmailOtp($request, $pending['application']);
    }

    public function verifyMembershipEmailOtp(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'verification_code' => ['required', 'digits:6'],
            'password' => ['required', 'string', 'min:12', 'confirmed'],
        ]);
        $pending = $request->session()->get('membership_email_otp');
        if (!$pending || empty($pending['application']) || now()->timestamp > (int) ($pending['expires_at'] ?? 0)) {
            $request->session()->forget('membership_email_otp');
            return redirect()->to(route('membership') . '#registration')->withErrors(['verification_code' => 'This code expired. Submit the membership form again to receive a new one.']);
        }
        if (($pending['attempts'] ?? 0) >= 5) {
            $request->session()->forget('membership_email_otp');
            return redirect()->to(route('membership') . '#registration')->withErrors(['verification_code' => 'Too many incorrect attempts. Please submit the form again for a new code.']);
        }
        if (!Hash::check($validated['verification_code'], $pending['hash'])) {
            $pending['attempts']++;
            $request->session()->put('membership_email_otp', $pending);
            return redirect()->to(route('membership') . '#registration')->withErrors(['verification_code' => 'That code does not match. Please check the email and try again.']);
        }

        $application = $pending['application'];
        try {
            $member = DB::transaction(function () use ($application, $validated) {
                $user = User::firstOrNew(['email' => $application['email']]);
                if (!$user->exists) {
                    $user->name = $application['name'];
                }
                $user->password = $validated['password'];
                $user->email_verified_at ??= now();
                $user->save();
                $paidPlan = $application['plan'] !== 'free';
                $monthlyPrices = ['starter' => 50, 'micro' => 100, 'neo' => 500, 'pro' => 1000, 'champion' => 2000];
                $amountDue = $paidPlan ? $monthlyPrices[$application['plan']] * ($application['billing'] === 'annual' ? 10 : 1) : 0;

                return Membership::create([
                    'user_id' => $user->id, 'full_name' => $application['name'],
                    'business_name' => $application['business_name'] ?: 'Not provided',
                    'mobile_number' => $application['mobile_number'], 'plan' => 'free',
                    'requested_plan' => $paidPlan ? $application['plan'] : null,
                    'billing_cycle' => $application['billing'], 'amount_due' => $amountDue, 'amount_paid' => 0,
                    'payment_method' => $application['payment_method'],
                    'payment_status' => $paidPlan ? 'awaiting_payment' : 'unpaid',
                    'status' => 'active', 'registration_source' => $application['registration_source'],
                    'activated_at' => now(), 'terms_accepted_at' => $application['terms_accepted_at'],
                    'terms_version' => $application['terms_version'], 'marketing_consent_at' => $application['marketing_consent_at'],
                ]);
            });
        } catch (\Throwable $exception) {
            report($exception);
            return redirect()->to(route('membership') . '#registration')->withErrors(['verification_code' => 'We verified your email but could not save the membership yet. Please try again.']);
        }

        $request->session()->forget('membership_email_otp');
        $request->session()->regenerate();
        $request->session()->put('membership_application', [
            'name' => $application['name'], 'email' => $application['email'], 'business_name' => $application['business_name'],
            'mobile_number' => $application['mobile_number'], 'plan' => 'free',
            'requested_plan' => $application['plan'] === 'free' ? null : $application['plan'],
            'billing' => $application['billing'], 'payment_method' => $application['payment_method'],
            'auth_provider' => 'email_otp', 'account_status' => 'active', 'profile_completion' => 'pending_member_profile',
            'membership_id' => $member->id, 'terms_accepted_at' => $application['terms_accepted_at'],
            'terms_version' => $application['terms_version'], 'marketing_consent_at' => $application['marketing_consent_at'],
        ]);
        $request->session()->put('membership_logged_in', true);
        return redirect()->to(route('membership') . '#next-steps')->with('registration_success', 'Your email is verified and your FLAME PH membership has been saved.');
    }

    public function redirectToGoogle(Request $request)
    {
        if (!$request->session()->has('membership_terms_consent.accepted_at')) {
            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'Please read and accept the FLAME PH membership terms before continuing.');
        }

        $clientId = config('services.google.client_id');

        if (!$clientId || !config('services.google.client_secret')) {
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

        try {
            $googleHttp = Http::timeout(20)->withOptions([
                'verify' => config('services.google.ca_bundle') ?: true,
            ]);
            $tokenResponse = $googleHttp->asForm()->post('https://oauth2.googleapis.com/token', [
                'code' => $request->string('code'),
                'client_id' => config('services.google.client_id'),
                'client_secret' => config('services.google.client_secret'),
                'redirect_uri' => $redirectUri,
                'grant_type' => 'authorization_code',
            ]);
        } catch (ConnectionException $exception) {
            report($exception);

            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'We could not connect securely to Google. Please try again.');
        }

        if (!$tokenResponse->successful() || !$tokenResponse->json('access_token')) {
            $providerError = (string) $tokenResponse->json('error', 'unknown_error');
            Log::warning('Google OAuth token exchange was rejected.', [
                'status' => $tokenResponse->status(),
                'provider_error' => $providerError,
            ]);

            $message = match ($providerError) {
                'invalid_grant' => 'This Google sign-in code expired or was already used. Start Google sign-in again to continue.',
                'invalid_client' => 'Google rejected the FLAME PH OAuth credentials. Please check the configured client ID and secret.',
                'redirect_uri_mismatch' => 'The Google callback URL does not match the URL registered for this app.',
                default => 'Google could not complete sign-in. Start Google sign-in again, or contact FLAME PH support if this continues.',
            };

            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', $message);
        }

        try {
            $profileResponse = Http::timeout(20)
                ->withOptions(['verify' => config('services.google.ca_bundle') ?: true])
                ->withToken($tokenResponse->json('access_token'))
                ->get('https://openidconnect.googleapis.com/v1/userinfo');
        } catch (ConnectionException $exception) {
            report($exception);

            return redirect()->to(route('membership') . '#registration')
                ->with('google_error', 'We could not securely retrieve your Google profile. Please try again.');
        }

        if (!$profileResponse->successful() || !$profileResponse->json('email') || !$profileResponse->json('email_verified')) {
            Log::warning('Google OAuth profile request did not return a verified email.', [
                'status' => $profileResponse->status(),
                'email_present' => (bool) $profileResponse->json('email'),
                'email_verified' => (bool) $profileResponse->json('email_verified'),
            ]);

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
                'terms_accepted_at' => $request->session()->get('membership_terms_consent.accepted_at'),
                'terms_version' => $request->session()->get('membership_terms_consent.version'),
                'marketing_consent_at' => $request->session()->get('membership_terms_consent.marketing_consent_at'),
            ],
        ]);

        return redirect()->route('membership.activate');
    }

    public function redirectToFacebook(Request $request)
    {
        if (!$request->session()->has('membership_terms_consent.accepted_at')) {
            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'Please read and accept the FLAME PH membership terms before continuing.');
        }

        $clientId = config('services.facebook.client_id');

        $clientSecret = config('services.facebook.client_secret');

        if (!$clientId || !$clientSecret) {
            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'Facebook sign-in is not configured yet. Please use mobile-number or form registration for now.');
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

        try {
            $tokenResponse = Http::timeout(20)->get($graphBase . '/oauth/access_token', [
                'client_id' => config('services.facebook.client_id'),
                'client_secret' => config('services.facebook.client_secret'),
                'redirect_uri' => $redirectUri,
                'code' => $request->string('code'),
            ]);
        } catch (ConnectionException $exception) {
            report($exception);

            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'We could not connect securely to Facebook. Please try again.');
        }

        if (!$tokenResponse->successful() || !$tokenResponse->json('access_token')) {
            Log::warning('Facebook OAuth token exchange was rejected.', [
                'status' => $tokenResponse->status(),
                'provider_error' => $tokenResponse->json('error', 'unknown_error'),
            ]);

            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'Facebook could not complete sign-in. Please try again or use another registration option.');
        }

        try {
            $profileResponse = Http::timeout(20)->get($graphBase . '/me', [
                'fields' => 'id,name,email',
                'access_token' => $tokenResponse->json('access_token'),
            ]);
        } catch (ConnectionException $exception) {
            report($exception);

            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'We could not securely retrieve your Facebook profile. Please try again.');
        }

        if (!$profileResponse->successful() || !$profileResponse->json('email')) {
            return redirect()->to(route('membership') . '#registration')
                ->with('facebook_error', 'Facebook did not provide an email address. Please choose an account with an email or use another registration option.');
        }

        $profile = $profileResponse->json();
        session([
            'membership_application' => [
                'name' => $profile['name'] ?? trim($profile['email']),
                'email' => strtolower(trim($profile['email'])),
                'business_name' => null,
                'plan' => 'free',
                'billing' => 'monthly',
                'payment_method' => 'none',
                'consent' => true,
                'auth_provider' => 'facebook',
                'profile_completion' => 'pending_owner_assistance',
                'terms_accepted_at' => $request->session()->get('membership_terms_consent.accepted_at'),
                'terms_version' => $request->session()->get('membership_terms_consent.version'),
                'marketing_consent_at' => $request->session()->get('membership_terms_consent.marketing_consent_at'),
            ],
        ]);

        return redirect()->route('membership.activate');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'login_email' => ['required', 'email', 'max:255'],
            'login_password' => ['required', 'string', 'min:12'],
        ]);

        $user = User::query()->where('email', strtolower(trim($validated['login_email'])))->with('membership')->first();
        if (!$user || !$user->membership || $user->membership->status !== 'active' || !Hash::check($validated['login_password'], $user->password)) {
            return redirect()->to(route('membership') . '#login')
                ->withErrors(['login_email' => 'Email or password not recognized. Check your details or contact FLAME PH for account help.']);
        }

        $membership = $user->membership;
        $request->session()->regenerate();
        $request->session()->put('membership_application', [
            'name' => $membership->full_name ?: $user->name,
            'email' => $user->email,
            'business_name' => $membership->business_name,
            'mobile_number' => $membership->mobile_number,
            'plan' => $membership->plan,
            'requested_plan' => $membership->requested_plan,
            'billing' => $membership->billing_cycle ?? 'monthly',
            'payment_method' => $membership->payment_method,
            'auth_provider' => 'membership_login',
            'account_status' => 'active',
            'profile_completion' => $membership->profile_completed_at ? 'complete' : 'pending_member_profile',
            'membership_id' => $membership->id,
            'terms_accepted_at' => $membership->terms_accepted_at?->toIso8601String(),
            'terms_version' => $membership->terms_version,
            'marketing_consent_at' => $membership->marketing_consent_at?->toIso8601String(),
        ]);
        $request->session()->put('membership_logged_in', true);

        return redirect()->to(route('membership') . '#next-steps')
            ->with('login_success', 'You are signed in to your FLAME PH member account.');
    }

    public function directory(MembershipStatistics $statistics): View
    {
        return view('directory', ['membershipStats' => $statistics->summary()]);
    }

    public function about(Request $request, MembershipStatistics $statistics): View
    {
        $adminAccount = null;
        if ($adminId = $request->session()->get('admin_account_id')) {
            $adminAccount = \App\Models\AdminAccount::query()->whereKey($adminId)->where('active', true)->first();
        }

        return view('about', ['adminAccount' => $adminAccount, 'membershipStats' => $statistics->summary()]);
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
