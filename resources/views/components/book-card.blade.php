@props(['book'])

<div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
    <div class="relative">
        <a href="{{ route('books.show', $book->slug) }}">
            @if($book->cover_image)
                <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                    </svg>
                </div>
            @endif
        </a>
        
        @if($book->is_featured)
            <span class="absolute top-2 left-2 bg-secondary text-primary text-xs px-2 py-1 rounded-full">مميز</span>
        @endif
        
        @if($book->pdf_file)
            <a href="{{ route('books.download', $book->slug) }}" class="absolute bottom-2 left-2 bg-primary text-white p-2 rounded-full hover:bg-opacity-90 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </a>
        @endif
    </div>
    
    <div class="p-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-500">{{ $book->author_name }}</span>
            <span class="text-sm text-secondary font-medium">{{ $book->language_label }}</span>
        </div>
        
        <h3 class="text-xl font-bold mb-2">
            <a href="{{ route('books.show', $book->slug) }}" class="text-gray-800 hover:text-primary transition">
                {{ $book->title }}
            </a>
        </h3>
        
        @if($book->description)
            <p class="text-gray-600 mb-4 line-clamp-2">
                {{ $book->description }}
            </p>
        @endif
        
        <div class="flex items-center justify-between text-sm text-gray-500">
            <div class="flex items-center space-x-2 space-x-reverse">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                <span>{{ $book->pages }} صفحة</span>
            </div>
            
            <div class="flex items-center space-x-2 space-x-reverse">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                <span>{{ $book->formatted_views }}</span>
            </div>
        </div>
        
        @if($book->category)
            <div class="mt-3">
                <span class="inline-block bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">
                    {{ $book->category }}
                </span>
            </div>
        @endif
    </div>
</div>
