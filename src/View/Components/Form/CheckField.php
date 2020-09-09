<?php

namespace Masterix21\XBladeComponents\View\Components\Form;

class CheckField extends ToggleField
{
    public ?string $description;

    public function __construct(?string $id = null, ?string $name = null, ?string $label = null, ?string $hint = null, ?string $help = null, ?string $errorBag = null, bool $disabled = false, bool $readOnly = false, $value = null, $trueValue = true, $falseValue = false, ?string $description = null)
    {
        parent::__construct($id, $name, $label, $hint, $help, $errorBag, $disabled, $readOnly, $value, $trueValue, $falseValue);

        $this->description = $description;
    }

    public function render()
    {
        return view('bc::form.check-field');
    }
}
