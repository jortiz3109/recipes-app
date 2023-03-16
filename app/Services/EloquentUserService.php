<?php

namespace App\Services;

use App\Contracts\EntityServiceContract;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

class EloquentUserService implements EntityServiceContract
{
    public function index(string $search = null): Paginator
    {
        return User::select(['name', 'email', 'disabled_at'])->search($search)->paginate();
    }
}
