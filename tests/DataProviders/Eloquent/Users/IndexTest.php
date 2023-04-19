<?php

namespace Tests\DataProviders\Eloquent\Users;

use App\Entities\UserEntity;
use App\Models\User;
use App\Services\EloquentUserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    private EloquentUserService $userService;

    use RefreshDatabase;

    public static function searchProvider(): array
    {
        return [
            'by email' => ['field' => 'email', 'term' => 'me@johndev.co'],
            'by partial email' => ['field' => 'email', 'term' => 'me@johndev'],
            'by name' => ['field' => 'name', 'term' => 'John Edisson Ortiz'],
            'by partial name' => ['field' => 'name', 'term' => 'John'],
        ];
    }

    public function testItCanGetUsers(): void
    {
        User::factory()->count(2)->create();

        $users = $this->userService->index();

        $this->assertCount(2, $users->getCollection());
    }

    /**
     * @dataProvider searchProvider
     */
    public function testItCanSearchUsers(string $field, string $term): void
    {
        User::factory()->count(5)->create();
        $user = User::factory()->create([
            'name' => 'John Edisson Ortiz',
            'email' => 'me@johndev.co',
        ]);

        $users = $this->userService->index($term);

        $this->assertSame($user->{$field}, $users->first()->{$field}());
    }

    public function testItPaginateResults(): void
    {
        $users = User::factory()->count(16)->create();

        $response = $this->userService->index();

        $this->assertFalse($response->contains(function (UserEntity $user) use ($users) {
            return $user->email() === $users->last()->email;
        }));

        $this->assertTrue($response->contains(function (UserEntity $user) use ($users) {
            return $user->email() === $users->first()->email;
        }));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = new EloquentUserService();
    }
}
