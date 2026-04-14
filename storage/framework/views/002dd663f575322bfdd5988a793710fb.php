<?php $__env->startSection('title', 'الملف الشخصي'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-vh-100" style="background: linear-gradient(135deg, #1a2e20 0%, #2C5F2D 30%, #4A7C59 70%, #97BC62 100%); font-family:'Tajawal',sans-serif; position: relative; overflow: hidden;">
    
    <!-- Animated Background -->
    <div class="position-absolute" style="top:0; left:0; right:0; bottom:0; pointer-events:none; z-index:1;">
        <div class="position-absolute floating-orb" style="top:15%; left:10%; width:200px; height:200px; background:radial-gradient(circle, rgba(233,30,99,0.15) 0%, transparent 70%); border-radius:50%; animation: float 6s ease-in-out infinite;"></div>
        <div class="position-absolute floating-orb" style="top:70%; right:15%; width:180px; height:180px; background:radial-gradient(circle, rgba(196,168,130,0.12) 0%, transparent 70%); border-radius:50%; animation: float 8s ease-in-out infinite 1s;"></div>
        <div class="position-absolute floating-orb" style="bottom:25%; left:20%; width:150px; height:150px; background:radial-gradient(circle, rgba(74,124,89,0.1) 0%, transparent 70%); border-radius:50%; animation: float 7s ease-in-out infinite 2s;"></div>
        <div class="position-absolute" style="top:40%; right:40%; width:100px; height:100px; background:radial-gradient(circle, rgba(244,143,177,0.08) 0%, transparent 70%); border-radius:50%; animation: pulse 4s ease-in-out infinite;"></div>
    </div>

    <!-- Header Section -->
    <div class="container position-relative" style="z-index:2; padding-top: 3rem; padding-bottom: 2rem;">
        <div class="text-center mb-5">
            <div class="d-inline-block">
                <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                    <i class="bi bi-person-circle me-3" style="color: var(--accent);"></i>
                    الملف الشخصي
                </h1>
                <div class="mx-auto" style="width: 80px; height: 4px; background: linear-gradient(90deg, var(--accent), var(--accent-dark)); border-radius: 2px; box-shadow: 0 2px 10px rgba(233,30,99,0.4);"></div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container position-relative" style="z-index:2; padding-bottom: 4rem;">
        <div class="row g-4">
            <!-- Left Column -->
            <div class="col-lg-4">
                <!-- Profile Card -->
                <div class="card border-0 shadow-xl mb-4 profile-card" style="background: rgba(255,255,255,0.98); backdrop-filter: blur(20px); border-radius: 24px; overflow: hidden; position: relative;">
                    <!-- Card Gradient Overlay -->
                    <div class="position-absolute top-0 start-0 end-0" style="height: 120px; background: linear-gradient(135deg, var(--accent), var(--accent-dark)); opacity: 0.9;"></div>
                    
                    <div class="card-body text-center p-4" style="position: relative; z-index:1;">
                        <!-- Profile Image -->
                        <div class="mb-4 position-relative" style="margin-top: 60px;">
                            <?php if($user->avatar): ?>
                                <img src="<?php echo e(asset('storage/avatars/' . $user->avatar)); ?>" 
                                     alt="<?php echo e($user->name); ?>" 
                                     class="rounded-circle shadow-xl profile-img" 
                                     style="width: 150px; height: 150px; object-fit: cover; border: 6px solid white; box-shadow: 0 8px 30px rgba(0,0,0,0.15); transition: all 0.4s ease;">
                            <?php else: ?>
                                <div class="rounded-circle shadow-xl profile-img mx-auto d-flex align-items-center justify-content-center" 
                                     style="width: 150px; height: 150px; background: linear-gradient(135deg, var(--accent), var(--accent-dark)); position: relative; overflow: hidden; border: 6px solid white; box-shadow: 0 8px 30px rgba(0,0,0,0.15);">
                                    <i class="bi bi-person-fill text-white" style="font-size: 4rem; z-index:1;"></i>
                                    <div class="shimmer-effect"></div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Status Badge -->
                            <div class="position-absolute bottom-0 end-0 status-badge">
                                <div class="d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; background: linear-gradient(135deg, #4ade80, #22c55e); border: 4px solid white; border-radius: 50%; box-shadow: 0 4px 15px rgba(74,222,128,0.4);">
                                    <i class="bi bi-check-lg text-white" style="font-size: 14px;"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Info -->
                        <h2 class="mb-2 fw-bold" style="color: var(--dark); font-size: 1.8rem;"><?php echo e($user->name); ?></h2>
                        <p class="text-muted mb-3" style="font-size: 1.1rem;"><?php echo e($user->email); ?></p>
                        
                        <!-- Role Badge -->
                        <?php if($user->role): ?>
                            <div class="mb-4">
                                <span class="badge role-badge px-4 py-2" style="background: linear-gradient(135deg, var(--accent), var(--accent-dark)); color: white; font-size: 0.95rem; border-radius: 25px; box-shadow: 0 6px 20px rgba(233,30,99,0.35); position: relative; overflow: hidden;">
                                    <span class="position-relative" style="z-index:1;">
                                        <?php switch($user->role):
                                            case ('admin'): ?>
                                                <i class="bi bi-shield-check me-2"></i>مدير النظام
                                                <?php break; ?>
                                            <?php case ('doctor'): ?>
                                                <i class="bi bi-heart-pulse me-2"></i>طبيب معتمد
                                                <?php break; ?>
                                            <?php case ('psychologist'): ?>
                                                <i class="bi bi-person-badge me-2"></i>أخصائي نفسي
                                                <?php break; ?>
                                            <?php default: ?>
                                                <i class="bi bi-person me-2"></i>مستخدم نشط
                                                <?php break; ?>
                                        <?php endswitch; ?>
                                    </span>
                                    <div class="badge-shine"></div>
                                </span>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Join Date -->
                        <div class="join-date">
                            <div class="d-inline-flex align-items-center px-3 py-2 rounded-pill" style="background: rgba(44,95,45,0.1); border: 1px solid rgba(44,95,45,0.2);">
                                <i class="bi bi-calendar-event me-2" style="color: var(--g2);"></i>
                                <span class="fw-medium" style="color: var(--g2);">انضم في <?php echo e($user->created_at->format('Y/m/d')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="card border-0 shadow-xl actions-card" style="background: rgba(255,255,255,0.98); backdrop-filter: blur(20px); border-radius: 24px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--accent), var(--accent-dark)); box-shadow: 0 4px 15px rgba(233,30,99,0.3);">
                                    <i class="bi bi-lightning-charge-fill text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-0 fw-bold" style="color: var(--dark);">الإجراءات السريعة</h5>
                                <small class="text-muted">وصول سريع لكل وظائفك</small>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-3">
                            <a href="<?php echo e(route('profile.edit')); ?>" class="action-btn" style="border: 2px solid var(--accent); color: var(--accent); background: rgba(233,30,99,0.05);">
                                <i class="bi bi-pencil-square me-2"></i>
                                <span>تعديل الملف الشخصي</span>
                            </a>
                            <a href="<?php echo e(route('stories.my')); ?>" class="action-btn" style="border: 2px solid var(--g2); color: var(--g2); background: rgba(44,95,45,0.05);">
                                <i class="bi bi-journal-text me-2"></i>
                                <span>قصصي ومقالاتي</span>
                            </a>
                            <a href="<?php echo e(route('habits.my')); ?>" class="action-btn" style="border: 2px solid var(--g2); color: var(--g2); background: rgba(44,95,45,0.05);">
                                <i class="bi bi-heart-pulse me-2"></i>
                                <span>عاداتي وتحدياتي</span>
                            </a>
                            <a href="<?php echo e(route('notifications')); ?>" class="action-btn" style="border: 2px solid #0ea5e9; color: #0ea5e9; background: rgba(14,165,233,0.05);">
                                <i class="bi bi-bell me-2"></i>
                                <span>الإشعارات والرسائل</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="col-lg-8">
            <!-- Profile Information -->
            <div class="card border-0 shadow-lg mb-4" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border-radius: 20px;">
                <div class="card-header border-0 p-4" style="background: linear-gradient(135deg, var(--accent), var(--accent-dark)); border-radius: 20px 20px 0 0;">
                    <h5 class="mb-0 text-white fw-bold">
                        <i class="bi bi-person-circle me-2"></i>
                        معلومات الملف الشخصي
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold" style="color: var(--dark);">
                                <i class="bi bi-person me-1" style="color: var(--accent);"></i>
                                الاسم الكامل
                            </label>
                            <p class="form-control-plaintext bg-light rounded p-3"><?php echo e($user->name); ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold" style="color: var(--dark);">
                                <i class="bi bi-envelope me-1" style="color: var(--accent);"></i>
                                البريد الإلكتروني
                            </label>
                            <p class="form-control-plaintext bg-light rounded p-3"><?php echo e($user->email); ?></p>
                        </div>
                        <?php if($user->phone): ?>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold" style="color: var(--dark);">
                                <i class="bi bi-telephone me-1" style="color: var(--accent);"></i>
                                رقم الهاتف
                            </label>
                            <p class="form-control-plaintext bg-light rounded p-3"><?php echo e($user->phone); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($user->bio): ?>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold" style="color: var(--dark);">
                                <i class="bi bi-file-text me-1" style="color: var(--accent);"></i>
                                السيرة الذاتية
                            </label>
                            <p class="form-control-plaintext bg-light rounded p-3"><?php echo e($user->bio); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mt-4">
                        <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-lg px-4 py-2 rounded-pill" style="background: linear-gradient(135deg, var(--accent), var(--accent-dark)); border: none; color: white; box-shadow: 0 4px 15px rgba(233,30,99,0.3); transition: all 0.3s ease;">
                            <i class="bi bi-pencil me-2"></i> تعديل المعلومات
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity -->
            <div class="card border-0 shadow-lg" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border-radius: 20px;">
                <div class="card-header border-0 p-4" style="background: linear-gradient(135deg, var(--g2), var(--g3)); border-radius: 20px 20px 0 0;">
                    <h5 class="mb-0 text-white fw-bold">
                        <i class="bi bi-clock-history me-2"></i>
                        النشاط الأخير
                    </h5>
                </div>
                <div class="card-body p-4">
                    <?php
                        $recentStories = \App\Models\Story::where('user_id', $user->id)
                            ->latest()
                            ->take(3)
                            ->get();
                        $recentHabits = \App\Models\Habit::where('user_id', $user->id)
                            ->latest()
                            ->take(3)
                            ->get();
                    ?>
                    
                    <?php if($recentStories->count() > 0 || $recentHabits->count() > 0): ?>
                        <div class="timeline">
                            <?php $__currentLoopData = $recentStories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="timeline-item mb-4 p-3 rounded-3" style="background: rgba(233,30,99,0.05); border-left: 4px solid var(--accent); transition: all 0.3s ease;">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center" 
                                                 style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--accent), var(--accent-dark)); font-size: 16px; box-shadow: 0 4px 12px rgba(233,30,99,0.3);">
                                                <i class="bi bi-book"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-2 fw-bold" style="color: var(--dark);">قصة جديدة</h6>
                                            <p class="text-muted mb-2"><?php echo e(Str::limit($story->content, 120)); ?></p>
                                            <small class="text-muted" style="color: var(--accent);">
                                                <i class="bi bi-clock me-1"></i><?php echo e($story->created_at->diffForHumans()); ?>

                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php $__currentLoopData = $recentHabits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="timeline-item mb-4 p-3 rounded-3" style="background: rgba(44,95,45,0.05); border-left: 4px solid var(--g2); transition: all 0.3s ease;">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center" 
                                                 style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--g2), var(--g3)); font-size: 16px; box-shadow: 0 4px 12px rgba(74,124,89,0.3);">
                                                <i class="bi bi-heart"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-2 fw-bold" style="color: var(--dark);">عادة جديدة</h6>
                                            <p class="text-muted mb-2"><?php echo e(Str::limit($habit->description, 120)); ?></p>
                                            <small class="text-muted" style="color: var(--g2);">
                                                <i class="bi bi-clock me-1"></i><?php echo e($habit->created_at->diffForHumans()); ?>

                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="bi bi-inbox text-muted" style="font-size: 4rem;"></i>
                            </div>
                            <h5 class="text-muted mb-3">لا يوجد نشاط حالي</h5>
                            <p class="text-muted mb-4">ابدأ بإضافة قصصك وعاداتك لمشاركتها مع المجتمع</p>
                            <a href="<?php echo e(route('stories.index')); ?>" class="btn btn-lg px-4 py-2 rounded-pill" style="background: linear-gradient(135deg, var(--g2), var(--g3)); border: none; color: white; box-shadow: 0 4px 15px rgba(74,124,89,0.3);">
                                <i class="bi bi-plus-circle me-2"></i> إضافة قصة
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes shimmer {
    0% { transform: translateX(-100%) rotate(45deg); }
    100% { transform: translateX(100%) rotate(45deg); }
}

.timeline-item {
    position: relative;
    transition: all 0.3s ease;
}

.timeline-item:hover {
    transform: translateX(5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: 18px;
    top: 40px;
    bottom: -16px;
    width: 2px;
    background: linear-gradient(180deg, #e9ecef, transparent);
}

.timeline-item:last-child::before {
    display: none;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2) !important;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\profile\show.blade.php ENDPATH**/ ?>