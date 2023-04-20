<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testItCanStoreAUser(): void
    {
        $user = User::factory()->create();
        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(8),
        ];

        $response = $this->actingAs($user)->post('admin/users', $data);

        $response->assertRedirect('admin/users');
    }
}
