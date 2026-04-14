@extends('layouts.admin')

@section('title', 'عرض الكتاب: ' . $book->title)

@push('styles')
<style>
.book-details-hero {
    background: linear-gradient(135deg, #2D5E3A 0%, #3A7D6E 100%);
    color: white;
    padding: 2rem 0;
    margin: -1.5rem -1.5rem 2rem -1.5rem;
    border-radius: 0 0 1rem 1rem;
}

.book-cover-container {
    position: relative;
    overflow: hidden;
    border-radius: 1rem;
    box-shadow: 0 20px 40px rgba(45, 94, 58, 0.3);
    transition: transform 0.3s ease;
}

.book-cover-container:hover {
    transform: translateY(-10px);
}

.book-cover-image {
    width: 100%;
    height: 450px;
    object-fit: cover;
    border-radius: 1rem;
}

.book-cover-placeholder {
    width: 100%;
    height: 450px;
    background: linear-gradient(145deg, #f8f9fa, #e9ecef);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 1rem;
    border: 2px dashed #dee2e6;
}

.info-card {
    background: white;
    border-radius: 1rem;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.info-card:hover {
    box-shadow: 0 10px 30px rgba(45, 94, 58, 0.15);
    transform: translateY(-5px);
}

.info-label {
    font-weight: 700;
    color: #2D5E3A;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    display: block;
}

.info-value {
    font-size: 1.1rem;
    color: #495057;
    margin-bottom: 1.5rem;
}

.stat-card {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    border-radius: 1rem;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
    text-align: center;
    padding: 1.5rem;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(45, 94, 58, 0.2);
}

.stat-number {
    font-size: 2rem;
    font-weight: 900;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    color: #6c757d;
    font-weight: 600;
}

.stat-primary { color: #2D5E3A; }
.stat-success { color: #28a745; }
.stat-warning { color: #ffc107; }
.stat-info { color: #17a2b8; }

.badge-category {
    background: linear-gradient(135deg, #2D5E3A, #3A7D6E);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-weight: 700;
    font-size: 0.85rem;
}

.badge-status {
    padding: 0.4rem 0.8rem;
    border-radius: 1rem;
    font-weight: 700;
    font-size: 0.8rem;
    margin-left: 0.5rem;
}

.action-buttons {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.btn-custom {
    border-radius: 0.5rem;
    font-weight: 700;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
    border: none;
}

.btn-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.description-card {
    background: linear-gradient(135deg, #ffffff, #f8f9fa);
    border-left: 4px solid #2D5E3A;
    border-radius: 0.5rem;
}

.content-card {
    background: white;
    border-radius: 1rem;
    border: 1px solid #e9ecef;
    max-height: 500px;
    overflow-y: auto;
}

.content-card::-webkit-scrollbar {
    width: 8px;
}

.content-card::-webkit-scrollbar-track {
    background: #f1f3f4;
    border-radius: 10px;
}

.content-card::-webkit-scrollbar-thumb {
    background: #2D5E3A;
    border-radius: 10px;
}

.content-card::-webkit-scrollbar-thumb:hover {
    background: #1a2e20;
}

.user-card {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    border-radius: 1rem;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.user-card:hover {
    box-shadow: 0 10px 25px rgba(45, 94, 58, 0.15);
}

.user-avatar-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.user-avatar-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #2D5E3A;
    box-shadow: 0 10px 25px rgba(45, 94, 58, 0.3);
    transition: all 0.3s ease;
}

.user-avatar-img:hover {
    transform: scale(1.1);
    box-shadow: 0 15px 35px rgba(45, 94, 58, 0.4);
}

.user-details {
    background: linear-gradient(135deg, #ffffff, #f8f9fa);
    border-radius: 1rem;
    padding: 1.5rem;
    border: 1px solid #e9ecef;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.user-name {
    font-size: 1.2rem;
    font-weight: 800;
    color: #2D5E3A;
    margin-bottom: 1rem;
    text-align: center;
}

.user-info-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
}

.info-item {
    background: white;
    padding: 1rem;
    border-radius: 0.5rem;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.info-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(45, 94, 58, 0.2);
}

.info-label {
    font-size: 0.8rem;
    color: #6c757d;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.info-value {
    font-size: 0.9rem;
    color: #495057;
    font-weight: 700;
}

.role-badge {
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
}

.role-badge.admin {
    background: linear-gradient(135deg, #dc3545, #c82333);
    color: white;
}

.role-badge.doctor {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
}

.role-badge.user {
    background: linear-gradient(135deg, #6c757d, #495057);
    color: white;
}

@media (max-width: 768px) {
    .user-avatar-img {
        width: 60px;
        height: 60px;
    }
    
    .user-details {
        padding: 1rem;
    }
    
    .user-name {
        font-size: 1rem;
    }
    
    .user-info-grid {
        gap: 0.5rem;
    }
    
    .info-item {
        padding: 0.75rem;
    }
}

@media (max-width: 768px) {
    .book-details-hero {
        margin: -1rem -1rem 1rem -1rem;
        padding: 1.5rem 0;
    }
    
    .book-cover-image,
    .book-cover-placeholder {
        height: 300px;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
}
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Hero Section -->
            <div class="book-details-hero">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="display-5 fw-bold mb-3">
                                <i class="fas fa-book me-3"></i>{{ $book->title }}
                            </h1>
                            <p class="lead mb-0">
                                <i class="fas fa-user me-2"></i>{{ $book->author_name }}
                                @if($book->publisher)
                                    <span class="ms-3"><i class="fas fa-building me-2"></i>{{ $book->publisher }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning btn-lg">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>
                                <a href="{{ route('admin.books.index') }}" class="btn btn-light btn-lg">
                                    <i class="fas fa-arrow-left"></i> العودة
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Book Cover and Basic Info -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="book-cover-container">
                        @if($book->cover_image)
                            <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}" class="book-cover-image">
                        @else
                            <div class="book-cover-placeholder">
                                <i class="fas fa-book fa-4x text-muted"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="info-card p-4 h-100">
                        <h4 class="mb-4">
                            <i class="fas fa-info-circle me-2 text-primary"></i>
                            المعلومات الأساسية
                        </h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <span class="info-label">العنوان</span>
                                <div class="info-value">{{ $book->title }}</div>
                            </div>
                            <div class="col-md-6">
                                <span class="info-label">المؤلف</span>
                                <div class="info-value">{{ $book->author_name }}</div>
                            </div>
                            <div class="col-md-6">
                                <span class="info-label">الناشر</span>
                                <div class="info-value">{{ $book->publisher ?: 'غير محدد' }}</div>
                            </div>
                            <div class="col-md-6">
                                <span class="info-label">ISBN</span>
                                <div class="info-value">{{ $book->isbn ?: 'غير محدد' }}</div>
                            </div>
                            <div class="col-md-6">
                                <span class="info-label">اللغة</span>
                                <div class="info-value">{{ $book->language_label }}</div>
                            </div>
                            <div class="col-md-6">
                                <span class="info-label">عدد الصفحات</span>
                                <div class="info-value">{{ $book->pages ?: 'غير محدد' }}</div>
                            </div>
                            <div class="col-md-6">
                                <span class="info-label">سنة النشر</span>
                                <div class="info-value">{{ $book->published_year ?: 'غير محدد' }}</div>
                            </div>
                            <div class="col-md-6">
                                <span class="info-label">التصنيف</span>
                                <div class="info-value">
                                    @if($book->category)
                                        @php
                                            $categoryLabels = [
                                                'psychology' => 'علم النفس',
                                                'addiction' => 'الإدمان',
                                                'relationships' => 'العلاقات',
                                                'self_development' => 'التطوير الذاتي',
                                                'family' => 'الأسرة والطفل',
                                            ];
                                            $label = $categoryLabels[$book->category] ?? $book->category;
                                        @endphp
                                        <span class="badge-category">{{ $label }}</span>
                                    @else
                                        <span class="text-muted">غير محدد</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="info-label">الحجم</span>
                                <div class="info-value">
                                    @if($book->size)
                                        <span class="badge bg-info text-dark">
                                            {{ $book->size == 'small' ? 'صغير' : ($book->size == 'medium' ? 'متوسط' : 'كبير') }}
                                        </span>
                                    @else
                                        <span class="text-muted">غير محدد</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Status Badges -->
                        <div class="mt-4">
                            <span class="info-label">الحالة</span>
                            <div class="mt-2">
                                @if($book->is_published)
                                    <span class="badge badge-status bg-success">
                                        <i class="fas fa-check-circle me-1"></i> منشور
                                    </span>
                                @else
                                    <span class="badge badge-status bg-secondary">
                                        <i class="fas fa-times-circle me-1"></i> مسودة
                                    </span>
                                @endif

                                @if($book->is_featured)
                                    <span class="badge badge-status bg-warning">
                                        <i class="fas fa-star me-1"></i> مميز
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Tags -->
                        @if($book->tags)
                        <div class="mt-4">
                            <span class="info-label">الكلمات المفتاحية</span>
                            <div class="mt-2">
                                @foreach(explode(',', $book->tags) as $tag)
                                    <span class="badge bg-secondary me-1">{{ trim($tag) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons mb-4">
                <div class="d-flex gap-3 justify-content-center">
                    @if($book->pdf_file)
                        <a href="{{ $book->file_url }}" target="_blank" class="btn btn-primary btn-custom btn-lg">
                            <i class="fas fa-file-pdf me-2"></i> عرض ملف PDF
                        </a>
                    @endif
                    <a href="{{ route('books.show', $book->slug) }}" target="_blank" class="btn btn-outline-primary btn-custom btn-lg">
                        <i class="fas fa-external-link-alt me-2"></i> عرض في الموقع
                    </a>
                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-custom btn-lg" onclick="return confirm('هل أنت متأكد من حذف هذا الكتاب؟')">
                            <i class="fas fa-trash me-2"></i> حذف الكتاب
                        </button>
                    </form>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="stat-card">
                        <i class="fas fa-eye fa-2x stat-primary mb-3"></i>
                        <div class="stat-number stat-primary">{{ number_format($book->views) }}</div>
                        <div class="stat-label">المشاهدات</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stat-card">
                        <i class="fas fa-download fa-2x stat-success mb-3"></i>
                        <div class="stat-number stat-success">{{ number_format($book->download_count) }}</div>
                        <div class="stat-label">التحميلات</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stat-card">
                        <i class="fas fa-star fa-2x stat-warning mb-3"></i>
                        <div class="stat-number stat-warning">{{ $book->rating }}/5</div>
                        <div class="stat-label">التقييم</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stat-card">
                        <i class="fas fa-users fa-2x stat-info mb-3"></i>
                        <div class="stat-number stat-info">{{ $book->rating_count }}</div>
                        <div class="stat-label">عدد المقيمين</div>
                    </div>
                </div>
            </div>

            <!-- Description Card -->
            @if($book->description)
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card description-card">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">
                                <i class="fas fa-align-left me-2 text-primary"></i>
                                الوصف
                            </h5>
                            <p class="card-text fs-5">{{ $book->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Content Card -->
            @if($book->content)
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card content-card">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">
                                <i class="fas fa-file-alt me-2 text-primary"></i>
                                المحتوى
                            </h5>
                            <div class="content-body">
                                {!! $book->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- User Info Card -->
            @if($book->user)
            <div class="row">
                <div class="col-12">
                    <div class="user-card">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4">
                                <i class="fas fa-user-shield me-2 text-primary"></i>
                                معلومات المضيف
                            </h5>
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center">
                                    <div class="user-avatar-container">
                                        @if($book->user->avatar)
                                            <img src="{{ $book->user->avatar_url }}" alt="{{ $book->user->full_name }}" class="user-avatar-img">
                                        @else
                                            <div class="user-avatar">
                                                {{ mb_substr($book->user->first_name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="user-details">
                                        <h6 class="user-name mb-2">
                                            <i class="fas fa-user me-2 text-primary"></i>
                                            {{ $book->user->full_name }}
                                        </h6>
                                        <div class="user-info-grid">
                                            <div class="info-item">
                                                <div class="info-label">
                                                    <i class="fas fa-envelope me-2"></i>
                                                    البريد الإلكتروني
                                                </div>
                                                <div class="info-value">{{ $book->user->email }}</div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-label">
                                                    <i class="fas fa-shield-alt me-2"></i>
                                                    الدور
                                                </div>
                                                <div class="info-value">
                                                    <span class="role-badge {{ $book->user->role }}">
                                                        @if($book->user->role === 'admin')
                                                            <i class="fas fa-crown me-1"></i>مدير نظام
                                                        @elseif($book->user->role === 'doctor')
                                                            <i class="fas fa-user-md me-1"></i>طبيب متخصص
                                                        @else
                                                            <i class="fas fa-user me-1"></i>مستخدم
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-label">
                                                    <i class="fas fa-calendar me-2"></i>
                                                    تاريخ الانضمام
                                                </div>
                                                <div class="info-value">{{ $book->user->created_at->format('Y-m-d') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
