<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['video']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['video']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
    <?php if($video->thumbnail): ?>
        <a href="<?php echo e(route('videos.show', $video->slug)); ?>" class="relative block">
            <img src="<?php echo e($video->thumbnail_url); ?>" alt="<?php echo e($video->title); ?>" class="w-full h-48 object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <div class="bg-white bg-opacity-90 rounded-full p-3">
                    <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <?php if($video->is_featured): ?>
                <span class="absolute top-2 left-2 bg-secondary text-primary text-xs px-2 py-1 rounded-full">مميز</span>
            <?php endif; ?>
        </a>
    <?php endif; ?>
    
    <div class="p-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-secondary font-medium">
                <?php echo e($video->presenter_type === 'doctor' ? 'دكتور' : ($video->presenter_type === 'psychologist' ? 'أخصائي نفسي' : 'مقدم')); ?>

            </span>
            <span class="text-sm text-gray-500"><?php echo e($video->formatted_duration); ?></span>
        </div>
        
        <h3 class="text-xl font-bold mb-2">
            <a href="<?php echo e(route('videos.show', $video->slug)); ?>" class="text-gray-800 hover:text-primary transition">
                <?php echo e($video->title); ?>

            </a>
        </h3>
        
        <?php if($video->description): ?>
            <p class="text-gray-600 mb-4 line-clamp-2">
                <?php echo e($video->description); ?>

            </p>
        <?php endif; ?>
        
        <div class="flex items-center justify-between text-sm text-gray-500">
            <div class="flex items-center space-x-2 space-x-reverse">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                <span><?php echo e($video->formatted_views); ?></span>
            </div>
            
            <div class="flex items-center space-x-2 space-x-reverse">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span><?php echo e($video->duration_type === 'short' ? 'قصير' : ($video->duration_type === 'medium' ? 'متوسط' : 'طويل')); ?></span>
            </div>
        </div>
        
        <?php if($video->category): ?>
            <div class="mt-3">
                <span class="inline-block bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">
                    <?php echo e($video->category === 'psychology' ? 'علم النفس' : ($video->category === 'thinking_anxiety' ? 'القلق والتفكير' : ($video->category === 'addiction' ? 'الإدمان' : 'أخرى'))); ?>

                </span>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\saieed\وعي\resources\views\components\video-card.blade.php ENDPATH**/ ?>