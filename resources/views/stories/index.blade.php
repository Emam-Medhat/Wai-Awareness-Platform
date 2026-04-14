@extends('layouts.app')

@section('title', 'القصص')

@push('styles')
<style>
/* ════════════════════════════════════════════
   WA3Y STORIES PAGE — SITE CONSISTENT DESIGN
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
.stories-page{font-family:'Tajawal',sans-serif}

/* ════ HERO ════════════════════════════════ */
.stories-hero{
  min-height:80vh;background:var(--dark);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.stories-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 60% at 20% 20%, rgba(44,95,45,.55) 0%, transparent 60%),
    radial-gradient(ellipse 60% 80% at 80% 80%, rgba(58,125,110,.4) 0%, transparent 55%),
    radial-gradient(ellipse 50% 50% at 50% 50%, rgba(196,168,130,.08) 0%, transparent 70%),
    linear-gradient(170deg, #0d1f13 0%, #1a2e20 50%, #0a1a10 100%);
}
.stories-hero-grid{
  position:absolute;inset:0;
  background-image:radial-gradient(circle, rgba(196,168,130,.18) 1px, transparent 1px);
  background-size:40px 40px;animation:dotsDrift 20s linear infinite;
}
@keyframes dotsDrift{0%{transform:translateY(0)}100%{transform:translateY(40px)}}
.stories-orb{position:absolute;border-radius:50%;filter:blur(100px);pointer-events:none}
.stories-orb-1{width:600px;height:600px;background:radial-gradient(circle, rgba(44,95,45,.35) 0%, transparent 70%);top:-100px;right:-100px;animation:glowPulse 8s ease-in-out infinite}
.stories-orb-2{width:500px;height:500px;background:radial-gradient(circle, rgba(58,125,110,.25) 0%, transparent 70%);bottom:-80px;left:-80px;animation:glowPulse 10s ease-in-out infinite reverse}
.stories-orb-3{width:300px;height:300px;background:radial-gradient(circle, rgba(196,168,130,.15) 0%, transparent 70%);top:50%;left:45%;animation:glowPulse 6s ease-in-out infinite;animation-delay:3s}
@keyframes glowPulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.2);opacity:.6}}
.stories-shape{position:absolute;border-radius:50%;background:linear-gradient(135deg,rgba(196,168,130,.1),rgba(44,95,45,.05));border:1px solid rgba(196,168,130,.08);animation:floatShape 20s infinite ease-in-out}
.stories-shape:nth-child(3){width:80px;height:80px;top:15%;right:12%;animation-delay:0s}
.stories-shape:nth-child(4){width:55px;height:55px;top:70%;right:28%;animation-delay:5s}
.stories-shape:nth-child(5){width:95px;height:95px;top:35%;left:8%;animation-delay:10s}
@keyframes floatShape{0%,100%{transform:translateY(0) translateX(0) rotate(0deg)}25%{transform:translateY(-30px) translateX(20px) rotate(90deg)}50%{transform:translateY(-15px) translateX(-15px) rotate(180deg)}75%{transform:translateY(-25px) translateX(10px) rotate(270deg)}}

/* Site consistent animations */
@keyframes fadeSlideDown{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
@keyframes blink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 6px rgba(74,222,128,0)}}
@keyframes shimmerText{0%{background-position:200% center}100%{background-position:-200% center}}
.stories-tag{animation:fadeSlideDown .8s .1s ease both}
.stories-h1{animation:fadeSlideDown .9s .22s ease both}
.stories-p{animation:fadeSlideDown .8s .38s ease both}
.stories-chips{animation:fadeSlideDown .8s .52s ease both}
.stories-dot{width:8px;height:8px;border-radius:50%;background:#4ade80;animation:blink 1.5s ease-in-out infinite}
.stories-shine{background:linear-gradient(135deg,var(--gold) 0%,#fff 50%,var(--gold) 100%);background-size:200% auto;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmerText 4s linear infinite;filter:drop-shadow(0 2px 8px rgba(196,168,130,.3))}

/* ════ CONTENT SECTIONS ═════════════════════════ */
.content-sec{background:var(--cream);padding:5rem 0 4rem}
.content-container{max-width:1200px;margin:0 auto}
.section-header{text-align:center;margin-bottom:3rem}
.section-badge{display:inline-flex;align-items:center;gap:.5rem;background:rgba(44,95,45,.1);color:var(--g1);padding:.6rem 1.2rem;border-radius:100px;font-weight:600;font-size:.875rem;margin-bottom:1rem}
.section-title{font-size:2.5rem;font-weight:900;color:var(--dark);margin-bottom:1rem}
.section-subtitle{font-size:1.1rem;color:#6b7280;line-height:1.6}

/* ════ STORIES GRID ═════════════════════════ */
.stories-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:2rem;margin-bottom:4rem}
.story-card{background:#fff;border-radius:20px;border:1px solid rgba(44,95,45,.08);overflow:hidden;transition:all .4s cubic-bezier(.4,0,.2,1);box-shadow:0 12px 40px rgba(44,95,45,.08)}
.story-card:hover{transform:translateY(-8px) scale(1.02);box-shadow:0 24px 80px rgba(44,95,45,.15);border-color:rgba(44,95,45,.15)}
.story-header{display:flex;align-items:center;gap:1rem;padding:1.5rem;background:linear-gradient(135deg,rgba(44,95,45,.05),rgba(58,125,110,.05))}
.story-avatar{width:60px;height:60px;border-radius:50%;object-fit:cover;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.5rem}
.story-author{flex:1}
.story-name{font-size:1.1rem;font-weight:900;color:var(--dark);margin-bottom:.25rem}
.story-meta{display:flex;align-items:center;gap:1rem;font-size:.875rem;color:#6b7280}
.story-city{display:flex;align-items:center;gap:.25rem}
.story-badge{display:inline-flex;align-items:center;gap:.25rem;background:rgba(233,30,99,.1);color:var(--accent);padding:.25rem .5rem;border-radius:6px;font-size:.75rem;font-weight:600}
.story-content{padding:1.5rem}
.story-text{font-size:.95rem;color:var(--dark);line-height:1.7;margin-bottom:1rem}
.story-actions{display:flex;align-items-center;justify-content:space-between;padding:1rem 1.5rem;background:rgba(44,95,45,.02);border-top:1px solid rgba(44,95,45,.08)}
.story-date{font-size:.8rem;color:#6b7280}
.story-likes{display:flex;align-items:center;gap:.5rem;color:var(--accent);font-weight:600;cursor:pointer;transition:all .3s}
.story-likes:hover{gap:.8rem;color:var(--accent-dark)}
.story-shares{display:flex;align-items-center;gap:.5rem;color:var(--teal);font-weight:600;cursor:pointer;transition:all .3s}
.story-shares:hover{gap:.8rem;color:var(--g2)}

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
.form-checkbox{display:flex;align-items-center;gap:.5rem;color:rgba(255,255,255,.9);font-weight:600;cursor:pointer}
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
  .stories-hero{min-height:60vh}
  .content-sec,.form-sec{padding:4rem 0 3rem}
  .stories-grid{grid-template-columns:1fr;gap:1.5rem}
  .story-card{padding:1rem}
  .form-card{padding:2rem}
}
@media(max-width:576px){
  .content-sec,.form-sec{padding:3rem 0 2.5rem}
  .section-title{font-size:2rem}
  .story-card{padding:1rem}
  .story-avatar{width:50px;height:50px;font-size:1.2rem}
  .story-name{font-size:1rem}
  .story-text{font-size:.9rem}
  .form-title{font-size:2rem}
  .form-card{padding:1.5rem}
  .form-input{padding:.8rem 1rem;font-size:.9rem}
  .form-btn{padding:1rem 1.5rem;font-size:1rem}
}
</style>
@endpush

@section('content')
<!-- ════════════════════════════════════════════
     STORIES HERO
════════════════════════════════════════════ -->
<section class="stories-hero" style="font-family:'Tajawal',sans-serif">
  <div class="stories-hero-bg"></div>
  <div class="stories-hero-grid"></div>
  <div class="stories-orb stories-orb-1"></div>
  <div class="stories-orb stories-orb-2"></div>
  <div class="stories-orb stories-orb-3"></div>
  
  <!-- Floating Shapes -->
  <div class="stories-shapes">
    <div class="stories-shape"></div>
    <div class="stories-shape"></div>
    <div class="stories-shape"></div>
    <div class="stories-shape"></div>
  </div>

  <div class="container position-relative" style="z-index:2; padding: 6rem 1.5rem 5rem;">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        
        <!-- Hero Header -->
        <div class="stories-header mb-5">
          <!-- Status Badge -->
          <div class="stories-tag d-inline-flex align-items-center gap-2 mb-4" 
               style="background: linear-gradient(135deg, rgba(196,168,130,0.15), rgba(196,168,130,0.05)); 
                      backdrop-filter: blur(20px); 
                      padding: 0.625rem 1.25rem; 
                      border-radius: 100px; 
                      border: 1px solid rgba(196,168,130,0.2);
                      box-shadow: 0 8px 32px rgba(196,168,130,0.1);
                      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
            <div class="stories-dot"></div>
            <span style="color: rgba(255,255,255,0.95); font-size: 0.875rem; font-weight: 600; letter-spacing: 0.025em;">قصص ملهمة</span>
          </div>

          <!-- Main Title -->
          <div class="stories-title-section mb-4">
            <h1 class="stories-h1" style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; line-height: 1.05; color: white; margin: 0;">
              <span class="title-line" style="display: block; margin-bottom: 0.25rem;">
                شارك قصتك
              </span>
              <span class="subtitle-line" style="display: block; font-size: clamp(2rem, 5vw, 2.5rem); font-weight: 700; opacity: 0.9;">
                <span class="stories-shine">الملهمة</span>
              </span>
            </h1>
          </div>

          <!-- Description -->
          <div class="stories-description mb-5">
            <p class="stories-desc" style="font-size: 1.125rem; line-height: 1.7; color: rgba(255,255,255,0.8); margin: 0; font-weight: 400;">
              كل قصة لها أثر. شارك تجربتك وكن مصدر أمل وقوة للآخرين الذين يمرون بنفس الظروف.
            </p>
          </div>

          <!-- CTA Buttons -->
          <div class="stories-actions d-flex flex-wrap gap-3 justify-content-center mb-5">
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
              <span>شارك قصتك</span>
            </a>
            
            <a href="{{ route('ai-assistant') }}" class="btn-hero-secondary" style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; 
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
     STORIES SECTION
════════════════════════════════════════════ -->
<section class="content-sec">
  <div class="content-container">
    <div class="section-header" data-reveal>
      <div class="section-badge"><i class="bi bi-book"></i> قصص حقيقية</div>
      <h2 class="section-title mb-2">قصص <span class="accent">ملهمة</span></h2>
      <p class="section-subtitle">تجارب حقيقية من أشخاص نجحوا في التغلب على تحديات الحياة</p>
    </div>

    @if($stories->count() > 0)
    <div class="stories-grid">
      @foreach($stories as $index => $story)
      <div class="story-card" data-reveal data-reveal-delay="{{ $index + 1 }}">
        <div class="story-header">
          <div class="story-avatar">
            @if($story->author_avatar)
              <img src="{{ asset('storage/' . $story->author_avatar) }}" alt="{{ $story->author_name }}">
            @else
              <i class="bi bi-person"></i>
            @endif
          </div>
          <div class="story-author">
            <div class="story-name">
              {{ $story->is_anonymous ? 'مجهول' : $story->author_name }}
            </div>
            <div class="story-meta">
              <div class="story-city">
                <i class="bi bi-geo-alt"></i>
                <span>{{ $story->author_city }}</span>
              </div>
              @if($story->is_anonymous)
              <div class="story-badge">
                <i class="bi bi-incognito"></i>
                <span>مجهول</span>
              </div>
              @endif
            </div>
          </div>
        </div>
        <div class="story-content">
          <p class="story-text">{{ $story->content }}</p>
        </div>
        <div class="story-actions">
          <div class="story-date">
            <i class="bi bi-clock"></i>
            <span>{{ $story->created_at->format('Y-m-d') }}</span>
          </div>
          <div class="story-actions-buttons">
            <div class="story-likes">
              <i class="bi bi-heart"></i>
              <span>{{ $story->likes ?? 0 }}</span>
            </div>
            <div class="story-shares">
              <i class="bi bi-share"></i>
              <span>{{ $story->shares ?? 0 }}</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Pagination -->
    @if($stories->hasPages())
    <div class="d-flex justify-content-center mt-5">
      {{ $stories->links() }}
    </div>
    @endif
    @else
    <div class="text-center py-5" data-reveal>
      <div style="font-size:3rem;color:var(--g1);margin-bottom:1rem;">
        <i class="bi bi-book"></i>
      </div>
      <h3 style="color:var(--dark);margin-bottom:1rem;">لا توجد قصص حالياً</h3>
      <p style="color:#6b7280;">كن أول من يشارك قصته الملهمة ويلهم الآخرين</p>
      <a href="#form" class="btn btn-primary mt-3" style="background:linear-gradient(135deg,var(--g1),var(--teal));border:none;padding:1rem 2rem;border-radius:12px;font-weight:700;">
        <i class="bi bi-plus-circle me-2"></i>
        شارك قصتك
      </a>
    </div>
    @endif
  </div>
</section>

<!-- ════════════════════════════════════════════
     FORM SECTION
════════════════════════════════════════════ -->
<section id="form" class="form-sec">
  <div class="form-bg"></div>
  <div class="form-container">
    <div class="form-header" data-reveal>
      <h2 class="form-title">شارك قصتك الملهمة</h2>
      <p class="form-subtitle">ساعد الآخرين بتقديم تجربتك في التغلب على التحديات</p>
    </div>

    <div class="form-card" data-reveal data-reveal-delay="1">
      @if(session('success'))
      <div class="alert alert-success" style="background:rgba(74,222,128,.1);border:1px solid rgba(74,222,128,.3);color:#4ade80;padding:1rem;border-radius:12px;margin-bottom:2rem;">
        {{ session('success') }}
      </div>
      @endif

      <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
              <label class="form-label">صورة شخصية (اختياري)</label>
              <input type="file" name="author_avatar" class="form-file" accept="image/*">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="form-checkbox">
                <input type="checkbox" name="is_anonymous" id="is_anonymous">
                <label for="is_anonymous">نشر القصة كمجهول</label>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">القصة *</label>
          <textarea name="content" class="form-input form-textarea" placeholder="اكتب قصتك الملهمة وكيف تغلبت على التحديات..." required></textarea>
        </div>

        <button type="submit" class="form-btn">
          <i class="bi bi-send me-2"></i>
          إرسال القصة
        </button>
      </form>
    </div>
  </div>
</section>
@endsection

@push('scripts')
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
document.querySelectorAll('.story-likes').forEach(button => {
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

// Share button functionality
document.querySelectorAll('.story-shares').forEach(button => {
  button.addEventListener('click', function() {
    const icon = this.querySelector('i');
    const count = this.querySelector('span');
    let currentCount = parseInt(count.textContent);
    
    if (icon.classList.contains('bi-share')) {
      icon.classList.remove('bi-share');
      icon.classList.add('bi-share-fill');
      count.textContent = currentCount + 1;
      this.style.color = 'var(--g2)';
      
      // Copy link to clipboard
      const url = window.location.href;
      navigator.clipboard.writeText(url).then(() => {
        const toast = document.createElement('div');
        toast.textContent = 'تم نسخ الرابط!';
        toast.style.cssText = 'position: fixed; top: 20px; right: 20px; background: var(--g2); color: white; padding: 1rem; border-radius: 8px; z-index: 9999;';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
      });
    }
  });
});
</script>
@endpush
