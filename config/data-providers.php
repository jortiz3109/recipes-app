<?php

use App\Services\EloquentUserService;
use App\Services\JSONUserService;

return [
    'default' => env('DATA_PROVIDER', 'eloquent'),
    'eloquent' => [
        'users' => EloquentUserService::class
    ],
    'json' => [
        'users' => JSONUserService::class,
    ]
];
