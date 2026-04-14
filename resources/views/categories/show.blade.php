@extends('layouts.app')

@section('title', $metaTitle)

@section('content')
<!-- SEO Meta Tags -->
@section('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $category->name }}, كتب, مقالات, {{ str_replace('-', ' ', $category->slug) }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

<!-- Hero Section -->
<section class="category-hero">
    <div class="container">
        <div class="category-hero-content">
            <div class="category-icon">
                @if($category->icon)
                    <i class="{{ $category->icon }}"></i>
                @else
                    <i class="fas fa-book"></i>
                @endif
            </div>
            <div class="category-info">
                <h1 class="category-title">{{ $category->name }}</h1>
                @if($category->description)
                    <p class="category-description">{{ $category->description }}</p>
                @endif
                <div class="category-stats">
                    <span class="stat-item">
                        <i class="fas fa-book"></i>
                        {{ $books->total() }} كتاب
                    </span>
                    @if($category->published_books_count > 0)
                        <span class="stat-item">
                            <i class="fas fa-check-circle"></i>
                            {{ $category->published_books_count }} منشور
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3">
            <div class="category-sidebar">
                <!-- Search -->
                <div class="sidebar-section">
                    <h5 class="sidebar-title">بحث في الفئة</h5>
                    <form method="GET" action="{{ route('categories.show', $category) }}" class="search-form">
                        <div class="input-group">
                            <input type="text" name="search" 
                                   class="form-control" 
                                   placeholder="ابحث عن كتاب..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Sort Options -->
                <div class="sidebar-section">
                    <h5 class="sidebar-title">ترتيب حسب</h5>
                    <form method="GET" action="{{ route('categories.show', $category) }}" class="sort-form">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        
                        <select name="sort" class="form-select" onchange="this.form.submit()">
                            <option value="latest" {{ request('sort', 'latest') === 'latest' ? 'selected' : '' }}>
                                الأحدث
                            </option>
                            <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>
                                الأكثر مشاهدة
                            </option>
                            <option value="downloads" {{ request('sort') === 'downloads' ? 'selected' : '' }}>
                                الأكثر تحميلاً
                            </option>
                            <option value="rating" {{ request('sort') === 'rating' ? 'selected' : '' }}>
                                الأعلى تقييماً
                            </option>
                        </select>
                    </form>
                </div>

                <!-- Related Categories -->
                @if($relatedCategories->count() > 0)
                <div class="sidebar-section">
                    <h5 class="sidebar-title">فئات ذات صلة</h5>
                    <div class="related-categories">
                        @foreach($relatedCategories as $relatedCategory)
                        <a href="{{ route('categories.show', $relatedCategory) }}" 
                           class="related-category-link">
                            @if($relatedCategory->icon)
                                <i class="{{ $relatedCategory->icon }}"></i>
                            @else
                                <i class="fas fa-book"></i>
                            @endif
                            {{ $relatedCategory->name }}
                            <span class="count">({{ $relatedCategory->published_books_count ?? 0 }})</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('books') }}">الكتب</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $category->name }}
                    </li>
                </ol>
            </nav>

            <!-- Books Grid -->
            @if($books->count() > 0)
                <div class="books-grid">
                    @foreach($books as $book)
                    <div class="book-card">
                        <div class="book-cover">
                            @if($book->cover_image)
                                <img src="{{ $book->cover_image_url }}" 
                                     alt="{{ $book->title }}"
                                     loading="lazy">
                            @else
                                <div class="book-placeholder">
                                    <i class="fas fa-book"></i>
                                </div>
                            @endif
                            
                            <div class="book-overlay">
                                <a href="{{ route('books.show', $book) }}" 
                                   class="btn btn-outline-light btn-sm">
                                    <i class="fas fa-eye"></i> معاينة
                                </a>
                                @if($book->pdf_file)
                                <a href="{{ route('books.download', $book) }}" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-download"></i> تحميل
                                </a>
                                @endif
                            </div>
                        </div>
                        
                        <div class="book-info">
                            <h3 class="book-title">
                                <a href="{{ route('books.show', $book) }}">
                                    {{ $book->title }}
                                </a>
                            </h3>
                            
                            <p class="book-author">
                                <i class="fas fa-user"></i> {{ $book->author_name }}
                            </p>
                            
                            @if($book->description)
                            <p class="book-description">
                                {{ Str::limit($book->description, 120) }}
                            </p>
                            @endif
                            
                            <div class="book-meta">
                                <span class="meta-item">
                                    <i class="fas fa-eye"></i> {{ $book->formatted_views }}
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-download"></i> {{ $book->formatted_download_count }}
                                </span>
                                @if($book->rating)
                                <span class="meta-item">
                                    <i class="fas fa-star"></i> {{ $book->rating }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    {{ $books->links() }}
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-book-open empty-icon"></i>
                    <h3>لا توجد كتب في هذه الفئة</h3>
                    <p>لم يتم العثور على كتب في فئة "{{ $category->name }}"</p>
                    <a href="{{ route('books') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> العودة لجميع الكتب
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Schema.org structured data for SEO -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "{{ $metaTitle }}",
    "description": "{{ $metaDescription }}",
    "url": "{{ url()->current() }}",
    "mainEntity": {
        "@type": "ItemList",
        "numberOfItems": {{ $books->total() }},
        "itemListElement": [
            @foreach($books as $book)
            {
                "@type": "Book",
                "name": "{{ $book->title }}",
                "author": "{{ $book->author_name }}",
                "url": "{{ route('books.show', $book) }}",
                "image": "{{ $book->cover_image_url }}",
                "description": "{{ Str::limit($book->description ?? '', 200) }}"
            }@if(!$loop->last),@endif
            @endforeach
        ]
    }
}
</script>
@endsection

@push('styles')
<style>
/* Category Hero */
.category-hero {
    background: linear-gradient(135deg, #2D5E3A 0%, #3A7D6E 100%);
    color: white;
    padding: 4rem 0;
    margin-bottom: 2rem;
}

.category-hero-content {
    display: flex;
    align-items: center;
    gap: 2rem;
}

.category-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    flex-shrink: 0;
}

.category-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
}

.category-description {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 1rem;
}

.category-stats {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
}

/* Sidebar */
.category-sidebar {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 100px;
}

.sidebar-section {
    margin-bottom: 2rem;
}

.sidebar-section:last-child {
    margin-bottom: 0;
}

.sidebar-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2D5E3A;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.sidebar-title::after {
    content: '';
    flex: 1;
    height: 2px;
    background: linear-gradient(90deg, #C4A882, transparent);
}

.search-form .input-group {
    display: flex;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.search-form input {
    border: none;
    padding: 0.75rem 1rem;
    flex: 1;
}

.search-form button {
    border: none;
    background: #2D5E3A;
    color: white;
    padding: 0 1rem;
}

.sort-form .form-select {
    width: 100%;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 0.5rem;
}

.related-categories {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.related-category-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem;
    text-decoration: none;
    color: #495057;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.related-category-link:hover {
    background: #f8f9fa;
    color: #2D5E3A;
    transform: translateX(5px);
}

.related-category-link .count {
    margin-left: auto;
    font-size: 0.8rem;
    color: #6c757d;
}

/* Books Grid */
.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.book-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.book-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
}

.book-cover {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.book-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.book-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #2D5E3A, #3A7D6E);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 3rem;
    opacity: 0.5;
}

.book-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.book-card:hover .book-overlay {
    opacity: 1;
}

.book-info {
    padding: 1.5rem;
}

.book-title {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.book-title a {
    color: #2D5E3A;
    text-decoration: none;
}

.book-title a:hover {
    color: #1e3f27;
}

.book-author {
    color: #6c757d;
    font-size: 0.9rem;
    margin-bottom: 0.75rem;
}

.book-description {
    color: #495057;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
}

.book-meta {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.8rem;
    color: #6c757d;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #6c757d;
}

.empty-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

.empty-state h3 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

/* Responsive */
@media (max-width: 768px) {
    .category-hero-content {
        flex-direction: column;
        text-align: center;
    }
    
    .books-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    
    .category-sidebar {
        position: static;
        margin-bottom: 2rem;
    }
}
</style>
@endpush
