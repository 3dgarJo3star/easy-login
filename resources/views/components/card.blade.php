@props([
    'title' => null,
    'subtitle' => null,
    'padding' => 'md',
    'shadow' => 'md'
])

@php
    $paddings = [
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
        'xl' => 'p-10'
    ];

    $shadows = [
        'sm' => 'shadow-sm',
        'md' => 'shadow-lg',
        'lg' => 'shadow-xl',
        'xl' => 'shadow-2xl'
    ];

    $classes = 'bg-white rounded-lg ' . $shadows[$shadow] . ' ' . $paddings[$padding];
@endphp

<div class="{{ $classes }}">
    @if($title)
        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-900">{{ $title }}</h2>
            @if($subtitle)
                <p class="text-gray-600 mt-1">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
    
    <div class="space-y-4">
        {{ $slot }}
    </div>
</div>
