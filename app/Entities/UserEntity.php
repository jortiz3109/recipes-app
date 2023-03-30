<?php

namespace App\Entities;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

readonly class UserEntity extends EloquentEntity
{
    public function name(): string
    {
        return $this->getAttribute('name');
    }

    public function email(): string
    {
        return $this->getAttribute('email');
    }

    public function disabledAt(): ?Carbon
    {
        return ($date = $this->getAttribute('disabled_at'))
            ? Carbon::parse($date)
            : null;

    }

    public function isDisabled(): bool
    {
        return null !== $this->disabledAt();
    }

    private function getAttribute(string $name)
    {
        return Arr::get($this->attributes, $name);
    }

}
