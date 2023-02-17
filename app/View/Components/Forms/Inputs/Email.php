<?php

namespace App\View\Components\Forms\Inputs;

use Illuminate\View\Component;
use Illuminate\View\View;

class Email extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $name,
        public string $label,
        public string $placeholder,
        public ?string $value,
    )
    {}

    public function render(): View
    {
        return view('components.forms.inputs.email');
    }
}
