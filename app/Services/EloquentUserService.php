<?php

namespace App\Services;

use App\Contracts\EntityServiceContract;
use App\Entities\BaseEntity;
use App\Entities\UserEntity;
use App\Models\User;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\Hash;

class EloquentUserService implements EntityServiceContract
{
    public function index(string $search = null): AbstractPaginator
    {
        $users = User::select(['id', 'name', 'email', 'disabled_at'])->search($search)->paginate();
        $users->getCollection()->transform(fn ($user) => UserEntity::crateFromModel($user));

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

    public function update(string $id, array $properties): BaseEntity
    {
        $user = User::find($id);
        $user->update($properties);

        return UserEntity::crateFromModel($user);
    }

    public function get(string $id): BaseEntity
    {
        return UserEntity::crateFromModel(User::findOrFail($id));
    }

    public function delete(string $id): bool
    {
        return User::where('id', $id)->delete();
    }
}
