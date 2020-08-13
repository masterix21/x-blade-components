<x-bc-form:field :label="$label"
                 :error-bag="$errorBag"
                 :readOnly="$readOnly"
                 :disabled="$disabled"
                 hide-container-border>
    @if ($prepend ?? null)
        <x-slot name="prepend">{{ $prepend }}</x-slot>
    @endif

    <a x-data="{isOn: {{ $trueValue === $value ? 'true' : 'false' }}, trueValue: {{ var_export($trueValue, true) }}, falseValue: {{ var_export($falseValue, true) }}}"
       {{ $attributes }}
       x-on:click="isOn = ! isOn"
       x-init="$watch('isOn', value => $dispatch('input', value ? trueValue : falseValue))"
       role="checkbox"
       tabindex="0"
       aria-checked="false"
       :class="{'bg-indigo-600': isOn, 'bg-gray-200': ! isOn}"
       class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline">
        <span aria-hidden="true"
              :class="{'translate-x-5': isOn, 'translate-x-0': ! isOn}"
              class="translate-x-0 relative inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200">
            <span :class="{'opacity-0 ease-out duration-100': isOn, 'opacity-100 ease-in duration-200': ! isOn}"
                  class="opacity-100 ease-in duration-200 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity">
                <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span :class="{'opacity-100 ease-in duration-200': isOn, 'opacity-0 ease-out duration-100': ! isOn}"
                  class="opacity-0 ease-out duration-100 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity">
                <svg class="h-3 w-3 text-indigo-600" fill="currentColor" viewBox="0 0 12 12">
                    <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                </svg>
            </span>
        </span>
    </a>

    @if ($append ?? null)
        <x-slot name="append">{{ $append }}</x-slot>
    @endif
</x-bc-form:field>
