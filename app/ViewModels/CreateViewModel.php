<?php

namespace App\ViewModels;

abstract class CreateViewModel extends ViewModel
{
    public function toArray(): array
    {
        return parent::toArray() + $this->entity() + ['action' => $this->formAction()];
    }

    abstract public function entity(): array;

    abstract public function formAction(): string;
}
