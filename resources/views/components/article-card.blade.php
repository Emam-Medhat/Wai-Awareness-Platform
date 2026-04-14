@props(['article'])

<div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
    @if($article->image)
        <a href="{{ route('articles.show', $article->slug) }}">
            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
        </a>
    @endif
    
    <div class="p-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-secondary font-medium">
                {{ $article->author_type === 'doctor' ? 'دكتور' : ($article->author_type === 'psychologist' ? 'أخصائي نفسي' : 'كاتب') }}
            </span>
            @if($article->is_featured)
                <span class="bg-secondary text-primary text-xs px-2 py-1 rounded-full">مميز</span>
            @endif
        </div>
        
        <h3 class="text-xl font-bold mb-2">
            <a href="{{ route('articles.show', $article->slug) }}" class="text-gray-800 hover:text-primary transition">
                {{ $article->title }}
            </a>
        </h3>
        
        <p class="text-gray-600 mb-4 line-clamp-3">
            {{ $article->excerpt }}
        </p>
        
        <div class="flex items-center justify-between text-sm text-gray-500">
            <div class="flex items-center space-x-2 space-x-reverse">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ $article->formatted_reading_time }}</span>
            </div>
            
            <div class="flex items-center space-x-2 space-x-reverse">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                <span>{{ $article->formatted_views }}</span>
            </div>
        </div>
        
        @if($article->category)
            <div class="mt-3">
                <span class="inline-block bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">
                    {{ $article->category }}
                </span>
            </div>
        @endif
    </div>
</div>
