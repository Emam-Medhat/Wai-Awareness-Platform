@extends('layouts.app')

@section('title', 'تعديل الفئة')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h2 class="fw-bold mb-1">تعديل الفئة</h2>
                    <p class="text-muted">تعديل بيانات الفئة: {{ $category->name }}</p>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> العودة للفئات
                </a>
            </div>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">
                                اسم الفئة <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $category->name) }}"
                                   placeholder="مثال: علم النفس"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">سيتم إنشاء رابط تلقائي من الاسم</small>
                        </div>

                        <!-- Slug -->
                        <div class="mb-4">
                            <label for="slug" class="form-label fw-semibold">
                                الرابط (Slug)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">/books/category/</span>
                                <input type="text" 
                                       class="form-control @error('slug') is-invalid @enderror" 
                                       id="slug" 
                                       name="slug" 
                                       value="{{ old('slug', $category->slug) }}"
                                       placeholder="psychology">
                            </div>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">يتم إنشاؤه تلقائياً من اسم الفئة</small>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">
                                وصف الفئة
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="3"
                                      placeholder="وصف مختصر عن الفئة ومحتواها">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Icon -->
                        <div class="mb-4">
                            <label for="icon" class="form-label fw-semibold">
                                أيقونة الفئة
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i id="icon-preview" class="{{ $category->icon ?? 'fas fa-book' }}"></i>
                                </span>
                                <input type="text" 
                                       class="form-control @error('icon') is-invalid @enderror" 
                                       id="icon" 
                                       name="icon" 
                                       value="{{ old('icon', $category->icon) }}"
                                       placeholder="fas fa-book">
                            </div>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                استخدم أيقونات Font Awesome مثل: fas fa-heart, fas fa-brain, fas fa-users
                            </small>
                        </div>

                        <!-- Color -->
                        <div class="mb-4">
                            <label for="color" class="form-label fw-semibold">
                                لون الفئة
                            </label>
                            <div class="input-group">
                                <input type="color" 
                                       class="form-control form-control-color @error('color') is-invalid @enderror" 
                                       id="color" 
                                       name="color" 
                                       value="{{ old('color', $category->color ?? '#2D5E3A') }}"
                                       style="width: 60px;">
                                <input type="text" 
                                       class="form-control @error('color') is-invalid @enderror" 
                                       id="color-text" 
                                       name="color" 
                                       value="{{ old('color', $category->color ?? '#2D5E3A') }}"
                                       placeholder="#2D5E3A">
                            </div>
                            @error('color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">اختر لون يميز الفئة في الموقع</small>
                        </div>

                        <!-- Active Status -->
                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input @error('is_active') is-invalid @enderror" 
                                       type="checkbox" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1"
                                       {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="is_active">
                                    فئة نشطة
                                </label>
                            </div>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                الفئات النشطة فقط ستظهر في الموقع والنافبار
                            </small>
                        </div>

                        <!-- Books Count Info -->
                        <div class="alert alert-info mb-4">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>معلومات:</strong> هذه الفئة تحتوي على {{ \App\Models\Book::where('category', $category->slug)->count() }} كتاب
                            @if(\App\Models\Book::where('category', $category->slug)->count() > 0)
                                <br><small class="text-muted">لا يمكن حذف الفئة إذا كانت تحتوي على كتب</small>
                            @endif
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex gap-3 pt-3">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-2"></i> حفظ التعديلات
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary px-4">
                                إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug from name
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    nameInput.addEventListener('input', function() {
        const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        
        slugInput.value = slug;
    });

    // Icon preview
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('icon-preview');
    
    iconInput.addEventListener('input', function() {
        iconPreview.className = this.value || 'fas fa-book';
    });

    // Color sync
    const colorInput = document.getElementById('color');
    const colorText = document.getElementById('color-text');
    
    colorInput.addEventListener('input', function() {
        colorText.value = this.value;
    });
    
    colorText.addEventListener('input', function() {
        if (/^#[0-9A-F]{6}$/i.test(this.value)) {
            colorInput.value = this.value;
        }
    });
});
</script>
@endpush

@push('styles')
<style>
.card {
    border-radius: 15px;
    border: 1px solid rgba(196, 168, 130, 0.2);
}

.form-control:focus {
    border-color: var(--wa3y-green);
    box-shadow: 0 0 0 0.2rem rgba(45, 94, 58, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, var(--wa3y-green), var(--wa3y-teal));
    border: none;
    border-radius: 10px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(45, 94, 58, 0.3);
}

.input-group-text {
    background: #f8f9fa;
    border-color: #dee2e6;
}

.form-control-color {
    border-radius: 8px 0 0 8px;
}

.form-check-input:checked {
    background-color: var(--wa3y-green);
    border-color: var(--wa3y-green);
}

.form-label {
    color: var(--wa3y-dark);
    margin-bottom: 0.5rem;
}

.form-text {
    font-size: 0.875rem;
    color: #6c757d;
}

.alert-info {
    background-color: rgba(13, 202, 240, 0.1);
    border-color: rgba(13, 202, 240, 0.2);
    color: #0c5460;
}
</style>
@endpush
