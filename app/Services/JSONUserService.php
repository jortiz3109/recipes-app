<?php

namespace App\Services;

use App\Contracts\EntityServiceContract;
use App\Entities\BaseEntity;
use App\Entities\UserEntity;
use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class JSONUserService implements EntityServiceContract
{
    public function index(string $search = null): PaginatorContract
    {
        $users = json_decode(File::get(resource_path('json/users.json')), true);

        return new Paginator(
            items: collect($users)->transform(fn($user) => new UserEntity($user)),
            perPage:15,
            currentPage: 1
        );
    }

    public function store(array $properties): BaseEntity
    {
        $users = json_decode(File::get(resource_path('json/users.json')), true);
        $users[] = Arr::only($properties, ['name', 'email']);

        File::replace(resource_path('json/users.json'), json_encode($users));
        return new UserEntity($properties);
    }
}
