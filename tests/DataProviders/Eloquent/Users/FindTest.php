<?php

namespace Tests\DataProviders\Eloquent\Users;

use App\Models\User;
use App\Services\EloquentUserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FindTest extends TestCase
{
    private EloquentUserService $userService;

    use RefreshDatabase;

    public function testItCanFindAUser(): void
    {
        $user = User::factory()->create(['id' => random_int(200, PHP_INT_MAX)]);

        $userSearched = $this->userService->find($user->id);

        $this->assertEquals($user->name, $userSearched->name());
        $this->assertEquals($user->email, $userSearched->email());
        $this->assertEquals($user->id, $userSearched->id());
    }

    public function testItFailsWithUnknownUserId(): void
    {
        $this->expectException(ModelNotFoundException::class);
        $this->userService->find(random_int(1, PHP_INT_MAX));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = new EloquentUserService();
    }
}
