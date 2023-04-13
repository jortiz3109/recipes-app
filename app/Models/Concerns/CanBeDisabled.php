<?php

namespace App\Models\Concerns;

trait CanBeDisabled
{
    public function isDisabled(): bool
    {
        return null !== $this->disabled_at;
    }
}
