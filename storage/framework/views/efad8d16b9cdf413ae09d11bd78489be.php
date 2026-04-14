<?php $__env->startSection('title', 'العادات'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ════════════════════════════════════════════
   WA3Y HABITS PAGE — SITE CONSISTENT DESIGN
════════════════════════════════════════════ */
:root{
  --g1: #2C5F2D;
  --g2: #4A7C59;
  --g3: #97BC62;
  --teal: #3A7D6E;
  --gold: #C4A882;
  --gold2: #a8885e;
  --cream: #F0EFEC;
  --cream2: #e5e3de;
  --dark: #1a2e20;
  --accent: #E91E63;
  --accent-light: #F48FB1;
  --accent-dark: #C2185B;
}
.habits-page{font-family:'Tajawal',sans-serif}

/* ════ HERO ════════════════════════════════ */
.habits-hero{
  min-height:80vh;background:var(--dark);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.habits-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 60% at 20% 20%, rgba(44,95,45,.55) 0%, transparent 60%),
    radial-gradient(ellipse 60% 80% at 80% 80%, rgba(58,125,110,.4) 0%, transparent 55%),
    radial-gradient(ellipse 50% 50% at 50% 50%, rgba(196,168,130,.08) 0%, transparent 70%),
    linear-gradient(170deg, #0d1f13 0%, #1a2e20 50%, #0a1a10 100%);
}
.habits-hero-grid{
  position:absolute;inset:0;
  background-image:radial-gradient(circle, rgba(196,168,130,.18) 1px, transparent 1px);
  background-size:40px 40px;animation:dotsDrift 20s linear infinite;
}
@keyframes dotsDrift{0%{transform:translateY(0)}100%{transform:translateY(40px)}}
.habits-orb{position:absolute;border-radius:50%;filter:blur(100px);pointer-events:none}
.habits-orb-1{width:600px;height:600px;background:radial-gradient(circle, rgba(44,95,45,.35) 0%, transparent 70%);top:-100px;right:-100px;animation:glowPulse 8s ease-in-out infinite}
.habits-orb-2{width:500px;height:500px;background:radial-gradient(circle, rgba(58,125,110,.25) 0%, transparent 70%);bottom:-80px;left:-80px;animation:glowPulse 10s ease-in-out infinite reverse}
.habits-orb-3{width:300px;height:300px;background:radial-gradient(circle, rgba(196,168,130,.15) 0%, transparent 70%);top:50%;left:45%;animation:glowPulse 6s ease-in-out infinite;animation-delay:3s}
@keyframes glowPulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.2);opacity:.6}}
.habits-shape{position:absolute;border-radius:50%;background:linear-gradient(135deg,rgba(196,168,130,.1),rgba(44,95,45,.05));border:1px solid rgba(196,168,130,.08);animation:floatShape 20s infinite ease-in-out}
.habits-shape:nth-child(3){width:80px;height:80px;top:15%;right:12%;animation-delay:0s}
.habits-shape:nth-child(4){width:55px;height:55px;top:70%;right:28%;animation-delay:5s}
.habits-shape:nth-child(5){width:95px;height:95px;top:35%;left:8%;animation-delay:10s}
@keyframes floatShape{0%,100%{transform:translateY(0) translateX(0) rotate(0deg)}25%{transform:translateY(-30px) translateX(20px) rotate(90deg)}50%{transform:translateY(-15px) translateX(-15px) rotate(180deg)}75%{transform:translateY(-25px) translateX(10px) rotate(270deg)}}

/* Site consistent animations */
@keyframes fadeSlideDown{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
@keyframes blink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 6px rgba(74,222,128,0)}}
@keyframes shimmerText{0%{background-position:200% center}100%{background-position:-200% center}}
.habits-tag{animation:fadeSlideDown .8s .1s ease both}
.habits-h1{animation:fadeSlideDown .9s .22s ease both}
.habits-p{animation:fadeSlideDown .8s .38s ease both}
.habits-chips{animation:fadeSlideDown .8s .52s ease both}
.habits-dot{width:8px;height:8px;border-radius:50%;background:#4ade80;animation:blink 1.5s ease-in-out infinite}
.habits-shine{background:linear-gradient(135deg,var(--gold) 0%,#fff 50%,var(--gold) 100%);background-size:200% auto;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmerText 4s linear infinite;filter:drop-shadow(0 2px 8px rgba(196,168,130,.3))}

/* ════ CONTENT SECTIONS ═════════════════════════ */
.content-sec{background:var(--cream);padding:5rem 0 4rem}
.content-container{max-width:1200px;margin:0 auto}
.section-header{text-align:center;margin-bottom:3rem}
.section-badge{display:inline-flex;align-items:center;gap:.5rem;background:rgba(44,95,45,.1);color:var(--g1);padding:.6rem 1.2rem;border-radius:100px;font-weight:600;font-size:.875rem;margin-bottom:1rem}
.section-title{font-size:2.5rem;font-weight:900;color:var(--dark);margin-bottom:1rem}
.section-subtitle{font-size:1.1rem;color:#6b7280;line-height:1.6}

/* ════ HABITS GRID ═════════════════════════ */
.habits-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:2rem;margin-bottom:4rem}
.habit-card{background:#fff;border-radius:20px;border:1px solid rgba(44,95,45,.08);overflow:hidden;transition:all .4s cubic-bezier(.4,0,.2,1);box-shadow:0 12px 40px rgba(44,95,45,.08)}
.habit-card:hover{transform:translateY(-8px) scale(1.02);box-shadow:0 24px 80px rgba(44,95,45,.15);border-color:rgba(44,95,45,.15)}
.habit-header{display:flex;align-items:center;gap:1rem;padding:1.5rem;background:linear-gradient(135deg,rgba(44,95,45,.05),rgba(58,125,110,.05))}
.habit-avatar{width:60px;height:60px;border-radius:50%;object-fit:cover;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.5rem}
.habit-author{flex:1}
.habit-name{font-size:1.1rem;font-weight:900;color:var(--dark);margin-bottom:.25rem}
.habit-meta{display:flex;align-items:center;gap:1rem;font-size:.875rem;color:#6b7280}
.habit-city{display:flex;align-items:center;gap:.25rem}
.habit-age{display:flex;align-items:center;gap:.25rem}
.habit-content{padding:1.5rem}
.habit-text{font-size:.95rem;color:var(--dark);line-height:1.7;margin-bottom:1rem}
.habit-actions{display:flex;align-items:center;justify-content:space-between;padding:1rem 1.5rem;background:rgba(44,95,45,.02);border-top:1px solid rgba(44,95,45,.08)}
.habit-date{font-size:.8rem;color:#6b7280}
.habit-likes{display:flex;align-items:center;gap:.5rem;color:var(--accent);font-weight:600;cursor:pointer;transition:all .3s}
.habit-likes:hover{gap:.8rem;color:var(--accent-dark)}

/* ════ FORM SECTION ═════════════════════════ */
.form-sec{background:var(--dark);padding:5rem 0 4rem;position:relative;overflow:hidden}
.form-bg{position:absolute;inset:0;background:radial-gradient(circle,rgba(44,95,45,.1) 0%,transparent 70%)}
.form-container{max-width:800px;margin:0 auto;position:relative;z-index:2}
.form-header{text-align:center;margin-bottom:3rem}
.form-title{font-size:2.5rem;font-weight:900;color:#fff;margin-bottom:1rem}
.form-subtitle{font-size:1.1rem;color:rgba(255,255,255,.7)}
.form-card{background:rgba(255,255,255,.05);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.1);border-radius:20px;padding:3rem}
.form-group{margin-bottom:1.5rem}
.form-label{display:block;color:rgba(255,255,255,.9);font-weight:600;margin-bottom:.5rem}
.form-input{width:100%;padding:1rem 1.5rem;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:12px;color:#fff;font-size:1rem;transition:all .3s}
.form-input:focus{outline:none;border-color:var(--gold);background:rgba(255,255,255,.15);box-shadow:0 0 0 4px rgba(196,168,130,.1)}
.form-input::placeholder{color:rgba(255,255,255,.5)}
.form-textarea{min-height:120px;resize:vertical}
.form-file{width:100%;padding:1rem 1.5rem;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:12px;color:#fff;font-size:1rem;cursor:pointer;transition:all .3s}
.form-file:focus{outline:none;border-color:var(--gold);background:rgba(255,255,255,.15)}
.form-checkbox{display:flex;align-items:center;gap:.5rem;color:rgba(255,255,255,.9);font-weight:600;cursor:pointer}
.form-checkbox input{width:20px;height:20px;border-radius:4px;border:2px solid rgba(255,255,255,.3);background:transparent;cursor:pointer}
.form-btn{width:100%;padding:1.25rem 2rem;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;border:none;border-radius:12px;font-size:1.1rem;font-weight:900;cursor:pointer;transition:all .3s}
.form-btn:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(44,95,45,.25)}

/* ════ SCROLL REVEAL ═════════════════════ */
[data-sr]{opacity:0;transition:opacity .8s cubic-bezier(.4,0,.2,1),transform .8s cubic-bezier(.4,0,.2,1)}
[data-sr="up"]{transform:translateY(30px)}
[data-sr="left"]{transform:translateX(30px)}
[data-sr="zoom"]{transform:scale(.88)}
[data-sr].done{opacity:1;transform:none}
[data-sr-d="1"]{transition-delay:.08s}[data-sr-d="2"]{transition-delay:.16s}
[data-sr-d="3"]{transition-delay:.24s}[data-sr-d="4"]{transition-delay:.32s}

/* ════ RESPONSIVE ════════════════════════ */
@media(max-width:768px){
  .habits-hero{min-height:60vh}
  .content-sec,.form-sec{padding:4rem 0 3rem}
  .habits-grid{grid-template-columns:1fr;gap:1.5rem}
  .habit-card{padding:1rem}
  .form-card{padding:2rem}
}
@media(max-width:576px){
  .content-sec,.form-sec{padding:3rem 0 2.5rem}
  .section-title{font-size:2rem}
  .habit-card{padding:1rem}
  .habit-avatar{width:50px;height:50px;font-size:1.2rem}
  .habit-name{font-size:1rem}
  .habit-text{font-size:.9rem}
  .form-title{font-size:2rem}
  .form-card{padding:1.5rem}
  .form-input{padding:.8rem 1rem;font-size:.9rem}
  .form-btn{padding:1rem 1.5rem;font-size:1rem}
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- ════════════════════════════════════════════
     HABITS HERO
════════════════════════════════════════════ -->
<section class="habits-hero" style="font-family:'Tajawal',sans-serif">
  <div class="habits-hero-bg"></div>
  <div class="habits-hero-grid"></div>
  <div class="habits-orb habits-orb-1"></div>
  <div class="habits-orb habits-orb-2"></div>
  <div class="habits-orb habits-orb-3"></div>
  
  <!-- Floating Shapes -->
  <div class="habits-shapes">
    <div class="habits-shape"></div>
    <div class="habits-shape"></div>
    <div class="habits-shape"></div>
    <div class="habits-shape"></div>
  </div>

  <div class="container position-relative" style="z-index:2; padding: 6rem 1.5rem 5rem;">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        
        <!-- Hero Header -->
        <div class="habits-header mb-5">
          <!-- Status Badge -->
          <div class="habits-tag d-inline-flex align-items-center gap-2 mb-4" 
               style="background: linear-gradient(135deg, rgba(196,168,130,0.15), rgba(196,168,130,0.05)); 
                      backdrop-filter: blur(20px); 
                      padding: 0.625rem 1.25rem; 
                      border-radius: 100px; 
                      border: 1px solid rgba(196,168,130,0.2);
                      box-shadow: 0 8px 32px rgba(196,168,130,0.1);
                      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
            <div class="habits-dot"></div>
            <span style="color: rgba(255,255,255,0.95); font-size: 0.875rem; font-weight: 600; letter-spacing: 0.025em;">العادات اليومية</span>
          </div>

          <!-- Main Title -->
          <div class="habits-title-section mb-4">
            <h1 class="habits-h1" style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; line-height: 1.05; color: white; margin: 0;">
              <span class="title-line" style="display: block; margin-bottom: 0.25rem;">
                شارك عاداتك
              </span>
              <span class="subtitle-line" style="display: block; font-size: clamp(2rem, 5vw, 2.5rem); font-weight: 700; opacity: 0.9;">
                <span class="habits-shine">الإيجابية</span>
              </span>
            </h1>
          </div>

          <!-- Description -->
          <div class="habits-description mb-5">
            <p class="habits-desc" style="font-size: 1.125rem; line-height: 1.7; color: rgba(255,255,255,0.8); margin: 0; font-weight: 400;">
              شارك تجربتك في بناء العادات الإيجابية وكن مصدر إلهام للآخرين. كل عادة صغيرة تصنع فرقاً كبيراً.
            </p>
          </div>

          <!-- CTA Buttons -->
          <div class="habits-actions d-flex flex-wrap gap-3 justify-content-center mb-5">
            <a href="#form" class="btn-hero-primary" style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; 
                   padding: 1rem 2rem; 
                   background: linear-gradient(135deg, var(--g1) 0%, var(--teal) 100%); 
                   color: white; 
                   text-decoration: none; 
                   border-radius: 16px; 
                   font-weight: 700; 
                   font-size: 1rem; 
                   transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                   box-shadow: 0 8px 24px rgba(44,95,45,0.25);
                   position: relative; overflow: hidden;">
              <i class="bi bi-plus-circle"></i>
              <span>شارك عادتك</span>
            </a>
            
            <a href="<?php echo e(route('ai-assistant')); ?>" class="btn-hero-secondary" style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; 
                   padding: 1rem 2rem; 
                   background: rgba(255,255,255,0.1); 
                   backdrop-filter: blur(20px); 
                   border: 2px solid rgba(255,255,255,0.2); 
                   color: white; 
                   text-decoration: none; 
                   border-radius: 16px; 
                   font-weight: 700; 
                   font-size: 1rem; 
                   transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);">
              <i class="bi bi-robot"></i>
              <span>استشارة المساعد</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════
     HABITS SECTION
════════════════════════════════════════════ -->
<section class="content-sec">
  <div class="content-container">
    <div class="section-header" data-reveal>
      <div class="section-badge"><i class="bi bi-heart"></i> عادات إيجابية</div>
      <h2 class="section-title mb-2">عادات <span class="accent">ملهمة</span></h2>
      <p class="section-subtitle">تجارب حقيقية من أشخاص مثلك في بناء عادات إيجابية</p>
    </div>

    <?php if($habits->count() > 0): ?>
    <div class="habits-grid">
      <?php $__currentLoopData = $habits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="habit-card" data-reveal data-reveal-delay="<?php echo e($index + 1); ?>">
        <div class="habit-header">
          <div class="habit-avatar">
            <?php if($habit->author_avatar): ?>
              <img src="<?php echo e(asset('storage/' . $habit->author_avatar)); ?>" alt="<?php echo e($habit->author_name); ?>">
            <?php else: ?>
              <i class="bi bi-person"></i>
            <?php endif; ?>
          </div>
          <div class="habit-author">
            <div class="habit-name"><?php echo e($habit->author_name); ?></div>
            <div class="habit-meta">
              <div class="habit-city">
                <i class="bi bi-geo-alt"></i>
                <span><?php echo e($habit->author_city); ?></span>
              </div>
              <?php if($habit->author_age): ?>
              <div class="habit-age">
                <i class="bi bi-calendar"></i>
                <span><?php echo e($habit->author_age); ?> سنة</span>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="habit-content">
          <p class="habit-text"><?php echo e($habit->content); ?></p>
        </div>
        <div class="habit-actions">
          <div class="habit-date">
            <i class="bi bi-clock"></i>
            <span><?php echo e($habit->created_at->format('Y-m-d')); ?></span>
          </div>
          <div class="habit-likes">
            <i class="bi bi-heart"></i>
            <span><?php echo e($habit->likes ?? 0); ?></span>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Pagination -->
    <?php if($habits->hasPages()): ?>
    <div class="d-flex justify-content-center mt-5">
      <?php echo e($habits->links()); ?>

    </div>
    <?php endif; ?>
    <?php else: ?>
    <div class="text-center py-5" data-reveal>
      <div style="font-size:3rem;color:var(--g1);margin-bottom:1rem;">
        <i class="bi bi-heart"></i>
      </div>
      <h3 style="color:var(--dark);margin-bottom:1rem;">لا توجد عادات حالياً</h3>
      <p style="color:#6b7280;">كن أول من يشارك عادته الإيجابية ويلهم الآخرين</p>
      <a href="#form" class="btn btn-primary mt-3" style="background:linear-gradient(135deg,var(--g1),var(--teal));border:none;padding:1rem 2rem;border-radius:12px;font-weight:700;">
        <i class="bi bi-plus-circle me-2"></i>
        شارك عادتك
      </a>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ════════════════════════════════════════════
     FORM SECTION
════════════════════════════════════════════ -->
<section id="form" class="form-sec">
  <div class="form-bg"></div>
  <div class="form-container">
    <div class="form-header" data-reveal>
      <h2 class="form-title">شارك عادتك الإيجابية</h2>
      <p class="form-subtitle">ساعد الآخرين بتقديم تجربتك في بناء العادات</p>
    </div>

    <div class="form-card" data-reveal data-reveal-delay="1">
      <?php if(session('success')): ?>
      <div class="alert alert-success" style="background:rgba(74,222,128,.1);border:1px solid rgba(74,222,128,.3);color:#4ade80;padding:1rem;border-radius:12px;margin-bottom:2rem;">
        <?php echo e(session('success')); ?>

      </div>
      <?php endif; ?>

      <form action="<?php echo e(route('habits.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">الاسم الكامل *</label>
              <input type="text" name="author_name" class="form-input" placeholder="أدخل اسمك الكامل" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">المدينة *</label>
              <input type="text" name="author_city" class="form-input" placeholder="أدخل مدينتك" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">العمر (اختياري)</label>
              <input type="number" name="author_age" class="form-input" placeholder="أدخل عمرك" min="1" max="120">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">صورة شخصية (اختياري)</label>
              <input type="file" name="author_avatar" class="form-file" accept="image/*">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">العادة الإيجابية *</label>
          <textarea name="content" class="form-input form-textarea" placeholder="صف عادتك الإيجابية وكيف ساعدتك في حياتك..." required></textarea>
        </div>

        <button type="submit" class="form-btn">
          <i class="bi bi-send me-2"></i>
          إرسال العادة
        </button>
      </form>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// Scroll Reveal
const srIO = new IntersectionObserver(es => {
  es.forEach(e => { if(e.isIntersecting){ e.target.classList.add('done'); srIO.unobserve(e.target); }});
}, { threshold: 0.07 });
document.querySelectorAll('[data-sr]').forEach(el => srIO.observe(el));

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

// Like button functionality
document.querySelectorAll('.habit-likes').forEach(button => {
  button.addEventListener('click', function() {
    const icon = this.querySelector('i');
    const count = this.querySelector('span');
    let currentCount = parseInt(count.textContent);
    
    if (icon.classList.contains('bi-heart')) {
      icon.classList.remove('bi-heart');
      icon.classList.add('bi-heart-fill');
      count.textContent = currentCount + 1;
      this.style.color = 'var(--accent-dark)';
    } else {
      icon.classList.remove('bi-heart-fill');
      icon.classList.add('bi-heart');
      count.textContent = currentCount - 1;
      this.style.color = 'var(--accent)';
    }
  });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\habits\index.blade.php ENDPATH**/ ?>