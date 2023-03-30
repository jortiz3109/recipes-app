<?php

namespace App\ViewModels\Admin;

use App\ViewModels\IndexViewModel;

class UsersIndexViewModel extends IndexViewModel
{

    public function title(): string
    {
        return trans('admin.users.title');
    }

    public function actions(): array
    {
        return [
            self::CREATE_BUTTON => [
                'route' => route('admin.users.create'),
                'text' => trans('admin.users.create')
            ]
        ];
    }

    public function search(): array
    {
        return [
            'action' => route('admin.users.index')
        ];
    }
}
