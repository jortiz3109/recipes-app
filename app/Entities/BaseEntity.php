<?php

namespace App\Entities;

abstract readonly class BaseEntity
{
    public function __construct(protected array $attributes)
    {
    }
}
