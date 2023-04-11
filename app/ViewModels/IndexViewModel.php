<?php

namespace App\ViewModels;

use Illuminate\Pagination\AbstractPaginator;

abstract class IndexViewModel extends ViewModel
{
    protected AbstractPaginator $entities;

    const CREATE_BUTTON = 'create';

    public function setEntities(AbstractPaginator $entities): void
    {
        $this->entities = $entities;
    }

    public function toArray(): array
    {
        return parent::toArray() + [
            'search' => $this->search(),
            'entities' => $this->entities,
        ];
    }

    abstract public function search(): array;
}
