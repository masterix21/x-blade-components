<div x-data="{ showAskButtons: false }"
     class="flex items-center justify-center space-x-2">
    <div x-show="! showAskButtons"
         class="flex items-center justify-center space-x-2">
        {{ $prepend ?? null }}

        @if ($slot->isEmpty())
            <a @click="showAskButtons = true"
               class="cursor-pointer text-red-700 hover:text-red-500">
                <svg viewBox="0 0 20 20" fill="currentColor" class="trash w-6 h-6">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
            </a>
        @endif

        {{ $append ?? null }}
    </div>

    @if (! ($confirmButton ?? false))
        <a x-show="showAskButtons"
           x-cloak
           {{ $attributes }}
           class="cursor-pointer text-green-600 hover:text-green-500">
            <svg viewBox="0 0 20 20" fill="currentColor" class="check w-6 h-6">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
        </a>
    @else
        {{ $confirmButton }}
    @endif

    @if (! ($cancelButton ?? false))
        <a x-show="showAskButtons"
           x-cloak
           @click="showAskButtons = false"
           class="cursor-pointer text-red-700 hover:text-red-500">
            <svg viewBox="0 0 20 20" fill="currentColor" class="x w-6 h-6">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    @else
        {{ $cancelButton }}
    @endif
</div>
