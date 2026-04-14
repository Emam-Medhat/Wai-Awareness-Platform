<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => null,
    'value' => null,
    'icon' => null,
    'trend' => null,
    'trendValue' => null,
    'color' => 'primary',
    'size' => 'md',
    'loading' => false,
    'class' => null
]));

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

foreach (array_filter(([
    'title' => null,
    'value' => null,
    'icon' => null,
    'trend' => null,
    'trendValue' => null,
    'color' => 'primary',
    'size' => 'md',
    'loading' => false,
    'class' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $colors = [
        'primary' => 'bg-primary text-white',
        'secondary' => 'bg-secondary text-white',
        'success' => 'bg-green-500 text-white',
        'danger' => 'bg-red-500 text-white',
        'warning' => 'bg-yellow-500 text-white',
        'info' => 'bg-blue-500 text-white',
        'gray' => 'bg-gray-500 text-white',
    ];
    
    $bgColors = [
        'primary' => 'bg-primary-100 text-primary',
        'secondary' => 'bg-secondary-100 text-secondary',
        'success' => 'bg-green-100 text-green-600',
        'danger' => 'bg-red-100 text-red-600',
        'warning' => 'bg-yellow-100 text-yellow-600',
        'info' => 'bg-blue-100 text-blue-600',
        'gray' => 'bg-gray-100 text-gray-600',
    ];
    
    $sizes = [
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
    ];
    
    $colorClass = $colors[$color] ?? $colors['primary'];
    $bgColorClass = $bgColors[$color] ?? $bgColors['primary'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
?>

<div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 <?php echo e($class); ?>">
    <div class="<?php echo e($sizeClass); ?>">
        <div class="flex items-center justify-between">
            <div>
                <?php if($title): ?>
                    <p class="text-sm font-medium text-gray-600 mb-1"><?php echo e($title); ?></p>
                <?php endif; ?>
                
                <?php if($loading): ?>
                    <div class="animate-pulse">
                        <div class="h-8 bg-gray-200 rounded w-24 mb-2"></div>
                    </div>
                <?php else: ?>
                    <p class="text-2xl font-bold text-gray-900">
                        <?php echo e($value ?? '0'); ?>

                    </p>
                <?php endif; ?>
                
                <?php if($trend && $trendValue !== null): ?>
                    <div class="flex items-center mt-2">
                        <?php if($trend === 'up'): ?>
                            <svg class="w-4 h-4 text-green-500 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            <span class="text-sm text-green-600">+<?php echo e($trendValue); ?>%</span>
                        <?php elseif($trend === 'down'): ?>
                            <svg class="w-4 h-4 text-red-500 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                            </svg>
                            <span class="text-sm text-red-600">-<?php echo e($trendValue); ?>%</span>
                        <?php else: ?>
                            <svg class="w-4 h-4 text-gray-500 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"></path>
                            </svg>
                            <span class="text-sm text-gray-600"><?php echo e($trendValue); ?>%</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if($icon): ?>
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 <?php echo e($bgColorClass); ?> rounded-lg flex items-center justify-center">
                        <?php echo $icon; ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if(isset($description)): ?>
            <p class="text-sm text-gray-600 mt-3"><?php echo e($description); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\saieed\وعي\resources\views\components\stat-card.blade.php ENDPATH**/ ?>