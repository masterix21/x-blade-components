<div x-data="{'type': 'password'}">
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

        <input @if ($id ?? false) id="{{ $id }}" @endif
               class="form-input block w-full rounded-none @if (blank($prepend ?? null)) rounded-l-md @else border-l-0 @endif border-r-0 transition ease-in-out duration-150 sm:text-sm sm:leading-5 {{ $errors->has($errorBag) ? 'pr-10 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red ' : '' }} {{ $readOnly ? 'bg-gray-50 text-gray-500' : '' }}"
               {{ $attributes }}
               x-ref="input"
               x-bind:type="type"
               @if ($readOnly) readonly @endif
               @if ($disabled) disabled @endif
               @if (! blank($name)) name="{{ $name }}" @endif
               @if (! blank($value)) value="{{ $value }}" @endif />

        <x-slot name="append">
            <button type="button"
                    @click="type = type == 'password' ? 'text' : 'password'"
                    class="-ml-px relative inline-flex items-center px-4 py-2 border @error($errorBag) border-red-300 bg-red-50 @else bg-gray-50 border-gray-300 @enderror text-sm leading-5 font-medium rounded-r-md text-gray-700 hover:text-gray-500 hover:bg-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                <svg class="text-gray-400 w-5 h-5"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                    <path x-show="type == 'password'" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    <path x-cloak x-show="type == 'text'" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                </svg>
            </button>

            {{ $append ?? null }}
        </x-slot>
    </x-bc-form:field>
</div>
