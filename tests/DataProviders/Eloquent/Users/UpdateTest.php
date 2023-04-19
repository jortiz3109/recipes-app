<?php

namespace Tests\DataProviders\Eloquent\Users;

use App\Models\User;
use App\Services\EloquentUserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    private EloquentUserService $userService;

    public function testItCanUpdateAUser(): void
    {
        $user = User::factory()->create();

        $updatedUser = $this->userService->update(
            id: $user->id,
            properties: ['name' => 'New user name', 'email' => 'me@johndev.co']
        );

        $this->assertSame('New user name', $updatedUser->name());
        $this->assertSame('me@johndev.co', $updatedUser->email());
    }

    public function testItFailsWithNotExistentModel(): void
    {
        $this->expectException(ModelNotFoundException::class);
        $this->userService->update(random_int(1, PHP_INT_MAX), []);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = new EloquentUserService();
    }
}
