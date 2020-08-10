<?php

namespace Masterix21\XBladeComponents\View\Components\Form;

class SelectField extends Field
{
    public array $options;
    public bool $multiple;

    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $label = null,
        ?string $errorBag = null,
        bool $disabled = false,
        bool $readOnly = false,
        $value = null,
        ?string $placeholder = null,
        array $options = [],
        bool $multiple = false
    ) {
        parent::__construct($id, $name, $label, $errorBag, $disabled, $readOnly, $value, $placeholder);

        $this->options = $options;
        $this->multiple = $multiple;
    }

    public function render()
    {
        return view('bc::form.select-field');
    }
}
