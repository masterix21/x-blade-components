<?php

namespace Masterix21\XBladeComponents\View\Components\Form;

class DateField extends Field
{
    public string $displayFormat;
    public string $valueFormat;
    private ?string $mode;
    public array $flatpickrConfig;
    public array $customConfig;

    public function __construct(?string $id = null, ?string $name = null, ?string $label = null, ?string $hint = null, ?string $help = null, ?string $errorBag = null, bool $disabled = false, bool $readOnly = false, $value = null, ?string $displayFormat = null, ?string $valueFormat = null, ?string $mode = null, ?array $customConfig = null)
    {
        parent::__construct($id, $name, $label, $hint, $help, $errorBag, $disabled, $readOnly, $value);

        $this->valueFormat = $valueFormat ?? 'Y-m-d';
        $this->displayFormat = $displayFormat ?? $this->valueFormat;
        $this->mode = $mode;

        $this->customConfig = $customConfig ?? [];
        $this->flatpickrConfig = $this->buildFlatpickrConfig();
    }

    private function buildFlatpickrConfig() : array
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

        return array_merge($config, $this->customConfig);
    }

    public function render()
    {
        return view('bc::form.date-field');
    }
}
