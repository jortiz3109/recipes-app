<?php

namespace Tests\Concerns;

trait UseDataProvider
{
    public static function serviceDataProvider(): array
    {
        return [
            'eloquent' => ['provider' => 'eloquent'],
            'api' => ['provider' => 'api'],
        ];
    }
}
