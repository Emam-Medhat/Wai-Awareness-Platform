<?php
  $categoryLabels = [
    'psychology' => 'علم النفس',
    'addiction' => 'الإدمان',
    'relationships' => 'العلاقات', 
    'self_development' => 'التطوير الذاتي',
    'family' => 'الأسرة والطفل'
  ];
?>

<div class="bk" data-sr="up" data-sr-d="<?php echo e(($idx % 3) + 1); ?>">
  <div class="bk-img">
    <?php if($book->cover_image): ?>
      <img src="<?php echo e(asset('storage/'.$book->cover_image)); ?>" alt="<?php echo e($book->title); ?>">
    <?php else: ?>
      <div class="bk-ph">
        <i class="bi bi-book-fill"></i>
      </div>
    <?php endif; ?>

    <div class="bk-overlay">
      <a href="<?php echo e(route('books.show', $book->slug ?? $book->id)); ?>" class="ov-btn ov-read">
        <i class="bi bi-book-half"></i> قراءة
      </a>
      <?php if($book->pdf_file): ?>
      <a href="<?php echo e(route('books.download', $book->slug ?? $book->id)); ?>" class="ov-btn ov-dl">
        <i class="bi bi-download"></i> تحميل
      </a>
      <?php endif; ?>
    </div>

    <?php if($book->category): ?>
      <span class="bk-badge bk-cat-b"><?php echo e($categoryLabels[$book->category] ?? $book->category); ?></span>
    <?php endif; ?>
    <span class="bk-badge bk-lang-b"><?php echo e($book->language === 'ar' ? 'عربي' : 'EN'); ?></span>
    <?php if($book->pages): ?>
      <span class="bk-badge bk-pg-b"><i class="bi bi-file-text"></i> <?php echo e($book->pages); ?> ص</span>
    <?php endif; ?>
  </div>

  <div class="bk-body">
    <div class="bk-title"><?php echo e($book->title); ?></div>
    <div class="bk-auth">
      <i class="bi bi-person-fill"></i>
      <?php echo e($book->author_name); ?>

    </div>

    <?php if($book->description): ?>
    <div class="bk-desc">
      <?php echo e($book->description); ?>

    </div>
    <?php endif; ?>

    <div class="bk-foot">
      <div class="bk-stats">
        <span class="bk-stat"><i class="bi bi-eye"></i> <?php echo e(number_format($book->views ?? 0)); ?></span>
        <span class="bk-stat"><i class="bi bi-download"></i> <?php echo e(number_format($book->download_count ?? 0)); ?></span>
      </div>
      <a href="<?php echo e(route('books.show', $book->slug ?? $book->id)); ?>" class="bk-read">
        قراءة
      </a>
    </div>
  </div>
</div>
<?php /**PATH D:\saieed\وعي\resources\views\partials\book-card.blade.php ENDPATH**/ ?>