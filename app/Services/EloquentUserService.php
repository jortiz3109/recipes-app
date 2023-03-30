<?php

namespace App\Services;

use App\Contracts\EntityServiceContract;
use App\Entities\UserEntity;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class EloquentUserService implements EntityServiceContract
{
    public function index(string $search = null): Paginator
    {
        $users = User::select(['name', 'email', 'disabled_at'])->search($search)->paginate();
        $users->getCollection()->transform(fn($user) => UserEntity::crateFromModel($user));

        return $users;
    }

    public function store(array $properties): UserEntity
    {
        return UserEntity::crateFromModel(User::create([
            'name' => $properties['name'],
            'email' => $properties['email'],
            'password' => Hash::make($properties['password']),
        ]));
    }
}
