<?php $__env->startSection('title', 'إضافة كتاب جديد'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.create-hero {
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

@media (max-width: 768px) {
    .create-hero {
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
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="create-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="fas fa-plus-circle me-3"></i>إضافة كتاب جديد
                </h1>
                <p class="lead mb-0">
                    إضافة محتوى جديد للمكتبة الرقمية منصة وعي
                </p>
            </div>
            <div class="col-md-4 text-end">
                <a href="<?php echo e(route('admin.books.index')); ?>" class="btn btn-light btn-lg">
                    <i class="fas fa-arrow-left me-2"></i> العودة للكتب
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="form-card">
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.books.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <!-- Basic Information -->
            <div class="row mb-5">
                <div class="col-12">
                    <h5 class="section-title">
                        <i class="fas fa-info-circle me-2"></i>المعلومات الأساسية
                    </h5>
                </div>
                
                <div class="col-md-6 mb-4">
                    <label for="title" class="form-label">
                        <i class="fas fa-heading me-2"></i>عنوان الكتاب <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="title" 
                           name="title" 
                           value="<?php echo e(old('title')); ?>"
                           placeholder="أدخل عنوان الكتاب"
                           required>
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="author_name" class="form-label">
                        <i class="fas fa-user me-2"></i>اسم المؤلف <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           class="form-control <?php $__errorArgs = ['author_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="author_name" 
                           name="author_name" 
                           value="<?php echo e(old('author_name')); ?>"
                           placeholder="اسم المؤلف"
                           required>
                    <?php $__errorArgs = ['author_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="isbn" class="form-label">
                        <i class="fas fa-barcode me-2"></i>رقم ISBN
                    </label>
                    <input type="text" 
                           class="form-control <?php $__errorArgs = ['isbn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="isbn" 
                           name="isbn" 
                           value="<?php echo e(old('isbn')); ?>"
                           placeholder="978-0-123456-78-9">
                    <?php $__errorArgs = ['isbn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="publisher" class="form-label">
                        <i class="fas fa-building me-2"></i>الناشر
                    </label>
                    <input type="text" 
                           class="form-control <?php $__errorArgs = ['publisher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="publisher" 
                           name="publisher" 
                           value="<?php echo e(old('publisher')); ?>"
                           placeholder="اسم الناشر">
                    <?php $__errorArgs = ['publisher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4 mb-4">
                    <label for="pages" class="form-label">
                        <i class="fas fa-file-alt me-2"></i>عدد الصفحات
                    </label>
                    <input type="number" 
                           class="form-control <?php $__errorArgs = ['pages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="pages" 
                           name="pages" 
                           value="<?php echo e(old('pages')); ?>"
                           placeholder="250"
                           min="1">
                    <?php $__errorArgs = ['pages'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4 mb-4">
                    <label for="language" class="form-label">
                        <i class="fas fa-language me-2"></i>اللغة
                    </label>
                    <select class="form-select <?php $__errorArgs = ['language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            id="language" 
                            name="language">
                        <option value="">اختر اللغة</option>
                        <option value="ar" <?php echo e(old('language') == 'ar' ? 'selected' : ''); ?>>العربية</option>
                        <option value="en" <?php echo e(old('language') == 'en' ? 'selected' : ''); ?>>English</option>
                    </select>
                    <?php $__errorArgs = ['language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4 mb-4">
                    <label for="published_year" class="form-label">
                        <i class="fas fa-calendar me-2"></i>سنة النشر
                    </label>
                    <input type="number" 
                           class="form-control <?php $__errorArgs = ['published_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="published_year" 
                           name="published_year" 
                           value="<?php echo e(old('published_year')); ?>"
                           placeholder="2024"
                           min="1900"
                           max="<?php echo e(date('Y')); ?>">
                    <?php $__errorArgs = ['published_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="category" class="form-label">
                        <i class="fas fa-folder me-2"></i>التصنيف <span class="text-danger">*</span>
                    </label>
                    <select class="form-select <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            id="category" 
                            name="category"
                            required>
                        <option value="">اختر التصنيف</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>" <?php echo e(old('category') == $value ? 'selected' : ''); ?>>
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="size" class="form-label">
                        <i class="fas fa-expand me-2"></i>حجم الكتاب
                    </label>
                    <select class="form-select <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            id="size" 
                            name="size">
                        <option value="">اختر الحجم</option>
                        <option value="small" <?php echo e(old('size') == 'small' ? 'selected' : ''); ?>>صغير</option>
                        <option value="medium" <?php echo e(old('size') == 'medium' ? 'selected' : ''); ?>>متوسط</option>
                        <option value="large" <?php echo e(old('size') == 'large' ? 'selected' : ''); ?>>كبير</option>
                    </select>
                    <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Description -->
            <div class="row mb-5">
                <div class="col-12">
                    <h5 class="section-title">
                        <i class="fas fa-align-left me-2"></i>الوصف
                    </h5>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">
                        <i class="fas fa-info me-2"></i>وصف الكتاب <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                              id="description" 
                              name="description" 
                              rows="4"
                              placeholder="اكتب وصفاً شاملاً للكتاب..."
                              required><?php echo e(old('description')); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Content -->
            <div class="row mb-5">
                <div class="col-12">
                    <h5 class="section-title">
                        <i class="fas fa-file-alt me-2"></i>المحتوى
                    </h5>
                </div>
                <div class="col-12">
                    <label for="content" class="form-label">
                        <i class="fas fa-file-text me-2"></i>محتوى الكتاب
                    </label>
                    <textarea class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                              id="content" 
                              name="content" 
                              rows="8"
                              placeholder="اكتب محتوى الكتاب هنا..."><?php echo e(old('content')); ?></textarea>
                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Files -->
            <div class="row mb-5">
                <div class="col-12">
                    <h5 class="section-title">
                        <i class="fas fa-cloud-upload-alt me-2"></i>الملفات
                    </h5>
                </div>
                
                <div class="col-md-6 mb-4">
                    <label for="cover_image" class="form-label">
                        <i class="fas fa-image me-2"></i>صورة الغلاف
                    </label>
                    <div class="file-upload position-relative">
                        <input type="file" 
                               class="form-control <?php $__errorArgs = ['cover_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               id="cover_image" 
                               name="cover_image" 
                               accept="image/*">
                        <div class="file-upload-content">
                            <i class="fas fa-image file-upload-icon"></i>
                            <p class="mb-0 fw-bold">اختر صورة الغلاف</p>
                            <p class="mb-0 text-muted">أو اسحب وأفلت الصورة هنا</p>
                            <small class="form-text">صيغ مدعومة: JPG, PNG, GIF. الحجم الأقصى: 2MB</small>
                        </div>
                    </div>
                    <?php $__errorArgs = ['cover_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="pdf_file" class="form-label">
                        <i class="fas fa-file-pdf me-2"></i>ملف PDF
                    </label>
                    <div class="file-upload position-relative">
                        <input type="file" 
                               class="form-control <?php $__errorArgs = ['pdf_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               id="pdf_file" 
                               name="pdf_file" 
                               accept=".pdf">
                        <div class="file-upload-content">
                            <i class="fas fa-file-pdf file-upload-icon"></i>
                            <p class="mb-0 fw-bold">اختر ملف PDF</p>
                            <p class="mb-0 text-muted">أو اسحب وأفلت الملف هنا</p>
                            <small class="form-text">صيغة مدعومة: PDF فقط. الحجم الأقصى: 10MB</small>
                        </div>
                    </div>
                    <?php $__errorArgs = ['pdf_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Tags -->
            <div class="row mb-5">
                <div class="col-12">
                    <h5 class="section-title">
                        <i class="fas fa-tags me-2"></i>الكلمات المفتاحية
                    </h5>
                </div>
                <div class="col-12">
                    <label for="tags" class="form-label">
                        <i class="fas fa-key me-2"></i>الكلمات المفتاحية
                    </label>
                    <input type="text" 
                           class="form-control <?php $__errorArgs = ['tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           id="tags" 
                           name="tags" 
                           value="<?php echo e(old('tags')); ?>"
                           placeholder="علم النفس, تطوير الذات, الصحة النفسية">
                    <?php $__errorArgs = ['tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <small class="form-text">افصل بين الكلمات بفاصلة (,)</small>
                </div>
            </div>

            <!-- Publication Options -->
            <div class="row mb-5">
                <div class="col-12">
                    <h5 class="section-title">
                        <i class="fas fa-cog me-2"></i>خيارات النشر
                    </h5>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input <?php $__errorArgs = ['is_published'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               type="checkbox" 
                               id="is_published" 
                               name="is_published" 
                               value="1"
                               <?php echo e(old('is_published') ? 'checked' : ''); ?>>
                        <label class="form-check-label fw-bold" for="is_published">
                            <i class="fas fa-globe me-2"></i>منشور
                        </label>
                    </div>
                    <?php $__errorArgs = ['is_published'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input <?php $__errorArgs = ['is_featured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               type="checkbox" 
                               id="is_featured" 
                               name="is_featured" 
                               value="1"
                               <?php echo e(old('is_featured') ? 'checked' : ''); ?>>
                        <label class="form-check-label fw-bold" for="is_featured">
                            <i class="fas fa-star me-2"></i>كتاب مميز
                        </label>
                    </div>
                    <?php $__errorArgs = ['is_featured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="row">
                <div class="col-12">
                    <div class="d-flex gap-3 justify-content-center">
                        <button type="submit" class="btn btn-primary-custom btn-lg">
                            <i class="fas fa-save me-2"></i> حفظ الكتاب
                        </button>
                        <a href="<?php echo e(route('admin.books.index')); ?>" class="btn btn-secondary-custom btn-lg">
                            <i class="fas fa-times me-2"></i> إلغاء
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\admin\books\create.blade.php ENDPATH**/ ?>