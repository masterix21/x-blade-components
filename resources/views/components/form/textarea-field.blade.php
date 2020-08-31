<x-bc-form:field :id="$id"
                 :label="$label"
                 :hint="$hint"
                 :help="$help"
                 :error-bag="$errorBag"
                 :readOnly="$readOnly"
                 :disabled="$disabled">

    @if ($prepend ?? null)
        <x-slot name="prepend">{{ $prepend }}</x-slot>
    @endif

    <textarea @if ($id ?? false) id="{{ $id }}" @endif
              class="form-input block w-full sm:text-sm sm:leading-5 {{ $errors->has($errorBag) ? 'pr-10 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red ' : '' }} {{ $readOnly ? 'bg-gray-50 text-gray-500' : '' }}"
              {{ $attributes }}
              @if ($readOnly) readonly @endif
              @if ($disabled) disabled @endif
              @if (! blank($name)) name="{{ $name }}" @endif
              @if (! blank($placeholder)) placeholder="{{ $placeholder }}" @endif>{{ $value }}</textarea>

    @if ($append ?? null)
        <x-slot name="append">{{ $append }}</x-slot>
    @endif
</x-bc-form:field>
