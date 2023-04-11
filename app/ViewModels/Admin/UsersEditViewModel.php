<?php

namespace App\ViewModels\Admin;

use App\ViewModels\EditViewModel;

class UsersEditViewModel extends EditViewModel
{
    public function formAction(): string
    {
        return route('admin.users.update', $this->entity->id());
    }

    public function title(): string
    {
        return trans('admin.users.edit', ['name' => $this->entity->name()]);
    }

    public function actions(): array
    {
        return [
            'back' => [
                'text' => trans('admin.users.title'),
                'route' => route('admin.users.index'),
            ],
        ];
    }

    public function entity(): array
    {
        return ['user' => $this->entity];
    }
}
