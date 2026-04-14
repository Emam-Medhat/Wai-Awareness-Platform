@props([
    'variant' => 'primary',
    'size' => 'md',
    'pill' => false,
    'dot' => false,
    'class' => null
])

@php
    $variants = [
        'primary' => 'bg-primary text-white',
        'secondary' => 'bg-secondary text-white',
        'success' => 'bg-green-100 text-green-800',
        'danger' => 'bg-red-100 text-red-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'info' => 'bg-blue-100 text-blue-800',
        'gray' => 'bg-gray-100 text-gray-800',
        'outline-primary' => 'border border-primary text-primary',
        'outline-secondary' => 'border border-secondary text-secondary',
    ];
    
    $sizes = [
        'xs' => 'px-1.5 py-0.5 text-xs',
        'sm' => 'px-2 py-1 text-sm',
        'md' => 'px-2.5 py-1 text-sm',
        'lg' => 'px-3 py-1.5 text-base',
    ];
    
    $variantClass = $variants[$variant] ?? $variants['primary'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $pillClass = $pill ? 'rounded-full' : 'rounded';
    $dotClass = $dot ? 'relative pl-6' : '';
@endphp

<span class="inline-flex items-center font-medium {{ $variantClass }} {{ $sizeClass }} {{ $pillClass }} {{ $dotClass }} {{ $class }}">
    @if($dot)
        <span class="absolute right-2 top-1/2 transform -translate-y-1/2 w-2 h-2 bg-current rounded-full"></span>
    @endif
    
    {{ $slot }}
</span>
