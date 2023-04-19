<?php

namespace App\Entities\Concerns;

use Illuminate\Support\Carbon;

trait CanBeDisabled
{
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
}
