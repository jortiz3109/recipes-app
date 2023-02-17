<?php
namespace App\View\Components\Forms\Inputs;

use Illuminate\View\Component;
use Illuminate\View\View;

class Password extends Component
{
    public function __construct(
        public string  $name,
        public ?string $label = null,
    ){}

    public function render(): View
    {
        return view('components.forms.inputs.password');
    }
}
