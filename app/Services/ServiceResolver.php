<?php

namespace App\Services;

use App\Contracts\EntityServiceContract;
use App\Exceptions\DataProviderNotFoundException;

class ServiceResolver
{
    const ELOQUENT_SERVICES = [
        'users' => EloquentUserService::class,
    ];

    const API_SERVICES = [
        'users' => ApiUserService::class,
    ];

    /**
     * @throws DataProviderNotFoundException
     */
    public static function resolve(string $service): EntityServiceContract
    {
        $concrete = match (config('data-providers.default')) {
            'api' => self::API_SERVICES[$service],
            'eloquent' => self::ELOQUENT_SERVICES[$service],
            default => throw new DataProviderNotFoundException('No suitable data provider were found!'),
        };

        return new $concrete();
    }
}
