<?php

namespace Tests\Feature\Auth;

use App\Mail\Team0001WelcomeMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class OtpVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_otp_verifies_logs_in_and_sends_welcome_mail(): void
    {
        Mail::fake();
        $otp = '123456';
        $user = User::factory()->create([
            'email_verified_at' => null,
            'email_otp' => Hash::make($otp),
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        $response = $this->post(route('otp.verify.post'), [
            'email' => $user->email,
            'otp' => $otp,
        ]);

        $this->assertAuthenticatedAs($user);
        $this->assertNotNull($user->fresh()->email_verified_at);
        $this->assertNull($user->fresh()->email_otp);
        $response->assertRedirect(route('dashboard', absolute: false));
        Mail::assertSent(Team0001WelcomeMail::class, 1);
    }
}
