@extends('layouts.admin')

@section('title', 'إضافة مقال جديد')

@section('content')
<!-- Page Header -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom border-2" style="border-color: var(--wa3y-green) !important;">
    <h1 class="h2 mb-0 fw-bold" style="color: var(--wa3y-green);">
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--wa3y-gold), var(--wa3y-green)); border-radius: 16px;">
                <i class="fas fa-plus text-white"></i>
            </div>
            إضافة مقال جديد
        </div>
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.articles') }}" class="btn btn-outline-primary" style="border-color: var(--wa3y-green); color: var(--wa3y-green);">
            <i class="fas fa-arrow-left ml-2"></i>
            العودة للقائمة
        </a>
    </div>
</div>

<!-- Form -->
<div class="admin-card rounded-lg p-4" data-aos="fade-up">
    <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data" class="row g-4">
        @csrf
        
        <!-- Title -->
        <div class="col-md-8">
            <div class="mb-4">
                <label class="form-label fw-bold">عنوان المقال <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" required 
                       placeholder="أدخل عنوان المقال..." value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Slug -->
        <div class="col-md-4">
            <div class="mb-4">
                <label class="form-label fw-bold">الرابط المختصر (Slug)</label>
                <input type="text" name="slug" class="form-control" 
                       placeholder="سيتم إنشاؤه تلقائياً" value="{{ old('slug') }}" readonly>
                <small class="text-muted">سيتم إنشاؤه تلقائياً من العنوان</small>
            </div>
        </div>

        <!-- Content -->
        <div class="col-12">
            <div class="mb-4">
                <label class="form-label fw-bold">المحتوى <span class="text-danger">*</span></label>
                <textarea name="body" class="form-control" rows="8" required 
                          placeholder="اكتب محتوى المقال هنا...">{{ old('body') }}</textarea>
                @error('body')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Excerpt -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">موجز المقال</label>
                <textarea name="excerpt" class="form-control" rows="3" 
                          placeholder="موجز قصير للمقال (اختياري)">{{ old('excerpt') }}</textarea>
                <small class="text-muted">سيتم عرضه في صفحة المقالات</small>
                @error('excerpt')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Author -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">المؤلف <span class="text-danger">*</span></label>
                <select name="author_id" class="form-select" required>
                    <option value="">اختر المؤلف</option>
                    @foreach(App\Models\User::where('role', '!=', 'admin')->get() as $user)
                        <option value="{{ $user->id }}" {{ old('author_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->first_name }} {{ $user->last_name }}
                        </option>
                    @endforeach
                </select>
                @error('author_id')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Author Type -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">نوع المؤلف <span class="text-danger">*</span></label>
                <select name="author_type" class="form-select" required>
                    <option value="">اختر النوع</option>
                    <option value="doctor" {{ old('author_type') == 'doctor' ? 'selected' : '' }}>دكتور</option>
                    <option value="psychologist" {{ old('author_type') == 'psychologist' ? 'selected' : '' }}>اخصائي نفسي</option>
                    <option value="other" {{ old('author_type') == 'other' ? 'selected' : '' }}>آخر</option>
                </select>
                @error('author_type')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Image -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">صورة المقال</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">الصيغ المسموحة: JPG, PNG, GIF, WebP (الحد الأقصى: 2MB)</small>
                @error('image')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
                @if(old('image'))
                    <div class="text-info small mt-1">
                        <i class="fas fa-info-circle ml-1"></i> تم رفع صورة بالفعل
                    </div>
                @endif
            </div>
        </div>

        <!-- Category -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">التصنيف</label>
                <input type="text" name="category" class="form-control" 
                       placeholder="مثال: علم النفس، الإدمان..." value="{{ old('category') }}">
                <small class="text-muted">يمكنك إضافة أكثر من تصنيف مفصول بفاصلة</small>
                @error('category')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Tags -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">الكلمات الدلالية (Tags)</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-tags"></i>
                    </span>
                    <input type="text" name="tags" class="form-control" 
                           placeholder="مثال: برمجة, Laravel, PHP" value="{{ old('tags') }}">
                </div>
                <small class="text-muted">
                    <i class="fas fa-info-circle ml-1"></i>
                    افصل بين الكلمات بفاصلة (،) أو (,)
                </small>
                @error('tags')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
                @if(old('tags'))
                    <div class="text-info small mt-2">
                        <i class="fas fa-lightbulb ml-1"></i>
                        الكلمات التي ستتم إضافتها:
                        <div class="mt-1">
                            @php
                                $tags = array_map('trim', explode(',', old('tags')));
                                $tags = array_filter($tags, function($tag) { return !empty($tag); });
                            @endphp
                            @foreach($tags as $tag)
                                <span class="badge bg-primary me-1">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Size -->
        <div class="col-md-4">
            <div class="mb-4">
                <label class="form-label fw-bold">حجم المقال <span class="text-danger">*</span></label>
                <select name="size" class="form-select" required>
                    <option value="">اختر الحجم</option>
                    <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>صغير</option>
                    <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>متوسط</option>
                    <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>كبير</option>
                </select>
                @error('size')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Published Status -->
        <div class="col-md-4">
            <div class="mb-4">
                <label class="form-label fw-bold">حالة النشر</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_published" value="1" 
                           {{ old('is_published') ? 'checked' : '' }} id="is_published">
                    <label class="form-check-label" for="is_published">
                        <span class="form-check-toggle"></span>
                        <span class="form-check-text">منشور الآن</span>
                    </label>
                </div>
                <small class="text-muted">سيتم عرض المقال فوراً في الموقع</small>
            </div>
        </div>

        <!-- Featured Status -->
        <div class="col-md-4">
            <div class="mb-4">
                <label class="form-label fw-bold">مميز</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" 
                           {{ old('is_featured') ? 'checked' : '' }} id="is_featured">
                    <label class="form-check-label" for="is_featured">
                        <span class="form-check-toggle"></span>
                        <span class="form-check-text">مقال مميز</span>
                    </label>
                </div>
                <small class="text-muted">سيتم عرض المقال في قسم المقالات المميزة</small>
            </div>
        </div>

        <!-- Published At -->
        <div class="col-md-4">
            <div class="mb-4">
                <label class="form-label fw-bold">تاريخ النشر</label>
                <input type="datetime-local" name="published_at" class="form-control" 
                       value="{{ old('published_at') ?: now()->format('Y-m-d\TH:i') }}">
                <small class="text-muted">اترك فارغاً للنشر الفوري</small>
                @error('published_at')
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Form Actions -->
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center pt-4 border-top">
                <div>
                    <a href="{{ route('admin.articles') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times ml-2"></i>
                        إلغاء
                    </a>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-save ml-2"></i>
                        حفظ المقال
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
