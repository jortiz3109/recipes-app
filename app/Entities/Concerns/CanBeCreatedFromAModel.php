<?php

namespace App\Entities\Concerns;

use Illuminate\Database\Eloquent\Model;

trait CanBeCreatedFromAModel
{
    public static function createFromModel(Model $model): static
    {
        return new static($model->toArray());
    }
}
