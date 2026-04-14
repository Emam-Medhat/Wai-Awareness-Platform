<?php $__env->startSection('title', 'علاج الإدمان'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ════════════════════════════════════════════
   WA3Y ADDICTION PAGE — SITE CONSISTENT DESIGN
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
.addiction-page{font-family:'Tajawal',sans-serif}

/* ════ HERO ════════════════════════════════ */
.addiction-hero{
  min-height:80vh;background:var(--dark);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.addiction-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 60% at 20% 20%, rgba(44,95,45,.55) 0%, transparent 60%),
    radial-gradient(ellipse 60% 80% at 80% 80%, rgba(58,125,110,.4) 0%, transparent 55%),
    radial-gradient(ellipse 50% 50% at 50% 50%, rgba(196,168,130,.08) 0%, transparent 70%),
    linear-gradient(170deg, #0d1f13 0%, #1a2e20 50%, #0a1a10 100%);
}
.addiction-hero-grid{
  position:absolute;inset:0;
  background-image:radial-gradient(circle, rgba(196,168,130,.18) 1px, transparent 1px);
  background-size:40px 40px;animation:dotsDrift 20s linear infinite;
}
@keyframes dotsDrift{0%{transform:translateY(0)}100%{transform:translateY(40px)}}
.addiction-orb{position:absolute;border-radius:50%;filter:blur(100px);pointer-events:none}
.addiction-orb-1{width:600px;height:600px;background:radial-gradient(circle, rgba(44,95,45,.35) 0%, transparent 70%);top:-100px;right:-100px;animation:glowPulse 8s ease-in-out infinite}
.addiction-orb-2{width:500px;height:500px;background:radial-gradient(circle, rgba(58,125,110,.25) 0%, transparent 70%);bottom:-80px;left:-80px;animation:glowPulse 10s ease-in-out infinite reverse}
.addiction-orb-3{width:300px;height:300px;background:radial-gradient(circle, rgba(196,168,130,.15) 0%, transparent 70%);top:50%;left:45%;animation:glowPulse 6s ease-in-out infinite;animation-delay:3s}
@keyframes glowPulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.2);opacity:.6}}
.addiction-shape{position:absolute;border-radius:50%;background:linear-gradient(135deg,rgba(196,168,130,.1),rgba(44,95,45,.05));border:1px solid rgba(196,168,130,.08);animation:floatShape 20s infinite ease-in-out}
.addiction-shape:nth-child(3){width:80px;height:80px;top:15%;right:12%;animation-delay:0s}
.addiction-shape:nth-child(4){width:55px;height:55px;top:70%;right:28%;animation-delay:5s}
.addiction-shape:nth-child(5){width:95px;height:95px;top:35%;left:8%;animation-delay:10s}
@keyframes floatShape{0%,100%{transform:translateY(0) translateX(0) rotate(0deg)}25%{transform:translateY(-30px) translateX(20px) rotate(90deg)}50%{transform:translateY(-15px) translateX(-15px) rotate(180deg)}75%{transform:translateY(-25px) translateX(10px) rotate(270deg)}}

/* Site consistent animations */
@keyframes fadeSlideDown{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
@keyframes blink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 6px rgba(74,222,128,0)}}
@keyframes shimmerText{0%{background-position:200% center}100%{background-position:-200% center}}
.addiction-tag{animation:fadeSlideDown .8s .1s ease both}
.addiction-h1{animation:fadeSlideDown .9s .22s ease both}
.addiction-p{animation:fadeSlideDown .8s .38s ease both}
.addiction-chips{animation:fadeSlideDown .8s .52s ease both}
.addiction-dot{width:8px;height:8px;border-radius:50%;background:#4ade80;animation:blink 1.5s ease-in-out infinite}
.addiction-shine{background:linear-gradient(135deg,var(--gold) 0%,#fff 50%,var(--gold) 100%);background-size:200% auto;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmerText 4s linear infinite;filter:drop-shadow(0 2px 8px rgba(196,168,130,.3))}

/* ════ CONTENT SECTIONS ═════════════════════════ */
.content-sec{background:var(--cream);padding:5rem 0 4rem}
.content-container{max-width:1200px;margin:0 auto}
.section-header{text-align:center;margin-bottom:3rem}
.section-badge{display:inline-flex;align-items:center;gap:.5rem;background:rgba(44,95,45,.1);color:var(--g1);padding:.6rem 1.2rem;border-radius:100px;font-weight:600;font-size:.875rem;margin-bottom:1rem}
.section-title{font-size:2.5rem;font-weight:900;color:var(--dark);margin-bottom:1rem}
.section-subtitle{font-size:1.1rem;color:#6b7280;line-height:1.6}

/* ════ ARTICLES GRID ═════════════════════════ */
.articles-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:2rem;margin-bottom:4rem}
.article-card{background:#fff;border-radius:20px;border:1px solid rgba(44,95,45,.08);overflow:hidden;transition:all .4s cubic-bezier(.4,0,.2,1);box-shadow:0 12px 40px rgba(44,95,45,.08)}
.article-card:hover{transform:translateY(-8px) scale(1.02);box-shadow:0 24px 80px rgba(44,95,45,.15);border-color:rgba(44,95,45,.15)}
.article-image{width:100%;height:200px;object-fit:cover;background:linear-gradient(135deg,var(--g1),var(--teal))}
.article-content{padding:2rem}
.article-category{display:inline-block;background:rgba(44,95,45,.1);color:var(--g1);padding:.4rem .8rem;border-radius:8px;font-size:.75rem;font-weight:600;margin-bottom:1rem}
.article-title{font-size:1.3rem;font-weight:900;color:var(--dark);margin-bottom:1rem;line-height:1.3}
.article-desc{font-size:.95rem;color:#6b7280;line-height:1.6;margin-bottom:1.5rem}
.article-meta{display:flex;align-items:center;justify-content:space-between;font-size:.875rem;color:#6b7280}
.article-author{display:flex;align-items:center;gap:.5rem}
.article-date{display:flex;align-items:center;gap:.5rem}
.article-link{display:inline-flex;align-items:center;gap:.5rem;color:var(--g1);font-weight:700;text-decoration:none;transition:all .3s}
.article-link:hover{gap:.8rem;color:var(--teal)}

/* ════ VIDEOS GRID ═════════════════════════ */
.videos-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:2rem;margin-bottom:4rem}
.video-card{background:#fff;border-radius:20px;border:1px solid rgba(44,95,45,.08);overflow:hidden;transition:all .4s cubic-bezier(.4,0,.2,1);box-shadow:0 12px 40px rgba(44,95,45,.08)}
.video-card:hover{transform:translateY(-8px) scale(1.02);box-shadow:0 24px 80px rgba(44,95,45,.15);border-color:rgba(44,95,45,.15)}
.video-thumbnail{position:relative;width:100%;height:200px;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center}
.video-play{width:60px;height:60px;border-radius:50%;background:rgba(255,255,255,.9);display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:var(--g1);transition:all .3s}
.video-card:hover .video-play{transform:scale(1.1);background:#fff}
.video-duration{position:absolute;bottom:1rem;right:1rem;background:rgba(0,0,0,.8);color:#fff;padding:.3rem .6rem;border-radius:6px;font-size:.75rem;font-weight:600}
.video-content{padding:2rem}
.video-title{font-size:1.3rem;font-weight:900;color:var(--dark);margin-bottom:1rem;line-height:1.3}
.video-desc{font-size:.95rem;color:#6b7280;line-height:1.6;margin-bottom:1.5rem}
.video-meta{display:flex;align-items:center;gap:1rem;font-size:.875rem;color:#6b7280}
.video-views{display:flex;align-items:center;gap:.5rem}
.video-date{display:flex;align-items:center;gap:.5rem}

/* ════ BOOKS GRID ═════════════════════════ */
.books-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem}
.book-card{background:#fff;border-radius:20px;border:1px solid rgba(44,95,45,.08);overflow:hidden;transition:all .4s cubic-bezier(.4,0,.2,1);box-shadow:0 12px 40px rgba(44,95,45,.08)}
.book-card:hover{transform:translateY(-8px) scale(1.02);box-shadow:0 24px 80px rgba(44,95,45,.15);border-color:rgba(44,95,45,.15)}
.book-cover{width:100%;height:250px;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;font-size:3rem;color:rgba(255,255,255,.3)}
.book-content{padding:2rem}
.book-title{font-size:1.3rem;font-weight:900;color:var(--dark);margin-bottom:1rem;line-height:1.3}
.book-author{font-size:.95rem;color:var(--teal);font-weight:600;margin-bottom:1rem}
.book-desc{font-size:.9rem;color:#6b7280;line-height:1.6;margin-bottom:1.5rem}
.book-rating{display:flex;align-items-center;gap:.5rem;margin-bottom:1.5rem}
.book-stars{color:var(--gold);font-size:.875rem}
.book-rating-text{font-size:.875rem;color:#6b7280}
.book-link{display:inline-flex;align-items:center;gap:.5rem;color:var(--g1);font-weight:700;text-decoration:none;transition:all .3s}
.book-link:hover{gap:.8rem;color:var(--teal)}

/* ════ HELP SECTION ═════════════════════════ */
.help-sec{background:var(--dark);padding:5rem 0 4rem;position:relative;overflow:hidden}
.help-bg{position:absolute;inset:0;background:radial-gradient(circle,rgba(44,95,45,.1) 0%,transparent 70%)}
.help-container{max-width:800px;margin:0 auto;position:relative;z-index:2}
.help-header{text-align:center;margin-bottom:3rem}
.help-title{font-size:2.5rem;font-weight:900;color:#fff;margin-bottom:1rem}
.help-subtitle{font-size:1.1rem;color:rgba(255,255,255,.7)}
.help-card{background:rgba(255,255,255,.05);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.1);border-radius:20px;padding:3rem;text-align:center}
.help-icon{width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent-light));color:#fff;font-size:2rem;display:flex;align-items:center;justify-content:center;margin:0 auto 2rem}
.help-text{font-size:1.1rem;color:rgba(255,255,255,.9);line-height:1.7;margin-bottom:2rem}
.help-buttons{display:flex;flex-wrap:wrap;gap:1rem;justify-content:center}
.help-btn{padding:1rem 2rem;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;text-decoration:none;border-radius:12px;font-weight:700;transition:all .3s}
.help-btn:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(44,95,45,.25)}
.help-btn-secondary{padding:1rem 2rem;background:rgba(255,255,255,.1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.2);color:#fff;text-decoration:none;border-radius:12px;font-weight:700;transition:all .3s}
.help-btn-secondary:hover{background:rgba(255,255,255,.2);transform:translateY(-2px)}

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
  .addiction-hero{min-height:60vh}
  .content-sec,.help-sec{padding:4rem 0 3rem}
  .articles-grid,.videos-grid,.books-grid{grid-template-columns:1fr;gap:1.5rem}
  .article-card,.video-card,.book-card{padding:1.5rem}
  .help-card{padding:2rem}
}
@media(max-width:576px){
  .content-sec,.help-sec{padding:3rem 0 2.5rem}
  .section-title{font-size:2rem}
  .article-card,.video-card,.book-card{padding:1.2rem}
  .article-title,.video-title,.book-title{font-size:1.1rem}
  .help-title{font-size:2rem}
  .help-card{padding:1.5rem}
  .help-buttons{flex-direction:column}
  .help-btn,.help-btn-secondary{width:100%;text-align:center}
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- ════════════════════════════════════════════
     ADDICTION HERO
════════════════════════════════════════════ -->
<section class="addiction-hero" style="font-family:'Tajawal',sans-serif">
  <div class="addiction-hero-bg"></div>
  <div class="addiction-hero-grid"></div>
  <div class="addiction-orb addiction-orb-1"></div>
  <div class="addiction-orb addiction-orb-2"></div>
  <div class="addiction-orb addiction-orb-3"></div>
  
  <!-- Floating Shapes -->
  <div class="addiction-shapes">
    <div class="addiction-shape"></div>
    <div class="addiction-shape"></div>
    <div class="addiction-shape"></div>
    <div class="addiction-shape"></div>
  </div>

  <div class="container position-relative" style="z-index:2; padding: 6rem 1.5rem 5rem;">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        
        <!-- Hero Header -->
        <div class="addiction-header mb-5">
          <!-- Status Badge -->
          <div class="addiction-tag d-inline-flex align-items-center gap-2 mb-4" 
               style="background: linear-gradient(135deg, rgba(196,168,130,0.15), rgba(196,168,130,0.05)); 
                      backdrop-filter: blur(20px); 
                      padding: 0.625rem 1.25rem; 
                      border-radius: 100px; 
                      border: 1px solid rgba(196,168,130,0.2);
                      box-shadow: 0 8px 32px rgba(196,168,130,0.1);
                      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
            <div class="addiction-dot"></div>
            <span style="color: rgba(255,255,255,0.95); font-size: 0.875rem; font-weight: 600; letter-spacing: 0.025em;">علاج الإدمان</span>
          </div>

          <!-- Main Title -->
          <div class="addiction-title-section mb-4">
            <h1 class="addiction-h1" style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; line-height: 1.05; color: white; margin: 0;">
              <span class="title-line" style="display: block; margin-bottom: 0.25rem;">
                طريقك نحو
              </span>
              <span class="subtitle-line" style="display: block; font-size: clamp(2rem, 5vw, 2.5rem); font-weight: 700; opacity: 0.9;">
                <span class="addiction-shine">التعافي</span>
              </span>
            </h1>
          </div>

          <!-- Description -->
          <div class="addiction-description mb-5">
            <p class="addiction-desc" style="font-size: 1.125rem; line-height: 1.7; color: rgba(255,255,255,0.8); margin: 0; font-weight: 400;">
              موارد متخصصة ومعلومات علمية لمساعدتك في رحلة التعافي من الإدمان. ابدأ خطوتك الأولى اليوم.
            </p>
          </div>

          <!-- CTA Buttons -->
          <div class="addiction-actions d-flex flex-wrap gap-3 justify-content-center mb-5">
            <a href="#help" class="btn-hero-primary" style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; 
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
              <i class="bi bi-telephone"></i>
              <span>احصل على المساعدة</span>
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
     ARTICLES SECTION
════════════════════════════════════════════ -->
<section class="content-sec">
  <div class="content-container">
    <div class="section-header" data-reveal>
      <div class="section-badge"><i class="bi bi-newspaper"></i> مقالات متخصصة</div>
      <h2 class="section-title mb-2">مقالات عن <span class="accent">علاج الإدمان</span></h2>
      <p class="section-subtitle">مقالات علمية وموثقة لمساعدتك في فهم الإدمان وطرق العلاج</p>
    </div>

    <?php if($articles->count() > 0): ?>
    <div class="articles-grid">
      <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="article-card" data-reveal data-reveal-delay="<?php echo e($index + 1); ?>">
        <div class="article-image">
          <?php if($article->image): ?>
            <img src="<?php echo e(asset('storage/' . $article->image)); ?>" alt="<?php echo e($article->title); ?>">
          <?php else: ?>
            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--g1),var(--teal));color:rgba(255,255,255,.3);font-size:3rem;">
              <i class="bi bi-file-text"></i>
            </div>
          <?php endif; ?>
        </div>
        <div class="article-content">
          <div class="article-category">علاج الإدمان</div>
          <h3 class="article-title"><?php echo e($article->title); ?></h3>
          <p class="article-desc"><?php echo e(Str::limit($article->content, 150)); ?></p>
          <div class="article-meta">
            <div class="article-author">
              <i class="bi bi-person"></i>
              <span><?php echo e($article->author ?? 'دكتور متخصص'); ?></span>
            </div>
            <div class="article-date">
              <i class="bi bi-calendar"></i>
              <span><?php echo e($article->created_at->format('Y-m-d')); ?></span>
            </div>
          </div>
          <a href="<?php echo e(route('article.show', $article->id)); ?>" class="article-link">
            <span>اقرأ المزيد</span>
            <i class="bi bi-arrow-left"></i>
          </a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="text-center py-5" data-reveal>
      <div style="font-size:3rem;color:var(--g1);margin-bottom:1rem;">
        <i class="bi bi-inbox"></i>
      </div>
      <h3 style="color:var(--dark);margin-bottom:1rem;">لا توجد مقالات حالياً</h3>
      <p style="color:#6b7280;">سيتم إضافة مقالات متخصصة في علاج الإدمان قريباً</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ════════════════════════════════════════════
     VIDEOS SECTION
════════════════════════════════════════════ -->
<section class="content-sec">
  <div class="content-container">
    <div class="section-header" data-reveal>
      <div class="section-badge"><i class="bi bi-play-circle"></i> فيديوهات تعليمية</div>
      <h2 class="section-title mb-2">فيديوهات عن <span class="accent">التعافي</span></h2>
      <p class="section-subtitle">فيديوهات من خبراء ومتخصصين في مجال علاج الإدمان</p>
    </div>

    <?php if($videos->count() > 0): ?>
    <div class="videos-grid">
      <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="video-card" data-reveal data-reveal-delay="<?php echo e($index + 1); ?>">
        <div class="video-thumbnail">
          <?php if($video->thumbnail): ?>
            <img src="<?php echo e(asset('storage/' . $video->thumbnail)); ?>" alt="<?php echo e($video->title); ?>">
          <?php else: ?>
            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--g1),var(--teal));color:rgba(255,255,255,.3);">
              <i class="bi bi-play-circle" style="font-size:3rem;"></i>
            </div>
          <?php endif; ?>
          <div class="video-play">
            <i class="bi bi-play-fill"></i>
          </div>
          <div class="video-duration"><?php echo e($video->duration ?? '15:00'); ?></div>
        </div>
        <div class="video-content">
          <h3 class="video-title"><?php echo e($video->title); ?></h3>
          <p class="video-desc"><?php echo e(Str::limit($video->description, 120)); ?></p>
          <div class="video-meta">
            <div class="video-views">
              <i class="bi bi-eye"></i>
              <span><?php echo e(number_format($video->views ?? 0)); ?> مشاهدة</span>
            </div>
            <div class="video-date">
              <i class="bi bi-calendar"></i>
              <span><?php echo e($video->created_at->format('Y-m-d')); ?></span>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="text-center py-5" data-reveal>
      <div style="font-size:3rem;color:var(--g1);margin-bottom:1rem;">
        <i class="bi bi-camera-video"></i>
      </div>
      <h3 style="color:var(--dark);margin-bottom:1rem;">لا توجد فيديوهات حالياً</h3>
      <p style="color:#6b7280;">سيتم إضافة فيديوهات تعليمية في علاج الإدمان قريباً</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ════════════════════════════════════════════
     BOOKS SECTION
════════════════════════════════════════════ -->
<section class="content-sec">
  <div class="content-container">
    <div class="section-header" data-reveal>
      <div class="section-badge"><i class="bi bi-book"></i> كتب موصى بها</div>
      <h2 class="section-title mb-2">كتب عن <span class="accent">التعافي من الإدمان</span></h2>
      <p class="section-subtitle">كتب قيمة وموثقة من خبراء في مجال علاج الإدمان</p>
    </div>

    <?php if($books->count() > 0): ?>
    <div class="books-grid">
      <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="book-card" data-reveal data-reveal-delay="<?php echo e($index + 1); ?>">
        <div class="book-cover">
          <?php if($book->cover): ?>
            <img src="<?php echo e(asset('storage/' . $book->cover)); ?>" alt="<?php echo e($book->title); ?>">
          <?php else: ?>
            <i class="bi bi-book"></i>
          <?php endif; ?>
        </div>
        <div class="book-content">
          <h3 class="book-title"><?php echo e($book->title); ?></h3>
          <div class="book-author"><?php echo e($book->author ?? 'مؤلف متخصص'); ?></div>
          <p class="book-desc"><?php echo e(Str::limit($book->description, 120)); ?></p>
          <div class="book-rating">
            <div class="book-stars">
              <?php for($i = 1; $i <= 5; $i++): ?>
                <i class="bi bi-star<?php echo e($i <= ($book->rating ?? 4) ? '-fill' : ''); ?>"></i>
              <?php endfor; ?>
            </div>
            <div class="book-rating-text"><?php echo e($book->rating ?? 4.5); ?> (<?php echo e($book->reviews_count ?? 120); ?> تقييم)</div>
          </div>
          <a href="<?php echo e(route('book.show', $book->id)); ?>" class="book-link">
            <span>اقرأ المزيد</span>
            <i class="bi bi-arrow-left"></i>
          </a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="text-center py-5" data-reveal>
      <div style="font-size:3rem;color:var(--g1);margin-bottom:1rem;">
        <i class="bi bi-journal-bookmark"></i>
      </div>
      <h3 style="color:var(--dark);margin-bottom:1rem;">لا توجد كتب حالياً</h3>
      <p style="color:#6b7280;">سيتم إضافة كتب متخصصة في علاج الإدمان قريباً</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ════════════════════════════════════════════
     HELP SECTION
════════════════════════════════════════════ -->
<section id="help" class="help-sec">
  <div class="help-bg"></div>
  <div class="help-container">
    <div class="help-header" data-reveal>
      <h2 class="help-title">هل تحتاج مساعدة عاجلة؟</h2>
      <p class="help-subtitle">لا تتردد في طلب المساعدة. فريقنا هنا لدعمك</p>
    </div>

    <div class="help-card" data-reveal data-reveal-delay="1">
      <div class="help-icon">
        <i class="bi bi-telephone-fill"></i>
      </div>
      <div class="help-text">
        إذا كنت أو أحد أحبائك يعاني من مشاكل الإدمان، فلا تتردد في الاتصال بنا. نقدم الدعم السري والمهني على مدار الساعة.
      </div>
      <div class="help-buttons">
        <a href="#" class="help-btn">
          <i class="bi bi-telephone me-2"></i>
          اتصل الآن
        </a>
        <a href="<?php echo e(route('contact')); ?>" class="help-btn-secondary">
          <i class="bi bi-envelope me-2"></i>
          راسلنا
        </a>
        <a href="<?php echo e(route('ai-assistant')); ?>" class="help-btn-secondary">
          <i class="bi bi-robot me-2"></i>
          مساعد ذكي
        </a>
      </div>
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

// Video play buttons
document.querySelectorAll('.video-play').forEach(button => {
  button.addEventListener('click', function() {
    const card = this.closest('.video-card');
    const title = card.querySelector('.video-title').textContent;
    
    // Create modal or redirect to video
    const modal = document.createElement('div');
    modal.className = 'video-modal';
    modal.innerHTML = `
      <div class="video-modal-content">
        <div class="video-modal-header">
          <h3>${title}</h3>
          <button class="video-modal-close">&times;</button>
        </div>
        <div class="video-modal-body">
          <p>سيتم تشغيل الفيديو قريباً...</p>
        </div>
      </div>
    `;
    modal.style.cssText = `
      position: fixed; top: 0; left: 0; right: 0; bottom: 0; 
      background: rgba(0,0,0,0.8); z-index: 9999; 
      display: flex; align-items: center; justify-content: center;
    `;
    document.body.appendChild(modal);
    
    modal.querySelector('.video-modal-close').addEventListener('click', () => modal.remove());
    modal.addEventListener('click', (e) => {
      if (e.target === modal) modal.remove();
    });
  });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\pages\addiction.blade.php ENDPATH**/ ?>