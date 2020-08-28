<x-bc-form:field :id="$id"
                 :label="$label"
                 :hint="$hint"
                 :help="$help"
                 :error-bag="$errorBag"
                 :readOnly="$readOnly"
                 :disabled="$disabled">
    <x-slot name="prepend">
        {{ $prepend ?? null }}

        <div class="flex items-center px-3 border @error($errorBag) border-red-300 text-red-500 @endif @if (blank($prepend ?? null)) rounded-l-md @else border-l-0 @endif border-r-0 select-none">
            <svg viewBox="0 0 20 20" fill="currentColor" class="calendar w-4 h-4 text-gray-400">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
            </svg>
        </div>
    </x-slot>

    <input @if ($id ?? false) id="{{ $id }}" @endif
           class="form-input block w-full rounded-none border-l-0 @if (blank($append ?? null)) rounded-r-md @else border-r-0 @endif transition ease-in-out duration-150 sm:text-sm sm:leading-5 {{ $errors->has($errorBag) ? 'pr-10 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red ' : '' }} {{ $readOnly ? 'bg-gray-50 text-gray-500' : '' }}"
           {{ $attributes }}
           x-data
           x-ref="input"
           x-init="flatpickr($refs.input, {{ $flatpickrConfig }})"
           @if ($readOnly) readonly @endif
           @if ($disabled) disabled @endif
           @if (! blank($name)) name="{{ $name }}" @endif
           @if (! blank($value)) value="{{ $value }}" @endif
           @if (! blank($placeholder)) placeholder="{{ $placeholder }}" @endif />

    @if ($append ?? null)
        <x-slot name="append">{{ $append }}</x-slot>
    @endif
</x-bc-form:field>
