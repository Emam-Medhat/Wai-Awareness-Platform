<?php $__env->startSection('title', 'ممنوع الوصول'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <!-- 403 Number -->
                <div class="display-1 fw-bold text-warning mb-4">
                    403
                </div>
                
                <!-- Lock Icon -->
                <div class="mb-4">
                    <i class="fas fa-lock fa-5x text-warning"></i>
                </div>
                
                <!-- Error Message -->
                <h1 class="h2 mb-3">ممنوع الوصول</h1>
                <p class="text-muted mb-5">
                    عذراً، ليس لديك صلاحية للوصول إلى هذه الصفحة.
                </p>
                
                <!-- Action Buttons -->
                <div class="d-flex justify-content-center gap-3 flex-wrap mb-5">
                    <?php if(auth()->check()): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-primary btn-lg">
                            <i class="fas fa-tachometer-alt ml-2"></i>
                            لوحة التحكم
                        </a>
                        <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-home ml-2"></i>
                            الصفحة الرئيسية
                        </a>
                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-outline-danger btn-lg">
                                <i class="fas fa-sign-out-alt ml-2"></i>
                                تسجيل الخروج
                            </button>
                        </form>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-lg">
                            <i class="fas fa-sign-in-alt ml-2"></i>
                            تسجيل الدخول
                        </a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-user-plus ml-2"></i>
                            إنشاء حساب
                        </a>
                        <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-home ml-2"></i>
                            الصفحة الرئيسية
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Help Section -->
                <div class="mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">
                                <i class="fas fa-shield-alt text-warning ml-2"></i>
                                معلومات الأمان:
                            </h5>
                            <ul class="list-unstyled text-start text-muted">
                                <li class="mb-2">
                                    <i class="fas fa-user-lock text-primary ml-2"></i>
                                    هذه الصفحة تتطلب صلاحيات خاصة
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-key text-primary ml-2"></i>
                                    تأكد من تسجيل الدخول بالحساب الصحيح
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-user-shield text-primary ml-2"></i>
                                    قد تحتاج إلى دور إدمني للوصول
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-envelope text-primary ml-2"></i>
                                    تواصل مع الإدمني للحصول على الصلاحيات
                                </li>
                            </ul>
                            <?php if(!auth()->check()): ?>
                            <div class="alert alert-info">
                                <small>
                                    <i class="fas fa-info-circle ml-2"></i>
                                    إذا كان لديك حساب، قم بتسجيل الدخول أولاً
                                </small>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\errors\403.blade.php ENDPATH**/ ?>