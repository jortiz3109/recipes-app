<?php

namespace Tests\Concerns;

trait UseDataProvider
{
    public function serviceDataProvider(): array
    {
        return [
            'eloquent' => ['provider' => 'eloquent'],
            'api' => ['provider' => 'api'],
        ];
    }
}
