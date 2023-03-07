<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Vite::macro('images', fn (string $asset) => Vite::asset("resources/images/{$asset}"));
    }
}
