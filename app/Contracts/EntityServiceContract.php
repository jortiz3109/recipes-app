<?php

namespace App\Contracts;

use App\Entities\BaseEntity;
use Illuminate\Contracts\Pagination\Paginator;

interface EntityServiceContract
{
    public function index(string $search = null): Paginator;
    public function store(array $properties): BaseEntity;
}
