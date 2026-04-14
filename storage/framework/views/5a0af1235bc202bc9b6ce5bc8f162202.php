<?php $__env->startSection('title', 'إدارة التصنيفات'); ?>

<?php $__env->startPush('head'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ════════════════════════════════════════════════
   WA3Y CATEGORIES ADMIN — DESIGN TOKENS
════════════════════════════════════════════════ */
:root {
    --wa3y-primary: #2D5E3A;
    --wa3y-primary-light: #4ade80;
    --wa3y-teal: #3A7D6E;
    --wa3y-gold: #C4A882;
    --wa3y-gold-light: #e8d5b7;
    --wa3y-cream: #F0EFEC;
    --wa3y-dark: #1a2e20;
    --wa3y-muted: #6b7280;
    --wa3y-border: rgba(45, 94, 58, 0.12);
    --wa3y-shadow-sm: 0 2px 12px rgba(45, 94, 58, 0.08);
    --wa3y-shadow-md: 0 8px 32px rgba(45, 94, 58, 0.12);
    --wa3y-shadow-lg: 0 24px 64px rgba(45, 94, 58, 0.15);
    --wa3y-radius-sm: 12px;
    --wa3y-radius-md: 20px;
    --wa3y-radius-lg: 28px;
}

/* Hero Section */
.categories-hero {
    background: linear-gradient(135deg, var(--wa3y-dark) 0%, var(--wa3y-primary) 50%, var(--wa3y-teal) 100%);
    color: white;
    padding: 3rem 0;
    margin: -1.5rem -1.5rem 2rem -1.5rem;
    border-radius: 0 0 2rem 2rem;
    position: relative;
    overflow: hidden;
}

.categories-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(196, 168, 130, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(74, 222, 128, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.categories-hero-content {
    position: relative;
    z-index: 1;
}

.categories-hero h1 {
    font-size: 2.5rem;
    font-weight: 900;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, #fff, var(--wa3y-gold-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.categories-hero p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

/* Stats Cards */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: var(--wa3y-radius-md);
    border: 1px solid var(--wa3y-border);
    box-shadow: var(--wa3y-shadow-sm);
    padding: 2rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--wa3y-primary), var(--wa3y-teal), var(--wa3y-gold));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--wa3y-shadow-lg);
}

.stat-card:hover::before {
    transform: scaleX(1);
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
    transition: all 0.3s ease;
}

.stat-icon.primary {
    background: linear-gradient(135deg, var(--wa3y-primary), var(--wa3y-teal));
    color: white;
}

.stat-icon.success {
    background: linear-gradient(135deg, #4ade80, #22c55e);
    color: white;
}

.stat-icon.info {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--wa3y-dark);
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--wa3y-muted);
    font-weight: 600;
}

/* Main Card */
.main-card {
    background: white;
    border-radius: var(--wa3y-radius-lg);
    border: 1px solid var(--wa3y-border);
    box-shadow: var(--wa3y-shadow-md);
    overflow: hidden;
}

.main-card-header {
    background: linear-gradient(135deg, var(--wa3y-cream), white);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--wa3y-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}

.main-card-title {
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--wa3y-dark);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.main-card-title i {
    color: var(--wa3y-primary);
}

/* Search Form */
.search-form {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.search-input {
    width: 250px;
    padding: 0.75rem 1rem;
    border: 2px solid var(--wa3y-border);
    border-radius: var(--wa3y-radius-sm);
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background: white;
}

.search-input:focus {
    outline: none;
    border-color: var(--wa3y-primary);
    box-shadow: 0 0 0 3px rgba(45, 94, 58, 0.1);
}

.search-btn {
    padding: 0.75rem 1.25rem;
    background: linear-gradient(135deg, var(--wa3y-primary), var(--wa3y-teal));
    color: white;
    border: none;
    border-radius: var(--wa3y-radius-sm);
    font-weight: 700;
    transition: all 0.3s ease;
    cursor: pointer;
}

.search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(45, 94, 58, 0.3);
}

/* Table */
.categories-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.categories-table thead th {
    background: var(--wa3y-cream);
    padding: 1rem 1.5rem;
    font-weight: 700;
    color: var(--wa3y-dark);
    border-bottom: 2px solid var(--wa3y-border);
    text-align: left;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.categories-table tbody td {
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid var(--wa3y-border);
    vertical-align: middle;
}

.categories-table tbody tr {
    transition: all 0.3s ease;
}

.categories-table tbody tr:hover {
    background: linear-gradient(135deg, var(--wa3y-cream), white);
}

/* Category Info */
.category-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.category-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.category-info:hover .category-icon {
    transform: scale(1.1) rotate(5deg);
}

.category-details h6 {
    font-weight: 800;
    color: var(--wa3y-dark);
    margin-bottom: 0.25rem;
    font-size: 1rem;
}

.category-details small {
    color: var(--wa3y-muted);
    font-size: 0.85rem;
    line-height: 1.4;
}

/* URL Code */
.url-code {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-family: 'Courier New', monospace;
    font-size: 0.85rem;
    color: var(--wa3y-primary);
    border: 1px solid var(--wa3y-border);
    display: inline-block;
}

/* Badges */
.books-count {
    background: linear-gradient(135deg, var(--wa3y-primary), var(--wa3y-teal));
    color: white;
    padding: 0.4rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
}

.status-badge {
    padding: 0.4rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
}

.status-badge.active {
    background: linear-gradient(135deg, #4ade80, #22c55e);
    color: white;
}

.status-badge.inactive {
    background: linear-gradient(135deg, #6b7280, #4b5563);
    color: white;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
}

.action-btn {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    cursor: pointer;
    text-decoration: none;
}

.action-btn.edit {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
}

.action-btn.edit:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
}

.action-btn.view {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.action-btn.view:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
}

.action-btn.delete {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.action-btn.delete:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
}

.action-btn.toggle-status {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.action-btn.toggle-status:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
}

.action-btn.disabled {
    background: linear-gradient(135deg, #9ca3af, #6b7280);
    color: white;
    opacity: 0.6;
    cursor: not-allowed;
}

.action-btn.disabled:hover {
    transform: none;
    box-shadow: none;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: linear-gradient(135deg, var(--wa3y-cream), white);
    border-radius: var(--wa3y-radius-lg);
    margin: 2rem 0;
}

.empty-state-icon {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--wa3y-primary), var(--wa3y-teal));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 2.5rem;
    color: white;
    box-shadow: 0 15px 35px rgba(45, 94, 58, 0.2);
}

.empty-state h5 {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--wa3y-dark);
    margin-bottom: 1rem;
}

.empty-state p {
    color: var(--wa3y-muted);
    font-size: 1rem;
    margin-bottom: 2rem;
}

/* Primary Button */
.btn-primary-custom {
    background: linear-gradient(135deg, var(--wa3y-primary), var(--wa3y-teal));
    color: white;
    padding: 0.75rem 2rem;
    border: none;
    border-radius: var(--wa3y-radius-sm);
    font-weight: 800;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(45, 94, 58, 0.3);
}

.btn-primary-custom:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(45, 94, 58, 0.4);
    color: white;
}

/* Responsive */
@media (max-width: 768px) {
    .categories-hero {
        margin: -1rem -1rem 1rem -1rem;
        padding: 2rem 0;
    }
    
    .categories-hero h1 {
        font-size: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .main-card-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .search-form {
        width: 100%;
    }
    
    .search-input {
        width: 100%;
    }
    
    .categories-table {
        font-size: 0.85rem;
    }
    
    .categories-table thead th,
    .categories-table tbody td {
        padding: 0.75rem 1rem;
    }
    
    .category-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .action-btn {
        width: 35px;
        height: 35px;
        font-size: 0.8rem;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="categories-hero">
    <div class="container">
        <div class="categories-hero-content">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1>
                        <i class="fas fa-layer-group me-3"></i>
                        إدارة التصنيفات
                    </h1>
                    <p class="lead mb-0">
                        تنظيم وإدارة تصنيفات الكتب والمحتوى بسهولة وفعالية
                    </p>
                </div>
                <div class="col-lg-4 text-start">
                    <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn-primary-custom">
                        <i class="fas fa-plus-circle me-2"></i>
                        إضافة تصنيف جديد
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="container">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon primary">
                <i class="fas fa-layer-group"></i>
            </div>
            <div class="stat-number"><?php echo e($categories->count()); ?></div>
            <div class="stat-label">إجمالي التصنيفات</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-number"><?php echo e($categories->where('is_active', true)->count()); ?></div>
            <div class="stat-label">التصنيفات النشطة</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon info">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-number"><?php echo e(\App\Models\Book::count()); ?></div>
            <div class="stat-label">إجمالي الكتب</div>
        </div>
    </div>
</div>

<!-- Main Card -->
<div class="container">
    <div class="main-card">
        <div class="main-card-header">
            <h3 class="main-card-title">
                <i class="fas fa-list"></i>
                قائمة التصنيفات
            </h3>
            
            <form method="GET" class="search-form">
                <input type="text" 
                       name="search" 
                       class="search-input" 
                       placeholder="بحث عن تصنيف..."
                       value="<?php echo e(request('search')); ?>">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        
        <div class="card-body p-0">
            <?php if($categories->count() > 0): ?>
                <div class="table-responsive">
                    <table class="categories-table">
                        <thead>
                            <tr>
                                <th>التصنيف</th>
                                <th>الرابط</th>
                                <th>الكتب</th>
                                <th>الحالة</th>
                                <th class="text-center">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="category-info">
                                        <div class="category-icon" style="background: <?php echo e($category->color ?? 'var(--wa3y-primary)'); ?>;">
                                            <i class="<?php echo e($category->icon ?? 'fas fa-book'); ?>"></i>
                                        </div>
                                        <div class="category-details">
                                            <h6><?php echo e($category->name); ?></h6>
                                            <?php if($category->description): ?>
                                                <small><?php echo e(Str::limit($category->description, 60)); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <code class="url-code">
                                        /books/category/<?php echo e($category->slug); ?>

                                    </code>
                                </td>
                                <td>
                                    <span class="books-count">
                                        <i class="fas fa-book"></i>
                                        <?php echo e(\App\Models\Book::where('category', $category->slug)->count()); ?> كتاب
                                    </span>
                                </td>
                                <td>
                                    <?php if($category->is_active): ?>
                                        <span class="status-badge active">
                                            <i class="fas fa-check-circle"></i>
                                            نشط
                                        </span>
                                    <?php else: ?>
                                        <span class="status-badge inactive">
                                            <i class="fas fa-pause-circle"></i>
                                            غير نشط
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <!-- Edit Button -->
                                        <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" 
                                           class="action-btn edit"
                                           title="تعديل التصنيف: <?php echo e($category->name); ?>"
                                           data-category-id="<?php echo e($category->id); ?>"
                                           data-category-name="<?php echo e($category->name); ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <!-- View Button -->
                                        <?php if($category->is_active): ?>
                                            <a href="<?php echo e(route('categories.show', $category->slug)); ?>" 
                                               class="action-btn view"
                                               target="_blank"
                                               title="معاينة التصنيف: <?php echo e($category->name); ?>"
                                               data-category-id="<?php echo e($category->id); ?>"
                                               data-category-slug="<?php echo e($category->slug); ?>">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        <?php else: ?>
                                            <button class="action-btn view disabled" 
                                                    disabled
                                                    title="التصنيف غير نشط - لا يمكن المعاينة">
                                                <i class="fas fa-eye-slash"></i>
                                            </button>
                                        <?php endif; ?>
                                        
                                        <!-- Toggle Status Button -->
                                        <button type="button" 
                                                class="action-btn toggle-status"
                                                title="<?php echo e($category->is_active ? 'تعطيل التصنيف' : 'تفعيل التصنيف'); ?>"
                                                data-category-id="<?php echo e($category->id); ?>"
                                                data-current-status="<?php echo e($category->is_active ? 'active' : 'inactive'); ?>"
                                                data-category-name="<?php echo e($category->name); ?>">
                                            <i class="fas <?php echo e($category->is_active ? 'fa-pause' : 'fa-play'); ?>"></i>
                                        </button>
                                        
                                        <!-- Delete Button -->
                                        <form method="POST" 
                                              action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" 
                                              class="d-inline"
                                              onsubmit="return confirmCategoryDelete(event, '<?php echo e($category->name); ?>', '<?php echo e($category->books_count ?? 0); ?>')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" 
                                                    class="action-btn delete"
                                                    title="حذف التصنيف: <?php echo e($category->name); ?>"
                                                    data-category-id="<?php echo e($category->id); ?>"
                                                    data-category-name="<?php echo e($category->name); ?>">
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
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h5>لا توجد تصنيفات</h5>
                    <p>لم يتم إضافة أي تصنيفات بعد. ابدأ بإضافة أول تصنيف الآن!</p>
                    <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn-primary-custom">
                        <i class="fas fa-plus-circle me-2"></i>
                        إضافة تصنيف جديد
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// ════════════════════════════════════════════════
// WA3Y CATEGORIES ADMIN — DYNAMIC ACTIONS
// ════════════════════════════════════════════════

/**
 * Enhanced delete confirmation with books count
 */
function confirmCategoryDelete(event, categoryName, booksCount) {
    event.preventDefault();
    
    let message = `هل أنت متأكد من حذف التصنيف "${categoryName}"؟`;
    
    if (booksCount > 0) {
        message += `\n\n⚠️ تحذير: هذا التصنيف يحتوي على ${booksCount} كتاب/كتب.`;
        message += `\nسيؤدي الحذف إلى فقدان ارتباط هذه الكتب بالتصنيف.`;
    }
    
    message += '\n\nهذا الإجراء لا يمكن التراجع عنه.';
    
    if (confirm(message)) {
        // Show loading state
        const button = event.target.querySelector('button[type="submit"]');
        const originalContent = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        button.disabled = true;
        
        // Submit the form
        event.target.submit();
    }
    
    return false;
}

/**
 * Toggle category status (active/inactive)
 */
function toggleCategoryStatus(button) {
    const categoryId = button.dataset.categoryId;
    const categoryName = button.dataset.categoryName;
    const currentStatus = button.dataset.currentStatus;
    const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
    const actionText = newStatus === 'active' ? 'تفعيل' : 'تعطيل';
    
    // Show confirmation
    if (!confirm(`هل أنت متأكد من ${actionText} التصنيف "${categoryName}"؟`)) {
        return;
    }
    
    // Show loading state
    const originalContent = button.innerHTML;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    button.disabled = true;
    
    // Send AJAX request
    fetch(`/admin/categories/${categoryId}/toggle-active`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            status: newStatus
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the UI
            location.reload(); // Simple reload for now, can be enhanced with partial updates
        } else {
            alert('حدث خطأ: ' + (data.message || 'يرجى المحاولة مرة أخرى'));
            button.innerHTML = originalContent;
            button.disabled = false;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ في الاتصال بالخادم');
        button.innerHTML = originalContent;
        button.disabled = false;
    });
}

/**
 * Initialize dynamic actions
 */
document.addEventListener('DOMContentLoaded', function() {
    // Toggle status buttons
    document.querySelectorAll('.action-btn.toggle-status').forEach(button => {
        button.addEventListener('click', function() {
            toggleCategoryStatus(this);
        });
    });
    
    // Add tooltips for better UX
    document.querySelectorAll('.action-btn').forEach(button => {
        if (button.title) {
            // You can initialize a tooltip library here if needed
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px) scale(1.05)';
            });
            
            button.addEventListener('mouseleave', function() {
                if (!this.classList.contains('disabled')) {
                    this.style.transform = '';
                }
            });
        }
    });
    
    // Add keyboard navigation
    document.querySelectorAll('.action-btn').forEach(button => {
        button.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
    
    // Add visual feedback for form submissions
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            }
        });
    });
});

/**
 * Add loading states for all AJAX requests
 */
document.addEventListener('DOMContentLoaded', function() {
    // Show loading indicator for page navigation
    document.querySelectorAll('a[href]').forEach(link => {
        if (link.href.includes('/admin/categories/')) {
            link.addEventListener('click', function() {
                // Show loading state if needed
                document.body.style.cursor = 'wait';
            });
        }
    });
});

/**
 * Enhanced search functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const searchForm = searchInput?.closest('form');
    
    if (searchInput && searchForm) {
        // Add debounced search
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                if (this.value.length >= 2 || this.value.length === 0) {
                    searchForm.submit();
                }
            }, 500);
        });
        
        // Add clear button
        const clearButton = document.createElement('button');
        clearButton.type = 'button';
        clearButton.className = 'btn btn-outline-secondary ms-2';
        clearButton.innerHTML = '<i class="fas fa-times"></i>';
        clearButton.title = 'مسح البحث';
        clearButton.style.display = 'none';
        
        searchInput.parentNode.insertBefore(clearButton, searchInput.nextSibling);
        
        // Show/hide clear button
        searchInput.addEventListener('input', function() {
            clearButton.style.display = this.value ? 'inline-block' : 'none';
        });
        
        // Clear search
        clearButton.addEventListener('click', function() {
            searchInput.value = '';
            clearButton.style.display = 'none';
            searchForm.submit();
        });
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\admin\categories\index.blade.php ENDPATH**/ ?>