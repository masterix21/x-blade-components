<?php

namespace Masterix21\XBladeComponents\View\Components\Form;

class ToggleField extends Field
{
    public $falseValue;
    public $trueValue;

    public function __construct(?string $id = null, ?string $name = null, ?string $label = null, ?string $errorBag = null, bool $disabled = false, bool $readOnly = false, $value = null, $trueValue = true, $falseValue = false)
    {
        parent::__construct($id, $name, $label, $errorBag, $disabled, $readOnly, $value);

        $this->trueValue = $trueValue;
        $this->falseValue = $falseValue;
    }

    public function render()
    {
        return view('bc::form.toggle-field');
    }
}
