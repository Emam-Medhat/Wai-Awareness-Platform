<?php $__env->startSection('title', 'آراء العملاء'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-wrapper">
    <!-- Hero Section -->
    <section class="hero-gradient hero-pattern text-white py-20 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="hero-title mb-6">آراء العملاء</h1>
                <p class="hero-subtitle max-w-2xl mx-auto">
                    شهادات حقيقية من عملائنا الذين استفادوا من خدماتنا وحققوا نتائج مذهلة
                </p>
            </div>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="py-20 bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo e($index * 100); ?>">
                        <!-- Card Header -->
                        <div class="bg-gradient-to-r from-primary to-primary-dark p-6 text-white">
                            <div class="flex justify-center mb-4">
                                <?php for($j = 1; $j <= $testimonial['rating']; $j++): ?>
                                    <i class="fas fa-star text-yellow-300 text-2xl ml-1"></i>
                                <?php endfor; ?>
                                <?php for($j = $testimonial['rating']; $j < 5; $j++): ?>
                                    <i class="far fa-star text-yellow-300 text-2xl ml-1"></i>
                                <?php endfor; ?>
                            </div>
                            <div class="text-center">
                                <i class="fas fa-quote-right text-4xl text-white opacity-30"></i>
                            </div>
                        </div>
                        
                        <!-- Card Body -->
                        <div class="p-8">
                            <p class="text-gray-700 mb-8 text-center leading-relaxed text-lg font-medium">
                                "<?php echo e($testimonial['content']); ?>"
                            </p>
                            
                            <!-- Client Info -->
                            <div class="flex items-center justify-center border-t pt-6">
                                <img src="<?php echo e($testimonial['avatar']); ?>" alt="<?php echo e($testimonial['name']); ?>" class="w-16 h-16 rounded-full border-4 border-primary border-opacity-20 shadow-lg">
                                <div class="mr-4">
                                    <h4 class="font-bold text-gray-800 text-lg"><?php echo e($testimonial['name']); ?></h4>
                                    <p class="text-gray-500 text-sm"><?php echo e($testimonial['role']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 bg-gradient-to-r from-primary to-primary-dark text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">أرقام تحدث عن نفسها</h2>
                <p class="text-gray-200 text-lg">نتائج ملموسة وإنجازات حقيقية</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg rounded-2xl p-8 border border-white border-opacity-20">
                        <div class="text-5xl font-bold text-yellow-300 mb-4">10,000+</div>
                        <p class="text-gray-200">عميل سعيد</p>
                    </div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg rounded-2xl p-8 border border-white border-opacity-20">
                        <div class="text-5xl font-bold text-yellow-300 mb-4">98%</div>
                        <p class="text-gray-200">نسبة الرضا</p>
                    </div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg rounded-2xl p-8 border border-white border-opacity-20">
                        <div class="text-5xl font-bold text-yellow-300 mb-4">500+</div>
                        <p class="text-gray-200">خبير متخصص</p>
                    </div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg rounded-2xl p-8 border border-white border-opacity-20">
                        <div class="text-5xl font-bold text-yellow-300 mb-4">24/7</div>
                        <p class="text-gray-200">دعم مستمر</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Testimonials -->
    <section class="py-20 bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">شهادات فيديو</h2>
                <p class="text-gray-600 text-lg">استمع إلى قصص نجاح عملائنا</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $videoTestimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo e($index * 100); ?>">
                        <div class="relative h-56 overflow-hidden">
                            <img src="<?php echo e($video['thumbnail']); ?>" alt="<?php echo e($video['title']); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <div class="w-20 h-20 bg-white bg-opacity-90 rounded-full flex items-center justify-center cursor-pointer hover:scale-110 transition-all duration-300 shadow-xl">
                                    <i class="fas fa-play text-primary text-2xl mr-1"></i>
                                </div>
                            </div>
                            <!-- Video Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold flex items-center">
                                    <i class="fas fa-play-circle ml-2"></i>
                                    فيديو
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <h4 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-primary transition"><?php echo e($video['title']); ?></h4>
                            <p class="text-gray-600 mb-6 leading-relaxed"><?php echo e($video['description']); ?></p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="<?php echo e($video['avatar']); ?>" alt="<?php echo e($video['client_name']); ?>" class="w-12 h-12 rounded-full border-3 border-primary border-opacity-20 shadow-md ml-3">
                                    <div>
                                        <p class="text-gray-800 font-semibold"><?php echo e($video['client_name']); ?></p>
                                        <p class="text-gray-500 text-sm"><?php echo e($video['client_role']); ?></p>
                                    </div>
                                </div>
                                <button class="text-primary hover:text-primary-dark transition">
                                    <i class="fas fa-arrow-left text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-secondary to-orange-500 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <div data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">انضم إلى آلاف العملاء السعداء</h2>
                <p class="text-xl mb-8 text-gray-100 max-w-2xl mx-auto">
                    ابدأ رحلتك اليوم وكن القصة التالية للنجاح
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo e(route('register')); ?>" class="bg-white text-secondary px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition inline-flex items-center justify-center transform hover:scale-105 shadow-lg">
                        <i class="fas fa-user-plus ml-2"></i>
                        ابدأ الآن
                    </a>
                    <a href="<?php echo e(route('contact')); ?>" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-secondary transition inline-flex items-center justify-center transform hover:scale-105">
                        <i class="fas fa-phone ml-2"></i>
                        تواصل معنا
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\pages\testimonials.blade.php ENDPATH**/ ?>