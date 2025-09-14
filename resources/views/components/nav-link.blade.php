@props(['active'])

@php
$classes = ($active ?? false)
? 'block py-2 px-4 rounded bg-indigo-900 text-white font-medium transition-colors duration-150'
: 'block py-2 px-4 rounded text-white hover:bg-indigo-700 hover:text-white transition-colors duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>