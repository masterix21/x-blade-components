<?php

namespace Masterix21\XBladeComponents\View\Components\Form;

class MoneyField extends NumberField
{
    public ?string $currency;

    public function __construct(?string $id = null, ?string $name = null, ?string $label = null, ?string $errorBag = null, bool $disabled = false, bool $readOnly = false, $value = null, int $scale = 2, ?string $currency = null)
    {
        parent::__construct($id, $name, $label, $errorBag, $disabled, $readOnly, $value, $scale);
        $this->currency = $currency ?: config('x-blade-components.currency');
    }

    public function render()
    {
        return view('bc::form.money-field');
    }
}
