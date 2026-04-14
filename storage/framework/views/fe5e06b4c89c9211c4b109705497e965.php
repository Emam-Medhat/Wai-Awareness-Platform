<?php $__env->startSection('title', 'إدارة المقالات'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Header -->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom border-2" style="border-color: var(--wa3y-green) !important;">
    <h1 class="h2 mb-0 fw-bold" style="color: var(--wa3y-green);">
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--wa3y-gold), var(--wa3y-green)); border-radius: 16px;">
                <i class="fas fa-newspaper text-white"></i>
            </div>
            إدارة المقالات
        </div>
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('admin.articles.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus ml-2"></i>
            إضافة مقال جديد
        </a>
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-primary" style="border-color: var(--wa3y-green); color: var(--wa3y-green);">
                <i class="fas fa-download ml-2"></i>
                تصدير الكل
            </button>
        </div>
    </div>
</div>

<!-- Search and Filters -->
<div class="admin-card rounded-lg p-4 mb-4" data-aos="fade-up">
    <form method="GET" action="<?php echo e(route('admin.articles')); ?>" class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-bold">البحث</label>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="ابحث في العناوين أو المحتوى..." value="<?php echo e(request('search')); ?>">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        
        <div class="col-md-3">
            <label class="form-label fw-bold">التصنيف</label>
            <select name="category" class="form-select">
                <option value="">جميع التصنيفات</option>
                <option value="psychology" <?php echo e(request('category') == 'psychology' ? 'selected' : ''); ?>>علم النفس</option>
                <option value="addiction" <?php echo e(request('category') == 'addiction' ? 'selected' : ''); ?>>الإدمان</option>
                <option value="relationships" <?php echo e(request('category') == 'relationships' ? 'selected' : ''); ?>>العلاقات</option>
                <option value="self_development" <?php echo e(request('category') == 'self_development' ? 'selected' : ''); ?>>التطوير الذاتي</option>
            </select>
        </div>
        
        <div class="col-md-3">
            <label class="form-label fw-bold">نوع المؤلف</label>
            <select name="author_type" class="form-select">
                <option value="">جميع المؤلفين</option>
                <option value="doctor" <?php echo e(request('author_type') == 'doctor' ? 'selected' : ''); ?>>دكتور</option>
                <option value="psychologist" <?php echo e(request('author_type') == 'psychologist' ? 'selected' : ''); ?>>اخصائي نفسي</option>
                <option value="other" <?php echo e(request('author_type') == 'other' ? 'selected' : ''); ?>>آخر</option>
            </select>
        </div>
        
        <div class="col-md-2">
            <label class="form-label fw-bold">الحالة</label>
            <select name="status" class="form-select">
                <option value="">الكل</option>
                <option value="published" <?php echo e(request('status') == 'published' ? 'selected' : ''); ?>>منشور</option>
                <option value="draft" <?php echo e(request('status') == 'draft' ? 'selected' : ''); ?>>مسودة</option>
                <option value="featured" <?php echo e(request('status') == 'featured' ? 'selected' : ''); ?>>مميز</option>
            </select>
        </div>
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-filter ml-2"></i>
                تطبيق الفلاتر
            </button>
            <a href="<?php echo e(route('admin.articles')); ?>" class="btn btn-outline-secondary">
                <i class="fas fa-redo ml-2"></i>
                إعادة تعيين
            </a>
        </div>
    </form>
</div>

<!-- Articles Table -->
<div class="admin-card rounded-lg p-0 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
    <?php if($articles->count() > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">
                            <input type="checkbox" class="form-check-input" id="selectAll">
                        </th>
                        <th>المقال</th>
                        <th>المؤلف</th>
                        <th>التصنيف</th>
                        <th>الحالة</th>
                        <th>المشاهدات</th>
                        <th>تاريخ النشر</th>
                        <th class="text-center">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input" value="<?php echo e($article->id); ?>">
                        </td>
                        <td>
                            <div class="d-flex align-items-start">
                                <?php if($article->image): ?>
                                    <img src="<?php echo e($article->image_url); ?>" alt="<?php echo e($article->title); ?>" class="me-3 rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="me-3 rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: var(--wa3y-cream);">
                                        <i class="fas fa-newspaper text-muted"></i>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <h6 class="mb-1 fw-bold"><?php echo e(Str::limit($article->title, 60)); ?></h6>
                                    <p class="text-muted small mb-0"><?php echo e(Str::limit($article->excerpt, 80)); ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle me-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: linear-gradient(135deg, var(--wa3y-gold), var(--wa3y-green));">
                                    <i class="fas fa-user text-white" style="font-size: 12px;"></i>
                                </div>
                                <div>
                                    <div class="fw-bold"><?php echo e($article->author->first_name); ?> <?php echo e($article->author->last_name); ?></div>
                                    <small class="text-muted"><?php echo e($article->author_type_label); ?></small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php if($article->category): ?>
                                <span class="badge-primary"><?php echo e($article->category_label); ?></span>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($article->is_published): ?>
                                <span class="badge bg-success text-white">منشور</span>
                            <?php else: ?>
                                <span class="badge bg-secondary text-white">مسودة</span>
                            <?php endif; ?>
                            <?php if($article->is_featured): ?>
                                <span class="badge bg-warning text-white ms-1">
                                    <i class="fas fa-star"></i> مميز
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-eye text-muted me-2"></i>
                                <span><?php echo e(number_format($article->views)); ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="small text-muted">
                                <?php echo e($article->published_at ? $article->published_at->format('Y-m-d H:i') : '-'); ?>

                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo e(route('articles.show', $article)); ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('admin.articles.edit', $article)); ?>" class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="<?php echo e(route('admin.articles.destroy', $article)); ?>" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center p-3 border-top">
            <div class="text-muted">
                عرض <?php echo e($articles->firstItem()); ?> إلى <?php echo e($articles->lastItem()); ?> من <?php echo e($articles->total()); ?> مقال
            </div>
            <?php echo e($articles->links()); ?>

        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--wa3y-cream), var(--wa3y-cream-dark));">
                    <i class="fas fa-newspaper text-muted" style="font-size: 32px;"></i>
                </div>
            </div>
            <h4 class="text-muted mb-3">لا توجد مقالات بعد</h4>
            <p class="text-muted mb-4">ابدأ بإضافة مقالات جديدة لإدارة محتوى الموقع</p>
            <a href="<?php echo e(route('admin.articles.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus ml-2"></i>
                إضافة أول مقال
            </a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\admin\articles\index.blade.php ENDPATH**/ ?>