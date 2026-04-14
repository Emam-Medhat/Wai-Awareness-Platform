@extends('layouts.app')

@section('title', 'التصنيفات')

@push('styles')
<style>
/* ════════════════════════════════════════════════
   WA3Y CATEGORIES — DESIGN TOKENS
════════════════════════════════════════════════ */
:root {
    --wa3y-primary: #2D5E3A;
    --wa3y-primary-light: #4ade80;
    --wa3y-teal: #3A7D6E;
    --wa3y-gold: #C4A882;
    --wa3y-gold-light: #e8d5b7;
    --wa3y-cream: #F0EFEC;
    --wa3y-dark: #1a2e20;
    --wa3y-muted: #6b7280;
    --wa3y-border: rgba(45, 94, 58, 0.12);
    --wa3y-shadow-sm: 0 2px 12px rgba(45, 94, 58, 0.08);
    --wa3y-shadow-md: 0 8px 32px rgba(45, 94, 58, 0.12);
    --wa3y-shadow-lg: 0 24px 64px rgba(45, 94, 58, 0.15);
    --wa3y-radius-sm: 12px;
    --wa3y-radius-md: 20px;
    --wa3y-radius-lg: 28px;
}

/* Hero Section */
.categories-hero {
    background: linear-gradient(135deg, var(--wa3y-dark) 0%, var(--wa3y-primary) 50%, var(--wa3y-teal) 100%);
    color: white;
    padding: 4rem 0;
    margin: -1.5rem -1.5rem 2rem -1.5rem;
    border-radius: 0 0 2rem 2rem;
    position: relative;
    overflow: hidden;
}

.categories-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(196, 168, 130, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(74, 222, 128, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.categories-hero-content {
    position: relative;
    z-index: 1;
}

.categories-hero h1 {
    font-size: 3rem;
    font-weight: 900;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, #fff, var(--wa3y-gold-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.categories-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

/* Stats Section */
.stats-section {
    background: var(--wa3y-cream);
    padding: 3rem 0;
    margin-bottom: 3rem;
    border-radius: var(--wa3y-radius-lg);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
}

.stat-card {
    text-align: center;
    padding: 2rem;
    background: white;
    border-radius: var(--wa3y-radius-md);
    border: 1px solid var(--wa3y-border);
    box-shadow: var(--wa3y-shadow-sm);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--wa3y-shadow-lg);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--wa3y-primary), var(--wa3y-teal));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin: 0 auto 1rem;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--wa3y-dark);
    margin-bottom: 0.5rem;
}

.stat-label {
    color: var(--wa3y-muted);
    font-weight: 600;
}

/* Categories Grid */
.categories-section {
    margin-bottom: 4rem;
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--wa3y-dark);
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.1rem;
    color: var(--wa3y-muted);
    max-width: 600px;
    margin: 0 auto;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.category-card {
    background: white;
    border-radius: var(--wa3y-radius-lg);
    border: 1px solid var(--wa3y-border);
    box-shadow: var(--wa3y-shadow-sm);
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--wa3y-primary), var(--wa3y-teal), var(--wa3y-gold));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.category-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--wa3y-shadow-lg);
}

.category-card:hover::before {
    transform: scaleX(1);
}

.category-header {
    padding: 2rem;
    background: linear-gradient(135deg, var(--wa3y-cream), white);
    border-bottom: 1px solid var(--wa3y-border);
}

.category-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: white;
    margin: 0 auto 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.category-card:hover .category-icon {
    transform: scale(1.1) rotate(5deg);
}

.category-title {
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--wa3y-dark);
    margin-bottom: 0.5rem;
    text-align: center;
}

.category-description {
    color: var(--wa3y-muted);
    text-align: center;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.category-stats {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.category-stat {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(45, 94, 58, 0.1);
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--wa3y-primary);
}

.category-footer {
    padding: 1.5rem 2rem;
    background: white;
    display: flex;
    justify-content: center;
}

.category-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 2rem;
    background: linear-gradient(135deg, var(--wa3y-primary), var(--wa3y-teal));
    color: white;
    text-decoration: none;
    border-radius: var(--wa3y-radius-sm);
    font-weight: 700;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(45, 94, 58, 0.3);
}

.category-link:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(45, 94, 58, 0.4);
    color: white;
}

/* Books Sections */
.books-section {
    margin-bottom: 4rem;
}

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
}

.book-card {
    background: white;
    border-radius: var(--wa3y-radius-md);
    border: 1px solid var(--wa3y-border);
    box-shadow: var(--wa3y-shadow-sm);
    overflow: hidden;
    transition: all 0.3s ease;
}

.book-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--wa3y-shadow-lg);
}

.book-cover {
    height: 200px;
    background: linear-gradient(135deg, var(--wa3y-primary), var(--wa3y-teal));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 3rem;
    position: relative;
    overflow: hidden;
}

.book-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.book-info {
    padding: 1.5rem;
}

.book-title {
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--wa3y-dark);
    margin-bottom: 0.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.book-author {
    color: var(--wa3y-muted);
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.book-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.8rem;
    color: var(--wa3y-muted);
}

.book-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--wa3y-primary);
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.book-link:hover {
    color: var(--wa3y-teal);
}

/* Responsive */
@media (max-width: 768px) {
    .categories-hero {
        padding: 2rem 0;
        margin: -1rem -1rem 1rem -1rem;
    }
    
    .categories-hero h1 {
        font-size: 2rem;
    }
    
    .categories-hero p {
        font-size: 1rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .books-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<div class="categories-hero">
    <div class="container">
        <div class="categories-hero-content">
            <div class="text-center">
                <h1>
                    <i class="fas fa-layer-group me-3"></i>
                    تصنيفات الكتب
                </h1>
                <p class="lead mb-0">
                    اكتشف عالم المعرفة من خلال تصنيفاتنا المتنوعة التي تلبي جميع اهتماماتك
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="container">
    <div class="stats-section">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="stat-number">{{ $stats['total_categories'] }}</div>
                <div class="stat-label">تصنيف</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stat-number">{{ $stats['total_books'] }}</div>
                <div class="stat-label">كتاب</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-user-pen"></i>
                </div>
                <div class="stat-number">{{ $stats['total_authors'] }}</div>
                <div class="stat-label">مؤلف</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="stat-number">{{ number_format($stats['total_views']) }}</div>
                <div class="stat-label">مشاهدة</div>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="container">
    <div class="categories-section">
        <div class="section-header">
            <h2 class="section-title">
                استكشف <span style="color: var(--wa3y-primary)">التصنيفات</span>
            </h2>
            <p class="section-subtitle">
                اختر التصنيف الذي يناسب اهتماماتك وابدأ رحلتك في عالم المعرفة
            </p>
        </div>
        
        <div class="categories-grid">
            @foreach($categories as $category)
            <div class="category-card">
                <div class="category-header">
                    <div class="category-icon" style="background: {{ $category->color ?? 'var(--wa3y-primary)' }};">
                        <i class="{{ $category->icon ?? 'fas fa-book' }}"></i>
                    </div>
                    <h3 class="category-title">{{ $category->name }}</h3>
                    <p class="category-description">{{ $category->description }}</p>
                    
                    <div class="category-stats">
                        <div class="category-stat">
                            <i class="fas fa-book"></i>
                            <span>{{ $category->books_count }} كتاب</span>
                        </div>
                    </div>
                </div>
                
                <div class="category-footer">
                    <a href="{{ route('categories.show', $category->slug) }}" class="category-link">
                        <span>استكشف الكتب</span>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Featured Books Section -->
@if($featuredBooks->count() > 0)
<div class="container">
    <div class="books-section">
        <div class="section-header">
            <h2 class="section-title">
                كتب <span style="color: var(--wa3y-gold)">مميزة</span>
            </h2>
            <p class="section-subtitle">
                أفضل الكتب المختصة بعناية لتكون بداية مميزة لرحلتك المعرفية
            </p>
        </div>
        
        <div class="books-grid">
            @foreach($featuredBooks as $book)
            <div class="book-card">
                <div class="book-cover">
                    @if($book->cover_image)
                        <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}">
                    @else
                        <i class="fas fa-book"></i>
                    @endif
                </div>
                
                <div class="book-info">
                    <h4 class="book-title">{{ $book->title }}</h4>
                    <p class="book-author">{{ $book->author_name }}</p>
                    
                    <div class="book-meta">
                        <span><i class="fas fa-eye"></i> {{ number_format($book->views) }}</span>
                        <a href="{{ route('books.show', $book->slug) }}" class="book-link">
                            قراءة <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Latest Books Section -->
@if($latestBooks->count() > 0)
<div class="container">
    <div class="books-section">
        <div class="section-header">
            <h2 class="section-title">
                أحدث <span style="color: var(--wa3y-teal)">الإضافات</span>
            </h2>
            <p class="section-subtitle">
                آخر الكتب التي تم إضافتها إلى مكتبتنا المتنوعة
            </p>
        </div>
        
        <div class="books-grid">
            @foreach($latestBooks as $book)
            <div class="book-card">
                <div class="book-cover">
                    @if($book->cover_image)
                        <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}">
                    @else
                        <i class="fas fa-book"></i>
                    @endif
                </div>
                
                <div class="book-info">
                    <h4 class="book-title">{{ $book->title }}</h4>
                    <p class="book-author">{{ $book->author_name }}</p>
                    
                    <div class="book-meta">
                        <span><i class="fas fa-eye"></i> {{ number_format($book->views) }}</span>
                        <a href="{{ route('books.show', $book->slug) }}" class="book-link">
                            قراءة <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection
