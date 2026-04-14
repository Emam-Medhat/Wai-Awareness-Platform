<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'placeholder' => 'ابحث...',
    'value' => null,
    'route' => null,
    'method' => 'GET',
    'autocomplete' => 'off',
    'showFilter' => false,
    'filterOptions' => [],
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
    'placeholder' => 'ابحث...',
    'value' => null,
    'route' => null,
    'method' => 'GET',
    'autocomplete' => 'off',
    'showFilter' => false,
    'filterOptions' => [],
    'class' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div x-data="{ 
    query: '<?php echo e($value ?? ''); ?>',
    filter: '<?php echo e(request('filter', 'all')); ?>',
    expanded: false,
    search() {
        const form = this.$el.querySelector('form');
        if (form) {
            form.submit();
        }
    }
}" class="relative <?php echo e($class); ?>">
    
    <form action="<?php echo e($route); ?>" method="<?php echo e($method); ?>" class="relative">
        <!-- Search Input -->
        <div class="relative">
            <input type="text" 
                   name="q" 
                   x-model="query"
                   placeholder="<?php echo e($placeholder); ?>"
                   autocomplete="<?php echo e($autocomplete); ?>"
                   @keyup.enter="search()"
                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-200">
            
            <!-- Search Icon -->
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            
            <!-- Filter Button -->
            <?php if($showFilter && count($filterOptions) > 0): ?>
                <button type="button" 
                        @click="expanded = !expanded"
                        class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                </button>
            <?php endif; ?>
        </div>
        
        <!-- Filter Dropdown -->
        <?php if($showFilter && count($filterOptions) > 0): ?>
            <div x-show="expanded" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 @click.away="expanded = false"
                 class="absolute top-full left-0 right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
                
                <div class="p-4">
                    <h4 class="font-semibold text-gray-900 mb-3">تصفية النتائج</h4>
                    
                    <div class="space-y-2">
                        <?php $__currentLoopData = $filterOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                <input type="radio" 
                                       name="filter" 
                                       value="<?php echo e($value); ?>"
                                       x-model="filter"
                                       @change="search()"
                                       class="ml-2 text-primary focus:ring-primary">
                                <span class="text-gray-700"><?php echo e($label); ?></span>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Hidden Fields (if any) -->
        <?php echo e($slot); ?>

    </form>
    
    <!-- Quick Search Suggestions (if provided) -->
    <?php if(isset($suggestions)): ?>
        <div x-show="query.length > 2 && expanded" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             class="absolute top-full left-0 right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
            
            <div class="max-h-60 overflow-y-auto">
                <?php $__currentLoopData = $suggestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" 
                            @click="query = '<?php echo e($suggestion); ?>'; search()"
                            class="w-full text-right px-4 py-3 hover:bg-gray-50 transition-colors flex items-center justify-between">
                        <span><?php echo e($suggestion); ?></span>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\saieed\وعي\resources\views\components\search-box.blade.php ENDPATH**/ ?>