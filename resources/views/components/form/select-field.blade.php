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

    <div x-data="{ isOn: false, value: {{ json_encode($value ?: []) }}, options: {{ json_encode($options) }}, popper: null }"
         @if ($id ?? false) id="{{ $id }}" @endif
         class="relative w-full"
         x-init="popper = createPopper($refs.btn, $refs.menu, { modifiers: [flip, preventOverflow] })"
         @click.away="isOn = false"
         {{ $attributes }}
         wire:ignore.self>
                <span class="inline-block w-full rounded-md">
                    <button type="button"
                            x-ref="btn"
                            @click="isOn = ! isOn; $nextTick(() => popper.update())"
                            class="cursor-default relative w-full rounded-md border {{ $errors->has($errorBag) ? 'pr-10 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red ' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300' }} bg-white pl-3 pr-10 py-2 text-left focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        @if ($multiple)
                            <div class="flex flex-wrap space-x-1">
                                <template x-if="value == null || value.length == 0">
                                    <div>{{ $placeholder ?: '-' }}</div>
                                </template>
                                <template x-for="key in value" :key="key">
                                    <div class="rounded-md px-2 text-xs bg-gray-200 text-gray-500" x-text="options[key]"></div>
                                </template>
                            </div>
                        @else
                            <span class="block truncate" x-text="options[value] ?? {{ json_encode($placeholder ?: '-') }} "></span>
                        @endif

                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </span>

        <div x-show="isOn" x-cloak x-ref="menu" class="z-10 absolute mt-1 w-full rounded-md bg-white shadow-lg">
            <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3" class="max-h-60 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                @foreach ($options as $key => $label)
                    <li class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-50"
                        @if (! $disabled && ! $readOnly)
                            x-on:click="@if ($multiple) value.indexOf({{ json_encode($key) }}) >= 0 ? value.splice(value.indexOf({{ json_encode($key) }}), 1) : value.push({{ json_encode($key) }});@else value = {{ json_encode($key) }};@endif $dispatch('input', value)"
                        @endif >
                                <span class="block truncate"
                                      @if ($multiple)
                                        :class="{'font-normal': ! value.indexOf({{ json_encode($key) }}) >= 0, 'font-semibold': value.indexOf({{ json_encode($key) }}) >= 0}"
                                      @else
                                        :class="{'font-normal': value !== {{ json_encode($key) }}, 'font-semibold': value === {{ json_encode($key) }}}"
                                      @endif>
                                    {{ $label }}
                                </span>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4"
                              @if ($multiple)
                                :class="{'text-white': ! value.indexOf({{ json_encode($key) }}) >= 0, 'text-indigo-600': value.indexOf({{ json_encode($key) }}) >= 0}"
                              @else
                                :class="{'text-white': value !== {{ json_encode($key) }}, 'text-indigo-600': value === {{ json_encode($key) }}}"
                              @endif>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    @if ($append ?? null)
        <x-slot name="append">{{ $append }}</x-slot>
    @endif
</x-bc-form:field>
