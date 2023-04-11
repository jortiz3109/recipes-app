<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;

class CreateTest extends TestCase
{
    public function testItRenderCreateView(): void
    {
        $response = $this->get('admin/users/create');
        $response
            ->assertOk()
            ->assertSeeText(trans('admin.users.name.label'))
            ->assertSeeText(trans('admin.users.email.label'));
    }
}
