<?php

namespace Tests\Feature\User_Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class User_EmailVerificationTest extends TestCase
{
    // use RefreshDatabase;
    // public function test_email_verification_screen_can_be_rendered(): void
    // {
    //     $user = User::factory()->create([
    //         'email_verified_at' => null,
    //     ]);

    //     $response = $this->actingAs($user,'user')->get('user/verify-email');

    //     $response->assertStatus(200);
    // }

    // public function test_email_can_be_verified(): void
    // {
    //     $user = User::factory()->create([
    //         'email_verified_at' => null,
    //     ]);

    //     Event::fake();

    //     $verificationUrl = URL::temporarySignedRoute(
    //         'user.verification.verify',
    //         now()->addMinutes(60),
    //         ['id' => $user->id, 'hash' => sha1($user->email)]
    //     );

    //     $response = $this->actingAs($user,'user')->get($verificationUrl);

    //     Event::assertDispatched(Verified::class);
    //     $this->assertTrue($user->fresh()->hasVerifiedEmail());
    //     $response->assertRedirect(RouteServiceProvider::USERHOME.'?verified=1');
    // }

    // public function test_email_is_not_verified_with_invalid_hash(): void
    // {
    //     $user = User::factory()->create([
    //         'email_verified_at' => null,
    //     ]);

    //     $verificationUrl = URL::temporarySignedRoute(
    //         'user.verification.verify',
    //         now()->addMinutes(60),
    //         ['id' => $user->id, 'hash' => sha1('wrong-email')]
    //     );

    //     $this->actingAs($user,'user')->get($verificationUrl);

    //     $this->assertFalse($user->fresh()->hasVerifiedEmail());
    // }
}
