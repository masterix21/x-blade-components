<x-bc-form:number-field :label="$label"
                        :error-bag="$errorBag"
                        :readOnly="$readOnly"
                        :disabled="$disabled">
    @if ($currency)
        <x-slot name="prepend">
            @if ($prepend ?? null) {{ $prepend }} @endif
            <div class="flex items-center px-3 border @error($errorBag) border-red-300 text-red-500 @endif rounded-l-md border-r-0 select-none">
                {{ $currency }}
            </div>
        </x-slot>
    @endif

    @if ($append ?? null) <x-slot name="append">{{ $append }}</x-slot> @endif
</x-bc-form:number-field>
