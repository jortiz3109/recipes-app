<?php

namespace Tests\DataProviders\Eloquent\Users;

use App\Models\User;
use App\Services\EloquentUserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    private EloquentUserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = new EloquentUserService();
    }

    public function testItCanDeleteAUser(): void
    {
        $user = User::factory()->create();

        $response = $this->userService->delete($user->id);

        $this->assertTrue($response);

    }

    public function testItCanDealWithNonexistentUser(): void
    {
        $response = $this->userService->delete(random_int(1, PHP_INT_MAX));

        $this->assertFalse($response);
    }
}
