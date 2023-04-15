<?php

namespace App\Providers;

use App\Contracts\EntityServiceContract;
use App\Http\Controllers\Admin\UserController;
use App\Services\EloquentUserService;
use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app
            ->when(UserController::class)
            ->needs(EntityServiceContract::class)
            ->give(fn () => new EloquentUserService());
    }
}
