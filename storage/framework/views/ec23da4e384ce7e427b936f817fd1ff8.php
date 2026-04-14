<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'id' => null,
    'title' => null,
    'size' => 'md',
    'showClose' => true,
    'closeOnEscape' => true,
    'closeOnBackdrop' => true,
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
    'id' => null,
    'title' => null,
    'size' => 'md',
    'showClose' => true,
    'closeOnEscape' => true,
    'closeOnBackdrop' => true,
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
    if (!$id) {
        $id = 'modal-' . uniqid();
    }
    
    $sizes = [
        'xs' => 'max-w-xs',
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '3xl' => 'max-w-3xl',
        '4xl' => 'max-w-4xl',
        '5xl' => 'max-w-5xl',
        '6xl' => 'max-w-6xl',
        'full' => 'max-w-full',
    ];
    
    $sizeClass = $sizes[$size] ?? $sizes['md'];
?>

<div x-data="{ 
    open: false,
    init() {
        this.$watch('open', (value) => {
            if (value) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
    },
    close() {
        this.open = false;
        this.$dispatch('modal-closed', { id: '<?php echo e($id); ?>' });
    }
}" 
x-show="open" 
x-transition:enter="transition ease-out duration-300"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0"
class="fixed inset-0 z-50 overflow-y-auto <?php echo e($class); ?>"
@keydown.escape.window="if (<?php echo e($closeOnEscape ? 'true' : 'false'); ?>) close()"
@click.self="if (<?php echo e($closeOnBackdrop ? 'true' : 'false'); ?>) close()">
    
    <!-- Backdrop -->
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="fixed inset-0 bg-black bg-opacity-50" @click="if (<?php echo e($closeOnBackdrop ? 'true' : 'false'); ?>) close()"></div>
        
        <!-- Modal Content -->
        <div x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="relative bg-white rounded-xl shadow-2xl <?php echo e($sizeClass); ?> w-full">
            
            <!-- Header -->
            <?php if($title || $showClose): ?>
                <div class="flex items-center justify-between p-6 border-b border-gray-200">
                    <?php if($title): ?>
                        <h3 class="text-xl font-semibold text-gray-900"><?php echo e($title); ?></h3>
                    <?php else: ?>
                        <div></div>
                    <?php endif; ?>
                    
                    <?php if($showClose): ?>
                        <button @click="close()" 
                                class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <!-- Body -->
            <div class="<?php echo e($title || $showClose ? 'p-6' : 'p-6 pt-6'); ?>">
                <?php echo e($slot); ?>

            </div>
            
            <!-- Footer (if provided) -->
            <?php if(isset($footer)): ?>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-xl">
                    <?php echo e($footer); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Trigger Button (if provided) -->
<?php if(isset($trigger)): ?>
    <button @click="$root.querySelector('[x-data*=\"id: \'<?php echo e($id); ?>\'\"]').__x.$data.open = true">
        <?php echo e($trigger); ?>

    </button>
<?php endif; ?>
<?php /**PATH D:\saieed\وعي\resources\views\components\modal.blade.php ENDPATH**/ ?>