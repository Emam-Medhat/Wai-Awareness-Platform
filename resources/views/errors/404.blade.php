@extends('layouts.app')

@section('title', 'صفحة غير موجودة')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <!-- 404 Number -->
                <div class="display-1 fw-bold text-primary mb-4">
                    404
                </div>
                
                <!-- Error Message -->
                <h1 class="h2 mb-3">صفحة غير موجودة</h1>
                <p class="text-muted mb-5">
                    عذراً، الصفحة التي تبحث عنها غير موجودة أو تم نقلها.
                </p>
                
                <!-- Search Box -->
                <div class="row justify-content-center mb-5">
                    <div class="col-md-8">
                        <form action="{{ route('search') }}" method="GET" class="d-flex">
                            <input type="text" class="form-control form-control-lg rounded-start-pill" 
                                   name="query" placeholder="ابحث عن ما تريد...">
                            <button class="btn btn-primary rounded-end-pill px-4" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-home ml-2"></i>
                        الصفحة الرئيسية
                    </a>
                    <a href="{{ route('books') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-book ml-2"></i>
                        استكشف الكتب
                    </a>
                    <a href="{{ route('categories') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-tags ml-2"></i>
                        الفئات
                    </a>
                </div>
                
                <!-- Help Section -->
                <div class="mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">
                                <i class="fas fa-question-circle text-primary ml-2"></i>
                                هل تحتاج مساعدة؟
                            </h5>
                            <p class="card-text text-muted mb-3">
                                يمكنك محاولة:
                            </p>
                            <ul class="list-unstyled text-start text-muted">
                                <li class="mb-2">
                                    <i class="fas fa-check text-success ml-2"></i>
                                    التحقق من عنوان URL
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success ml-2"></i>
                                    استخدام شريط البحث
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success ml-2"></i>
                                    العودة للصفحة السابقة
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-check text-success ml-2"></i>
                                    التواصل مع الدعم الفني
                                </li>
                            </ul>
                            <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-envelope ml-2"></i>
                                تواصل معنا
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Popular Links -->
                <div class="mt-5">
                    <h6 class="text-muted mb-3">روابط شائعة:</h6>
                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                        <a href="{{ route('books') }}" class="badge bg-light text-dark p-2">الكتب</a>
                        <a href="{{ route('articles') }}" class="badge bg-light text-dark p-2">المقالات</a>
                        <a href="{{ route('videos') }}" class="badge bg-light text-dark p-2">الفيديوهات</a>
                        <a href="{{ route('home') }}" class="badge bg-light text-dark p-2">الرئيسية</a>
                        <a href="{{ route('about') }}" class="badge bg-light text-dark p-2">من نحن</a>
                        <a href="{{ route('contact') }}" class="badge bg-light text-dark p-2">اتصل بنا</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
