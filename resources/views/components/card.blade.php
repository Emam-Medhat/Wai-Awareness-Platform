@props([
    'title' => null,
    'subtitle' => null,
    'image' => null,
    'footer' => null,
    'class' => null,
    'hover' => true,
    'shadow' => 'default',
    'border' => false
])

@php
    $shadowClasses = [
        'none' => '',
        'sm' => 'shadow-sm',
        'default' => 'shadow-md',
        'lg' => 'shadow-lg',
        'xl' => 'shadow-xl',
    ];
    
    $shadowClass = $shadowClasses[$shadow] ?? $shadowClasses['default'];
    $hoverClass = $hover ? 'hover:shadow-lg hover:-translate-y-1' : '';
    $borderClass = $border ? 'border border-gray-200' : '';
@endphp

<div class="bg-white rounded-xl {{ $shadowClass }} {{ $hoverClass }} {{ $borderClass }} transition-all duration-300 {{ $class }}">
    @if($image)
        <div class="aspect-w-16 aspect-h-9">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover rounded-t-xl">
        </div>
    @endif
    
    @if($title || $subtitle)
        <div class="p-6">
            @if($title)
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $title }}</h3>
            @endif
            
            @if($subtitle)
                <p class="text-gray-600">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
    
    <div class="{{ $image || $title || $subtitle ? 'px-6 pb-6' : 'p-6' }}">
        {{ $slot }}
    </div>
    
    @if($footer)
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-xl">
            {{ $footer }}
        </div>
    @endif
</div>
