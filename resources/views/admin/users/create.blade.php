@extends('layouts.admin')

@section('title', 'إضافة مستخدم جديد')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <h1 class="h2 mb-0 fw-bold">
        <i class="fas fa-user-plus ml-3 text-primary"></i>
        إضافة مستخدم جديد
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-right ml-2"></i>
            العودة للمستخدمين
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="admin-card rounded-lg p-4" data-aos="fade-up">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <!-- Basic Information -->
                    <div class="col-12 mb-4">
                        <h5 class="fw-bold text-primary mb-3">
                            <i class="fas fa-user ml-2"></i>
                            المعلومات الأساسية
                        </h5>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label fw-bold">الاسم الأول *</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" 
                               value="{{ old('first_name') }}" required>
                        @error('first_name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label fw-bold">الاسم الأخير *</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" 
                               value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label fw-bold">البريد الإلكتروني *</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label fw-bold">رقم الهاتف *</label>
                        <input type="tel" class="form-control" id="phone" name="phone" 
                               value="{{ old('phone') }}" required>
                        @error('phone')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label fw-bold">الجنس *</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">اختر...</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ذكر</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>أنثى</option>
                        </select>
                        @error('gender')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label fw-bold">المدينة</label>
                        <input type="text" class="form-control" id="city" name="city" 
                               value="{{ old('city') }}" placeholder="مثال: الرياض">
                        @error('city')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <!-- Account Information -->
                <div class="row mt-4">
                    <div class="col-12 mb-4">
                        <h5 class="fw-bold text-success mb-3">
                            <i class="fas fa-cog ml-2"></i>
                            معلومات الحساب
                        </h5>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label fw-bold">كلمة المرور *</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">يجب أن تكون 8 أحرف على الأقل</small>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label fw-bold">تأكيد كلمة المرور *</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="role" class="form-label fw-bold">الدور *</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="">اختر الدور...</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>مستخدم عادي</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>مدير نظام</option>
                            <option value="campaign_manager" {{ old('role') == 'campaign_manager' ? 'selected' : '' }}>مدير حملات</option>
                        </select>
                        @error('role')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="is_active" class="form-label fw-bold">حالة الحساب</label>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                            <label class="form-check-label" for="is_active">
                                حساب نشط
                            </label>
                        </div>
                        <small class="text-muted">إلغاء التحديد سيجعل الحساب غير نشط</small>
                    </div>
                </div>
                
                <!-- Additional Information -->
                <div class="row mt-4">
                    <div class="col-12 mb-4">
                        <h5 class="fw-bold text-info mb-3">
                            <i class="fas fa-info-circle ml-2"></i>
                            معلومات إضافية
                        </h5>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label for="bio" class="form-label fw-bold">السيرة الذاتية</label>
                        <textarea class="form-control" id="bio" name="bio" rows="4" 
                                  placeholder="معلومات إضافية عن المستخدم...">{{ old('bio') }}</textarea>
                        <small class="text-muted">حد أقصى 1000 حرف</small>
                        @error('bio')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <!-- Submit Buttons -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times ml-2"></i>
                                إلغاء
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save ml-2"></i>
                                إنشاء المستخدم
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Help Sidebar -->
    <div class="col-lg-4">
        <div class="admin-card rounded-lg p-4" data-aos="fade-left" data-aos-delay="100">
            <h5 class="fw-bold text-warning mb-3">
                <i class="fas fa-question-circle ml-2"></i>
                مساعدة
            </h5>
            
            <div class="alert alert-info">
                <h6 class="fw-bold">ملاحظات هامة:</h6>
                <ul class="mb-0">
                    <li>جميع الحقول المميزة بـ (*) مطلوبة</li>
                    <li>كلمة المرور يجب أن تكون 8 أحرف على الأقل</li>
                    <li>البريد الإلكتروني يجب أن يكون فريداً</li>
                    <li>رقم الهاتف يجب أن يكون فريداً</li>
                </ul>
            </div>
            
            <div class="alert alert-success">
                <h6 class="fw-bold">الأدوار المتاحة:</h6>
                <ul class="mb-0">
                    <li><strong>مستخدم عادي:</strong> يمكنه عرض المحتوى</li>
                    <li><strong>مدير نظام:</strong> صلاحيات كاملة</li>
                    <li><strong>مدير حملات:</strong> يدير الحملات فقط</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
