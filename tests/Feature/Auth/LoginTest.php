<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testItShowsTheLoginPage(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
    }

    public function testLoginPageHasCorrectFields(): void
    {
        $response = $this->get('/login');

        $response->assertSeeText(trans('auth.login.email.label'));
        $response->assertSeeText(trans('auth.login.password.label'));
    }

    public function testItValidatesLoginRequest(): void
    {
        $response = $this->post('login', []);

        $response->assertSessionHasErrors(['email', 'password']);
    }

    public function testUserCanLogin(): void
    {
        User::factory()->create([
            'email' => 'me@johndev.co',
            'password' => Hash::make('secret'),
        ]);

        $this->post('login', ['email' => 'me@johndev.co', 'password' => 'secret']);

        $this->assertAuthenticated();
    }

    public function testAnUserCanLogout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('logout');

        $response->assertRedirect('/');
    }

    public function testDisabledUserCannotLogin(): void
    {
        $user = User::factory()->disabled()->create();

        $response = $this->post('login', ['email' => $user->email, 'password' => 'password']);

        $response->assertSessionHasErrors(['email' => trans('auth.disabled')]);
    }

    public function testNotExistingUserIsManagedCorrectly(): void
    {
        $response = $this->post('login', ['email' => $this->faker->email(), 'password' => 'password']);

        $response->assertSessionHasErrors(['email']);
    }

    public function testAuthenticatedUserIsBlockedWhenIsDisabled(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('home');
        $response->assertOk();

        $user->update(['disabled_at' => now()]);
        $response = $this->actingAs($user)->get('home');
        $response->assertRedirect('user-is-disabled');
    }
}
