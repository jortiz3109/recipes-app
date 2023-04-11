<?php

namespace App\ViewModels\Admin;

use App\Entities\UserEntity;
use App\ViewModels\CreateViewModel;

class UsersCreateViewModel extends CreateViewModel
{
    public function entity(): array
    {
        return ['user' => new UserEntity()];
    }

    public function title(): string
    {
        return trans('admin.users.create');
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

    public function formAction(): string
    {
        return route('admin.users.store');
    }
}
