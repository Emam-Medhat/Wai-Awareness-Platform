<?php $__env->startSection('title', 'إدارة المستخدمين'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <h1 class="h2 mb-0 fw-bold">
        <i class="fas fa-users ml-3 text-primary"></i>
        إدارة المستخدمين
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary">
            <i class="fas fa-user-plus ml-2"></i>
            إضافة مستخدم جديد
        </a>
    </div>
</div>

<div class="admin-card rounded-lg p-4" data-aos="fade-up">
    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="<?php echo e(route('admin.users')); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" 
                           value="<?php echo e(request('search')); ?>" placeholder="البحث عن مستخدم...">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="btn-group">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-filter ml-2"></i>
                    فلترة حسب الدور
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo e(route('admin.users')); ?>">الكل</a></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('admin.users')); ?>?role=admin">مديري النظام</a></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('admin.users')); ?>?role=user">المستخدمين</a></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('admin.users')); ?>?role=campaign_manager">مديري الحملات</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>المستخدم</th>
                    <th>التواصل</th>
                    <th>الدور</th>
                    <th>الحالة</th>
                    <th>تاريخ الإنشاء</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <?php if($user->avatar): ?>
                                <img src="<?php echo e(asset('storage/' . $user->avatar)); ?>" alt="Avatar" 
                                     class="rounded-circle me-3" width="40" height="40">
                            <?php else: ?>
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px;">
                                    <?php echo e(substr($user->first_name, 0, 1)); ?><?php echo e(substr($user->last_name, 0, 1)); ?>

                                </div>
                            <?php endif; ?>
                            <div>
                                <div class="fw-bold"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></div>
                                <small class="text-muted"><?php echo e($user->city ?? 'غير محدد'); ?></small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="small">
                            <div class="text-muted">
                                <i class="fas fa-envelope ml-1"></i>
                                <?php echo e($user->email); ?>

                            </div>
                            <div class="text-muted">
                                <i class="fas fa-phone ml-1"></i>
                                <?php echo e($user->phone); ?>

                            </div>
                        </div>
                    </td>
                    <td>
                        <?php if($user->hasRole('admin')): ?>
                            <span class="badge bg-danger">مدير نظام</span>
                        <?php elseif($user->hasRole('campaign_manager')): ?>
                            <span class="badge bg-warning">مدير حملات</span>
                        <?php else: ?>
                            <span class="badge bg-primary">مستخدم</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($user->is_active): ?>
                            <span class="badge bg-success">نشط</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">غير نشط</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <small class="text-muted"><?php echo e($user->created_at->format('Y-m-d')); ?></small>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="<?php echo e(route('admin.users.show', $user)); ?>" class="btn btn-outline-primary" title="عرض">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-outline-warning" title="تعديل">
                                <i class="fas fa-edit"></i>
                            </a>
                            <?php if(!$user->hasRole('admin') || $user->id !== auth()->id()): ?>
                            <form method="POST" action="<?php echo e(route('admin.users.destroy', $user)); ?>" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-outline-danger" title="حذف" 
                                        onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">لا يوجد مستخدمون</h5>
                        <p class="text-muted">ابدأ بإضافة مستخدم جديد</p>
                        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary">
                            <i class="fas fa-user-plus ml-2"></i>
                            إضافة مستخدم جديد
                        </a>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if($users->hasPages()): ?>
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($users->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\admin\users\index.blade.php ENDPATH**/ ?>