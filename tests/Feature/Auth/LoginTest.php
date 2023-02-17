<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

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
            'password' => Hash::make('secret')
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
}
