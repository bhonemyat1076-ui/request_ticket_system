@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-3 text-sm font-medium text-white bg-red-600 rounded-lg transition-all duration-200 shadow-[0_0_15px_rgba(220,38,38,0.3)]'
            : 'flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-red-900/20 rounded-lg transition-all duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>