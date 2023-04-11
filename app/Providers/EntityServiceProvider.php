<?php

namespace App\Providers;

use App\Contracts\EntityServiceContract;
use App\Exceptions\DataProviderNotFoundException;
use App\Http\Controllers\Admin\UserController;
use App\Services\ServiceResolver;
use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app
            ->when(UserController::class)
            ->needs(EntityServiceContract::class)
            ->give(fn () => ServiceResolver::resolve('users'));
    }
}
