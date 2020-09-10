<x-bc-form:field :id="$id"
                 :label="$label"
                 :hint="$hint"
                 :help="$help"
                 :error-bag="$errorBag"
                 :readOnly="$readOnly"
                 :disabled="$disabled"
                 hide-container-border>
    <div x-data="{isOn: {{ json_encode($trueValue === $value ? true : false) }}, trueValue: {{ json_encode($trueValue) }}, falseValue: {{ json_encode($falseValue) }}}"
         x-init="$watch('isOn', value => $dispatch('input', value ? trueValue : falseValue))"
         class="relative flex items-start">
        <div class="flex items-center h-5">
            <input type="checkbox"
                   @if ($id ?? false) id="{{ $id }}" @endif
                   class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                   x-ref="input"
                   x-on:click="isOn = $refs.input.checked ? trueValue : falseValue"
                   {{ $attributes }}
                   @if ($trueValue === $value) checked @endif
                   @if ($readOnly) readonly @endif
                   @if ($disabled) disabled @endif
                   @if (! blank($name)) name="{{ $name }}" @endif
                   @if (! blank($value)) value="{{ $value }}" @endif />
        </div>
        @if ($description ?? '')
            <div class="ml-3 text-sm leading-5">
                @if ($description ?? '') <label @if ($id ?? false) for="{{ $id }}" @endif class="font-medium text-gray-700 select-none">{{ $description }}</label> @endif
            </div>
        @endif
    </div>
</x-bc-form:field>
