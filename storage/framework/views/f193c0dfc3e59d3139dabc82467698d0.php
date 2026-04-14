<?php $__env->startSection('title', 'دليل وعي'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ════════════════════════════════════════════
   WA3Y GUIDE PAGE — COMPREHENSIVE DESIGN
════════════════════════════════════════════ */
:root{
  --g1:#2D5E3A;--g2:#3d7a4e;--teal:#3A7D6E;--teal2:#2a6b5d;
  --gold:#C4A882;--gold2:#a8885e;--gold3:#e8d5b7;
  --cream:#F0EFEC;--dark:#1a2e20;--ink:#232f26;
  --muted:#6b7280;--bd:rgba(45,94,58,.12);
  --sh-sm:0 4px 20px rgba(45,94,58,.08);
  --sh-md:0 12px 40px rgba(45,94,58,.13);
  --sh-lg:0 32px 80px rgba(45,94,58,.18);
  --accent:#e91e63;--accent-dark:#c2185b;
  --success:#4ade80;--danger:#ef4444;
}
.guide{font-family:'Tajawal',sans-serif}

/* ════ HERO ════════════════════════════════ */
.guide-hero{
  min-height:70vh;background:linear-gradient(135deg,var(--dark) 0%,#0f1f15 50%,#0a1409 100%);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.guide-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 75% 65% at 20% 30%,rgba(45,94,58,.8) 0%,transparent 60%),
    radial-gradient(ellipse 60% 70% at 85% 70%,rgba(58,125,110,.6) 0%,transparent 55%),
    radial-gradient(ellipse 40% 50% at 50% 80%,rgba(233,30,99,.2) 0%,transparent 50%),
    linear-gradient(165deg,#0c1c11 0%,#1a2e20 40%,#0f1f15 80%,#0a1409 100%);
}
.guide-hero-grid{
  position:absolute;inset:0;
  background-image:
    linear-gradient(rgba(196,168,130,.06) 1px,transparent 1px),
    linear-gradient(90deg,rgba(196,168,130,.06) 1px,transparent 1px);
  background-size:60px 60px;animation:guideGrid 30s linear infinite;
}
@keyframes guideGrid{to{background-position:60px 60px}}
.guide-orb{position:absolute;border-radius:50%;filter:blur(80px);pointer-events:none}
.guide-orb-1{width:500px;height:500px;background:radial-gradient(circle,rgba(45,94,58,.3) 0%,rgba(45,94,58,.08) 70%,transparent 100%);top:-120px;right:-80px;animation:guideOrb 10s ease-in-out infinite}
.guide-orb-2{width:380px;height:380px;background:radial-gradient(circle,rgba(58,125,110,.2) 0%,rgba(58,125,110,.06) 70%,transparent 100%);bottom:-80px;left:-60px;animation:guideOrb 13s ease-in-out infinite reverse}
@keyframes guideOrb{0%,100%{transform:scale(1) rotate(0deg)}50%{transform:scale(1.2) rotate(180deg);opacity:.7}}
.guide-shape{position:absolute;border-radius:50%;background:linear-gradient(135deg,rgba(196,168,130,.1),rgba(45,94,58,.06));border:1px solid rgba(196,168,130,.08);animation:guideFlt 15s ease-in-out infinite}
.guide-shape:nth-child(3){width:70px;height:70px;top:20%;right:15%;animation-delay:0s}
.guide-shape:nth-child(4){width:45px;height:45px;top:65%;right:25%;animation-delay:4s}
.guide-shape:nth-child(5){width:85px;height:85px;top:30%;left:10%;animation-delay:8s}
@keyframes guideFlt{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-20px) rotate(180deg)}}

/* hero text animations */
@keyframes guideIn{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
@keyframes guideGold{0%{background-position:200% center}100%{background-position:-200% center}}
@keyframes guideBlink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 8px rgba(74,222,128,0)}}
.guide-tag  {animation:guideIn .7s .1s ease both}
.guide-h1   {animation:guideIn .8s .22s ease both}
.guide-p    {animation:guideIn .8s .38s ease both}
.guide-chips{animation:guideIn .8s .52s ease both}
.guide-dot  {width:10px;height:10px;border-radius:50%;background:var(--success);animation:guideBlink 2s infinite;flex-shrink:0;box-shadow:0 0 12px rgba(74,222,128,.5)}
.gold-shine{
  background:linear-gradient(135deg,var(--gold) 0%,#fff 25%,var(--gold) 50%,#fff 75%,var(--gold) 100%);
  background-size:300% auto;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  animation:guideGold 5s linear infinite;filter:drop-shadow(0 2px 8px rgba(196,168,130,.3));
}

/* ════ CATEGORIES SECTION ═══════════════════ */
.categories-sec{background:linear-gradient(135deg,var(--cream) 0%,rgba(240,239,236,.8) 100%);padding:5rem 0 4rem}
.cat-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem}
.cat-card{
  background:linear-gradient(135deg,#fff 0%,rgba(255,255,255,.95) 100%);border-radius:24px;border:1px solid rgba(45,94,58,.08);
  padding:2.5rem;text-align:center;
  transition:all .4s cubic-bezier(.4,0,.2,1);position:relative;overflow:hidden;
  box-shadow:0 12px 40px rgba(45,94,58,.08);
}
.cat-card::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--g1),var(--teal),var(--gold));transform:scaleX(0);transform-origin:left;transition:transform .4s cubic-bezier(.4,0,.2,1)}
.cat-card:hover{transform:translateY(-12px) scale(1.02);box-shadow:0 24px 80px rgba(45,94,58,.15);border-color:rgba(45,94,58,.15)}
.cat-card:hover::before{transform:scaleX(1)}
.cat-card:hover .cat-ico{transform:scale(1.1) rotate(-5deg);box-shadow:0 16px 48px rgba(45,94,58,.25)}
.cat-ico{width:80px;height:80px;border-radius:20px;display:flex;align-items:center;justify-content:center;font-size:2rem;color:#fff;margin:0 auto 1.5rem;transition:transform .4s cubic-bezier(.34,1.56,.64,1);box-shadow:0 12px 32px rgba(45,94,58,.15)}
.cat-title{font-size:1.3rem;font-weight:900;color:var(--dark);margin-bottom:.5rem;line-height:1.2}
.cat-desc{font-size:.9rem;color:var(--muted);line-height:1.7;margin-bottom:1.5rem}
.cat-count{display:inline-flex;align-items:center;gap:.5rem;padding:.5rem 1rem;background:rgba(45,94,58,.08);border-radius:50px;font-size:.85rem;font-weight:700;color:var(--g1)}

/* ════ RESOURCES SECTION ═══════════════════ */
.resources-sec{background:linear-gradient(135deg,#fff 0%,rgba(240,239,236,.6) 100%);padding:5rem 0 4rem}
.resource-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem}
.resource-card{
  background:linear-gradient(135deg,var(--cream) 0%,#fff 100%);border-radius:20px;border:1px solid rgba(45,94,58,.08);
  padding:2rem;display:flex;flex-direction:column;align-items:center;text-align:center;
  transition:all .35s cubic-bezier(.4,0,.2,1);box-shadow:0 8px 32px rgba(45,94,58,.06);
}
.resource-card:hover{transform:translateY(-8px) scale(1.02);box-shadow:0 20px 60px rgba(45,94,58,.12);border-color:rgba(45,94,58,.15)}
.resource-card:hover .resource-ico{transform:scale(1.08) rotate(3deg);box-shadow:0 12px 40px rgba(45,94,58,.2)}
.resource-ico{width:64px;height:64px;border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:#fff;margin-bottom:1.2rem;transition:transform .4s cubic-bezier(.34,1.56,.64,1);box-shadow:0 8px 24px rgba(45,94,58,.12)}
.resource-title{font-size:1.1rem;font-weight:900;color:var(--dark);margin-bottom:.4rem;line-height:1.3}
.resource-desc{font-size:.85rem;color:var(--muted);line-height:1.6;margin-bottom:1rem}
.resource-link{display:inline-flex;align-items:center;gap:.5rem;color:var(--g1);font-weight:700;text-decoration:none;font-size:.85rem;transition:all .3s}
.resource-link:hover{gap:.7rem;color:var(--teal)}

/* ════ QUICK ACCESS ═══════════════════════ */
.quick-sec{background:linear-gradient(135deg,var(--cream) 0%,rgba(240,239,236,.8) 100%);padding:4rem 0 5rem}
.quick-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:1.5rem}
.quick-item{
  background:#fff;border-radius:16px;border:1px solid rgba(45,94,58,.08);
  padding:1.5rem;display:flex;align-items:center;gap:1rem;
  transition:all .3s cubic-bezier(.4,0,.2,1);box-shadow:0 6px 20px rgba(45,94,58,.04);
}
.quick-item:hover{transform:translateY(-4px) translateX(-2px);box-shadow:0 12px 32px rgba(45,94,58,.08);border-color:rgba(45,94,58,.12)}
.quick-item:hover .quick-ico{transform:scale(1.05) rotate(-2deg)}
.quick-ico{width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;color:#fff;flex-shrink:0;transition:transform .3s cubic-bezier(.34,1.56,.64,1);box-shadow:0 6px 20px rgba(45,94,58,.1)}
.quick-content{flex:1}
.quick-title{font-size:1rem;font-weight:800;color:var(--dark);margin-bottom:.2rem;line-height:1.2}
.quick-desc{font-size:.8rem;color:var(--muted);line-height:1.5}

/* ════ SEARCH SECTION ═════════════════════ */
.search-sec{background:linear-gradient(135deg,#fff 0%,rgba(240,239,236,.6) 100%);padding:4rem 0}
.search-container{max-width:600px;margin:0 auto}
.search-box{
  background:#fff;border-radius:20px;border:2px solid rgba(45,94,58,.08);
  padding:1.5rem;display:flex;align-items:center;gap:1rem;
  box-shadow:0 12px 40px rgba(45,94,58,.08);transition:all .3s;
}
.search-box:focus-within{border-color:var(--g1);box-shadow:0 0 0 4px rgba(45,94,58,.1),0 16px 48px rgba(45,94,58,.12)}
.search-ico{width:48px;height:48px;border-radius:12px;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.2rem;flex-shrink:0}
.search-input{flex:1;border:none;outline:none;font-size:1rem;font-family:'Tajawal',sans-serif;color:var(--dark);background:transparent}
.search-input::placeholder{color:var(--muted)}
.search-btn{padding:.8rem 1.5rem;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;border:none;border-radius:12px;font-weight:800;font-family:'Tajawal',sans-serif;cursor:pointer;transition:all .3s}
.search-btn:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(45,94,58,.25)}

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
  .guide-hero{min-height:60vh}
  .categories-sec,.resources-sec,.quick-sec,.search-sec{padding:4rem 0 3rem}
  .cat-grid{grid-template-columns:1fr;gap:1.5rem}
  .resource-grid{grid-template-columns:1fr}
  .quick-grid{grid-template-columns:1fr}
  .cat-card{padding:2rem 1.5rem}
  .cat-ico{width:64px;height:64px;font-size:1.5rem}
  .resource-card{padding:1.5rem}
  .resource-ico{width:56px;height:56px;font-size:1.3rem}
  .search-box{padding:1rem;flex-direction:column}
  .search-ico{width:40px;height:40px;font-size:1rem}
  .search-input{width:100%;text-align:center;margin-bottom:1rem}
  .search-btn{width:100%}
}
@media(max-width:576px){
  .categories-sec,.resources-sec,.quick-sec,.search-sec{padding:3rem 0 2.5rem}
  .cat-card{padding:1.5rem 1rem}
  .cat-ico{width:56px;height:56px;font-size:1.3rem}
  .resource-card{padding:1.2rem}
  .resource-ico{width:48px;height:48px;font-size:1.1rem}
  .quick-item{padding:1rem;gap:.8rem}
  .quick-ico{width:40px;height:40px;font-size:1rem}
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="guide">


<section class="guide-hero">
  <div class="guide-hero-bg"></div>
  <div class="guide-hero-grid"></div>
  <div class="guide-shape"></div><div class="guide-shape"></div><div class="guide-shape"></div>
  <div class="guide-orb guide-orb-1"></div>
  <div class="guide-orb guide-orb-2"></div>

  <div class="container position-relative" style="z-index:2;padding:5rem 1.5rem 4.5rem">
    <div style="max-width:700px;margin:0 auto;text-align:center">
      <div class="guide-tag" style="margin-bottom:1.2rem">
        <span style="display:inline-flex;align-items:center;gap:.55rem;padding:.42rem 1.2rem;background:rgba(196,168,130,.1);border:1px solid rgba(196,168,130,.28);border-radius:50px;backdrop-filter:blur(8px)">
          <span class="guide-dot"></span>
          <span style="color:rgba(196,168,130,.9);font-size:.8rem;font-weight:700">مرشدك الشامل للصحة النفسية</span>
        </span>
      </div>
      <div class="guide-h1">
        <h1 style="font-size:clamp(2.5rem,6vw,4.4rem);font-weight:900;line-height:1.06;color:#fff;margin:0 0 1.1rem">
          دليل <span class="gold-shine">وعي</span>
        </h1>
      </div>
      <p class="guide-p" style="font-size:1.05rem;color:rgba(255,255,255,.6);line-height:1.9;max-width:550px;margin:0 auto 2.5rem">
        كل ما تحتاجه للعناية بصحتك النفسية في مكان واحد. موارد، أدوات، ومعلومات موثوقة لمساعدتك في رحلتك نحو التوازن النفسي.
      </p>
      <div class="guide-chips" style="display:flex;flex-wrap:wrap;gap:.7rem;justify-content:center">
        <div class="cp-chip">
          <div class="cp-chip-ico"><i class="bi bi-book-fill"></i></div>
          <div><div class="cp-chip-n">500+</div><div class="cp-chip-l">مصدر</div></div>
        </div>
        <div class="cp-chip">
          <div class="cp-chip-ico"><i class="bi bi-people-fill"></i></div>
          <div><div class="cp-chip-n">50+</div><div class="cp-chip-l">خبير</div></div>
        </div>
        <div class="cp-chip">
          <div class="cp-chip-ico"><i class="bi bi-shield-check"></i></div>
          <div><div class="cp-chip-n">100%</div><div class="cp-chip-l">موثوق</div></div>
        </div>
      </div>
    </div>
  </div>
  <div class="cp-wave">
    <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block">
      <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,42 1440,38 L1440,70 L0,70 Z" fill="#F0EFEC"/>
    </svg>
  </div>
</section>


<section class="categories-sec">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-grid-fill"></i> الفئات الرئيسية</div>
      <h2 class="sec-h2">تصفح حسب <span style="color:var(--g1)">الاحتياج</span></h2>
      <p style="color:var(--muted);font-size:.9rem;max-width:520px;margin:0 auto">موارد منظمة حسب فئات مختلفة لتلبية جميع احتياجاتك</p>
    </div>
    
    <div class="cat-grid">
      <div class="cat-card" data-sr="up" data-sr-d="1">
        <div class="cat-ico" style="background:linear-gradient(135deg,var(--g1),var(--teal))">
          <i class="bi bi-heart-pulse-fill"></i>
        </div>
        <h3 class="cat-title">الصحة النفسية</h3>
        <p class="cat-desc">معلومات شاملة عن الصحة النفسية، الاضطرابات، والعلاجات المتاحة</p>
        <div class="cat-count">
          <i class="bi bi-collection-fill"></i>
          <span>150+ مصدر</span>
        </div>
      </div>
      
      <div class="cat-card" data-sr="up" data-sr-d="2">
        <div class="cat-ico" style="background:linear-gradient(135deg,var(--teal),var(--teal2))">
          <i class="bi bi-shield-heart-fill"></i>
        </div>
        <h3 class="cat-title">الإدمان والتعافي</h3>
        <p class="cat-desc">موارد متخصصة لمساعدتك في فهم الإدمان وخطوات التعافي</p>
        <div class="cat-count">
          <i class="bi bi-collection-fill"></i>
          <span>80+ مصدر</span>
        </div>
      </div>
      
      <div class="cat-card" data-sr="up" data-sr-d="3">
        <div class="cat-ico" style="background:linear-gradient(135deg,var(--gold),var(--gold2))">
          <i class="bi bi-people-fill"></i>
        </div>
        <h3 class="cat-title">العلاقات الأسرية</h3>
        <p class="cat-desc">دليل لبناء علاقات أسرية صحية وحل المشاكل الزوجية</p>
        <div class="cat-count">
          <i class="bi bi-collection-fill"></i>
          <span>120+ مصدر</span>
        </div>
      </div>
      
      <div class="cat-card" data-sr="up" data-sr-d="4">
        <div class="cat-ico" style="background:linear-gradient(135deg,var(--accent),var(--accent-dark))">
          <i class="bi bi-person-workspace"></i>
        </div>
        <h3 class="cat-title">التطوير الذاتي</h3>
        <p class="cat-desc">أدوات وتقنيات لتنمية الذات وتحسين جودة الحياة</p>
        <div class="cat-count">
          <i class="bi bi-collection-fill"></i>
          <span>90+ مصدر</span>
        </div>
      </div>
      
      <div class="cat-card" data-sr="up" data-sr-d="1">
        <div class="cat-ico" style="background:linear-gradient(135deg,var(--g2),var(--g1))">
          <i class="bi bi-child-care-fill"></i>
        </div>
        <h3 class="cat-title">صحة الطفل</h3>
        <p class="cat-desc">معلومات عن صحة الأطفال النفسية والتنمية السليمة</p>
        <div class="cat-count">
          <i class="bi bi-collection-fill"></i>
          <span>60+ مصدر</span>
        </div>
      </div>
      
      <div class="cat-card" data-sr="up" data-sr-d="2">
        <div class="cat-ico" style="background:linear-gradient(135deg,var(--teal2),var(--g1))">
          <i class="bi bi-briefcase-fill"></i>
        </div>
        <h3 class="cat-title">الصحة المهنية</h3>
        <p class="cat-desc">مواجهة ضغوط العمل وتحقيق التوازن بين الحياة والعمل</p>
        <div class="cat-count">
          <i class="bi bi-collection-fill"></i>
          <span>70+ مصدر</span>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="resources-sec">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-layers-fill"></i> الموارد المتاحة</div>
      <h2 class="sec-h2">أدوات و<span style="color:var(--g1)">موارد</span></h2>
      <p style="color:var(--muted);font-size:.9rem;max-width:520px;margin:0 auto">مجموعة متنوعة من الموارد لمساعدتك في رحلتك</p>
    </div>
    
    <div class="resource-grid">
      <div class="resource-card" data-sr="up" data-sr-d="1">
        <div class="resource-ico" style="background:linear-gradient(135deg,var(--g1),var(--teal))">
          <i class="bi bi-file-text-fill"></i>
        </div>
        <h3 class="resource-title">المقالات والأبحاث</h3>
        <p class="resource-desc">مقالات علمية وأبحاث موثوقة في مجال الصحة النفسية</p>
        <a href="#" class="resource-link">
          استكشف <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      
      <div class="resource-card" data-sr="up" data-sr-d="2">
        <div class="resource-ico" style="background:linear-gradient(135deg,var(--teal),var(--teal2))">
          <i class="bi bi-play-circle-fill"></i>
        </div>
        <h3 class="resource-title">الفيديوهات التعليمية</h3>
        <p class="resource-desc">فيديوهات توعوية وعلاجية من خبراء متخصصين</p>
        <a href="#" class="resource-link">
          شاهد <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      
      <div class="resource-card" data-sr="up" data-sr-d="3">
        <div class="resource-ico" style="background:linear-gradient(135deg,var(--gold),var(--gold2))">
          <i class="bi bi-book-fill"></i>
        </div>
        <h3 class="resource-title">المكتبة الرقمية</h3>
        <p class="resource-desc">كتب ومؤلفات متخصصة في الصحة النفسية والعلاج</p>
        <a href="#" class="resource-link">
          اقرأ <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      
      <div class="resource-card" data-sr="up" data-sr-d="4">
        <div class="resource-ico" style="background:linear-gradient(135deg,var(--accent),var(--accent-dark))">
          <i class="bi bi-clipboard-check-fill"></i>
        </div>
        <h3 class="resource-title">التقييمات والاختبارات</h3>
        <p class="resource-desc">أدوات تقييم ذاتي لفهم حالتك النفسية بشكل أفضل</p>
        <a href="#" class="resource-link">
          قيم <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      
      <div class="resource-card" data-sr="up" data-sr-d="1">
        <div class="resource-ico" style="background:linear-gradient(135deg,var(--g2),var(--g1))">
          <i class="bi bi-telephone-fill"></i>
        </div>
        <h3 class="resource-title">خطوط الدعم</h3>
        <p class="resource-desc">قائمة بجميع خطوط الدعم المتاحة للطوارئ والاستشارات</p>
        <a href="#" class="resource-link">
          اتصل <i class="bi bi-arrow-left"></i>
        </a>
      </div>
      
      <div class="resource-card" data-sr="up" data-sr-d="2">
        <div class="resource-ico" style="background:linear-gradient(135deg,var(--teal2),var(--g1))">
          <i class="bi bi-calendar-check-fill"></i>
        </div>
        <h3 class="resource-title">الجلسات العلاجية</h3>
        <p class="resource-desc">حجز وتتبع الجلسات العلاجية مع الأطباء المتخصصين</p>
        <a href="#" class="resource-link">
          احجز <i class="bi bi-arrow-left"></i>
        </a>
      </div>
    </div>
  </div>
</section>


<section class="quick-sec">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-lightning-fill"></i> وصول سريع</div>
      <h2 class="sec-h2">روابط <span style="color:var(--g1)">سريعة</span></h2>
      <p style="color:var(--muted);font-size:.9rem;max-width:520px;margin:0 auto">وصول فوري لأهم الخدمات والموارد</p>
    </div>
    
    <div class="quick-grid">
      <div class="quick-item" data-sr="up" data-sr-d="1">
        <div class="quick-ico" style="background:linear-gradient(135deg,var(--g1),var(--teal))">
          <i class="bi bi-telephone-fill"></i>
        </div>
        <div class="quick-content">
          <h4 class="quick-title">الدعم الطارئ</h4>
          <p class="quick-desc">اتصل فوراً بالدعم النفسي الطارئ</p>
        </div>
      </div>
      
      <div class="quick-item" data-sr="up" data-sr-d="2">
        <div class="quick-ico" style="background:linear-gradient(135deg,var(--teal),var(--teal2))">
          <i class="bi bi-person-plus-fill"></i>
        </div>
        <div class="quick-content">
          <h4 class="quick-title">حجز استشارة</h4>
          <p class="quick-desc">احجز موعد مع طبيب متخصص</p>
        </div>
      </div>
      
      <div class="quick-item" data-sr="up" data-sr-d="3">
        <div class="quick-ico" style="background:linear-gradient(135deg,var(--gold),var(--gold2))">
          <i class="bi bi-chat-heart-fill"></i>
        </div>
        <div class="quick-content">
          <h4 class="quick-title">المساعد الذكي</h4>
          <p class="quick-desc">احصل على إجابات فورية من الذكاء الاصطناعي</p>
        </div>
      </div>
      
      <div class="quick-item" data-sr="up" data-sr-d="4">
        <div class="quick-ico" style="background:linear-gradient(135deg,var(--accent),var(--accent-dark))">
          <i class="bi bi-download"></i>
        </div>
        <div class="quick-content">
          <h4 class="quick-title">تطبيق وعي</h4>
          <p class="quick-desc">حمل التطبيق للوصول السريع</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="search-sec">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-search"></i> البحث المتقدم</div>
      <h2 class="sec-h2">ابحث عن <span style="color:var(--g1)">معلومات</span></h2>
      <p style="color:var(--muted);font-size:.9rem;max-width:520px;margin:0 auto">استخدم البحث المتقدم للعثور على ما تحتاجه بسرعة</p>
    </div>
    
    <div class="search-container" data-sr="up">
      <div class="search-box">
        <div class="search-ico">
          <i class="bi bi-search"></i>
        </div>
        <input type="text" class="search-input" placeholder="ابحث عن مقالات، فيديوهات، كتب، أو أي معلومة...">
        <button class="search-btn">
          <i class="bi bi-search"></i> بحث
        </button>
      </div>
    </div>
  </div>
</section>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
const srIO = new IntersectionObserver(es => {
  es.forEach(e => { if(e.isIntersecting){ e.target.classList.add('done'); srIO.unobserve(e.target); }});
}, { threshold: 0.07 });
document.querySelectorAll('[data-sr]').forEach(el => srIO.observe(el));
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\pages\guide.blade.php ENDPATH**/ ?>