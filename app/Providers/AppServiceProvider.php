<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::defaultView('pagination.daisyui');
        Paginator::defaultSimpleView('pagination.daisyui-simple');
    }
}
