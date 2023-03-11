<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanAccessToTheIndexOfUsers(): void
    {
        $response = $this->get('/admin/users');

        $response->assertOk();
    }

    public function testItHasAListOfUsers(): void
    {
        $user = User::factory()->create();
        $response = $this->get('/admin/users');
        $response->assertSeeText($user->name);
    }

    public function testItCanPaginateUsers(): void
    {
        User::factory()->count(15)->create();
        $user = User::factory()->create();

        $response = $this->get('admin/users');
        $response->assertDontSeeText($user->name);

        $response = $this->get('admin/users?page=2');
        $response->assertSeeText($user->name);
    }
}
