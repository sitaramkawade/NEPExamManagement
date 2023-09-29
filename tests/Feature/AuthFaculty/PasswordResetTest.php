<?php

namespace Tests\Feature\AuthFaculty;

use App\Models\Faculty;
use App\Models\User;
use App\Notifications\FacultyResetPassword;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        $response = $this->get('/admin/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested(): void
    {
        
        Notification::fake();
        

        $user = Faculty::factory()->create();

        $this->post('/admin/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, FacultyResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered(): void
    {
        Notification::fake();

        $user = Faculty::factory()->create();

        $this->post('/admin/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, FacultyResetPassword::class, function ($notification) {
            $response = $this->get('/admin/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        Notification::fake();

        $user = Faculty::factory()->create();

        $this->post('/admin/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, FacultyResetPassword::class, function ($notification) use ($user) {
            $response = $this->post('/admin/reset-password', [
                'token' => $notification->token,
                'email' => $user->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
