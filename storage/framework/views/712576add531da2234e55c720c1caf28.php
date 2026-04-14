<?php $__env->startSection('title', 'إضافة مستخدم جديد'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <h1 class="h2 mb-0 fw-bold">
        <i class="fas fa-user-plus ml-3 text-primary"></i>
        إضافة مستخدم جديد
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-right ml-2"></i>
            العودة للمستخدمين
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="admin-card rounded-lg p-4" data-aos="fade-up">
            <form action="<?php echo e(route('admin.users.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="row">
                    <!-- Basic Information -->
                    <div class="col-12 mb-4">
                        <h5 class="fw-bold text-primary mb-3">
                            <i class="fas fa-user ml-2"></i>
                            المعلومات الأساسية
                        </h5>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label fw-bold">الاسم الأول *</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" 
                               value="<?php echo e(old('first_name')); ?>" required>
                        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label fw-bold">الاسم الأخير *</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" 
                               value="<?php echo e(old('last_name')); ?>" required>
                        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label fw-bold">البريد الإلكتروني *</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?php echo e(old('email')); ?>" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label fw-bold">رقم الهاتف *</label>
                        <input type="tel" class="form-control" id="phone" name="phone" 
                               value="<?php echo e(old('phone')); ?>" required>
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label fw-bold">الجنس *</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">اختر...</option>
                            <option value="male" <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?>>ذكر</option>
                            <option value="female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>>أنثى</option>
                        </select>
                        <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label fw-bold">المدينة</label>
                        <input type="text" class="form-control" id="city" name="city" 
                               value="<?php echo e(old('city')); ?>" placeholder="مثال: الرياض">
                        <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                
                <!-- Account Information -->
                <div class="row mt-4">
                    <div class="col-12 mb-4">
                        <h5 class="fw-bold text-success mb-3">
                            <i class="fas fa-cog ml-2"></i>
                            معلومات الحساب
                        </h5>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label fw-bold">كلمة المرور *</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <small class="text-muted">يجب أن تكون 8 أحرف على الأقل</small>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label fw-bold">تأكيد كلمة المرور *</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="role" class="form-label fw-bold">الدور *</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="">اختر الدور...</option>
                            <option value="user" <?php echo e(old('role') == 'user' ? 'selected' : ''); ?>>مستخدم عادي</option>
                            <option value="admin" <?php echo e(old('role') == 'admin' ? 'selected' : ''); ?>>مدير نظام</option>
                            <option value="campaign_manager" <?php echo e(old('role') == 'campaign_manager' ? 'selected' : ''); ?>>مدير حملات</option>
                        </select>
                        <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="is_active" class="form-label fw-bold">حالة الحساب</label>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                            <label class="form-check-label" for="is_active">
                                حساب نشط
                            </label>
                        </div>
                        <small class="text-muted">إلغاء التحديد سيجعل الحساب غير نشط</small>
                    </div>
                </div>
                
                <!-- Additional Information -->
                <div class="row mt-4">
                    <div class="col-12 mb-4">
                        <h5 class="fw-bold text-info mb-3">
                            <i class="fas fa-info-circle ml-2"></i>
                            معلومات إضافية
                        </h5>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label for="bio" class="form-label fw-bold">السيرة الذاتية</label>
                        <textarea class="form-control" id="bio" name="bio" rows="4" 
                                  placeholder="معلومات إضافية عن المستخدم..."><?php echo e(old('bio')); ?></textarea>
                        <small class="text-muted">حد أقصى 1000 حرف</small>
                        <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                
                <!-- Submit Buttons -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times ml-2"></i>
                                إلغاء
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save ml-2"></i>
                                إنشاء المستخدم
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Help Sidebar -->
    <div class="col-lg-4">
        <div class="admin-card rounded-lg p-4" data-aos="fade-left" data-aos-delay="100">
            <h5 class="fw-bold text-warning mb-3">
                <i class="fas fa-question-circle ml-2"></i>
                مساعدة
            </h5>
            
            <div class="alert alert-info">
                <h6 class="fw-bold">ملاحظات هامة:</h6>
                <ul class="mb-0">
                    <li>جميع الحقول المميزة بـ (*) مطلوبة</li>
                    <li>كلمة المرور يجب أن تكون 8 أحرف على الأقل</li>
                    <li>البريد الإلكتروني يجب أن يكون فريداً</li>
                    <li>رقم الهاتف يجب أن يكون فريداً</li>
                </ul>
            </div>
            
            <div class="alert alert-success">
                <h6 class="fw-bold">الأدوار المتاحة:</h6>
                <ul class="mb-0">
                    <li><strong>مستخدم عادي:</strong> يمكنه عرض المحتوى</li>
                    <li><strong>مدير نظام:</strong> صلاحيات كاملة</li>
                    <li><strong>مدير حملات:</strong> يدير الحملات فقط</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\admin\users\create.blade.php ENDPATH**/ ?>