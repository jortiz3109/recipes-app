<?php

namespace App\Providers;

use App\Contracts\EntityServiceContract;
use App\Exceptions\DataProviderNotFoundException;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app
            ->when(UserController::class)
            ->needs(EntityServiceContract::class)
            ->give(function () {
                $implementation = match (config('data-providers.default')) {
                    'eloquent' => config('data-providers.eloquent.users'),
                    'json' => config('data-providers.json.users'),
                    default => throw new DataProviderNotFoundException('No suitable data provider were found!')
                };
                return new $implementation;
            });
    }
}
