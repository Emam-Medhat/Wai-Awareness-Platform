@extends('layouts.app')

@section('title', 'الكتب')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">مكتبة الكتب</h1>
                <p class="text-xl opacity-90">مجموعة مختارة من الكتب القيمة في مجال التوعية والصحة النفسية</p>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form method="GET" action="{{ route('books.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">البحث</label>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="ابحث عن كتاب...">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">التصنيف</label>
                    <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع التصنيفات</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">اللغة</label>
                    <select name="language" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع اللغات</option>
                        @foreach($languages as $lang)
                            <option value="{{ $lang }}" {{ request('language') == $lang ? 'selected' : '' }}>
                                {{ $lang == 'ar' ? 'العربية' : 'الإنجليزية' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">المميزة</label>
                    <select name="featured" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">الكل</option>
                        <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>المميزة فقط</option>
                    </select>
                </div>
                
                <div class="md:col-span-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        بحث
                    </button>
                    <a href="{{ route('books.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 transition mr-2">
                        مسح
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Books Grid -->
    <div class="container mx-auto px-4 py-8">
        @if($books->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($books as $book)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <div class="relative">
                            @if($book->is_featured)
                                <span class="absolute top-2 right-2 bg-yellow-400 text-yellow-900 px-2 py-1 rounded-full text-xs font-semibold">
                                    مميز
                                </span>
                            @endif
                            
                            <div class="h-64 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                <i class="fas fa-book text-6xl text-blue-600"></i>
                            </div>
                        </div>
                        
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2 line-clamp-2">{{ $book->title }}</h3>
                            <p class="text-gray-600 text-sm mb-2">المؤلف: {{ $book->author_name }}</p>
                            <p class="text-gray-600 text-sm mb-2">التصنيف: {{ $book->category }}</p>
                            <p class="text-gray-600 text-sm mb-2">الصفحات: {{ $book->pages }}</p>
                            <p class="text-gray-600 text-sm mb-2">اللغة: {{ $book->language == 'ar' ? 'العربية' : 'الإنجليزية' }}</p>
                            
                            <div class="flex justify-between items-center mt-4">
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-eye ml-1"></i> {{ number_format($book->views) }}
                                    <i class="fas fa-download ml-2 mr-1"></i> {{ number_format($book->download_count) }}
                                </div>
                            </div>
                            
                            <div class="mt-4 flex gap-2">
                                <a href="{{ route('books.show', $book->slug) }}" 
                                   class="flex-1 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700 transition">
                                    عرض
                                </a>
                                <a href="{{ route('books.download', $book->slug) }}" 
                                   class="flex-1 bg-green-600 text-white text-center py-2 rounded hover:bg-green-700 transition">
                                    تحميل
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-8">
                {{ $books->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-book text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">لا توجد كتب</h3>
                <p class="text-gray-500">لم يتم العثور على كتب تطابق معايير البحث</p>
            </div>
        @endif
    </div>
</div>
@endsection
