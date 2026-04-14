@extends('layouts.app')

@section('title', 'انتهت مدة الجلسة')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <!-- 419 Number -->
                <div class="display-1 fw-bold text-info mb-4">
                    419
                </div>
                
                <!-- Clock Icon -->
                <div class="mb-4">
                    <i class="fas fa-clock fa-5x text-info"></i>
                </div>
                
                <!-- Error Message -->
                <h1 class="h2 mb-3">انتهت مدة الجلسة</h1>
                <p class="text-muted mb-5">
                    انتهت مدة جلستك لأسباب أمنية. يرجى تسجيل الدخول مرة أخرى.
                </p>
                
                <!-- Action Buttons -->
                <div class="d-flex justify-content-center gap-3 flex-wrap mb-5">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-sign-in-alt ml-2"></i>
                        تسجيل الدخول مرة أخرى
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-home ml-2"></i>
                        الصفحة الرئيسية
                    </a>
                </div>
                
                <!-- Help Section -->
                <div class="mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">
                                <i class="fas fa-info-circle text-info ml-2"></i>
                                لماذا حدث هذا؟
                            </h5>
                            <ul class="list-unstyled text-start text-muted">
                                <li class="mb-2">
                                    <i class="fas fa-hourglass-end text-primary ml-2"></i>
                                    انتهت مدة الجلسة لعدم النشاط
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-shield-alt text-primary ml-2"></i>
                                    إجراء أمني لحماية حسابك
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-cookie-bite text-primary ml-2"></i>
                                    قد تكون مشكلة في الكوكيز
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-sync text-primary ml-2"></i>
                                    تم تحديث الصفحة بعد انتهاء الجلسة
                                </li>
                            </ul>
                            <div class="alert alert-info">
                                <small>
                                    <i class="fas fa-lightbulb ml-2"></i>
                                    نصيحة: احفظ عملك بشكل منتظم لتجنب فقدان البيانات
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
