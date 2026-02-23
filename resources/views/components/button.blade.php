@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'fullWidth' => false
])

@php
    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white',
        'success' => 'bg-green-600 hover:bg-green-700 text-white',
        'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white',
        'outline' => 'border border-gray-300 hover:bg-gray-50 text-gray-700',
        'ghost' => 'hover:bg-gray-100 text-gray-700'
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base'
    ];

    $classes = $variants[$variant] . ' ' . $sizes[$size] . ' ' . 
               'rounded-lg font-medium transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ' .
               ($fullWidth ? 'w-full' : '');
@endphp

@if($href)
    <a href="{{ $href }}" class="{{ $classes }} inline-block text-center">
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" class="{{ $classes }}">
        {{ $slot }}
    </button>
@endif
