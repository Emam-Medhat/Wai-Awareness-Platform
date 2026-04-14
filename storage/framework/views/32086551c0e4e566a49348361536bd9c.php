<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => null,
    'subtitle' => null,
    'image' => null,
    'footer' => null,
    'class' => null,
    'hover' => true,
    'shadow' => 'default',
    'border' => false
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
    'subtitle' => null,
    'image' => null,
    'footer' => null,
    'class' => null,
    'hover' => true,
    'shadow' => 'default',
    'border' => false
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $shadowClasses = [
        'none' => '',
        'sm' => 'shadow-sm',
        'default' => 'shadow-md',
        'lg' => 'shadow-lg',
        'xl' => 'shadow-xl',
    ];
    
    $shadowClass = $shadowClasses[$shadow] ?? $shadowClasses['default'];
    $hoverClass = $hover ? 'hover:shadow-lg hover:-translate-y-1' : '';
    $borderClass = $border ? 'border border-gray-200' : '';
?>

<div class="bg-white rounded-xl <?php echo e($shadowClass); ?> <?php echo e($hoverClass); ?> <?php echo e($borderClass); ?> transition-all duration-300 <?php echo e($class); ?>">
    <?php if($image): ?>
        <div class="aspect-w-16 aspect-h-9">
            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" class="w-full h-48 object-cover rounded-t-xl">
        </div>
    <?php endif; ?>
    
    <?php if($title || $subtitle): ?>
        <div class="p-6">
            <?php if($title): ?>
                <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo e($title); ?></h3>
            <?php endif; ?>
            
            <?php if($subtitle): ?>
                <p class="text-gray-600"><?php echo e($subtitle); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <div class="<?php echo e($image || $title || $subtitle ? 'px-6 pb-6' : 'p-6'); ?>">
        <?php echo e($slot); ?>

    </div>
    
    <?php if($footer): ?>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-xl">
            <?php echo e($footer); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\saieed\وعي\resources\views\components\card.blade.php ENDPATH**/ ?>