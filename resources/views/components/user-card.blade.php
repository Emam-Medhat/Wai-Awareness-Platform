@props(['user', 'showCity = true, 'showDate = true])

<div class="bg-white rounded-lg shadow-md p-6 text-center">
    <img src="{{ $user->avatar_url }}" alt="{{ $user->display_name }}" class="w-20 h-20 rounded-full mx-auto mb-4">
    
    <h4 class="text-lg font-bold mb-2">{{ $user->display_name }}</h4>
    
    @if($showCity && isset($user->author_city))
        <p class="text-gray-600 text-sm mb-2">
            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            {{ $user->author_city }}
        </p>
    @endif
    
    @if(isset($user->author_age))
        <p class="text-gray-600 text-sm mb-3">
            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ $user->age_with_label }}
        </p>
    @endif
    
    <div class="text-gray-700 mb-4">
        {{ Str::limit($user->content, 150) }}
    </div>
    
    @if($showDate && isset($user->created_at))
        <p class="text-gray-500 text-xs">
            {{ $user->created_at->format('Y-m-d') }}
        </p>
    @endif
</div>
