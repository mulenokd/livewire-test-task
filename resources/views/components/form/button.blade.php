@props([
    'text',
    'link' => '',
    'action' => '',
    'jsAction' => '',
    'color' => 'indigo-600',
    'hover' => 'indigo-500',
    'textcolor' => 'white'
])

@if ($link)
    <a href="{{ $link }}" class="flex w-full justify-center rounded-md bg-{{ $color }} px-3 py-2 text-base sm:text-sm font-semibold text-{{ $textcolor }} shadow-sm hover:bg-{{ $hover }} focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
@else
    <button
        @if (!empty($action))
            wire:click="{{ $action }}"
            type="button"
        @endif
        @if (!empty($jsAction))
            x-on:click="{{ $jsAction }}"
            type="button"
        @endif
{{--        wire:loading.attr="disabled"--}}
        class="flex w-full justify-center rounded-md bg-{{ $color }} px-3 py-2 text-base sm:text-sm font-semibold text-{{ $textcolor }} shadow-sm hover:bg-{{ $hover }} focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
@endif
    <span wire:loading.class.remove="opacity-0" class="opacity-0 absolute transition-opacity">
        <svg class="animate-spin h-5 w-5 text-{{ $textcolor }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </span>
    <span wire:loading.class.add="opacity-0 transition-opacity">
        {{ $text }}
    </span>
@if ($link)
    </a>
@else
    </button>
@endif
