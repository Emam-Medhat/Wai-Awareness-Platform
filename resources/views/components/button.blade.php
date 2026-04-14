@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'type' => 'button',
    'disabled' => false,
    'loading' => false,
    'icon' => null,
    'iconPosition' => 'right',
    'fullWidth' => false,
    'class' => null
])

@php
    $variants = [
        'primary' => 'bg-primary hover:bg-primary-700 text-white',
        'secondary' => 'bg-secondary hover:bg-secondary-700 text-white',
        'success' => 'bg-green-500 hover:bg-green-600 text-white',
        'danger' => 'bg-red-500 hover:bg-red-600 text-white',
        'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
        'info' => 'bg-blue-500 hover:bg-blue-600 text-white',
        'outline-primary' => 'border-2 border-primary text-primary hover:bg-primary hover:text-white',
        'outline-secondary' => 'border-2 border-secondary text-secondary hover:bg-secondary hover:text-white',
        'ghost-primary' => 'text-primary hover:bg-primary hover:text-white',
        'ghost-secondary' => 'text-secondary hover:bg-secondary hover:text-white',
    ];
    
    $sizes = [
        'xs' => 'px-2 py-1 text-xs',
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
        'xl' => 'px-8 py-4 text-xl',
    ];
    
    $variantClass = $variants[$variant] ?? $variants['primary'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $widthClass = $fullWidth ? 'w-full' : '';
    $disabledClass = $disabled ? 'opacity-50 cursor-not-allowed' : '';
    
    $allClasses = "inline-flex items-center justify-center font-medium rounded-lg transition-all duration-200 {$variantClass} {$sizeClass} {$widthClass} {$disabledClass}";
    if ($class) {
        $allClasses .= " {$class}";
    }
@endphp

@if($href)
    <a href="{{ $href }}" 
       class="{{ $allClasses }}"
       {{ $disabled ? 'tabindex="-1"' : '' }}>
@else
    <button type="{{ $type }}" 
            {{ $disabled ? 'disabled' : '' }}
            class="{{ $allClasses }}">
@endif

    @if($loading)
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @endif

    @if($icon && $iconPosition === 'left')
        <span class="ml-2">{!! $icon !!}</span>
    @endif

    <span>{{ $slot }}</span>

    @if($icon && $iconPosition === 'right')
        <span class="mr-2">{!! $icon !!}</span>
    @endif

@if($href)
    </a>
@else
    </button>
@endif
