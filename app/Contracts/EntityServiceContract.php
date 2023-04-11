<?php

namespace App\Contracts;

use App\Entities\BaseEntity;
use Faker\Provider\Base;
use Illuminate\Pagination\AbstractPaginator;

interface EntityServiceContract
{
    public function index(string $search = null): AbstractPaginator;
    public function store(array $properties): BaseEntity;
    public function get(string $id): BaseEntity;
    public function update(string $id, array $properties): BaseEntity;

    public function delete(string $id): bool;
}
