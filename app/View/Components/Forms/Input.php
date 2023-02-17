<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;
use Illuminate\View\View;

class Input extends Component
{
    public function __construct(
        public string $name,
        public ?string $label = null,
        public ?string $placeholder = null
    ){}

    public function render(): View
    {
        return view('components.forms.input');
    }
}
