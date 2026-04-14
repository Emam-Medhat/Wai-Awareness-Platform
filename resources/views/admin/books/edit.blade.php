@extends('layouts.admin')

@push('styles')
<style>
.edit-hero {
    background: linear-gradient(135deg, #2D5E3A 0%, #3A7D6E 100%);
    color: white;
    padding: 2rem 0;
    margin: -1.5rem -1.5rem 2rem -1.5rem;
    border-radius: 0 0 1rem 1rem;
}

.form-card {
    background: white;
    border-radius: 1rem;
    border: 1px solid #e9ecef;
    box-shadow: 0 10px 30px rgba(45, 94, 58, 0.15);
    overflow: hidden;
}

.section-title {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    color: #2D5E3A;
    padding: 1rem 1.5rem;
    font-weight: 700;
    font-size: 1.1rem;
    margin: -1.5rem -1.5rem 1.5rem -1.5rem;
    border-bottom: 3px solid #2D5E3A;
}

.form-control, .form-select {
    border-radius: 0.5rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.form-control:focus, .form-select:focus {
    border-color: #2D5E3A;
    box-shadow: 0 0 0 0.2rem rgba(45, 94, 58, 0.25);
    transform: translateY(-2px);
}

.form-label {
    font-weight: 700;
    color: #2D5E3A;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.btn-primary-custom {
    background: linear-gradient(135deg, #2D5E3A, #3A7D6E);
    border: none;
    border-radius: 0.5rem;
    font-weight: 700;
    padding: 0.75rem 2rem;
    transition: all 0.3s ease;
}

.btn-primary-custom:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(45, 94, 58, 0.3);
}

.btn-secondary-custom {
    background: linear-gradient(135deg, #6c757d, #495057);
    border: none;
    border-radius: 0.5rem;
    font-weight: 700;
    padding: 0.75rem 2rem;
    transition: all 0.3s ease;
}

.btn-secondary-custom:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(108, 117, 125, 0.3);
}

.form-switch .form-check-input {
    width: 3rem;
    height: 1.5rem;
    background-color: #e9ecef;
    border: 2px solid #dee2e6;
}

.form-switch .form-check-input:checked {
    background-color: #2D5E3A;
    border-color: #2D5E3A;
}

.form-switch .form-check-input:checked::after {
    background-color: white;
    transform: translateX(1.25rem);
}

.file-upload {
    border: 2px dashed #dee2e6;
    border-radius: 0.5rem;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    background: linear-gradient(145deg, #f8f9fa, #ffffff);
}

.file-upload:hover {
    border-color: #2D5E3A;
    background: linear-gradient(145deg, #ffffff, #f8f9fa);
    transform: translateY(-2px);
}

.file-upload input[type="file"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.file-upload-icon {
    font-size: 3rem;
    color: #2D5E3A;
    margin-bottom: 1rem;
}

.current-file {
    background: linear-gradient(135deg, #e8f5e8, #d4edda);
    border: 1px solid #c3e6cb;
    border-radius: 0.5rem;
    padding: 1rem;
    margin-top: 1rem;
}

.current-file img {
    max-width: 100px;
    max-height: 140px;
    border-radius: 0.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.form-text {
    font-size: 0.85rem;
    color: #6c757d;
    margin-top: 0.5rem;
}

.invalid-feedback {
    font-weight: 600;
    color: #dc3545;
    margin-top: 0.5rem;
}

.stats-grid {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    border-radius: 1rem;
    border: 1px solid #e9ecef;
    padding: 1.5rem;
    margin-bottom: 2rem;
}

.stat-item {
    text-align: center;
    padding: 1rem;
    border-radius: 0.5rem;
    background: white;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(45, 94, 58, 0.2);
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 900;
    color: #2D5E3A;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.8rem;
    color: #6c757d;
    font-weight: 600;
}

@media (max-width: 768px) {
    .edit-hero {
        margin: -1rem -1rem 1rem -1rem;
        padding: 1.5rem 0;
    }
    
    .section-title {
        font-size: 1rem;
        padding: 0.75rem 1rem;
    }
    
    .btn-primary-custom, .btn-secondary-custom {
        padding: 0.5rem 1.5rem;
        font-size: 0.9rem;
    }
    
    .stats-grid {
        padding: 1rem;
    }
    
    .stat-number {
        font-size: 1.2rem;
    }
}
</style>
@endpush

@section('title', 'تعديل الكتاب: ' . $book->title)

@section('content')
<!-- Hero Section -->
<div class="edit-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="fas fa-edit me-3"></i>تعديل الكتاب
                </h1>
                <p class="lead mb-0">
                    تعديل بيانات الكتاب: <strong>{{ $book->title }}</strong>
                </p>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('admin.books.show', $book->id) }}" class="btn btn-light btn-lg me-2">
                    <i class="fas fa-eye me-2"></i> عرض
                </a>
                <a href="{{ route('admin.books.index') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-arrow-left me-2"></i> العودة
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Book Stats -->
<div class="stats-grid">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="stat-item">
                <div class="stat-number">{{ number_format($book->views) }}</div>
                <div class="stat-label">المشاهدات</div>
            </div>
                                <div class="col-md-3 mb-3">
            <div class="stat-item">
                <div class="stat-number">{{ number_format($book->download_count) }}</div>
                <div class="stat-label">التحميلات</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-item">
                <div class="stat-number">{{ $book->rating }}/5</div>
                <div class="stat-label">التقييم</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-item">
                <div class="stat-number">{{ $book->rating_count }}</div>
                <div class="stat-label">عدد المقيمين</div>
            </div>
        </div>
    </div>
<!-- Submit Buttons -->
<div class="row">
    <div class="col-12">
        <div class="d-flex gap-3 justify-content-center">
            <button type="submit" class="btn btn-primary-custom btn-lg">
                <i class="fas fa-save me-2"></i> تحديث الكتاب
            </button>
            <a href="{{ route('admin.books.index') }}" class="btn btn-secondary-custom btn-lg">
                <i class="fas fa-times me-2"></i> إلغاء
            </a>
            <a href="{{ route('admin.books.show', $book->id) }}" class="btn btn-info btn-lg">
                <i class="fas fa-eye me-2"></i> عرض
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// File upload preview
document.getElementById('cover_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const uploadContent = this.parentElement.querySelector('.file-upload-content');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            uploadContent.innerHTML = `
                <img src="${e.target.result}" style="max-width: 100%; max-height: 200px; border-radius: 0.5rem;" alt="Preview">
                <p class="mb-0 fw-bold mt-2">${file.name}</p>
                <small class="text-muted">الحجم: ${(file.size / 1024 / 1024).toFixed(2)} MB</small>
            `;
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('pdf_file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const uploadContent = this.parentElement.querySelector('.file-upload-content');
    
    if (file) {
        uploadContent.innerHTML = `
            <i class="fas fa-file-pdf file-upload-icon"></i>
            <p class="mb-0 fw-bold">${file.name}</p>
            <small class="text-muted">الحجم: ${(file.size / 1024 / 1024).toFixed(2)} MB</small>
        `;
    }
});

// File size validation
document.getElementById('cover_image').addEventListener('change', function() {
    const file = this.files[0];
    if (file && file.size > 2 * 1024 * 1024) {
        alert('حجم الصورة يجب أن لا يتجاوز 2MB');
        this.value = '';
    }
});

document.getElementById('pdf_file').addEventListener('change', function() {
    const file = this.files[0];
    if (file && file.size > 10 * 1024 * 1024) {
        alert('حمل ملف PDF يجب أن لا يتجاوز 10MB');
        this.value = '';
    }
});
</script>
@endpush
@endsection
