<?php

namespace Tests\Feature;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class MemberAccountRecoveryTest extends TestCase
{
    use RefreshDatabase;

    private function member(string $password = 'Original-password-123'): User
    {
        $user = User::factory()->create(['email' => 'member@example.test', 'password' => $password]);
        Membership::create(['user_id' => $user->id, 'business_name' => 'Test enterprise', 'status' => 'active']);

        return $user;
    }

    public function test_reset_email_contains_a_valid_link_and_unknown_emails_get_the_same_response(): void
    {
        Notification::fake();
        $user = $this->member();
        $response = $this->post(route('membership.password.email'), ['email' => 'MEMBER@example.test']);
        $response->assertRedirect(route('membership').'#forgot-password')->assertSessionHas('password_reset_link_sent');
        $message = session('password_reset_link_sent');

        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
            $this->assertTrue(Password::tokenExists($user, $notification->token));
            $this->get(route('password.reset', ['token' => $notification->token, 'email' => $user->email]))
                ->assertOk()->assertSee('Choose a new password');

            return true;
        });

        $this->post(route('membership.password.email'), ['email' => 'unknown@example.test'])
            ->assertRedirect(route('membership').'#forgot-password')
            ->assertSessionHas('password_reset_link_sent', $message);
        Notification::assertCount(1);
    }

    public function test_member_can_reset_password_log_in_and_open_the_shop_but_cannot_reuse_the_token(): void
    {
        $user = $this->member();
        $token = Password::createToken($user);
        $credentials = ['token' => $token, 'email' => $user->email, 'password' => 'Replacement-password-123', 'password_confirmation' => 'Replacement-password-123'];

        $this->post(route('membership.password.reset'), $credentials)
            ->assertRedirect(route('membership').'#login')->assertSessionHas('password_reset_success');
        $this->assertTrue(Hash::check($credentials['password'], $user->fresh()->password));
        $this->assertFalse(Password::tokenExists($user, $token));
        $this->post(route('membership.login'), ['login_email' => $user->email, 'login_password' => 'Original-password-123'])
            ->assertSessionHasErrors('login_email')->assertSessionMissing('membership_logged_in');
        $this->post(route('membership.login'), ['login_email' => $user->email, 'login_password' => $credentials['password']])
            ->assertRedirect(route('membership').'#next-steps')->assertSessionHas('membership_logged_in', true);
        $this->get(route('merch-shop.index'))->assertOk();
        $this->post(route('membership.password.reset'), $credentials)->assertSessionHasErrors('email');
    }

    public function test_invalid_expired_and_mismatched_reset_requests_cannot_change_the_password(): void
    {
        $user = $this->member();
        $originalHash = $user->password;
        $credentials = ['token' => 'invalid-token', 'email' => $user->email, 'password' => 'Replacement-password-123', 'password_confirmation' => 'Replacement-password-123'];
        $this->post(route('membership.password.reset'), $credentials)->assertSessionHasErrors('email');
        $credentials['token'] = Password::createToken($user);
        $this->post(route('membership.password.reset'), array_replace($credentials, ['password_confirmation' => 'Different-password-123']))
            ->assertSessionHasErrors('password');
        DB::table('password_reset_tokens')->where('email', $user->email)->update(['created_at' => now()->subMinutes(61)]);
        $this->post(route('membership.password.reset'), $credentials)->assertSessionHasErrors('email');
        $this->assertSame($originalHash, $user->fresh()->password);
    }

    public function test_login_preserves_password_whitespace_and_accepts_existing_shorter_passwords(): void
    {
        $user = $this->member('  Password with spaces  ');
        $this->post(route('membership.login'), ['login_email' => $user->email, 'login_password' => '  Password with spaces  '])
            ->assertRedirect(route('membership').'#next-steps')->assertSessionHas('membership_logged_in', true);
        $this->app['session']->flush();
        $user->forceFill(['password' => 'Legacy123!'])->save();
        $this->post(route('membership.login'), ['login_email' => $user->email, 'login_password' => 'Legacy123!'])
            ->assertRedirect(route('membership').'#next-steps')->assertSessionHas('membership_logged_in', true);
    }

    public function test_failed_validation_does_not_store_the_login_password_in_session(): void
    {
        $this->post(route('membership.login'), ['login_email' => 'not-an-email', 'login_password' => 'Private-password-123'])
            ->assertSessionHasErrors('login_email')->assertSessionMissing('_old_input.login_password');
    }

    public function test_membership_cta_is_visible_before_the_footer_and_the_shop_requires_login(): void
    {
        $this->get(route('membership'))->assertOk()->assertSeeInOrder([
            'id="poverty-alleviation-advocacy"',
            'Support this advocacy — shop FLAME PH merch',
            '<footer',
        ], false)->assertSee('Forgot password?');
        $this->get(route('merch-shop.index'))->assertRedirect(route('membership').'#login');
        $this->get('/about/merch-shop/example/subpage')->assertRedirect(route('membership').'#login');
    }
}
