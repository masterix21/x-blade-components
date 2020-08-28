<?php

namespace Masterix21\XBladeComponents\View\Components\Form;

class DateField extends Field
{
    public string $displayFormat;
    public string $valueFormat;
    private ?string $mode;
    public string $flatpickrConfig;

    public function __construct(?string $id = null, ?string $name = null, ?string $label = null, ?string $hint = null, ?string $help = null, ?string $errorBag = null, bool $disabled = false, bool $readOnly = false, $value = null, ?string $displayFormat = null, ?string $valueFormat = null, ?string $mode = null)
    {
        parent::__construct($id, $name, $label, $hint, $help, $errorBag, $disabled, $readOnly, $value);

        $this->valueFormat = $valueFormat ?? 'Y-m-d';
        $this->displayFormat = $displayFormat ?? $this->valueFormat;
        $this->mode = $mode;

        $this->flatpickrConfig = json_encode($this->buildFlatpickrConfig());
    }

    private function buildFlatpickrConfig() : object
    {
        $config = [
            "allowInput" => ! $this->readOnly && ! $this->disabled,
            "altInput" => $this->displayFormat !== $this->valueFormat,
            "dateFormat" => $this->valueFormat,
        ];

        if ($config['altInput']) {
            $config['altFormat'] = $this->displayFormat;
        }

        if ($this->mode && in_array($this->mode, ['range', 'multiple'])) {
            $config['mode'] = $this->mode;
        }

        return (object) $config;
    }

    public function render()
    {
        return view('bc::form.date-field');
    }
}
