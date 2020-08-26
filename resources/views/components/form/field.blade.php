<div @if ($id ?? null) id="container-{{ $id }}" @endif
     class="space-y-1"
     @if ($disabled ?? false) data-disabled="true" @endif
     @if ($readOnly ?? false) data-readonly="true" @endif>
    @if (! blank($label))
        <label @if ($id ?? null) for="{{ $id }}" @endif class="block text-sm font-medium leading-5 @error($errorBag) text-red-500 @else text-gray-700 @enderror">{{ __($label) }}</label>
    @endif

    <div class="flex relative @if (! $hideContainerBorder) rounded-md shadow-sm @endif">
        {{ $prepend ?? null }}

        <div class="relative flex-grow focus-within:z-10">
            {{ $slot }}

            @error($errorBag)
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
            @enderror
        </div>

        {{ $append ?? null }}
    </div>

    @error($errorBag)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
