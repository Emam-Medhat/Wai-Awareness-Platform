@props([
    'title' => null,
    'value' => null,
    'icon' => null,
    'trend' => null,
    'trendValue' => null,
    'color' => 'primary',
    'size' => 'md',
    'loading' => false,
    'class' => null
])

@php
    $colors = [
        'primary' => 'bg-primary text-white',
        'secondary' => 'bg-secondary text-white',
        'success' => 'bg-green-500 text-white',
        'danger' => 'bg-red-500 text-white',
        'warning' => 'bg-yellow-500 text-white',
        'info' => 'bg-blue-500 text-white',
        'gray' => 'bg-gray-500 text-white',
    ];
    
    $bgColors = [
        'primary' => 'bg-primary-100 text-primary',
        'secondary' => 'bg-secondary-100 text-secondary',
        'success' => 'bg-green-100 text-green-600',
        'danger' => 'bg-red-100 text-red-600',
        'warning' => 'bg-yellow-100 text-yellow-600',
        'info' => 'bg-blue-100 text-blue-600',
        'gray' => 'bg-gray-100 text-gray-600',
    ];
    
    $sizes = [
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
    ];
    
    $colorClass = $colors[$color] ?? $colors['primary'];
    $bgColorClass = $bgColors[$color] ?? $bgColors['primary'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 {{ $class }}">
    <div class="{{ $sizeClass }}">
        <div class="flex items-center justify-between">
            <div>
                @if($title)
                    <p class="text-sm font-medium text-gray-600 mb-1">{{ $title }}</p>
                @endif
                
                @if($loading)
                    <div class="animate-pulse">
                        <div class="h-8 bg-gray-200 rounded w-24 mb-2"></div>
                    </div>
                @else
                    <p class="text-2xl font-bold text-gray-900">
                        {{ $value ?? '0' }}
                    </p>
                @endif
                
                @if($trend && $trendValue !== null)
                    <div class="flex items-center mt-2">
                        @if($trend === 'up')
                            <svg class="w-4 h-4 text-green-500 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            <span class="text-sm text-green-600">+{{ $trendValue }}%</span>
                        @elseif($trend === 'down')
                            <svg class="w-4 h-4 text-red-500 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                            </svg>
                            <span class="text-sm text-red-600">-{{ $trendValue }}%</span>
                        @else
                            <svg class="w-4 h-4 text-gray-500 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"></path>
                            </svg>
                            <span class="text-sm text-gray-600">{{ $trendValue }}%</span>
                        @endif
                    </div>
                @endif
            </div>
            
            @if($icon)
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 {{ $bgColorClass }} rounded-lg flex items-center justify-center">
                        {!! $icon !!}
                    </div>
                </div>
            @endif
        </div>
        
        @if(isset($description))
            <p class="text-sm text-gray-600 mt-3">{{ $description }}</p>
        @endif
    </div>
</div>
