<x-bc-form:input-field :label="$label"
                       :error-bag="$errorBag"
                       :readOnly="$readOnly"
                       :disabled="$disabled"
                       x-data="{}"
                       x-ref="input"
                       x-init="IMask($refs.input, { mask: Number, scale: {{ $scale }}, normalizeZeros: true, radix: '.', mapToRadix: [','] })">
    @if ($prepend ?? null) <x-slot name="prepend">{{ $prepend }}</x-slot> @endif
    @if ($append ?? null) <x-slot name="append">{{ $append }}</x-slot> @endif
</x-bc-form:input-field>
