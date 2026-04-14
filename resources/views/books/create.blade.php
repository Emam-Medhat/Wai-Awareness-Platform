@extends('layouts.app')
@section('title', 'إضافة كتاب جديد')

@section('content')

<style>
  /* ══ WA3Y ADD BOOK PAGE ══════════════════════════════════════════ */

  /* ── CSS Variables ── */
  :root {
    --wa3y-green: #2D5E3A;
    --wa3y-green-dark: #1e3f27;
    --wa3y-green-mid: #3d7a4e;
    --wa3y-teal: #3A7D6E;
    --wa3y-gold: #C4A882;
    --wa3y-gold-dark: #a8885e;
    --wa3y-gold-light: #d4bfa0;
    --wa3y-cream: #F0EFEC;
    --wa3y-cream-dark: #e5e3de;
    --wa3y-white: #ffffff;
    --wa3y-text-dark: #1a2e20;
    --wa3y-text-mid: #4a5e50;
    --wa3y-text-light: #7a8e80;
  }

  /* ── Hero ── */
  .add-book-hero {
    background: linear-gradient(135deg, var(--wa3y-green) 0%, var(--wa3y-teal) 100%);
    padding: 4rem 0 3rem;
    position: relative; overflow: hidden;
  }

  .add-book-hero::before {
    content: '';
    position: absolute; inset: 0;
    background-image: radial-gradient(circle, rgba(196,168,130,0.1) 1px, transparent 1px);
    background-size: 28px 28px;
  }

  .add-book-hero::after {
    content: '';
    position: absolute;
    bottom: -2px; left: 0; right: 0; height: 60px;
    background: var(--wa3y-cream);
    clip-path: ellipse(55% 100% at 50% 100%);
  }

  .hero-title-add {
    font-size: 2.5rem; font-weight: 900;
    color: #fff; line-height: 1.1; margin-bottom: 1rem;
  }

  .hero-subtitle-add {
    font-size: 1.1rem; color: rgba(255,255,255,0.9);
    margin-bottom: 0;
  }

  /* ── Form Container ── */
  .add-book-container {
    max-width: 900px; margin: 0 auto;
    background: var(--wa3y-white);
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-top: -30px;
    position: relative; z-index: 10;
  }

  .form-card {
    padding: 2rem;
  }

  .form-header {
    text-align: center; margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid var(--wa3y-cream);
  }

  .form-header-icon {
    width: 60px; height: 60px;
    background: linear-gradient(135deg, var(--wa3y-green), var(--wa3y-teal));
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 1rem;
    color: white; font-size: 1.5rem;
  }

  .form-header h2 {
    color: var(--wa3y-text-dark);
    font-size: 1.5rem; font-weight: 700;
    margin: 0;
  }

  /* ── Form Elements ── */
  .form-label-custom {
    display: block; margin-bottom: 0.5rem;
    color: var(--wa3y-text-dark);
    font-weight: 600; font-size: 0.9rem;
  }

  .form-label-custom .required {
    color: #e74c3c; margin-right: 4px;
  }

  .form-control-custom {
    width: 100%; padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background: var(--wa3y-white);
  }

  .form-control-custom:focus {
    border-color: var(--wa3y-green);
    box-shadow: 0 0 0 0.2rem rgba(45,94,58,0.1);
    outline: none;
  }

  .form-control-custom.is-invalid {
    border-color: #e74c3c;
    background-color: #fdf2f2;
  }

  .textarea-custom {
    resize: vertical; min-height: 120px;
  }

  .select-custom {
    cursor: pointer;
  }

  /* ── File Upload ── */
  .file-upload-area {
    border: 2px dashed #dee2e6;
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #f8f9fa;
  }

  .file-upload-area:hover {
    border-color: var(--wa3y-green);
    background: rgba(45,94,58,0.05);
  }

  .file-upload-area.dragover {
    border-color: var(--wa3y-green);
    background: rgba(45,94,58,0.1);
    transform: scale(1.02);
  }

  .file-upload-icon {
    font-size: 2rem; color: var(--wa3y-text-mid);
    margin-bottom: 0.5rem;
  }

  .file-upload-text {
    color: var(--wa3y-text-dark);
    font-weight: 600; margin-bottom: 0.25rem;
  }

  .file-upload-hint {
    color: var(--wa3y-text-light);
    font-size: 0.85rem;
  }

  .file-preview {
    margin-top: 1rem;
    text-align: center;
  }

  .preview-image {
    max-width: 200px; max-height: 200px;
    border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .preview-file {
    display: inline-flex; align-items: center;
    gap: 0.5rem; padding: 0.5rem 1rem;
    background: var(--wa3y-cream);
    border-radius: 8px; font-size: 0.9rem;
    color: var(--wa3y-text-dark);
  }

  /* ── Buttons ── */
  .btn-submit {
    background: linear-gradient(135deg, var(--wa3y-green), var(--wa3y-teal));
    color: white; border: none;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600; font-size: 1rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
  }

  .btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(45,94,58,0.3);
    color: white;
  }

  .btn-cancel {
    background: var(--wa3y-cream);
    color: var(--wa3y-text-dark);
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600; font-size: 1rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
  }

  .btn-cancel:hover {
    background: var(--wa3y-cream-dark);
    transform: translateY(-2px);
    color: var(--wa3y-text-dark);
  }

  /* ── Responsive ── */
  @media (max-width: 768px) {
    .hero-title-add {
      font-size: 2rem;
    }
    
    .form-card {
      padding: 1.5rem;
    }
    
    .btn-submit, .btn-cancel {
      display: block; width: 100%;
      margin: 0.5rem 0;
    }
  }
</style>

<!-- ── Hero Section ── -->
<div class="add-book-hero">
  <div class="container text-center position-relative">
    <h1 class="hero-title-add">إضافة كتاب جديد</h1>
    <p class="hero-subtitle-add">شارك معرفتك وخبراتك مع الآخرين</p>
  </div>
</div>

{{-- ── MAIN FORM ── --}}
<div class="container mb-5">
  <div class="add-book-container">
    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" id="addBookForm">
      @csrf

      <div class="form-card">
        {{-- Form Header --}}
        <div class="form-header">
          <div class="form-header-icon">
            <i class="bi bi-book-plus"></i>
          </div>
          <h2>معلومات الكتاب</h2>
        </div>

        <div class="row g-4">
          <div class="col-lg-8">
            <label class="form-label-custom">
              <span class="required">*</span> عنوان الكتاب
            </label>
            <input type="text" name="title" class="form-control-custom" 
                   placeholder="أدخل عنوان الكتاب" required>
            @error('title')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-lg-4">
            <label class="form-label-custom">
              <span class="required">*</span> اللغة
            </label>
            <select name="language" class="form-control-custom select-custom">
              <option value="ar" selected>العربية</option>
              <option value="en">English</option>
            </select>
            @error('language')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row g-4 mt-3">
          <div class="col-lg-6">
            <label class="form-label-custom">
              <span class="required">*</span> اسم المؤلف
            </label>
            <input type="text" name="author_name" class="form-control-custom" 
                   placeholder="اسم المؤلف" required>
            @error('author_name')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-lg-6">
            <label class="form-label-custom">
              لقب المؤلف
            </label>
            <input type="text" name="author_title" class="form-control-custom" 
                   placeholder="مثال: دكتور، مهندس، أستاذ">
            @error('author_title')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row g-4 mt-3">
          <div class="col-lg-4">
            <label class="form-label-custom">
              <span class="required">*</span> التصنيف
            </label>
            <select name="category" class="form-control-custom select-custom" required>
              <option value="">اختر التصنيف</option>
              @foreach($categories as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
              @endforeach
            </select>
            @error('category')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-lg-4">
            <label class="form-label-custom">
              الحجم
            </label>
            <select name="size" class="form-control-custom select-custom">
              <option value="small">صغير</option>
              <option value="medium" selected>متوسط</option>
              <option value="large">كبير</option>
            </select>
            @error('size')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-lg-4">
            <label class="form-label-custom">
              ISBN
            </label>
            <input type="text" name="isbn" class="form-control-custom" 
                   placeholder="رقم ISBN">
            @error('isbn')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row g-4 mt-3">
          <div class="col-lg-6">
            <label class="form-label-custom">
              عدد الصفحات
            </label>
            <input type="number" name="pages" class="form-control-custom" 
                   placeholder="عدد الصفحات" min="1">
            @error('pages')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-lg-6">
            <label class="form-label-custom">
              تاريخ النشر
            </label>
            <input type="date" name="publication_date" class="form-control-custom">
            @error('publication_date')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label-custom">
            <span class="required">*</span> وصف الكتاب
          </label>
          <textarea name="description" class="form-control-custom textarea-custom" 
                    placeholder="اكتب وصفاً شاملاً للكتاب..." rows="5" required></textarea>
          @error('description')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
          <label class="form-label-custom">
            <span class="required">*</span> محتوى الكتاب
          </label>
          <textarea name="content" class="form-control-custom textarea-custom" 
                    placeholder="اكتب المحتوى الرئيسي للكتاب..." rows="8" required></textarea>
          @error('content')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
          <label class="form-label-custom">
            الكلمات المفتاحية
          </label>
          <input type="text" name="tags" class="form-control-custom" 
                   placeholder="اكتب كلمات مفتاحية مفصولة بفاصلة">
          @error('tags')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- File Uploads -->
        <div class="row g-4">
          <div class="col-lg-6">
            <label class="form-label-custom">
              <span class="required">*</span> غلاف الكتاب
            </label>
            <div class="file-upload-area" onclick="document.getElementById('cover_image').click()">
              <div class="file-upload-icon">
                <i class="bi bi-cloud-upload"></i>
              </div>
              <div class="file-upload-text">اختر غلاف الكتاب</div>
              <div class="file-upload-hint">PNG, JPG أو GIF (الحجم الأقصى: 5MB)</div>
              <input type="file" name="cover_image" id="cover_image" class="d-none" 
                     accept="image/*" onchange="previewFile(this, 'cover')">
              <div id="cover-preview" class="file-preview"></div>
            </div>
            @error('cover_image')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-lg-6">
            <label class="form-label-custom">
              ملف الكتاب (PDF)
            </label>
            <div class="file-upload-area" onclick="document.getElementById('book_file').click()">
              <div class="file-upload-icon">
                <i class="bi bi-file-earmark-pdf"></i>
              </div>
              <div class="file-upload-text">اختر ملف PDF</div>
              <div class="file-upload-hint">PDF فقط (الحجم الأقصى: 50MB)</div>
              <input type="file" name="book_file" id="book_file" class="d-none" 
                     accept="application/pdf" onchange="previewFile(this, 'book')">
              <div id="book-preview" class="file-preview"></div>
            </div>
            @error('book_file')
              <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Options -->
        <div class="row g-4 mt-4">
          <div class="col-md-6">
            <div class="form-check">
              <input type="checkbox" name="featured" class="form-check-input" 
                     id="featured" value="1">
              <label class="form-check-label" for="featured">
                عرض الكتاب في قسم الكتب المميزة
              </label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-check">
              <input type="checkbox" name="published" class="form-check-input" 
                     id="published" value="1" checked>
              <label class="form-check-label" for="published">
                نشر الكتاب فوراً
              </label>
            </div>
          </div>
        </div>

        <!-- Submit Buttons -->
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-submit btn-lg me-3">
            <i class="bi bi-check-circle me-2"></i>
            نشر الكتاب
          </button>
          <a href="{{ route('books') }}" class="btn btn-cancel btn-lg">
            <i class="bi bi-x-circle me-2"></i>
            إلغاء
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
// File preview functionality
function previewFile(input, type) {
  const preview = document.getElementById(type + '-preview');
  
  if (input.files && input.files[0]) {
    const file = input.files[0];
    const fileName = file.name;
    const fileSize = (file.size / 1024 / 1024).toFixed(2);
    
    let iconHtml = '';
    if (type === 'cover') {
      iconHtml = '<div class="file-preview-icon"><i class="bi bi-image"></i></div>';
    } else {
      iconHtml = '<div class="file-preview-icon" style="background: #e74c3c"><i class="bi bi-file-pdf"></i></div>';
    }
    
    if (type === 'cover') {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.innerHTML = `<img src="${e.target.result}" class="preview-image" alt="Preview">`;
      };
      reader.readAsDataURL(file);
    } else {
      preview.innerHTML = `<div class="preview-file"><i class="bi bi-file-pdf"></i><span>${fileName}</span></div>`;
    }
  }
}

// Drag and drop functionality
document.addEventListener('DOMContentLoaded', function() {
  console.log('🚀 Page loaded, setting up form...');
  
  const fileAreas = document.querySelectorAll('.file-upload-area');
  
  fileAreas.forEach(area => {
    area.addEventListener('dragover', (e) => {
      e.preventDefault();
      area.classList.add('dragover');
    });
    
    area.addEventListener('dragleave', () => {
      area.classList.remove('dragover');
    });
    
    area.addEventListener('drop', (e) => {
      e.preventDefault();
      area.classList.remove('dragover');
      
      const files = e.dataTransfer.files;
      if (files.length > 0) {
        const input = area.querySelector('input[type="file"]');
        input.files = files;
        input.dispatchEvent(new Event('change'));
      }
    });
  });

  // Form validation
  const form = document.getElementById('addBookForm');
  if (form) {
    console.log('✅ Form found:', form);
    
    form.addEventListener('submit', function(e) {
      console.log('🚀 Form submitted!');
      
      const requiredFields = form.querySelectorAll('[required]');
      let isValid = true;
      let missingFields = [];
      
      // Manual check for cover image since it's not required in HTML
      const coverImage = document.getElementById('cover_image');
      const hasCoverImage = coverImage && coverImage.files && coverImage.files.length > 0;
      
      console.log('📋 Required fields:', requiredFields.length);
      console.log('📷 Cover image check:', hasCoverImage);
      
      requiredFields.forEach(field => {
        if (field.type === 'file') {
          if (!field.files || field.files.length === 0) {
            console.log('❌ Missing file:', field.name);
            field.classList.add('is-invalid');
            isValid = false;
            missingFields.push(field.name);
          } else {
            console.log('✅ File found:', field.name);
            field.classList.remove('is-invalid');
          }
        } else {
          if (!field.value.trim()) {
            console.log('❌ Empty field:', field.name);
            field.classList.add('is-invalid');
            isValid = false;
            missingFields.push(field.name);
          } else {
            console.log('✅ Field filled:', field.name);
            field.classList.remove('is-invalid');
          }
        }
      });
      
      // Check cover image separately
      if (!hasCoverImage) {
        console.log('❌ Cover image missing');
        isValid = false;
        missingFields.push('cover_image (غلاف الكتاب)');
        // Add visual indicator
        const uploadArea = document.querySelector('.file-upload-area');
        if (uploadArea) {
          uploadArea.style.borderColor = '#e74c3c';
          uploadArea.style.backgroundColor = '#fdf2f2';
        }
      } else {
        console.log('✅ Cover image found');
        // Remove visual indicator
        const uploadArea = document.querySelector('.file-upload-area');
        if (uploadArea) {
          uploadArea.style.borderColor = '';
          uploadArea.style.backgroundColor = '';
        }
      }
      
      if (!isValid) {
        console.log('❌ Form has errors:', missingFields);
        e.preventDefault();
        alert('يرجى ملء جميع الحقول المطلوبة:\n' + missingFields.join('\n'));
      } else {
        console.log('✅ Form is valid, submitting...');
      }
    });
  } else {
    console.error('❌ Form not found!');
  }
});
</script>
@endsection
