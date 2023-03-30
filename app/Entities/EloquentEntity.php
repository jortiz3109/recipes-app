<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

abstract readonly class EloquentEntity extends BaseEntity
{
    public static function crateFromModel(Model $model): static
    {
        return new static($model->toArray());
    }
}
