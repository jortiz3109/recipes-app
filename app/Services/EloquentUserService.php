<?php

namespace App\Services;

use App\Contracts\EntityServiceContract;
use App\Entities\UserEntity;
use App\Models\User;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Arr;

class EloquentUserService implements EntityServiceContract
{
    public function index(string $search = null): AbstractPaginator
    {
        $users = User::select(['id', 'name', 'email', 'disabled_at'])->search($search)->paginate($perPage);
        $users->getCollection()->transform(fn ($user) => UserEntity::createFromModel($user));

        return $users;
    }

    public function store(array $properties): UserEntity
    {
        $user = User::create($properties);
        if (Arr::has($properties, 'password')) {
            $user->makeVisible(['password']);
        }

        return UserEntity::createFromModel($user);
    }

    public function update(string $id, array $properties): UserEntity
    {
        $user = User::findOrFail($id);
        $user->update($properties);

        return UserEntity::createFromModel($user);
    }

    public function find(string|int $value, string $field = 'id'): UserEntity
    {
        return UserEntity::createFromModel(User::where($field, $value)->firstOrFail());
    }

    public function delete(string $id): bool
    {
        return User::where('id', $id)->delete();
    }
}
