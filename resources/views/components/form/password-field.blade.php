<x-bc-form:field :label="$label"
                 :error-bag="$errorBag"
                 :readOnly="$readOnly"
                 :disabled="$disabled">
    <div x-data="{type:'password'}" class="relative rounded-md shadow-sm">
        <input id="{{ $id }}"
               x-bind:type="type"
               class="form-input block w-full sm:text-sm sm:leading-5 {{ $errors->has($errorBag) ? 'pr-15 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red ' : 'pr-12' }} {{ $readOnly ? 'bg-gray-50 text-gray-500' : '' }}"
               {{ $attributes }}
               @if ($readOnly) readonly @endif
               @if ($disabled) disabled @endif
               @if (! blank($name)) name="{{ $name }}" @endif
               @if (! blank($value)) value="{{ $value }}" @endif />

        <button tabindex="-1"
                type="button"
                @click="type = type == 'password' ? 'text' : 'password'"
                class="-ml-px absolute top-0 @error($errorBag) right-5 @else right-0 @enderror px-4 py-2 text-sm leading-5 font-medium rounded-r-md text-gray-700 focus:outline-none focus:border-blue-300 active:text-indigo-500 transition ease-in-out duration-150">
            <svg class="text-gray-400 w-5 h-5 mt-px"
                 fill="none"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 stroke-width="2"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
                <path x-show="type == 'password'" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                <path x-show="type == 'text'" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
            </svg>
        </button>

        @error($errorBag)
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
        @enderror
    </div>
</x-bc-form:field>
