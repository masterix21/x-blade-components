<?php

namespace Masterix21\XBladeComponents\View\Components\Button;

use Illuminate\View\Component;

class Confirm extends Component
{
    public $askButtonClass;

    public function __construct($askButtonClass = null)
    {
        $this->askButtonClass = $askButtonClass;
    }

    public function render()
    {
        return view('bc::button.confirm');
    }
}
