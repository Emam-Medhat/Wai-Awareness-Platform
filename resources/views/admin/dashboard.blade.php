@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('content')
<!-- Page Header -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom border-2 border-bottom border-primary" style="border-color: var(--wa3y-green) !important;">
    <h1 class="h2 mb-0 fw-bold" style="color: var(--wa3y-green);">
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--wa3y-gold), var(--wa3y-green)); border-radius: 16px;">
                <i class="fas fa-tachometer-alt text-white"></i>
            </div>
            لوحة التحكم
        </div>
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-primary" style="border-color: var(--wa3y-green); color: var(--wa3y-green);">
                <i class="fas fa-download ml-2"></i>
                تصدير تقرير
            </button>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4" data-aos="fade-up">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 rounded-lg p-3" style="background: linear-gradient(135deg, var(--wa3y-green), var(--wa3y-teal));">
                    <i class="fas fa-users fa-2x text-white"></i>
                </div>
                <div class="flex-grow-1 me-3">
                    <h6 class="text-muted mb-1">المستخدمون</h6>
                    <h3 class="fw-bold mb-0" style="color: var(--wa3y-green);">{{ $stats['users'] ?? 0 }}</h3>
                    <small class="text-success">
                        <i class="fas fa-arrow-up"></i> +12% هذا الشهر
                    </small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 rounded-lg p-3" style="background: linear-gradient(135deg, var(--wa3y-teal), var(--wa3y-green-mid));">
                    <i class="fas fa-newspaper fa-2x text-white"></i>
                </div>
                <div class="flex-grow-1 me-3">
                    <h6 class="text-muted mb-1">المقالات</h6>
                    <h3 class="fw-bold mb-0" style="color: var(--wa3y-teal);">{{ $stats['articles'] ?? 0 }}</h3>
                    <small class="text-success">
                        <i class="fas fa-arrow-up"></i> +8% هذا الشهر
                    </small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 rounded-lg p-3" style="background: linear-gradient(135deg, var(--wa3y-gold), var(--wa3y-gold-dark));">
                    <i class="fas fa-video fa-2x text-white"></i>
                </div>
                <div class="flex-grow-1 me-3">
                    <h6 class="text-muted mb-1">الفيديوهات</h6>
                    <h3 class="fw-bold mb-0" style="color: var(--wa3y-gold);">{{ $stats['videos'] ?? 0 }}</h3>
                    <small class="text-success">
                        <i class="fas fa-arrow-up"></i> +15% هذا الشهر
                    </small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 rounded-lg p-3" style="background: linear-gradient(135deg, var(--wa3y-green-mid), var(--wa3y-green-dark));">
                    <i class="fas fa-book fa-2x text-white"></i>
                </div>
                <div class="flex-grow-1 me-3">
                    <h6 class="text-muted mb-1">الكتب</h6>
                    <h3 class="fw-bold mb-0" style="color: var(--wa3y-green-mid);">{{ $stats['books'] ?? 0 }}</h3>
                    <small class="text-success">
                        <i class="fas fa-arrow-up"></i> +5% هذا الشهر
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
    <div class="col-12">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold">
                    <i class="fas fa-bolt ml-2 text-warning"></i>
                    روابط سريعة
                </h5>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                        <i class="fas fa-plus-circle fa-2x mb-2"></i>
                        <span>إضافة مقال</span>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('admin.videos.create') }}" class="btn btn-outline-success w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                        <i class="fas fa-video-plus fa-2x mb-2"></i>
                        <span>إضافة فيديو</span>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-outline-info w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                        <i class="fas fa-user-plus fa-2x mb-2"></i>
                        <span>إضافة مستخدم</span>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <a href="{{ route('admin.contacts') }}" class="btn btn-outline-warning w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                        <i class="fas fa-envelope fa-2x mb-2"></i>
                        <span>رسائل التواصل</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Links to Public Pages -->
<div class="row mb-4" data-aos="fade-up" data-aos-delay="300">
    <div class="col-12">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold">
                    <i class="fas fa-globe ml-2 text-primary"></i>
                    الصفحات العامة
                </h5>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-2">
                        <i class="fas fa-home fa-lg mb-1"></i>
                        <small>الرئيسية</small>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <a href="{{ route('articles') }}" target="_blank" class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-2">
                        <i class="fas fa-newspaper fa-lg mb-1"></i>
                        <small>المقالات</small>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <a href="{{ route('videos') }}" target="_blank" class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-2">
                        <i class="fas fa-video fa-lg mb-1"></i>
                        <small>الفيديوهات</small>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <a href="{{ route('books') }}" target="_blank" class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-2">
                        <i class="fas fa-book fa-lg mb-1"></i>
                        <small>الكتب</small>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <a href="{{ route('stories.index') }}" target="_blank" class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-2">
                        <i class="fas fa-book-open fa-lg mb-1"></i>
                        <small>القصص</small>
                    </a>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <a href="{{ route('ai-assistant') }}" target="_blank" class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-2">
                        <i class="fas fa-robot fa-lg mb-1"></i>
                        <small>المساعد الذكي</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Items -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">القصص بانتظار الموافقة</h3>
        </div>
        <div class="p-6">
            @if($stats['stories'] > 0)
                <div class="flex items-center justify-between mb-4">
                    <span class="text-3xl font-bold text-yellow-600">{{ $stats['stories'] }}</span>
                    <a href="{{ route('admin.stories') }}" class="text-primary hover:text-secondary font-medium">
                        عرض الكل
                    </a>
                </div>
                <p class="text-sm text-gray-600">قصص تنتظر مراجعتك وموافقتك</p>
            @else
                <p class="text-gray-500 text-center py-4">لا توجد قصص بانتظار الموافقة</p>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">العادات بانتظار الموافقة</h3>
        </div>
        <div class="p-6">
            @if($stats['habits'] > 0)
                <div class="flex items-center justify-between mb-4">
                    <span class="text-3xl font-bold text-yellow-600">{{ $stats['habits'] }}</span>
                    <a href="{{ route('admin.habits') }}" class="text-primary hover:text-secondary font-medium">
                        عرض الكل
                    </a>
                </div>
                <p class="text-sm text-gray-600">عادات تنتظر مراجعتك وموافقتك</p>
            @else
                <p class="text-gray-500 text-center py-4">لا توجد عادات بانتظار الموافقة</p>
            @endif
        </div>
    </div>
</div>

<!-- Recent Content -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Articles -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">آخر المقالات</h3>
        </div>
        <div class="divide-y divide-gray-200">
            @forelse($recentArticles as $article)
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            @if($article->image)
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-12 h-12 rounded object-cover">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="mr-3 flex-1">
                            <h4 class="text-sm font-medium text-gray-900 line-clamp-1">{{ $article->title }}</h4>
                            <p class="text-xs text-gray-500">{{ $article->created_at->format('Y-m-d') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    لا توجد مقالات بعد
                </div>
            @endforelse
        </div>
    </div>

    <!-- Recent Videos -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">آخر الفيديوهات</h3>
        </div>
        <div class="divide-y divide-gray-200">
            @forelse($recentVideos as $video)
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            @if($video->thumbnail)
                                <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" class="w-12 h-12 rounded object-cover">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="mr-3 flex-1">
                            <h4 class="text-sm font-medium text-gray-900 line-clamp-1">{{ $video->title }}</h4>
                            <p class="text-xs text-gray-500">{{ $video->created_at->format('Y-m-d') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    لا توجد فيديوهات بعد
                </div>
            @endforelse
        </div>
    </div>

    <!-- Recent Users -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">آخر المستخدمين</h3>
        </div>
        <div class="divide-y divide-gray-200">
            @forelse($recentUsers as $user)
                <div class="p-4">
                    <div class="flex items-center">
                        <img src="{{ $user->avatar_url }}" alt="{{ $user->full_name }}" class="w-10 h-10 rounded-full ml-3">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-900">{{ $user->full_name }}</h4>
                            <p class="text-xs text-gray-500">{{ $user->email }}</p>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : ($user->role === 'campaign_manager' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ $user->role === 'admin' ? 'مدير' : ($user->role === 'campaign_manager' ? 'مدير حملات' : 'مستخدم') }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    لا يوجد مستخدمون بعد
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
