<?php

namespace App\ViewModels;

use App\Entities\BaseEntity;

abstract class EditViewModel extends CreateViewModel
{
    protected BaseEntity $entity;
    public function for(BaseEntity $entity): self
    {
        $this->entity = $entity;

        return $this;
    }
}
