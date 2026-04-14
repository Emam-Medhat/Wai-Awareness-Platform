@extends('layouts.app')

@section('title', 'رحلة التغيير')

@push('styles')
<style>
/* ════════════════════════════════════════════
   WA3Y JOURNEY PAGE — SITE CONSISTENT DESIGN
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
.journey-page{font-family:'Tajawal',sans-serif}

/* ════ HERO ════════════════════════════════ */
.journey-hero{
  min-height:80vh;background:var(--dark);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.journey-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 60% at 20% 20%, rgba(44,95,45,.55) 0%, transparent 60%),
    radial-gradient(ellipse 60% 80% at 80% 80%, rgba(58,125,110,.4) 0%, transparent 55%),
    radial-gradient(ellipse 50% 50% at 50% 50%, rgba(196,168,130,.08) 0%, transparent 70%),
    linear-gradient(170deg, #0d1f13 0%, #1a2e20 50%, #0a1a10 100%);
}
.journey-hero-grid{
  position:absolute;inset:0;
  background-image:radial-gradient(circle, rgba(196,168,130,.18) 1px, transparent 1px);
  background-size:40px 40px;animation:dotsDrift 20s linear infinite;
}
@keyframes dotsDrift{0%{transform:translateY(0)}100%{transform:translateY(40px)}}
.journey-orb{position:absolute;border-radius:50%;filter:blur(100px);pointer-events:none}
.journey-orb-1{width:600px;height:600px;background:radial-gradient(circle, rgba(44,95,45,.35) 0%, transparent 70%);top:-100px;right:-100px;animation:glowPulse 8s ease-in-out infinite}
.journey-orb-2{width:500px;height:500px;background:radial-gradient(circle, rgba(58,125,110,.25) 0%, transparent 70%);bottom:-80px;left:-80px;animation:glowPulse 10s ease-in-out infinite reverse}
.journey-orb-3{width:300px;height:300px;background:radial-gradient(circle, rgba(196,168,130,.15) 0%, transparent 70%);top:50%;left:45%;animation:glowPulse 6s ease-in-out infinite;animation-delay:3s}
@keyframes glowPulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.2);opacity:.6}}
.journey-shape{position:absolute;border-radius:50%;background:linear-gradient(135deg,rgba(196,168,130,.1),rgba(44,95,45,.05));border:1px solid rgba(196,168,130,.08);animation:floatShape 20s infinite ease-in-out}
.journey-shape:nth-child(3){width:80px;height:80px;top:15%;right:12%;animation-delay:0s}
.journey-shape:nth-child(4){width:55px;height:55px;top:70%;right:28%;animation-delay:5s}
.journey-shape:nth-child(5){width:95px;height:95px;top:35%;left:8%;animation-delay:10s}
@keyframes floatShape{0%,100%{transform:translateY(0) translateX(0) rotate(0deg)}25%{transform:translateY(-30px) translateX(20px) rotate(90deg)}50%{transform:translateY(-15px) translateX(-15px) rotate(180deg)}75%{transform:translateY(-25px) translateX(10px) rotate(270deg)}}

/* Site consistent animations */
@keyframes fadeSlideDown{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
@keyframes blink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 6px rgba(74,222,128,0)}}
@keyframes shimmerText{0%{background-position:200% center}100%{background-position:-200% center}}
.journey-tag{animation:fadeSlideDown .8s .1s ease both}
.journey-h1{animation:fadeSlideDown .9s .22s ease both}
.journey-p{animation:fadeSlideDown .8s .38s ease both}
.journey-chips{animation:fadeSlideDown .8s .52s ease both}
.journey-dot{width:8px;height:8px;border-radius:50%;background:#4ade80;animation:blink 1.5s ease-in-out infinite}
.journey-shine{background:linear-gradient(135deg,var(--gold) 0%,#fff 50%,var(--gold) 100%);background-size:200% auto;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmerText 4s linear infinite;filter:drop-shadow(0 2px 8px rgba(196,168,130,.3))}

/* ════ JOURNEY STAGES ═════════════════════════ */
.journey-stages{background:var(--cream);padding:5rem 0 4rem}
.stages-container{max-width:900px;margin:0 auto}
.stages-header{text-align:center;margin-bottom:3rem}
.stages-timeline{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:2rem}
.stage-card{
  background:#fff;border-radius:16px;border:1px solid rgba(44,95,45,.1);
  padding:2rem;text-align:center;
  transition:all .3s ease;
  box-shadow:0 4px 20px rgba(44,95,45,.08);
}
.stage-card:hover{transform:translateY(-4px);box-shadow:0 8px 30px rgba(44,95,45,.12)}
.stage-number{
  width:60px;height:60px;border-radius:50%;background:linear-gradient(135deg,var(--g1),var(--teal));
  color:#fff;font-size:1.5rem;font-weight:900;display:flex;align-items:center;justify-content:center;
  margin:0 auto 1.5rem;
}
.stage-icon{width:50px;height:50px;border-radius:12px;background:linear-gradient(135deg,var(--g1),var(--g2));color:#fff;font-size:1.2rem;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem}
.stage-title{font-size:1.3rem;font-weight:900;color:var(--dark);margin-bottom:1rem;line-height:1.2}
.stage-desc{font-size:.95rem;color:#6b7280;line-height:1.6;margin-bottom:1.5rem}
.stage-duration{display:flex;align-items:center;justify-content:center;gap:.5rem;color:var(--teal);font-weight:600;font-size:.9rem;margin-bottom:1.5rem}
.stage-status{padding:.6rem 1.2rem;border-radius:8px;font-weight:700;text-align:center;font-size:.9rem}
.stage-status.completed{background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff}
.stage-status.pending{background:rgba(44,95,45,.1);color:var(--g1);border:1px solid rgba(44,95,45,.2)}
.stage-status.current{background:linear-gradient(135deg,var(--accent),var(--accent-light));color:#fff}

/* ════ PROGRESS SECTION ═════════════════════════ */
.progress-sec{background:var(--dark);padding:5rem 0 4rem}
.progress-container{max-width:800px;margin:0 auto}
.progress-header{text-align:center;margin-bottom:3rem}
.progress-title{font-size:2.5rem;font-weight:900;color:#fff;margin-bottom:1rem}
.progress-subtitle{font-size:1.1rem;color:rgba(255,255,255,.8)}
.progress-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:2rem}
.stat-card{background:rgba(255,255,255,.1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.2);border-radius:16px;padding:2rem;text-align:center;transition:all .3s}
.stat-card:hover{transform:translateY(-4px);background:rgba(255,255,255,.15)}
.stat-number{font-size:2.5rem;font-weight:900;color:var(--gold);margin-bottom:.5rem}
.stat-label{font-size:1rem;color:rgba(255,255,255,.9);font-weight:600}

/* ════ TIPS SECTION ═════════════════════════ */
.tips-sec{background:var(--cream);padding:5rem 0 4rem}
.tips-container{max-width:1000px;margin:0 auto}
.tips-header{text-align:center;margin-bottom:3rem}
.tips-title{font-size:2.5rem;font-weight:900;color:var(--dark);margin-bottom:1rem}
.tips-subtitle{font-size:1.1rem;color:#6b7280}
.tips-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem}
.tip-card{background:#fff;border-radius:16px;border:1px solid rgba(44,95,45,.1);padding:2rem;transition:all .3s;box-shadow:0 4px 20px rgba(44,95,45,.08)}
.tip-card:hover{transform:translateY(-4px);box-shadow:0 8px 30px rgba(44,95,45,.12)}
.tip-icon{width:50px;height:50px;border-radius:12px;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;font-size:1.2rem;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem}
.tip-title{font-size:1.2rem;font-weight:900;color:var(--dark);margin-bottom:1rem}
.tip-desc{font-size:.95rem;color:#6b7280;line-height:1.6}

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
  .journey-hero{min-height:60vh}
  .journey-stages,.progress-sec,.tips-sec{padding:4rem 0 3rem}
  .stages-container,.progress-container,.tips-container{max-width:700px}
  .stages-header,.progress-header,.tips-header{margin-bottom:2.5rem}
  .stages-timeline{grid-template-columns:1fr;gap:1.5rem}
  .progress-stats{grid-template-columns:1fr;gap:1.5rem}
  .tips-grid{grid-template-columns:1fr;gap:1.5rem}
  .stage-card,.stat-card,.tip-card{padding:1.5rem}
  .stage-number{width:50px;height:50px;font-size:1.3rem}
  .stage-icon{width:40px;height:40px;font-size:1rem}
  .stage-title{font-size:1.2rem}
  .stage-desc{font-size:.9rem}
  .progress-title,.tips-title{font-size:2.2rem}
  .stat-number{font-size:2.2rem}
  .tip-icon{width:40px;height:40px;font-size:1rem}
  .tip-title{font-size:1.1rem}
  .tip-desc{font-size:.9rem}
}
@media(max-width:576px){
  .journey-stages,.progress-sec,.tips-sec{padding:3rem 0 2.5rem}
  .stages-container,.progress-container,.tips-container{max-width:500px}
  .stage-card,.stat-card,.tip-card{padding:1.2rem}
  .stage-number{width:45px;height:45px;font-size:1.2rem}
  .stage-icon{width:36px;height:36px;font-size:.9rem}
  .stage-title{font-size:1.1rem}
  .stage-desc{font-size:.85rem}
  .progress-title,.tips-title{font-size:2rem}
  .stat-number{font-size:2rem}
  .tip-icon{width:36px;height:36px;font-size:.9rem}
  .tip-title{font-size:1rem}
  .tip-desc{font-size:.85rem}
}
</style>
@endpush

@section('content')
<!-- ════════════════════════════════════════════
     JOURNEY HERO
════════════════════════════════════════════ -->
<section class="journey-hero" style="font-family:'Tajawal',sans-serif">
  <div class="journey-hero-bg"></div>
  <div class="journey-hero-grid"></div>
  <div class="journey-orb journey-orb-1"></div>
  <div class="journey-orb journey-orb-2"></div>
  <div class="journey-orb journey-orb-3"></div>
  
  <!-- Floating Shapes -->
  <div class="journey-shapes">
    <div class="journey-shape"></div>
    <div class="journey-shape"></div>
    <div class="journey-shape"></div>
    <div class="journey-shape"></div>
  </div>

  <div class="container position-relative" style="z-index:2; padding: 6rem 1.5rem 5rem;">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        
        <!-- Hero Header -->
        <div class="journey-header mb-5">
          <!-- Status Badge -->
          <div class="journey-tag d-inline-flex align-items-center gap-2 mb-4" 
               style="background: linear-gradient(135deg, rgba(196,168,130,0.15), rgba(196,168,130,0.05)); 
                      backdrop-filter: blur(20px); 
                      padding: 0.625rem 1.25rem; 
                      border-radius: 100px; 
                      border: 1px solid rgba(196,168,130,0.2);
                      box-shadow: 0 8px 32px rgba(196,168,130,0.1);
                      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
            <div class="journey-dot"></div>
            <span style="color: rgba(255,255,255,0.95); font-size: 0.875rem; font-weight: 600; letter-spacing: 0.025em;">رحلة التغيير الشخصي</span>
          </div>

          <!-- Main Title -->
          <div class="journey-title-section mb-4">
            <h1 class="journey-h1" style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; line-height: 1.05; color: white; margin: 0;">
              <span class="title-line" style="display: block; margin-bottom: 0.25rem;">
                ابدأ رحلتك نحو
              </span>
              <span class="subtitle-line" style="display: block; font-size: clamp(2rem, 5vw, 2.5rem); font-weight: 700; opacity: 0.9;">
                <span class="journey-shine">التغيير الإيجابي</span>
              </span>
            </h1>
          </div>

          <!-- Description -->
          <div class="journey-description mb-5">
            <p class="journey-desc" style="font-size: 1.125rem; line-height: 1.7; color: rgba(255,255,255,0.8); margin: 0; font-weight: 400;">
              رحلة منظمة خطوة بخطوة نحو تحقيق أهدافك وتطوير شخصيتك. اتبع المراحل الأربع وحقق التغيير المستدام.
            </p>
          </div>

          <!-- CTA Buttons -->
          <div class="journey-actions d-flex flex-wrap gap-3 justify-content-center mb-5">
            <a href="#stages" class="btn-hero-primary" style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; 
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
              <i class="bi bi-play-circle"></i>
              <span>ابدأ الرحلة</span>
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
     JOURNEY STAGES
════════════════════════════════════════════ -->
<section id="stages" class="journey-stages">
  <div class="stages-container">
    <div class="stages-header" data-reveal>
      <div class="section-badge"><i class="bi bi-map me-2"></i> مراحل الرحلة</div>
      <h2 class="section-title mb-3">أربع مراحل <span class="accent">نحو النجاح</span></h2>
      <p class="section-subtitle">كل مرحلة مصممة لتأخذك خطوة أقرب نحو هدفك</p>
    </div>

    <div class="stages-timeline">
      @foreach($stages as $index => $stage)
      <div class="stage-card" data-reveal data-reveal-delay="{{ $index + 1 }}">
        <div class="stage-number">{{ $stage['id'] }}</div>
        <div class="stage-icon">
          <i class="bi {{ $stage['icon'] }}"></i>
        </div>
        <h3 class="stage-title">{{ $stage['title'] }}</h3>
        <p class="stage-desc">{{ $stage['description'] }}</p>
        <div class="stage-duration">
          <i class="bi bi-clock"></i>
          <span>{{ $stage['duration'] }}</span>
        </div>
        <div class="stage-status @if($stage['completed']) completed @elseif($index === 0) current @else pending @endif">
          @if($stage['completed'])
            <i class="bi bi-check-circle me-2"></i> مكتملة
          @elseif($index === 0)
            <i class="bi bi-play-circle me-2"></i> مرحلة حالية
          @else
            <i class="bi bi-lock me-2"></i> قيد الانتظار
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════
     PROGRESS SECTION
════════════════════════════════════════════ -->
<section class="progress-sec">
  <div class="progress-container">
    <div class="progress-header" data-reveal>
      <h2 class="progress-title">تقدمك في الرحلة</h2>
      <p class="progress-subtitle">تابع إنجازاتك واستمر في التقدم</p>
    </div>

    <div class="progress-stats" data-reveal data-reveal-delay="1">
      <div class="stat-card">
        <div class="stat-number">{{ collect($stages)->where('completed', true)->count() }}</div>
        <div class="stat-label">مراحل مكتملة</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">{{ collect($stages)->where('completed', false)->count() }}</div>
        <div class="stat-label">مراحل متبقية</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">{{ round((collect($stages)->where('completed', true)->count() / collect($stages)->count()) * 100) }}%</div>
        <div class="stat-label">نسبة الإنجاز</div>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════
     TIPS SECTION
════════════════════════════════════════════ -->
<section class="tips-sec">
  <div class="tips-container">
    <div class="tips-header" data-reveal>
      <div class="section-badge"><i class="bi bi-lightbulb me-2"></i> نصائح هامة</div>
      <h2 class="tips-title mb-3">نصائح لـ <span class="accent">رحلة ناجحة</span></h2>
      <p class="tips-subtitle">نصائح عملية تساعدك على تحقيق أقصى استفادة من رحلتك</p>
    </div>

    <div class="tips-grid">
      <div class="tip-card" data-reveal data-reveal-delay="1">
        <div class="tip-icon">
          <i class="bi bi-target"></i>
        </div>
        <h3 class="tip-title">حدد أهداف واضحة</h3>
        <p class="tip-desc">ضع أهدافاً محددة وقابلة للقياس لكل مرحلة من مراحل رحلتك</p>
      </div>

      <div class="tip-card" data-reveal data-reveal-delay="2">
        <div class="tip-icon">
          <i class="bi bi-calendar-check"></i>
        </div>
        <h3 class="tip-title">التزم بالجدول الزمني</h3>
        <p class="tip-desc">حافظ على انتظامك في اتباع الجدول الزمني المحدد لكل مرحلة</p>
      </div>

      <div class="tip-card" data-reveal data-reveal-delay="3">
        <div class="tip-icon">
          <i class="bi bi-people"></i>
        </div>
        <h3 class="tip-title">اطلب الدعم</h3>
        <p class="tip-desc">لا تتردد في طلب المساعدة من المساعد الذكي أو من حولك</p>
      </div>

      <div class="tip-card" data-reveal data-reveal-delay="4">
        <div class="tip-icon">
          <i class="bi bi-journal-text"></i>
        </div>
        <h3 class="tip-title">سجل تقدمك</h3>
        <p class="tip-desc">دون إنجازاتك وتحدياتك يومياً لتتبع تطورك</p>
      </div>

      <div class="tip-card" data-reveal data-reveal-delay="5">
        <div class="tip-icon">
          <i class="bi bi-heart"></i>
        </div>
        <h3 class="tip-title">كن صبوراً</h3>
        <p class="tip-desc">التغيير يحتاج وقتاً وجهداً، كن صبوراً مع نفسك</p>
      </div>

      <div class="tip-card" data-reveal data-reveal-delay="6">
        <div class="tip-icon">
          <i class="bi bi-trophy"></i>
        </div>
        <h3 class="tip-title">احتفل بإنجازاتك</h3>
        <p class="tip-desc">احتفل بكل إنجاز صغير لتحفيزك على الاستمرار</p>
      </div>
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

// Stage interaction
document.querySelectorAll('.stage-card').forEach(card => {
  card.addEventListener('click', function() {
    const status = this.querySelector('.stage-status');
    if (status.classList.contains('pending')) {
      // Show message for pending stages
      const message = document.createElement('div');
      message.className = 'alert alert-info';
      message.textContent = 'يجب إكمال المراحل السابقة أولاً';
      message.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; background: var(--teal); color: white; padding: 1rem; border-radius: 8px;';
      document.body.appendChild(message);
      setTimeout(() => message.remove(), 3000);
    }
  });
});
</script>
@endpush
