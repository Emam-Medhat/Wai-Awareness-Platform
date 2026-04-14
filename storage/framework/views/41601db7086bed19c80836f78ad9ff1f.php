<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['user', 'showCity = true, 'showDate = true]));

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

foreach (array_filter((['user', 'showCity = true, 'showDate = true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="bg-white rounded-lg shadow-md p-6 text-center">
    <img src="<?php echo e($user->avatar_url); ?>" alt="<?php echo e($user->display_name); ?>" class="w-20 h-20 rounded-full mx-auto mb-4">
    
    <h4 class="text-lg font-bold mb-2"><?php echo e($user->display_name); ?></h4>
    
    <?php if($showCity && isset($user->author_city)): ?>
        <p class="text-gray-600 text-sm mb-2">
            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <?php echo e($user->author_city); ?>

        </p>
    <?php endif; ?>
    
    <?php if(isset($user->author_age)): ?>
        <p class="text-gray-600 text-sm mb-3">
            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <?php echo e($user->age_with_label); ?>

        </p>
    <?php endif; ?>
    
    <div class="text-gray-700 mb-4">
        <?php echo e(Str::limit($user->content, 150)); ?>

    </div>
    
    <?php if($showDate && isset($user->created_at)): ?>
        <p class="text-gray-500 text-xs">
            <?php echo e($user->created_at->format('Y-m-d')); ?>

        </p>
    <?php endif; ?>
</div>
<?php /**PATH D:\saieed\وعي\resources\views\components\user-card.blade.php ENDPATH**/ ?>