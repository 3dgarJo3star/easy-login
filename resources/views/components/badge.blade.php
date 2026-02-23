@props(['variant' => 'primary', 'size' => 'md'])

@php
    $variants = [
        'primary' => 'bg-blue-100 text-blue-800',
        'secondary' => 'bg-gray-100 text-gray-800',
        'success' => 'bg-green-100 text-green-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'danger' => 'bg-red-100 text-red-800',
        'info' => 'bg-indigo-100 text-indigo-800'
    ];

    $sizes = [
        'sm' => 'px-2 py-1 text-xs',
        'md' => 'px-2.5 py-1.5 text-sm',
        'lg' => 'px-3 py-2 text-base'
    ];

    $classes = $variants[$variant] . ' ' . $sizes[$size] . ' ' . 
               'rounded-full font-medium inline-flex items-center';
@endphp

<span class="{{ $classes }}">
    {{ $slot }}
</span>
