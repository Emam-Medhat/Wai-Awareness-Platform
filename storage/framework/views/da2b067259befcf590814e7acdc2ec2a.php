<?php $__env->startSection('title', 'إدارة الكتب'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.books-hero {
    background: linear-gradient(135deg, #2D5E3A 0%, #3A7D6E 100%);
    color: white;
    padding: 2rem 0;
    margin: -1.5rem -1.5rem 2rem -1.5rem;
    border-radius: 0 0 1rem 1rem;
}

.stat-card {
    background: white;
    border-radius: 1rem;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
    overflow: hidden;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(45, 94, 58, 0.2);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.stat-icon.total { background: linear-gradient(135deg, #28a745, #20c997); color: white; }
.stat-icon.published { background: linear-gradient(135deg, #007bff, #6610f2); color: white; }
.stat-icon.featured { background: linear-gradient(135deg, #ffc107, #fd7e14); color: white; }
.stat-icon.views { background: linear-gradient(135deg, #17a2b8, #6f42c1); color: white; }

.stat-number {
    font-size: 2rem;
    font-weight: 900;
    margin-bottom: 0.5rem;
    color: #2D5E3A;
}

.stat-label {
    font-size: 0.9rem;
    color: #6c757d;
    font-weight: 600;
}

.filters-card {
    background: white;
    border-radius: 1rem;
    border: 1px solid #e9ecef;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.form-control, .form-select {
    border-radius: 0.5rem;
    border: 1px solid #dee2e6;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #2D5E3A;
    box-shadow: 0 0 0 0.2rem rgba(45, 94, 58, 0.25);
}

.btn-primary-custom {
    background: linear-gradient(135deg, #2D5E3A, #3A7D6E);
    border: none;
    border-radius: 0.5rem;
    font-weight: 700;
    transition: all 0.3s ease;
}

.btn-primary-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(45, 94, 58, 0.3);
}

.books-table {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.books-table thead {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
}

.books-table th {
    border: none;
    padding: 1rem;
    font-weight: 700;
    color: #2D5E3A;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.books-table td {
    padding: 1rem;
    vertical-align: middle;
    border-bottom: 1px solid #f1f3f4;
}

.books-table tbody tr {
    transition: all 0.3s ease;
}

.books-table tbody tr:hover {
    background-color: rgba(45, 94, 58, 0.05);
    transform: scale(1.01);
}

.book-cover {
    width: 50px;
    height: 70px;
    object-fit: cover;
    border-radius: 0.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

.book-cover:hover {
    transform: scale(1.1);
}

.book-title {
    font-weight: 700;
    color: #2D5E3A;
    margin-bottom: 0.25rem;
}

.book-author {
    font-size: 0.9rem;
    color: #6c757d;
}

.badge-status {
    padding: 0.4rem 0.8rem;
    border-radius: 1rem;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.action-btn {
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.8rem;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.pagination {
    background: white;
    border-radius: 1rem;
    padding: 1rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.pagination .page-link {
    border: none;
    color: #2D5E3A;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: linear-gradient(135deg, #2D5E3A, #3A7D6E);
    color: white;
    transform: translateY(-2px);
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #2D5E3A, #3A7D6E);
    color: white;
}

@media (max-width: 768px) {
    .books-hero {
        margin: -1rem -1rem 1rem -1rem;
        padding: 1.5rem 0;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
    
    .books-table {
        font-size: 0.9rem;
    }
    
    .action-btn {
        padding: 0.4rem 0.6rem;
        font-size: 0.75rem;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="books-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="fas fa-book-open me-3"></i>إدارة الكتب
                </h1>
                <p class="lead mb-0">
                    إدارة محتوى المكتبة الرقمية منصة وعي
                </p>
            </div>
            <div class="col-md-4 text-end">
                <a href="<?php echo e(route('admin.books.create')); ?>" class="btn btn-light btn-lg">
                    <i class="fas fa-plus me-2"></i>إضافة كتاب جديد
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="stat-card p-4 text-center">
            <div class="stat-icon total mx-auto">
                <i class="fas fa-books"></i>
            </div>
            <div class="stat-number"><?php echo e($books->total()); ?></div>
            <div class="stat-label">إجمالي الكتب</div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card p-4 text-center">
            <div class="stat-icon published mx-auto">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-number"><?php echo e(\App\Models\Book::where('is_published', true)->count()); ?></div>
            <div class="stat-label">المنشورة</div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card p-4 text-center">
            <div class="stat-icon featured mx-auto">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-number"><?php echo e(\App\Models\Book::where('is_featured', true)->count()); ?></div>
            <div class="stat-label">المميزة</div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card p-4 text-center">
            <div class="stat-icon views mx-auto">
                <i class="fas fa-eye"></i>
            </div>
            <div class="stat-number"><?php echo e(number_format(\App\Models\Book::sum('views'))); ?></div>
            <div class="stat-label">إجمالي المشاهدات</div>
        </div>
    </div>
</div>

<!-- Filters Card -->
<div class="filters-card p-4 mb-4">
    <form method="GET" action="<?php echo e(route('admin.books.index')); ?>">
        <div class="row align-items-end">
            <div class="col-md-4 mb-3">
                <label for="search" class="form-label fw-bold">
                    <i class="fas fa-search me-2"></i>البحث
                </label>
                <input type="text" 
                       class="form-control" 
                       id="search" 
                       name="search" 
                       value="<?php echo e(request('search')); ?>"
                       placeholder="ابحث عن عنوان، مؤلف، أو ISBN...">
            </div>
            
            <div class="col-md-2 mb-3">
                <label for="category" class="form-label fw-bold">
                    <i class="fas fa-folder me-2"></i>التصنيف
                </label>
                <select class="form-select" id="category" name="category">
                    <option value="">جميع التصنيفات</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value); ?>" <?php echo e(request('category') == $value ? 'selected' : ''); ?>>
                            <?php echo e($label); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            
            <div class="col-md-2 mb-3">
                <label for="language" class="form-label fw-bold">
                    <i class="fas fa-language me-2"></i>اللغة
                </label>
                <select class="form-select" id="language" name="language">
                    <option value="">جميع اللغات</option>
                    <option value="ar" <?php echo e(request('language') == 'ar' ? 'selected' : ''); ?>>العربية</option>
                    <option value="en" <?php echo e(request('language') == 'en' ? 'selected' : ''); ?>>English</option>
                </select>
            </div>
            
            <div class="col-md-2 mb-3">
                <label for="status" class="form-label fw-bold">
                    <i class="fas fa-toggle-on me-2"></i>الحالة
                </label>
                <select class="form-select" id="status" name="status">
                    <option value="">جميع الحالات</option>
                    <option value="published" <?php echo e(request('status') == 'published' ? 'selected' : ''); ?>>منشور</option>
                    <option value="draft" <?php echo e(request('status') == 'draft' ? 'selected' : ''); ?>>مسودة</option>
                </select>
            </div>
            
            <div class="col-md-2 mb-3">
                <button type="submit" class="btn btn-primary-custom w-100">
                    <i class="fas fa-filter me-2"></i>تصفية
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Books Table -->
<div class="books-table">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>الكتاب</th>
                    <th>المؤلف</th>
                    <th>التصنيف</th>
                    <th>اللغة</th>
                    <th>الحالة</th>
                    <th>المشاهدات</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <?php if($book->cover_image): ?>
                                        <img src="<?php echo e($book->cover_image_url); ?>" alt="<?php echo e($book->title); ?>" class="book-cover">
                                    <?php else: ?>
                                        <div class="book-cover bg-light d-flex align-items-center justify-content-center">
                                            <i class="fas fa-book text-muted"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <div class="book-title"><?php echo e(Str::limit($book->title, 40)); ?></div>
                                    <small class="text-muted"><?php echo e($book->created_at->format('Y-m-d')); ?></small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="book-author"><?php echo e($book->author_name); ?></div>
                            <?php if($book->user): ?>
                                <small class="text-muted"><?php echo e($book->user->full_name); ?></small>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($book->category): ?>
                                <?php
                                    $categoryColors = [
                                        'psychology' => '#2D5E3A',
                                        'addiction' => '#1a2e20', 
                                        'relationships' => '#3A7D6E',
                                        'self_development' => '#C4A882',
                                        'family' => '#a8885e',
                                    ];
                                    $categoryLabels = [
                                        'psychology' => 'علم النفس',
                                        'addiction' => 'الإدمان',
                                        'relationships' => 'العلاقات', 
                                        'self_development' => 'التطوير الذاتي',
                                        'family' => 'الأسرة والطفل',
                                    ];
                                    $color = $categoryColors[$book->category] ?? '#6b7280';
                                    $label = $categoryLabels[$book->category] ?? $book->category;
                                ?>
                                <span class="badge badge-status" style="background-color: <?php echo e($color); ?>20; color: <?php echo e($color); ?>">
                                    <?php echo e($label); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-muted">غير محدد</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="badge bg-info text-dark">
                                <?php echo e($book->language_label); ?>

                            </span>
                        </td>
                        <td>
                            <?php if($book->is_published): ?>
                                <span class="badge badge-status bg-success">
                                    <i class="fas fa-check-circle me-1"></i> منشور
                                </span>
                            <?php else: ?>
                                <span class="badge badge-status bg-secondary">
                                    <i class="fas fa-times-circle me-1"></i> مسودة
                                </span>
                            <?php endif; ?>

                            <?php if($book->is_featured): ?>
                                <span class="badge badge-status bg-warning">
                                    <i class="fas fa-star me-1"></i> مميز
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="text-center">
                                <strong><?php echo e(number_format($book->views)); ?></strong>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="<?php echo e(route('admin.books.show', $book->id)); ?>" 
                                   class="btn btn-sm btn-info action-btn" 
                                   title="عرض">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('admin.books.edit', $book->id)); ?>" 
                                   class="btn btn-sm btn-warning action-btn" 
                                   title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('admin.books.destroy', $book->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger action-btn" 
                                            title="حذف"
                                            onclick="return confirm('هل أنت متأكد من حذف هذا الكتاب؟')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted">
                                <i class="fas fa-inbox fa-3x mb-3"></i>
                                <h5>لا توجد كتب</h5>
                                <p>لم يتم العثور على كتب تطابق معايير البحث</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<?php if($books->hasPages()): ?>
    <div class="pagination d-flex justify-content-center">
        <?php echo e($books->links()); ?>

    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\admin\books\index.blade.php ENDPATH**/ ?>