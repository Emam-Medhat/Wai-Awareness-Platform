<?php $__env->startSection('title', 'خطأ في الخادم'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <!-- 500 Number -->
                <div class="display-1 fw-bold text-danger mb-4">
                    500
                </div>
                
                <!-- Error Message -->
                <h1 class="h2 mb-3">خطأ في الخادم</h1>
                <p class="text-muted mb-5">
                    عذراً، حدث خطأ غير متوقع في الخادم. نحن نعمل على إصلاحه.
                </p>
                
                <!-- Action Buttons -->
                <div class="d-flex justify-content-center gap-3 flex-wrap mb-5">
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-home ml-2"></i>
                        الصفحة الرئيسية
                    </a>
                    <button onclick="history.back()" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-arrow-right ml-2"></i>
                        العودة للخلف
                    </button>
                    <button onclick="location.reload()" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-sync ml-2"></i>
                        إعادة المحاولة
                    </button>
                </div>
                
                <!-- Help Section -->
                <div class="mt-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">
                                <i class="fas fa-tools text-warning ml-2"></i>
                                ما يمكنك فعله:
                            </h5>
                            <ul class="list-unstyled text-start text-muted">
                                <li class="mb-2">
                                    <i class="fas fa-redo text-primary ml-2"></i>
                                    حاول تحديث الصفحة
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-clock text-primary ml-2"></i>
                                    انتظر بضع دقائق ثم حاول مرة أخرى
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-history text-primary ml-2"></i>
                                    استخدم رابط آخر
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-headset text-primary ml-2"></i>
                                    تواصل مع الدعم الفني
                                </li>
                            </ul>
                            <div class="alert alert-info">
                                <small>
                                    <i class="fas fa-info-circle ml-2"></i>
                                    تم إبلاغ الفريق الفني بهذه المشكلة ويعمل على حلها
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\errors\500.blade.php ENDPATH**/ ?>