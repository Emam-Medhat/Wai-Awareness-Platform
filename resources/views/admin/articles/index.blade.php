@extends('layouts.admin')

@section('title', 'إدارة المقالات')

@section('content')
<!-- Page Header -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom border-2" style="border-color: var(--wa3y-green) !important;">
    <h1 class="h2 mb-0 fw-bold" style="color: var(--wa3y-green);">
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--wa3y-gold), var(--wa3y-green)); border-radius: 16px;">
                <i class="fas fa-newspaper text-white"></i>
            </div>
            إدارة المقالات
        </div>
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus ml-2"></i>
            إضافة مقال جديد
        </a>
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-primary" style="border-color: var(--wa3y-green); color: var(--wa3y-green);">
                <i class="fas fa-download ml-2"></i>
                تصدير الكل
            </button>
        </div>
    </div>
</div>

<!-- Search and Filters -->
<div class="admin-card rounded-lg p-4 mb-4" data-aos="fade-up">
    <form method="GET" action="{{ route('admin.articles') }}" class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-bold">البحث</label>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="ابحث في العناوين أو المحتوى..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        
        <div class="col-md-3">
            <label class="form-label fw-bold">التصنيف</label>
            <select name="category" class="form-select">
                <option value="">جميع التصنيفات</option>
                <option value="psychology" {{ request('category') == 'psychology' ? 'selected' : '' }}>علم النفس</option>
                <option value="addiction" {{ request('category') == 'addiction' ? 'selected' : '' }}>الإدمان</option>
                <option value="relationships" {{ request('category') == 'relationships' ? 'selected' : '' }}>العلاقات</option>
                <option value="self_development" {{ request('category') == 'self_development' ? 'selected' : '' }}>التطوير الذاتي</option>
            </select>
        </div>
        
        <div class="col-md-3">
            <label class="form-label fw-bold">نوع المؤلف</label>
            <select name="author_type" class="form-select">
                <option value="">جميع المؤلفين</option>
                <option value="doctor" {{ request('author_type') == 'doctor' ? 'selected' : '' }}>دكتور</option>
                <option value="psychologist" {{ request('author_type') == 'psychologist' ? 'selected' : '' }}>اخصائي نفسي</option>
                <option value="other" {{ request('author_type') == 'other' ? 'selected' : '' }}>آخر</option>
            </select>
        </div>
        
        <div class="col-md-2">
            <label class="form-label fw-bold">الحالة</label>
            <select name="status" class="form-select">
                <option value="">الكل</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>منشور</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>مسودة</option>
                <option value="featured" {{ request('status') == 'featured' ? 'selected' : '' }}>مميز</option>
            </select>
        </div>
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-filter ml-2"></i>
                تطبيق الفلاتر
            </button>
            <a href="{{ route('admin.articles') }}" class="btn btn-outline-secondary">
                <i class="fas fa-redo ml-2"></i>
                إعادة تعيين
            </a>
        </div>
    </form>
</div>

<!-- Articles Table -->
<div class="admin-card rounded-lg p-0 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
    @if($articles->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">
                            <input type="checkbox" class="form-check-input" id="selectAll">
                        </th>
                        <th>المقال</th>
                        <th>المؤلف</th>
                        <th>التصنيف</th>
                        <th>الحالة</th>
                        <th>المشاهدات</th>
                        <th>تاريخ النشر</th>
                        <th class="text-center">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input" value="{{ $article->id }}">
                        </td>
                        <td>
                            <div class="d-flex align-items-start">
                                @if($article->image)
                                    <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="me-3 rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <div class="me-3 rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: var(--wa3y-cream);">
                                        <i class="fas fa-newspaper text-muted"></i>
                                    </div>
                                @endif
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ Str::limit($article->title, 60) }}</h6>
                                    <p class="text-muted small mb-0">{{ Str::limit($article->excerpt, 80) }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: linear-gradient(135deg, var(--wa3y-gold), var(--wa3y-green));">
                                    <i class="fas fa-user text-white" style="font-size: 12px;"></i>
                                </div>
                                <div>
                                    <div class="fw-bold">{{ $article->author->first_name }} {{ $article->author->last_name }}</div>
                                    <small class="text-muted">{{ $article->author_type_label }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($article->category)
                                <span class="badge-primary">{{ $article->category_label }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($article->is_published)
                                <span class="badge bg-success text-white">منشور</span>
                            @else
                                <span class="badge bg-secondary text-white">مسودة</span>
                            @endif
                            @if($article->is_featured)
                                <span class="badge bg-warning text-white ms-1">
                                    <i class="fas fa-star"></i> مميز
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-eye text-muted me-2"></i>
                                <span>{{ number_format($article->views) }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="small text-muted">
                                {{ $article->published_at ? $article->published_at->format('Y-m-d H:i') : '-' }}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('articles.show', $article) }}" class="btn btn-outline-primary btn-sm" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center p-3 border-top">
            <div class="text-muted">
                عرض {{ $articles->firstItem() }} إلى {{ $articles->lastItem() }} من {{ $articles->total() }} مقال
            </div>
            {{ $articles->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--wa3y-cream), var(--wa3y-cream-dark));">
                    <i class="fas fa-newspaper text-muted" style="font-size: 32px;"></i>
                </div>
            </div>
            <h4 class="text-muted mb-3">لا توجد مقالات بعد</h4>
            <p class="text-muted mb-4">ابدأ بإضافة مقالات جديدة لإدارة محتوى الموقع</p>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
                <i class="fas fa-plus ml-2"></i>
                إضافة أول مقال
            </a>
        </div>
    @endif
</div>
@endsection
