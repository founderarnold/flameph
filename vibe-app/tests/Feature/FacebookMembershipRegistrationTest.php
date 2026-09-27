<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FacebookMembershipRegistrationTest extends TestCase
{
    public function test_facebook_callback_opens_the_social_account_confirmation_page(): void
    {
        config([
            'services.facebook.client_id' => 'test-facebook-client',
            'services.facebook.client_secret' => 'test-facebook-secret',
            'services.facebook.redirect' => '/auth/facebook/callback',
            'services.facebook.graph_version' => 'v23.0',
        ]);

        Http::fake([
            'graph.facebook.com/v23.0/oauth/access_token*' => Http::response([
                'access_token' => 'test-access-token',
                'token_type' => 'bearer',
                'expires_in' => 3600,
            ]),
            'graph.facebook.com/v23.0/me*' => Http::response([
                'id' => 'test-facebook-user',
                'name' => 'Test Member',
                'email' => 'member@example.test',
            ]),
        ]);

        $this->withSession([
            'facebook_oauth_state' => 'test-state',
            'membership_terms_consent' => [
                'accepted_at' => now()->toIso8601String(),
                'version' => '1.0',
                'marketing_consent_at' => null,
            ],
        ])->get('/auth/facebook/callback?code=test-code&state=test-state')
            ->assertRedirect(route('membership.activate'));

        $this->get(route('membership.activate'))
            ->assertOk()
            ->assertSee('Facebook connected')
            ->assertSee('Facebook account connected')
            ->assertSee('member@example.test')
            ->assertSee('FLAME PH Free Community membership');
    }

    public function test_facebook_sign_in_explains_when_oauth_credentials_are_missing(): void
    {
        config([
            'services.facebook.client_id' => null,
            'services.facebook.client_secret' => null,
        ]);

        $this->withSession([
            'membership_terms_consent.accepted_at' => now()->toIso8601String(),
        ])->get('/auth/facebook/redirect')
            ->assertRedirect(route('membership') . '#registration')
            ->assertSessionHas('facebook_error', 'Facebook sign-in is not configured yet. Please use mobile-number or form registration for now.');
    }
}
