<?php $__env->startSection('title', 'إنشاء حساب جديد'); ?>

<?php $__env->startSection('auth-title', 'مرحباً بك في منصة وعي!'); ?>
<?php $__env->startSection('auth-subtitle', 'انضم إلى مجتمعنا وابدأ رحلتك نحو الوعي والتطوير'); ?>

<?php $__env->startSection('content'); ?>
<div class="w-full">
    <!-- Progress Steps -->
    <div class="mb-8" data-aos="fade-down" data-aos-duration="800">
        <div class="flex items-center justify-center">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-semibold text-lg">
                    1
                </div>
                <div class="w-20 h-1 bg-primary mx-3"></div>
            </div>
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gray-300 text-white rounded-full flex items-center justify-center font-semibold text-lg">
                    2
                </div>
                <div class="w-20 h-1 bg-gray-300 mx-3"></div>
            </div>
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gray-300 text-white rounded-full flex items-center justify-center font-semibold text-lg">
                    3
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-3 text-sm text-gray-600 space-x-12 space-x-reverse">
            <span class="font-medium">المعلومات الشخصية</span>
            <span class="font-medium">بيانات الاتصال</span>
            <span class="font-medium">إنشاء الحساب</span>
        </div>
    </div>

    <form action="<?php echo e(route('register.post')); ?>" method="POST" class="space-y-8" data-aos="fade-up" data-aos-duration="1000">
        <?php echo csrf_field(); ?>
        
        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column - Personal Information -->
            <div class="lg:col-span-1">
                <div class="bg-white bg-opacity-90 backdrop-filter backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white border-opacity-20 h-full transform transition-all duration-300 hover:scale-[1.02] hover:shadow-3xl">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary to-primary-light rounded-2xl flex items-center justify-center ml-4 shadow-lg">
                            <i class="fas fa-user text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">المعلومات الشخصية</h3>
                            <p class="text-gray-600">أدخل معلوماتك الأساسية</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-user ml-2 text-primary"></i>
                                الاسم الأول
                            </label>
                            <input 
                                id="first_name" 
                                name="first_name" 
                                type="text" 
                                required 
                                value="<?php echo e(old('first_name')); ?>"
                                class="w-full px-4 py-4 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm border border-gray-200 border-opacity-50 rounded-2xl focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary transition-all duration-300 hover:bg-opacity-100 hover:border-gray-300 text-gray-800 placeholder-gray-500"
                                placeholder="أحمد"
                            >
                            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle ml-2"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-user ml-2 text-primary"></i>
                                اسم العائلة
                            </label>
                            <input 
                                id="last_name" 
                                name="last_name" 
                                type="text" 
                                required 
                                value="<?php echo e(old('last_name')); ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 hover:border-gray-400"
                                placeholder="محمد"
                            >
                            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle ml-2"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-venus-mars ml-2 text-primary"></i>
                                النوع
                            </label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="relative cursor-pointer">
                                    <input 
                                        type="radio" 
                                        name="gender" 
                                        value="male" 
                                        required
                                        <?php echo e(old('gender') == 'male' ? 'checked' : ''); ?>

                                        class="peer sr-only"
                                    >
                                    <div class="border-2 border-gray-200 rounded-xl p-4 text-center transition-all duration-200 peer-checked:border-primary peer-checked:bg-primary peer-checked:bg-opacity-10 hover:border-gray-300">
                                        <i class="fas fa-mars text-2xl text-gray-400 peer-checked:text-primary mb-2"></i>
                                        <span class="text-gray-700 font-medium">ذكر</span>
                                    </div>
                                </label>
                                <label class="relative cursor-pointer">
                                    <input 
                                        type="radio" 
                                        name="gender" 
                                        value="female" 
                                        required
                                        <?php echo e(old('gender') == 'female' ? 'checked' : ''); ?>

                                        class="peer sr-only"
                                    >
                                    <div class="border-2 border-gray-200 rounded-xl p-4 text-center transition-all duration-200 peer-checked:border-primary peer-checked:bg-primary peer-checked:bg-opacity-10 hover:border-gray-300">
                                        <i class="fas fa-venus text-2xl text-gray-400 peer-checked:text-primary mb-2"></i>
                                        <span class="text-gray-700 font-medium">أنثى</span>
                                    </div>
                                </label>
                            </div>
                            <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle ml-2"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Bio -->
                        <div>
                            <label for="bio" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-pen ml-2 text-primary"></i>
                                نبذة شخصية (اختياري)
                            </label>
                            <textarea 
                                id="bio" 
                                name="bio" 
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 resize-none hover:border-gray-400"
                                placeholder="اكتب نبذة قصيرة عن نفسك..."
                            ><?php echo e(old('bio')); ?></textarea>
                            <p class="text-xs text-gray-500 mt-1"><?php echo e(250 - strlen(old('bio') ?? 0)); ?> حرف متبقي</p>
                            <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle ml-2"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Middle Column - Contact Information -->
            <div class="lg:col-span-1">
                <div class="bg-white bg-opacity-90 backdrop-filter backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white border-opacity-20 h-full transform transition-all duration-300 hover:scale-[1.02] hover:shadow-3xl">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-secondary to-secondary-dark rounded-2xl flex items-center justify-center ml-4 shadow-lg">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">بيانات الاتصال</h3>
                            <p class="text-gray-600">معلومات للتواصل معك</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-envelope ml-2 text-secondary"></i>
                                البريد الإلكتروني
                            </label>
                            <div class="relative">
                                <input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    required 
                                    value="<?php echo e(old('email')); ?>"
                                    class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 hover:border-gray-400"
                                    placeholder="example@email.com"
                                >
                                <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle ml-2"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-phone ml-2 text-secondary"></i>
                                رقم الهاتف
                            </label>
                            <div class="relative">
                                <input 
                                    id="phone" 
                                    name="phone" 
                                    type="text" 
                                    required 
                                    value="<?php echo e(old('phone')); ?>"
                                    class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 hover:border-gray-400"
                                    placeholder="05xxxxxxxx"
                                >
                                <i class="fas fa-phone absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle ml-2"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- City -->
                        <div>
                            <label for="city" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-map-marker-alt ml-2 text-secondary"></i>
                                المدينة (اختياري)
                            </label>
                            <div class="relative">
                                <input 
                                    id="city" 
                                    name="city" 
                                    type="text" 
                                    value="<?php echo e(old('city')); ?>"
                                    class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 hover:border-gray-400"
                                    placeholder="الرياض"
                                >
                                <i class="fas fa-map-marker-alt absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle ml-2"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Additional Info -->
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                                <i class="fas fa-info-circle ml-2 text-blue-500"></i>
                                معلومات إضافية
                            </h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                بيانات الاتصال الخاصة بك آمنة ومشفرة ولا نشاركها مع أي طرف ثالث. نستخدمها فقط للتواصل معك وتحسين تجربتك في المنصة.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Security & Submit -->
            <div class="lg:col-span-1">
                <div class="space-y-8">
                    <!-- Security Card -->
                    <div class="bg-white bg-opacity-90 backdrop-filter backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white border-opacity-20 transform transition-all duration-300 hover:scale-[1.02] hover:shadow-3xl">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center ml-4 shadow-lg">
                                <i class="fas fa-lock text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">أمان الحساب</h3>
                                <p class="text-gray-600">اختر كلمة مرور قوية</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-lock ml-2 text-green-500"></i>
                                    كلمة المرور
                                </label>
                                <div class="relative">
                                    <input 
                                        id="password" 
                                        name="password" 
                                        type="password" 
                                        required 
                                        class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 hover:border-gray-400"
                                        placeholder="••••••••"
                                        x-data="{ show: false }"
                                        :type="show ? 'text' : 'password'"
                                    >
                                    <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <button type="button" 
                                            @click="show = !show"
                                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition">
                                        <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-2">
                                    <div class="flex items-center space-x-2 space-x-reverse text-xs">
                                        <span class="text-gray-500">قوة كلمة المرور:</span>
                                        <div class="flex space-x-1 space-x-reverse">
                                            <div class="w-8 h-1 bg-gray-300 rounded"></div>
                                            <div class="w-8 h-1 bg-gray-300 rounded"></div>
                                            <div class="w-8 h-1 bg-gray-300 rounded"></div>
                                            <div class="w-8 h-1 bg-gray-300 rounded"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle ml-2"></i>
                                        <?php echo e($message); ?>

                                    </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Password Confirmation -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-lock ml-2 text-green-500"></i>
                                    تأكيد كلمة المرور
                                </label>
                                <div class="relative">
                                    <input 
                                        id="password_confirmation" 
                                        name="password_confirmation" 
                                        type="password" 
                                        required 
                                        class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 hover:border-gray-400"
                                        placeholder="••••••••"
                                        x-data="{ show: false }"
                                        :type="show ? 'text' : 'password'"
                                    >
                                    <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <button type="button" 
                                            @click="show = !show"
                                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition">
                                        <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                        </svg>
                                    </button>
                                </div>
                                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle ml-2"></i>
                                        <?php echo e($message); ?>

                                    </p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Submit -->
                    <div class="bg-white bg-opacity-90 backdrop-filter backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white border-opacity-20 transform transition-all duration-300 hover:scale-[1.02] hover:shadow-3xl">
                        <!-- Terms -->
                        <div class="mb-6">
                            <label class="flex items-start cursor-pointer p-4 bg-gray-50 bg-opacity-80 backdrop-filter backdrop-blur-sm rounded-2xl hover:bg-opacity-100 transition-all duration-300">
                                <input 
                                    type="checkbox" 
                                    name="terms" 
                                    required
                                    class="mt-1 ml-3 text-primary focus:ring-primary w-5 h-5"
                                >
                                <span class="text-sm text-gray-700 leading-relaxed">
                                    أوافق على 
                                    <a href="#" class="text-primary hover:text-primary-700 font-medium transition">الشروط والأحكام</a>
                                    و 
                                    <a href="#" class="text-primary hover:text-primary-700 font-medium transition">سياسة الخصوصية</a>
                                    <span class="text-red-500">*</span>
                                </span>
                            </label>
                            <?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle ml-2"></i>
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-primary via-primary-light to-secondary text-white py-4 rounded-2xl font-bold text-lg hover:from-primary-dark hover:to-secondary transition-all duration-300 transform hover:scale-[1.02] shadow-xl hover:shadow-2xl flex items-center justify-center">
                            <i class="fas fa-user-plus ml-3"></i>
                            إنشاء حساب جديد
                        </button>
                    </div>

                    <!-- Social Login -->
                    <div class="bg-white bg-opacity-90 backdrop-filter backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white border-opacity-20 transform transition-all duration-300 hover:scale-[1.02] hover:shadow-3xl" data-aos="fade-up" data-aos-duration="1200">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300 border-opacity-30"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-6 bg-white bg-opacity-90 backdrop-filter backdrop-blur-sm text-gray-600 font-medium">أو سجل باستخدام</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <a href="#" class="flex justify-center items-center py-3 px-6 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm border border-gray-200 border-opacity-50 rounded-2xl text-sm font-medium text-gray-700 hover:bg-opacity-100 transition-all duration-300 transform hover:scale-[1.05] shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 ml-2" viewBox="0 0 24 24">
                                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                </svg>
                                جوجل
                            </a>

                            <a href="#" class="flex justify-center items-center py-3 px-6 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm border border-gray-200 border-opacity-50 rounded-2xl text-sm font-medium text-gray-700 hover:bg-opacity-100 transition-all duration-300 transform hover:scale-[1.05] shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                                تويتر
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('auth-footer'); ?>
    <div class="text-center mt-8" data-aos="fade-up" data-aos-duration="1400">
        <span class="text-gray-600 text-lg">
            لديك حساب بالفعل؟
            <a href="<?php echo e(route('login')); ?>" class="font-semibold text-primary hover:text-primary-700 transition">
                تسجيل الدخول
            </a>
        </span>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\auth\register.blade.php ENDPATH**/ ?>