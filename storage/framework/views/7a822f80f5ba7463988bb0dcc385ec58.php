<?php $__env->startSection('title', 'تعديل الكتاب'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="text-center mb-8" data-aos="fade-up" data-aos-duration="1000">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
            تعديل الكتاب
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            قم بتحديث معلومات الكتاب والمحتوى
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <div class="card-modern p-8" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <form method="POST" action="<?php echo e(route('books.update', $book->id)); ?>" enctype="multipart/form-data" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <!-- Book Title -->
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">
                            عنوان الكتاب <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="title"
                            value="<?php echo e($book->title); ?>"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            placeholder="أدخل عنوان الكتاب"
                        >
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Book Description -->
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">
                            وصف الكتاب <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="description"
                            rows="4"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            placeholder="اكتب وصفاً مفصلاً للكتاب"
                        ><?php echo e($book->description); ?></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Author Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                اسم المؤلف <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="author_name"
                                value="<?php echo e($book->author_name); ?>"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                placeholder="اسم المؤلف"
                            >
                            <?php $__errorArgs = ['author_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                لقب المؤلف
                            </label>
                            <input 
                                type="text" 
                                name="author_title"
                                value="<?php echo e($book->author_title); ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                placeholder="دكتور، أستاذ، etc."
                            >
                        </div>
                    </div>

                    <!-- Category and Size -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                التصنيف <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="category"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            >
                                <option value="">اختر التصنيف</option>
                                <option value="psychology" <?php echo e($book->category == 'psychology' ? 'selected' : ''); ?>>علم النفس</option>
                                <option value="addiction" <?php echo e($book->category == 'addiction' ? 'selected' : ''); ?>>الإدمان</option>
                                <option value="relationships" <?php echo e($book->category == 'relationships' ? 'selected' : ''); ?>>العلاقات</option>
                                <option value="self_development" <?php echo e($book->category == 'self_development' ? 'selected' : ''); ?>>التطوير الذاتي</option>
                                <option value="family" <?php echo e($book->category == 'family' ? 'selected' : ''); ?>>الأسرة والطفل</option>
                            </select>
                            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                الحجم
                            </label>
                            <select 
                                name="size"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            >
                                <option value="small" <?php echo e($book->size == 'small' ? 'selected' : ''); ?>>صغير</option>
                                <option value="medium" <?php echo e($book->size == 'medium' ? 'selected' : ''); ?>>متوسط</option>
                                <option value="large" <?php echo e($book->size == 'large' ? 'selected' : ''); ?>>كبير</option>
                            </select>
                        </div>
                    </div>

                    <!-- ISBN and Pages -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                رقم ISBN
                            </label>
                            <input 
                                type="text" 
                                name="isbn"
                                value="<?php echo e($book->isbn); ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                placeholder="978-3-16-148410-0"
                            >
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                عدد الصفحات
                            </label>
                            <input 
                                type="number" 
                                name="pages"
                                value="<?php echo e($book->pages); ?>"
                                min="1"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                                placeholder="250"
                            >
                        </div>
                    </div>

                    <!-- Publication Date -->
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">
                            تاريخ النشر
                        </label>
                        <input 
                            type="date" 
                            name="publication_date"
                            value="<?php echo e($book->publication_date ? $book->publication_date->format('Y-m-d') : ''); ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                        >
                    </div>

                    <!-- Book Content -->
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">
                            محتوى الكتاب <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="content"
                            rows="8"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            placeholder="اكتب المحتوى الكامل للكتاب هنا..."
                        ><?php echo e($book->content); ?></textarea>
                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- File Uploads -->
                    <div class="space-y-4">
                        <!-- Current Cover Image -->
                        <?php if($book->cover_image): ?>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                صورة الغلاف الحالية
                            </label>
                            <div class="flex items-center space-x-4 space-x-reverse">
                                <img src="<?php echo e(asset('storage/' . $book->cover_image)); ?>" alt="Current Cover" class="w-24 h-32 object-cover rounded-lg shadow-md">
                                <div>
                                    <p class="text-sm text-gray-600">صورة الغلاف الحالية</p>
                                    <button type="button" class="text-red-500 text-sm hover:text-red-700 transition">
                                        <i class="fas fa-trash ml-1"></i>
                                        حذف الصورة
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- New Cover Image -->
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                تغيير صورة الغلاف
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500">
                                            <span class="font-semibold">اضغط لرفع</span> أو اسحب وأفلت
                                        </p>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF (MAX. 5MB)</p>
                                    </div>
                                    <input type="file" name="cover_image" class="hidden" accept="image/*" />
                                </label>
                            </div>
                        </div>

                        <!-- Book File -->
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                ملف الكتاب (PDF)
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500">
                                            <span class="font-semibold">اضغط لرفع</span> أو اسحب وأفلت
                                        </p>
                                        <p class="text-xs text-gray-500">PDF (MAX. 50MB)</p>
                                    </div>
                                    <input type="file" name="book_file" class="hidden" accept=".pdf" />
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">
                            الوسوم
                        </label>
                        <input 
                            type="text" 
                            name="tags"
                            value="<?php echo e(implode(', ', $book->tags ?? [])); ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            placeholder="علم النفس، تطوير ذاتي، صحة نفسية"
                        >
                        <p class="text-gray-500 text-sm mt-1">افصل بين الوسوم بفاصلة</p>
                    </div>

                    <!-- Featured and Published -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="featured"
                                id="featured"
                                <?php echo e($book->featured ? 'checked' : ''); ?>

                                class="ml-3 text-primary focus:ring-primary"
                            >
                            <label for="featured" class="text-gray-700 cursor-pointer">
                                كتاب مميز
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="published"
                                id="published"
                                <?php echo e($book->published ? 'checked' : ''); ?>

                                class="ml-3 text-primary focus:ring-primary"
                            >
                            <label for="published" class="text-gray-700 cursor-pointer">
                                منشور
                            </label>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                        <a href="<?php echo e(route('books.show', $book->id)); ?>" class="text-gray-600 hover:text-gray-800 transition">
                            <i class="fas fa-arrow-right ml-2"></i>
                            إلغاء
                        </a>
                        <div class="space-x-4 space-x-reverse">
                            <button type="button" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                                <i class="fas fa-save ml-2"></i>
                                حفظ مسودة
                            </button>
                            <button type="submit" class="btn-primary-custom">
                                <i class="fas fa-edit ml-2"></i>
                                تحديث الكتاب
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Book Stats -->
            <div class="card-modern p-6 mb-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-chart-bar text-primary ml-2"></i>
                    إحصائيات الكتاب
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">عدد المشاهدات</span>
                        <span class="font-semibold text-gray-800"><?php echo e($book->views ?? 0); ?></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">عدد التحميلات</span>
                        <span class="font-semibold text-gray-800"><?php echo e($book->download_count ?? 0); ?></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">تاريخ الإضافة</span>
                        <span class="font-semibold text-gray-800"><?php echo e($book->created_at->format('d M Y')); ?></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">الحالة</span>
                        <span class="px-2 py-1 rounded-full text-xs font-medium <?php echo e($book->published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'); ?>">
                            <?php echo e($book->published ? 'منشور' : 'مسودة'); ?>

                        </span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card-modern p-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-bolt text-primary ml-2"></i>
                    إجراءات سريعة
                </h3>
                <div class="space-y-2">
                    <a href="<?php echo e(route('books.show', $book->id)); ?>" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <i class="fas fa-eye text-primary ml-3"></i>
                        <span class="text-gray-700">معاينة الكتاب</span>
                    </a>
                    <button class="w-full flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition text-right">
                        <i class="fas fa-copy text-primary ml-3"></i>
                        <span class="text-gray-700">نسخ رابط الكتاب</span>
                    </button>
                    <button class="w-full flex items-center p-3 bg-red-50 rounded-lg hover:bg-red-100 transition text-right">
                        <i class="fas fa-trash text-red-500 ml-3"></i>
                        <span class="text-red-700">حذف الكتاب</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\books\edit.blade.php ENDPATH**/ ?>