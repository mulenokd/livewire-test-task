@props([
    'model',
    'label',
    'inputClass' => '',
    'type' => 'text',
    'wire' => true,
    'defer' => true,
    'autocomplete' => '',
    'autofocus' => '',
    'inputMode' => false,
    'disabled' => false,
    'id' => '',
    'error' => '',
    'optional' => false,
    'action' => '',
    'actionText' => '',
    'placeholder' => ''
])

<div {{ $attributes }}>
    <div class="flex justify-between">
        <label 
            for="{{ $model }}" 
            class="block text-base sm:text-sm font-medium leading-6 text-gray-900">
            {{ $label }}
        </label>
        @if ($optional)
            <span class="text-sm leading-6 text-gray-500">@lang('hrwallet::form:input.optional')</span>
        @elseif($action && $actionText)
            <span 
                wire:click="{{ $action }}"
                class="text-sm leading-6 font-medium text-indigo-600 hover:text-indigo-500 cursor-pointer">
                {{ $actionText }}
            </span>
        @endif
    </div>
    <div class="relative mt-2">
        @if ($disabled)
            <div class="block w-full rounded-md transition duration-150 border-0 py-2 sm:py-1.5 px-3 pr-10 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 bg-gray-50 text-gray-500 ring-gray-200">
                @if ($type === 'password')
                    @if ($this->$model)
                        @for ($i = 0; $i < strlen($this->$model); $i++) · @endfor
                    @else
                        ''
                    @endif
                @else
                    {{ $this->$model ?? ' ' }}
                @endif
            </div>
        @else
            <input 
                id="{{ $id ?: $model }}"
                type="{{ $type }}"
                @if ($autofocus) autofocus @endif
                @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
                @if ($inputMode) inputmode="{{ $inputMode }}" @endif 
                @if ($placeholder) placeholder="{{ $placeholder }}" @endif 
                @if ($wire) wire:model.lazy="{{ $model }}" @else name="{{ $model }}" @endif
                class="{{ $inputClass }} block w-full rounded-md transition duration-150 border-0 py-2 sm:py-1.5 pr-10 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6
                @if ($error)
                    placeholder:text-red-300 text-red-900 ring-red-300 focus:ring-red-500
                @else 
                    placeholder:text-gray-400 text-gray-900 ring-gray-300 focus:ring-indigo-600
                @endif
                disabled:bg-gray-50 disabled:text-gray-500 disabled:ring-gray-200
                "
            />
        @endif


        @if ($error)
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
            </div>
        @endif
    </div>

    @if ($error)
        <p class="mt-2 text-base sm:text-sm text-red-600">{{ $error }}</p>
    @endif
</div>