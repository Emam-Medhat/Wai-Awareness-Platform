@extends('layouts.app')

@section('title', 'البحث')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">البحث في المنصة</h1>
                <p class="text-xl opacity-90">ابحث عن الكتب والمقالات والفيديوهات</p>
            </div>
        </div>
    </div>

    <!-- Search Results -->
    <div class="container mx-auto px-4 py-12">
        <!-- Search Form -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <form method="GET" action="{{ route('search') }}" class="flex gap-4">
                <input type="text" name="q" value="{{ $query }}" 
                       class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="ابحث عن محتوى...">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-search ml-2"></i>
                    بحث
                </button>
            </form>
        </div>

        @if($query)
            <!-- Results Summary -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-xl font-semibold mb-4">
                    نتائج البحث عن: <span class="text-blue-600">"{{ $query }}"</span>
                </h2>
                <div class="flex gap-6 text-sm text-gray-600">
                    <span>{{ $articles->count() }} مقال</span>
                    <span>{{ $videos->count() }} فيديو</span>
                    <span>{{ $books->count() }} كتاب</span>
                </div>
            </div>

            <!-- Articles Results -->
            @if($articles->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-2xl font-bold mb-6 text-blue-600">
                        <i class="fas fa-newspaper ml-3"></i>
                        المقالات
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($articles as $article)
                            <div class="border rounded-lg p-4 hover:shadow-lg transition">
                                <h4 class="font-semibold mb-2 line-clamp-2">{{ $article->title }}</h4>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-3">{{ $article->excerpt }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $article->category }}</span>
                                    <a href="{{ route('articles.show', $article->slug) }}" 
                                       class="text-blue-600 hover:text-blue-700 text-sm">
                                        قراءة المزيد <i class="fas fa-arrow-left mr-1"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Videos Results -->
            @if($videos->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-2xl font-bold mb-6 text-purple-600">
                        <i class="fas fa-video ml-3"></i>
                        الفيديوهات
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($videos as $video)
                            <div class="border rounded-lg p-4 hover:shadow-lg transition">
                                <div class="bg-gray-200 rounded-lg h-32 mb-3 flex items-center justify-center">
                                    <i class="fas fa-play-circle text-4xl text-purple-600"></i>
                                </div>
                                <h4 class="font-semibold mb-2 line-clamp-2">{{ $video->title }}</h4>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $video->description }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $video->duration }}</span>
                                    <a href="{{ route('videos.show', $video->slug) }}" 
                                       class="text-purple-600 hover:text-purple-700 text-sm">
                                        مشاهدة <i class="fas fa-arrow-left mr-1"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Books Results -->
            @if($books->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-2xl font-bold mb-6 text-green-600">
                        <i class="fas fa-book ml-3"></i>
                        الكتب
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($books as $book)
                            <div class="border rounded-lg p-4 hover:shadow-lg transition">
                                <div class="bg-gray-200 rounded-lg h-32 mb-3 flex items-center justify-center">
                                    <i class="fas fa-book text-4xl text-green-600"></i>
                                </div>
                                <h4 class="font-semibold mb-2 line-clamp-2">{{ $book->title }}</h4>
                                <p class="text-gray-600 text-sm mb-1">{{ $book->author_name }}</p>
                                <p class="text-gray-600 text-sm mb-3">{{ $book->pages }} صفحة</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $book->category }}</span>
                                    <a href="{{ route('books.show', $book->slug) }}" 
                                       class="text-green-600 hover:text-green-700 text-sm">
                                        عرض <i class="fas fa-arrow-left mr-1"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- No Results -->
            @if($articles->count() == 0 && $videos->count() == 0 && $books->count() == 0)
                <div class="bg-white rounded-lg shadow-md p-12 text-center">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">لا توجد نتائج</h3>
                    <p class="text-gray-500 mb-4">لم يتم العثور على أي نتائج لبحثك عن "{{ $query }}"</p>
                    <p class="text-gray-600">جرب استخدام كلمات مفتاحية مختلفة أو تحقق من التهجئة</p>
                </div>
            @endif
        @else
            <!-- Search Instructions -->
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <i class="fas fa-search text-6xl text-blue-600 mb-4"></i>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">ابحث في محتوى المنصة</h3>
                <p class="text-gray-600 mb-6">استخدم شريط البحث أعلاه للعثور عن المقالات والفيديوهات والكتب</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto">
                    <div class="text-center p-4">
                        <i class="fas fa-newspaper text-3xl text-blue-600 mb-2"></i>
                        <h4 class="font-semibold mb-1">المقالات</h4>
                        <p class="text-sm text-gray-600">مقالات علمية وموثوقة</p>
                    </div>
                    <div class="text-center p-4">
                        <i class="fas fa-video text-3xl text-purple-600 mb-2"></i>
                        <h4 class="font-semibold mb-1">الفيديوهات</h4>
                        <p class="text-sm text-gray-600">محتوى مرئي تعليمي</p>
                    </div>
                    <div class="text-center p-4">
                        <i class="fas fa-book text-3xl text-green-600 mb-2"></i>
                        <h4 class="font-semibold mb-1">الكتب</h4>
                        <p class="text-sm text-gray-600">كتب متخصصة وقيمة</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
