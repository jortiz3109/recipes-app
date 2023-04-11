<?php

namespace App\Entities;

use Illuminate\Support\Arr;

abstract readonly class BaseEntity
{
    public function __construct(protected array $attributes = [])
    {
    }

    public function id(): string|null
    {
        return Arr::get($this->attributes, 'id');
    }
}
