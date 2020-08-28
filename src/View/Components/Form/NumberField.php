<?php

namespace Masterix21\XBladeComponents\View\Components\Form;

class NumberField extends Field
{
    public int $scale;

    public function __construct(?string $id = null, ?string $name = null, ?string $label = null, ?string $hint = null, ?string $help = null, ?string $errorBag = null, bool $disabled = false, bool $readOnly = false, $value = null, int $scale = 2)
    {
        parent::__construct($id, $name, $label, $hint, $help, $errorBag, $disabled, $readOnly, $value);

        $this->scale = $scale;
    }

    public function render()
    {
        return view('bc::form.number-field');
    }
}
