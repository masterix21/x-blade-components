<div class="space-y-1">
    <x-slot name="label">
        @if ($label)
            <label class="block text-sm font-medium leading-5 text-gray-700">{{ __($label) }}</label>
        @endif
    </x-slot>

    {{ $slot }}

    @error($errorBag)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
