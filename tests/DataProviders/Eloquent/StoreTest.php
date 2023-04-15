<?php

namespace Tests\DataProviders\Eloquent;

use App\Services\EloquentUserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    private EloquentUserService $userService;

    public function testItCanStoreAUser(): void
    {
        $properties = [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => fake()->password(),
        ];

        $user = $this->userService->store($properties);
        $this->assertEqualsCanonicalizing(
            expected: $properties,
            actual: $user->only(['name', 'email', 'password'])
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = new EloquentUserService();
    }
}
