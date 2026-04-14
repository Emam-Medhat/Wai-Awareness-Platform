<?php $__env->startSection('title', 'إضافة مقال جديد'); ?>

<?php $__env->startSection('content'); ?>
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
        <a href="<?php echo e(route('admin.articles')); ?>" class="btn btn-outline-primary" style="border-color: var(--wa3y-green); color: var(--wa3y-green);">
            <i class="fas fa-arrow-left ml-2"></i>
            العودة للقائمة
        </a>
    </div>
</div>

<!-- Form -->
<div class="admin-card rounded-lg p-4" data-aos="fade-up">
    <form method="POST" action="<?php echo e(route('admin.articles.store')); ?>" enctype="multipart/form-data" class="row g-4">
        <?php echo csrf_field(); ?>
        
        <!-- Title -->
        <div class="col-md-8">
            <div class="mb-4">
                <label class="form-label fw-bold">عنوان المقال <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" required 
                       placeholder="أدخل عنوان المقال..." value="<?php echo e(old('title')); ?>">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Slug -->
        <div class="col-md-4">
            <div class="mb-4">
                <label class="form-label fw-bold">الرابط المختصر (Slug)</label>
                <input type="text" name="slug" class="form-control" 
                       placeholder="سيتم إنشاؤه تلقائياً" value="<?php echo e(old('slug')); ?>" readonly>
                <small class="text-muted">سيتم إنشاؤه تلقائياً من العنوان</small>
            </div>
        </div>

        <!-- Content -->
        <div class="col-12">
            <div class="mb-4">
                <label class="form-label fw-bold">المحتوى <span class="text-danger">*</span></label>
                <textarea name="body" class="form-control" rows="8" required 
                          placeholder="اكتب محتوى المقال هنا..."><?php echo e(old('body')); ?></textarea>
                <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Excerpt -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">موجز المقال</label>
                <textarea name="excerpt" class="form-control" rows="3" 
                          placeholder="موجز قصير للمقال (اختياري)"><?php echo e(old('excerpt')); ?></textarea>
                <small class="text-muted">سيتم عرضه في صفحة المقالات</small>
                <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Author -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">المؤلف <span class="text-danger">*</span></label>
                <select name="author_id" class="form-select" required>
                    <option value="">اختر المؤلف</option>
                    <?php $__currentLoopData = App\Models\User::where('role', '!=', 'admin')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php echo e(old('author_id') == $user->id ? 'selected' : ''); ?>>
                            <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['author_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Author Type -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">نوع المؤلف <span class="text-danger">*</span></label>
                <select name="author_type" class="form-select" required>
                    <option value="">اختر النوع</option>
                    <option value="doctor" <?php echo e(old('author_type') == 'doctor' ? 'selected' : ''); ?>>دكتور</option>
                    <option value="psychologist" <?php echo e(old('author_type') == 'psychologist' ? 'selected' : ''); ?>>اخصائي نفسي</option>
                    <option value="other" <?php echo e(old('author_type') == 'other' ? 'selected' : ''); ?>>آخر</option>
                </select>
                <?php $__errorArgs = ['author_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Image -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">صورة المقال</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">الصيغ المسموحة: JPG, PNG, GIF, WebP (الحد الأقصى: 2MB)</small>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php if(old('image')): ?>
                    <div class="text-info small mt-1">
                        <i class="fas fa-info-circle ml-1"></i> تم رفع صورة بالفعل
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Category -->
        <div class="col-md-6">
            <div class="mb-4">
                <label class="form-label fw-bold">التصنيف</label>
                <input type="text" name="category" class="form-control" 
                       placeholder="مثال: علم النفس، الإدمان..." value="<?php echo e(old('category')); ?>">
                <small class="text-muted">يمكنك إضافة أكثر من تصنيف مفصول بفاصلة</small>
                <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                           placeholder="مثال: برمجة, Laravel, PHP" value="<?php echo e(old('tags')); ?>">
                </div>
                <small class="text-muted">
                    <i class="fas fa-info-circle ml-1"></i>
                    افصل بين الكلمات بفاصلة (،) أو (,)
                </small>
                <?php $__errorArgs = ['tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php if(old('tags')): ?>
                    <div class="text-info small mt-2">
                        <i class="fas fa-lightbulb ml-1"></i>
                        الكلمات التي ستتم إضافتها:
                        <div class="mt-1">
                            <?php
                                $tags = array_map('trim', explode(',', old('tags')));
                                $tags = array_filter($tags, function($tag) { return !empty($tag); });
                            ?>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge bg-primary me-1"><?php echo e($tag); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Size -->
        <div class="col-md-4">
            <div class="mb-4">
                <label class="form-label fw-bold">حجم المقال <span class="text-danger">*</span></label>
                <select name="size" class="form-select" required>
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
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Published Status -->
        <div class="col-md-4">
            <div class="mb-4">
                <label class="form-label fw-bold">حالة النشر</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_published" value="1" 
                           <?php echo e(old('is_published') ? 'checked' : ''); ?> id="is_published">
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
                           <?php echo e(old('is_featured') ? 'checked' : ''); ?> id="is_featured">
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
                       value="<?php echo e(old('published_at') ?: now()->format('Y-m-d\TH:i')); ?>">
                <small class="text-muted">اترك فارغاً للنشر الفوري</small>
                <?php $__errorArgs = ['published_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger small mt-1">
                        <i class="fas fa-exclamation-circle ml-1"></i><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center pt-4 border-top">
                <div>
                    <a href="<?php echo e(route('admin.articles')); ?>" class="btn btn-outline-secondary">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\admin\articles\form.blade.php ENDPATH**/ ?>