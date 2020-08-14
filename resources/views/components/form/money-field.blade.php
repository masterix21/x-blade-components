<x-bc-form:field :id="$id"
                 :label="$label"
                 :error-bag="$errorBag"
                 :readOnly="$readOnly"
                 :disabled="$disabled">
    <x-slot name="prepend">
        {{ $prepend ?? null }}

        @if ($currency)
            <div class="flex items-center px-3 border @error($errorBag) border-red-300 text-red-500 @else text-gray-500 @endif rounded-l-md border-r-0 select-none text-sm">
                {{ $currency }}
            </div>
        @endif
    </x-slot>

    <input @if ($id ?? false) id="{{ $id }}" @endif
           class="form-input block w-full @if (! blank($currency) || ! blank($prepend ?? null) || ! blank($append ?? null)) rounded-none @endif @if (blank($currency) && blank($prepend ?? null)) rounded-l-md @else border-l-0 @endif @if (blank($append ?? null)) rounded-r-md @else border-r-0 @endif transition ease-in-out duration-150 sm:text-sm sm:leading-5 {{ $errors->has($errorBag) ? 'pr-10 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red ' : '' }} {{ $readOnly ? 'bg-gray-50 text-gray-500' : '' }}"
           {{ $attributes }}
           x-data
           x-ref="input"
           x-init="IMask($refs.input, { mask: Number, scale: {{ $scale }}, normalizeZeros: true, radix: '.', mapToRadix: [','] })"
           @if ($readOnly) readonly @endif
           @if ($disabled) disabled @endif
           @if (! blank($name)) name="{{ $name }}" @endif
           @if (! blank($value)) value="{{ $value }}" @endif />

    @if ($append ?? null)
        <x-slot name="append">{{ $append }}</x-slot>
    @endif
</x-bc-form:field>
