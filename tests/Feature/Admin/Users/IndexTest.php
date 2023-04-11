<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\UseDataProvider;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;
    use UseDataProvider;

    public function testItCanAccessToTheIndexOfUsers(): void
    {
        $response = $this->get('/admin/users');

        $response->assertOk();
    }

    /**
     * @dataProvider serviceDataProvider
     */
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

    /**
     * @dataProvider searchProvider
     */
    public function testItCanSearchUsers(string $search): void
    {
        $userDontSee = User::factory()->create();
        User::factory()->create(['name' => 'JohnDev_', 'email' => 'me@johndev.co']);

        $response = $this->get("/admin/users?search={$search}");

        $response->assertSeeTextInOrder(['JohnDev_', 'me@johndev.co']);
        $response->assertDontSeeText($userDontSee->name);
    }

    public function searchProvider(): array
    {
        return [
            'by name' => ['search' => 'JohnDev_'],
            'by email' => ['search' => 'me@johndev.co'],
        ];
    }
}
