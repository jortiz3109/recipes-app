<?php

namespace App\Http\Requests\Admin\Users;

class UpdateRequest extends StoreRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        unset($rules['password']);

        return $rules;
    }
}
