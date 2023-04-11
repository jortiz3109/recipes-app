<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;
    public function testItCanUpdateAUser(): void
    {
        //@TODO: Refactor to use services
        $user = User::factory()->create();

        $response = $this->put(
            uri: '/admin/users/' . $user->id,
            data: ['name' => 'JohnDev_', 'email' => 'me@johndev.co']
        );

        $user->refresh();

        $response->assertRedirect('admin/users');
        $this->assertSame($user->name, 'JohnDev_');
        $this->assertSame($user->email, 'me@johndev.co');
    }
}
