<div class="space-y-1">
    @if (! blank($label))
        <label class="block text-sm font-medium leading-5 @error($errorBag) text-red-500 @else text-gray-700 @enderror">{{ __($label) }}</label>
    @endif

    {{ $slot }}

    @error($errorBag)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
