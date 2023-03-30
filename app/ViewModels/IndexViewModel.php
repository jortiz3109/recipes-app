<?php

namespace App\ViewModels;

use Illuminate\Contracts\Pagination\Paginator;

abstract class IndexViewModel extends ViewModel
{
    protected Paginator $entities;

    const CREATE_BUTTON = 'create';

    public function setEntities(Paginator $entities): void
    {
        $this->entities = $entities;
    }

    public function toArray(): array
    {
        return parent::toArray() + [
            'search' => $this->search(),
            'entities' => $this->entities
        ];
    }

    abstract public function search(): array;
}
