<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

abstract readonly class BaseEntity implements Arrayable
{
    public function __construct(protected array $attributes = [])
    {
    }

    public function id(): int|string|null
    {
        return Arr::get($this->attributes, 'id');
    }

    public function toArray(): array
    {
        return $this->attributes;
    }

    public function only(array $attributes): array
    {
        return Arr::only($this->attributes, $attributes);
    }
}
