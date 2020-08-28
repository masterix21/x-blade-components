<?php

namespace Masterix21\XBladeComponents\View\Components\Form;

use Illuminate\View\Component;

class Field extends Component
{
    public ?string $id;
    public ?string $name;
    public ?string $label;
    public ?string $hint;
    public ?string $help;
    public ?string $errorBag;
    public bool $disabled;
    public bool $readOnly;
    /** @var mixed */
    public $value;
    public ?string $placeholder;
    public bool $hideContainerBorder;

    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $label = null,
        ?string $hint = null,
        ?string $help = null,
        ?string $errorBag = null,
        bool $disabled = false,
        bool $readOnly = false,
        $value = null,
        ?string $placeholder = null,
        bool $hideContainerBorder = false
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->hint = $hint;
        $this->help = $help;
        $this->errorBag = $errorBag;
        $this->disabled = $disabled;
        $this->readOnly = $readOnly;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->hideContainerBorder = $hideContainerBorder;
    }

    public function render()
    {
        return view('bc::form.field');
    }
}
