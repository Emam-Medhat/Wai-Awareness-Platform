<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'primary',
    'size' => 'md',
    'pill' => false,
    'dot' => false,
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
    'variant' => 'primary',
    'size' => 'md',
    'pill' => false,
    'dot' => false,
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
    $variants = [
        'primary' => 'bg-primary text-white',
        'secondary' => 'bg-secondary text-white',
        'success' => 'bg-green-100 text-green-800',
        'danger' => 'bg-red-100 text-red-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'info' => 'bg-blue-100 text-blue-800',
        'gray' => 'bg-gray-100 text-gray-800',
        'outline-primary' => 'border border-primary text-primary',
        'outline-secondary' => 'border border-secondary text-secondary',
    ];
    
    $sizes = [
        'xs' => 'px-1.5 py-0.5 text-xs',
        'sm' => 'px-2 py-1 text-sm',
        'md' => 'px-2.5 py-1 text-sm',
        'lg' => 'px-3 py-1.5 text-base',
    ];
    
    $variantClass = $variants[$variant] ?? $variants['primary'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $pillClass = $pill ? 'rounded-full' : 'rounded';
    $dotClass = $dot ? 'relative pl-6' : '';
?>

<span class="inline-flex items-center font-medium <?php echo e($variantClass); ?> <?php echo e($sizeClass); ?> <?php echo e($pillClass); ?> <?php echo e($dotClass); ?> <?php echo e($class); ?>">
    <?php if($dot): ?>
        <span class="absolute right-2 top-1/2 transform -translate-y-1/2 w-2 h-2 bg-current rounded-full"></span>
    <?php endif; ?>
    
    <?php echo e($slot); ?>

</span>
<?php /**PATH D:\saieed\وعي\resources\views\components\badge.blade.php ENDPATH**/ ?>