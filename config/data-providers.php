<?php

use App\Services\ApiUserService;
use App\Services\EloquentUserService;
use App\Services\JSONUserService;

return [
    'default' => env('DATA_PROVIDER'),

    'providers' => [
        'api' => [
            'baseUrl' => env('DATA_PROVIDER_API_BASE_URL'),
        ]
    ]
];
