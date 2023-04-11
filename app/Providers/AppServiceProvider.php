<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::defaultView('pagination.daisyui');
        Paginator::defaultSimpleView('pagination.daisyui-simple');
    }
}
