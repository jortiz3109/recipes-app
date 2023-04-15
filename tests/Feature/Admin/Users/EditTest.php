<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanAccessEditView(): void
    {
        //@TODO: Refactor to use Services
        $user = User::factory()->create();

        $response = $this->get(
            uri: "/admin/users/{$user->id}/edit",
        );

        $response
            ->assertOk()
            ->assertSee($user->name)
            ->assertSee($user->email);
    }
}
