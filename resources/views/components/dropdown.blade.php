@props(['alignment' => 'left'])

@php
    $alignmentClasses = [
        'left' => 'left-0',
        'right' => 'right-0',
    ]
@endphp

<div class="relative" x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false">
    <div>
        {{ $trigger }}
    </div>

    <div
        class="absolute {{ $alignmentClasses[$alignment] }} z-20 w-48 rounded-md shadow-lg py-1.5 bg-white"
        x-show="open"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
    >
        {{ $slot }}
    </div>
</div>
