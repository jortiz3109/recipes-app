<?php

namespace App\Providers;

use App\Contracts\EntityServiceContract;
use App\Services\EloquentUserService;
use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    public array $bindings = [
        EntityServiceContract::class => EloquentUserService::class,
    ];
}
