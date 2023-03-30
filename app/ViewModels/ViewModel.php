<?php

namespace App\ViewModels;

use App\Entities\BaseEntity;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Support\Arrayable;

abstract class ViewModel implements Arrayable
{
    public function toArray(): array
    {
        return [
            'title' => $this->title(),
            'actions' => $this->actions(),
        ];
    }

    abstract public function title():string;
    abstract public function actions(): array;
}
