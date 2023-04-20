<?php

namespace Tests\Feature\Admin\Users;

use App\Models\User;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function testItRenderCreateView(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('admin/users/create');
        $response
            ->assertOk()
            ->assertSeeText(trans('admin.users.name.label'))
            ->assertSeeText(trans('admin.users.email.label'));
    }
}
