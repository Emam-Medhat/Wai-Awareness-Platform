<?php $__env->startSection('title', 'الكتب'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="container mx-auto px-4 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">مكتبة الكتب</h1>
                <p class="text-xl opacity-90">مجموعة مختارة من الكتب القيمة في مجال التوعية والصحة النفسية</p>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form method="GET" action="<?php echo e(route('books.index')); ?>" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">البحث</label>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="ابحث عن كتاب...">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">التصنيف</label>
                    <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع التصنيفات</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category); ?>" <?php echo e(request('category') == $category ? 'selected' : ''); ?>>
                                <?php echo e($category); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">اللغة</label>
                    <select name="language" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع اللغات</option>
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($lang); ?>" <?php echo e(request('language') == $lang ? 'selected' : ''); ?>>
                                <?php echo e($lang == 'ar' ? 'العربية' : 'الإنجليزية'); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">المميزة</label>
                    <select name="featured" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">الكل</option>
                        <option value="1" <?php echo e(request('featured') == '1' ? 'selected' : ''); ?>>المميزة فقط</option>
                    </select>
                </div>
                
                <div class="md:col-span-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        بحث
                    </button>
                    <a href="<?php echo e(route('books.index')); ?>" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 transition mr-2">
                        مسح
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Books Grid -->
    <div class="container mx-auto px-4 py-8">
        <?php if($books->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <div class="relative">
                            <?php if($book->is_featured): ?>
                                <span class="absolute top-2 right-2 bg-yellow-400 text-yellow-900 px-2 py-1 rounded-full text-xs font-semibold">
                                    مميز
                                </span>
                            <?php endif; ?>
                            
                            <div class="h-64 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                <i class="fas fa-book text-6xl text-blue-600"></i>
                            </div>
                        </div>
                        
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2 line-clamp-2"><?php echo e($book->title); ?></h3>
                            <p class="text-gray-600 text-sm mb-2">المؤلف: <?php echo e($book->author_name); ?></p>
                            <p class="text-gray-600 text-sm mb-2">التصنيف: <?php echo e($book->category); ?></p>
                            <p class="text-gray-600 text-sm mb-2">الصفحات: <?php echo e($book->pages); ?></p>
                            <p class="text-gray-600 text-sm mb-2">اللغة: <?php echo e($book->language == 'ar' ? 'العربية' : 'الإنجليزية'); ?></p>
                            
                            <div class="flex justify-between items-center mt-4">
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-eye ml-1"></i> <?php echo e(number_format($book->views)); ?>

                                    <i class="fas fa-download ml-2 mr-1"></i> <?php echo e(number_format($book->download_count)); ?>

                                </div>
                            </div>
                            
                            <div class="mt-4 flex gap-2">
                                <a href="<?php echo e(route('books.show', $book->slug)); ?>" 
                                   class="flex-1 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700 transition">
                                    عرض
                                </a>
                                <a href="<?php echo e(route('books.download', $book->slug)); ?>" 
                                   class="flex-1 bg-green-600 text-white text-center py-2 rounded hover:bg-green-700 transition">
                                    تحميل
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <!-- Pagination -->
            <div class="mt-8">
                <?php echo e($books->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <i class="fas fa-book text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">لا توجد كتب</h3>
                <p class="text-gray-500">لم يتم العثور على كتب تطابق معايير البحث</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\books\index-old.blade.php ENDPATH**/ ?>