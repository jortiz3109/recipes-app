<?php

namespace App\Contracts;

use Illuminate\Contracts\Pagination\Paginator;

interface EntityServiceContract
{
    public function index(string $search = null): Paginator;
}
