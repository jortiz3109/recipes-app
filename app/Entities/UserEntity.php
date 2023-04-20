<?php

namespace App\Entities;

use App\Entities\Concerns\CanBeCreatedFromAModel;
use App\Entities\Concerns\CanBeDisabled;
use Illuminate\Support\Arr;

readonly class UserEntity extends BaseEntity
{
    use CanBeDisabled;
    use CanBeCreatedFromAModel;

    public function name(): ?string
    {
        return $this->getAttribute('name');
    }

    public function email(): ?string
    {
        return $this->getAttribute('email');
    }

    public function password(): ?string
    {
        return $this->getAttribute('password');
    }

    private function getAttribute(string $name)
    {
        return Arr::get($this->attributes, $name);
    }
}
