<?php $__env->startSection('title', $book->title); ?>

<?php $__env->startSection('content'); ?>

<style>
  /* ══ WA3Y BOOK SHOW PAGE ══════════════════════════════════════════ */

  /* ── CSS Variables ── */
  :root {
    --wa3y-green: #2D5E3A;
    --wa3y-green-dark: #1e3f27;
    --wa3y-green-mid: #3d7a4e;
    --wa3y-teal: #3A7D6E;
    --wa3y-gold: #C4A882;
    --wa3y-gold-dark: #a8885e;
    --wa3y-gold-light: #d4bfa0;
    --wa3y-cream: #F0EFEC;
    --wa3y-cream-dark: #e5e3de;
    --wa3y-white: #ffffff;
    --wa3y-text-dark: #1a2e20;
    --wa3y-text-mid: #4a5e50;
    --wa3y-text-light: #7a8e80;
  }

  /* ── Hero Section ── */
  .book-hero {
    background: linear-gradient(135deg, var(--wa3y-green) 0%, var(--wa3y-teal) 100%);
    padding: 4rem 0 3rem;
    position: relative; overflow: hidden;
  }

  .book-hero::before {
    content: '';
    position: absolute; inset: 0;
    background-image: radial-gradient(circle, rgba(196,168,130,0.1) 1px, transparent 1px);
    background-size: 28px 28px;
  }

  .book-hero::after {
    content: '';
    position: absolute;
    bottom: -2px; left: 0; right: 0; height: 60px;
    background: var(--wa3y-cream);
    clip-path: ellipse(55% 100% at 50% 100%);
  }

  .book-cover-container {
    position: relative; z-index: 10;
    text-align: center;
  }

  .book-cover {
    width: 280px; height: 400px;
    background: var(--wa3y-white);
    border-radius: 15px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    overflow: hidden;
    margin: 0 auto;
    position: relative;
  }

  .book-cover img {
    width: 100%; height: 100%;
    object-fit: cover;
  }

  .book-cover-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg, var(--wa3y-cream), var(--wa3y-gold-light));
    color: var(--wa3y-green-dark);
    font-size: 4rem;
  }

  .featured-badge {
    position: absolute; top: -10px; right: -10px;
    background: var(--wa3y-gold);
    color: var(--wa3y-green-dark);
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: 700; font-size: 0.8rem;
    box-shadow: 0 4px 12px rgba(196,168,130,0.4);
    z-index: 20;
  }

  /* ── Book Info ── */
  .book-info {
    color: white;
    height: 100%;
    display: flex; flex-direction: column;
    justify-content: center;
  }

  .book-title {
    font-size: 2.5rem; font-weight: 900;
    line-height: 1.1; margin-bottom: 1.5rem;
  }

  .book-meta {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem; margin-bottom: 2rem;
  }

  .meta-item {
    display: flex; align-items: center;
    gap: 0.75rem;
    font-size: 1.1rem;
    opacity: 0.95;
  }

  .meta-icon {
    width: 24px; height: 24px;
    display: flex; align-items: center; justify-content: center;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    font-size: 0.8rem;
  }

  /* ── Action Buttons ── */
  .action-buttons {
    display: flex; gap: 1rem;
    flex-wrap: wrap;
  }

  .btn-download {
    background: var(--wa3y-gold);
    color: var(--wa3y-green-dark);
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 700; font-size: 1rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex; align-items: center;
    gap: 0.5rem;
    position: relative;
    z-index: 10;
    pointer-events: auto;
  }

  .btn-download:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(196,168,130,0.4);
    color: var(--wa3y-green-dark);
  }

  .btn-back {
    background: rgba(255,255,255,0.2);
    color: white;
    border: 2px solid rgba(255,255,255,0.3);
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600; font-size: 1rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex; align-items: center;
    gap: 0.5rem;
  }

  .btn-back:hover {
    background: rgba(255,255,255,0.3);
    color: white;
    transform: translateY(-2px);
  }

  /* ── Content Sections ── */
  .content-section {
    background: var(--wa3y-white);
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    padding: 2rem;
    margin-bottom: 2rem;
  }

  .section-title {
    font-size: 1.5rem; font-weight: 700;
    color: var(--wa3y-text-dark);
    margin-bottom: 1.5rem;
    position: relative;
    padding-right: 1rem;
  }

  .section-title::before {
    content: '';
    position: absolute; right: 0; top: 50%;
    transform: translateY(-50%);
    width: 4px; height: 24px;
    background: var(--wa3y-green);
    border-radius: 2px;
  }

  .book-description {
    color: var(--wa3y-text-mid);
    line-height: 1.8; font-size: 1.05rem;
    text-align: justify;
  }

  .book-content {
    color: var(--wa3y-text-dark);
    line-height: 1.8; font-size: 1.05rem;
    text-align: justify;
  }

  /* ── Stats Card ── */
  .stats-grid {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
  }

  .stat-item {
    text-align: center; padding: 1rem;
    background: var(--wa3y-cream);
    border-radius: 12px;
  }

  .stat-value {
    font-size: 1.5rem; font-weight: 700;
    color: var(--wa3y-green);
    margin-bottom: 0.25rem;
  }

  .stat-label {
    color: var(--wa3y-text-mid);
    font-size: 0.9rem;
  }

  /* ── Related Books ── */
  .related-book {
    display: flex; align-items: center;
    gap: 1rem; padding: 1rem;
    background: var(--wa3y-cream);
    border-radius: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
    color: inherit;
  }

  .related-book:hover {
    background: var(--wa3y-cream-dark);
    transform: translateX(5px);
    color: inherit;
  }

  .related-book-cover {
    width: 60px; height: 80px;
    background: var(--wa3y-white);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    color: var(--wa3y-green);
    font-size: 1.5rem;
    flex-shrink: 0;
  }

  .related-book-info h5 {
    font-weight: 600; color: var(--wa3y-text-dark);
    margin-bottom: 0.25rem;
  }

  .related-book-info p {
    color: var(--wa3y-text-mid);
    font-size: 0.9rem;
    margin: 0;
  }

  /* ── Tags ── */
  .tags-container {
    display: flex; flex-wrap: wrap;
    gap: 0.5rem;
  }

  .tag {
    background: var(--wa3y-cream);
    color: var(--wa3y-text-mid);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.85rem;
    font-weight: 500;
  }

  /* ── Responsive ── */
  @media (max-width: 768px) {
    .book-title {
      font-size: 2rem;
    }
    
    .book-cover {
      width: 200px; height: 280px;
    }
    
    .action-buttons {
      justify-content: center;
    }
    
    .btn-download, .btn-back {
      flex: 1; min-width: 150px;
      justify-content: center;
    }
  }
</style>

<!-- ── Hero Section ── -->
<div class="book-hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4">
        <div class="book-cover-container">
          <div class="book-cover">
            <?php if($book->cover_image): ?>
              <img src="<?php echo e($book->cover_image_url); ?>" alt="<?php echo e($book->title); ?>">
            <?php else: ?>
              <div class="book-cover-placeholder">
                <i class="bi bi-book"></i>
              </div>
            <?php endif; ?>
          </div>
          <?php if($book->featured): ?>
            <div class="featured-badge">
              <i class="bi bi-star-fill me-1"></i>
              كتاب مميز
            </div>
          <?php endif; ?>
        </div>
      </div>
      
      <div class="col-lg-8">
        <div class="book-info">
          <h1 class="book-title"><?php echo e($book->title); ?></h1>
          
          <div class="book-meta">
            <div class="meta-item">
              <div class="meta-icon">
                <i class="bi bi-person"></i>
              </div>
              <span><?php echo e($book->author_name); ?></span>
            </div>
            
            <?php if($book->author_title): ?>
            <div class="meta-item">
              <div class="meta-icon">
                <i class="bi bi-award"></i>
              </div>
              <span><?php echo e($book->author_title); ?></span>
            </div>
            <?php endif; ?>
            
            <div class="meta-item">
              <div class="meta-icon">
                <i class="bi bi-tag"></i>
              </div>
              <span><?php echo e($book->category_label ?? $book->category); ?></span>
            </div>
            
            <div class="meta-item">
              <div class="meta-icon">
                <i class="bi bi-globe"></i>
              </div>
              <span><?php echo e($book->language_label); ?></span>
            </div>
            
            <?php if($book->pages): ?>
            <div class="meta-item">
              <div class="meta-icon">
                <i class="bi bi-file-earmark-text"></i>
              </div>
              <span><?php echo e($book->pages); ?> صفحة</span>
            </div>
            <?php endif; ?>
            
            <?php if($book->publication_date): ?>
            <div class="meta-item">
              <div class="meta-icon">
                <i class="bi bi-calendar"></i>
              </div>
              <span><?php echo e($book->publication_date->format('Y/m/d')); ?></span>
            </div>
            <?php endif; ?>
            
            <?php if($book->isbn): ?>
            <div class="meta-item">
              <div class="meta-icon">
                <i class="bi bi-upc"></i>
              </div>
              <span>ISBN: <?php echo e($book->isbn); ?></span>
            </div>
            <?php endif; ?>
          </div>
          
          <div class="action-buttons">
            <?php if($book->pdf_file): ?>
              <a href="<?php echo e(route('books.download', $book->slug)); ?>" 
                 class="btn-download"
                 onclick="console.log('Download clicked, URL:', '<?php echo e(route('books.download', $book->slug)); ?>'); return true;">
                <i class="bi bi-download"></i>
                تحميل الكتاب
              </a>
            <?php else: ?>
              <button class="btn-download" disabled>
                <i class="bi bi-x-circle"></i>
                غير متاح للتحميل
              </button>
            <?php endif; ?>
            
            <a href="<?php echo e(route('books')); ?>" class="btn-back">
              <i class="bi bi-arrow-right"></i>
              العودة للكتب
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ── Content Section ── -->
<div class="container my-5">
  <div class="row">
    <div class="col-lg-8">
      <!-- Description -->
      <div class="content-section">
        <h2 class="section-title">وصف الكتاب</h2>
        <div class="book-description">
          <?php echo $book->description; ?>

        </div>
      </div>
      
      <!-- Content -->
      <?php if($book->content): ?>
      <div class="content-section">
        <h2 class="section-title">محتوى الكتاب</h2>
        <div class="book-content">
          <?php echo $book->content; ?>

        </div>
      </div>
      <?php endif; ?>
      
      <!-- Tags -->
      <?php if($book->tags && count($book->tags) > 0): ?>
      <div class="content-section">
        <h2 class="section-title">الكلمات المفتاحية</h2>
        <div class="tags-container">
          <?php $__currentLoopData = $book->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="tag"><?php echo e($tag); ?></span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
    
    <div class="col-lg-4">
      <!-- Statistics -->
      <div class="content-section">
        <h2 class="section-title">الإحصائيات</h2>
        <div class="stats-grid">
          <div class="stat-item">
            <div class="stat-value"><?php echo e($book->formatted_views); ?></div>
            <div class="stat-label">المشاهدات</div>
          </div>
          <div class="stat-item">
            <div class="stat-value"><?php echo e($book->formatted_download_count); ?></div>
            <div class="stat-label">التحميلات</div>
          </div>
          <div class="stat-item">
            <div class="stat-value"><?php echo e($book->rating); ?></div>
            <div class="stat-label">التقييم</div>
          </div>
          <div class="stat-item">
            <div class="stat-value"><?php echo e($book->file_size_label ?? '-'); ?></div>
            <div class="stat-label">الحجم</div>
          </div>
        </div>
      </div>
      
      <!-- Related Books -->
      <?php if(isset($relatedBooks) && $relatedBooks->count() > 0): ?>
      <div class="content-section">
        <h2 class="section-title">كتب ذات صلة</h2>
        <div class="related-books">
          <?php $__currentLoopData = $relatedBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('books.show', $relatedBook->slug)); ?>" class="related-book">
              <div class="related-book-cover">
                <?php if($relatedBook->cover_image): ?>
                  <img src="<?php echo e($relatedBook->cover_image_url); ?>" alt="<?php echo e($relatedBook->title); ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                <?php else: ?>
                  <i class="bi bi-book"></i>
                <?php endif; ?>
              </div>
              <div class="related-book-info">
                <h5><?php echo e($relatedBook->title); ?></h5>
                <p><?php echo e($relatedBook->author_name); ?></p>
              </div>
            </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  console.log('Book show page loaded');
  
  const downloadBtn = document.querySelector('.btn-download');
  if (downloadBtn) {
    console.log('Download button found:', downloadBtn);
    console.log('Download button href:', downloadBtn.href);
    
    downloadBtn.addEventListener('click', function(e) {
      console.log('Download button clicked!');
      console.log('Event:', e);
      console.log('Href:', this.href);
      
      // Don't prevent default, let it work normally
      // Just log for debugging
    });
  } else {
    console.log('Download button not found');
  }
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\books\show.blade.php ENDPATH**/ ?>