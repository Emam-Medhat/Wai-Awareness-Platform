@extends('layouts.app')

@section('title', 'المساعد الذكي')

@push('styles')
<style>
/* ════════════════════════════════════════════
   WA3Y AI ASSISTANT PAGE — SITE CONSISTENT DESIGN
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
.ai-page{font-family:'Tajawal',sans-serif}

/* ════ HERO ════════════════════════════════ */
.ai-hero{
  min-height:80vh;background:var(--dark);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.ai-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 60% at 20% 20%, rgba(44,95,45,.55) 0%, transparent 60%),
    radial-gradient(ellipse 60% 80% at 80% 80%, rgba(58,125,110,.4) 0%, transparent 55%),
    radial-gradient(ellipse 50% 50% at 50% 50%, rgba(196,168,130,.08) 0%, transparent 70%),
    linear-gradient(170deg, #0d1f13 0%, #1a2e20 50%, #0a1a10 100%);
}
.ai-hero-grid{
  position:absolute;inset:0;
  background-image:radial-gradient(circle, rgba(196,168,130,.18) 1px, transparent 1px);
  background-size:40px 40px;animation:dotsDrift 20s linear infinite;
}
@keyframes dotsDrift{0%{transform:translateY(0)}100%{transform:translateY(40px)}}
.ai-orb{position:absolute;border-radius:50%;filter:blur(100px);pointer-events:none}
.ai-orb-1{width:600px;height:600px;background:radial-gradient(circle, rgba(44,95,45,.35) 0%, transparent 70%);top:-100px;right:-100px;animation:glowPulse 8s ease-in-out infinite}
.ai-orb-2{width:500px;height:500px;background:radial-gradient(circle, rgba(58,125,110,.25) 0%, transparent 70%);bottom:-80px;left:-80px;animation:glowPulse 10s ease-in-out infinite reverse}
.ai-orb-3{width:300px;height:300px;background:radial-gradient(circle, rgba(196,168,130,.15) 0%, transparent 70%);top:50%;left:45%;animation:glowPulse 6s ease-in-out infinite;animation-delay:3s}
@keyframes glowPulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.2);opacity:.6}}
.ai-shape{position:absolute;border-radius:50%;background:linear-gradient(135deg,rgba(196,168,130,.1),rgba(44,95,45,.05));border:1px solid rgba(196,168,130,.08);animation:floatShape 20s infinite ease-in-out}
.ai-shape:nth-child(3){width:80px;height:80px;top:15%;right:12%;animation-delay:0s}
.ai-shape:nth-child(4){width:55px;height:55px;top:70%;right:28%;animation-delay:5s}
.ai-shape:nth-child(5){width:95px;height:95px;top:35%;left:8%;animation-delay:10s}
@keyframes floatShape{0%,100%{transform:translateY(0) translateX(0) rotate(0deg)}25%{transform:translateY(-30px) translateX(20px) rotate(90deg)}50%{transform:translateY(-15px) translateX(-15px) rotate(180deg)}75%{transform:translateY(-25px) translateX(10px) rotate(270deg)}}

/* Site consistent animations */
@keyframes fadeSlideDown{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
@keyframes blink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 6px rgba(74,222,128,0)}}
@keyframes shimmerText{0%{background-position:200% center}100%{background-position:-200% center}}
.ai-tag{animation:fadeSlideDown .8s .1s ease both}
.ai-h1{animation:fadeSlideDown .9s .22s ease both}
.ai-p{animation:fadeSlideDown .8s .38s ease both}
.ai-chips{animation:fadeSlideDown .8s .52s ease both}
.ai-dot{width:8px;height:8px;border-radius:50%;background:#4ade80;animation:blink 1.5s ease-in-out infinite}
.ai-shine{background:linear-gradient(135deg,var(--gold) 0%,#fff 50%,var(--gold) 100%);background-size:200% auto;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmerText 4s linear infinite;filter:drop-shadow(0 2px 8px rgba(196,168,130,.3))}

/* ════ CHAT SECTION ═════════════════════════ */
.chat-sec{background:var(--cream);padding:5rem 0 4rem}
.chat-container{max-width:1200px;margin:0 auto}
.chat-header{text-align:center;margin-bottom:3rem}
.chat-box{
  background:#fff;border-radius:28px;border:1px solid rgba(44,95,45,.08);
  overflow:hidden;box-shadow:0 24px 80px rgba(44,95,45,.15);
  transition:all 0.4s cubic-bezier(.4,0,.2,1);
}
.chat-box:hover{transform:translateY(-5px);box-shadow:0 32px 100px rgba(44,95,45,.2)}
.chat-header-bar{
  background:linear-gradient(135deg,var(--g1),var(--teal),var(--g2));
  padding:1.5rem 2rem;display:flex;align-items:center;gap:1rem;
}
.chat-avatar{width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.3rem}
.chat-info{flex:1}
.chat-name{font-size:1.2rem;font-weight:900;color:#fff;margin-bottom:.25rem}
.chat-status{display:flex;align-items:center;gap:.5rem;color:rgba(255,255,255,.9);font-size:.875rem}
.status-dot{width:8px;height:8px;border-radius:50%;background:#4ade80;animation:blink 1.5s ease-in-out infinite}
.chat-actions{display:flex;gap:.5rem}
.chat-btn{padding:.5rem 1rem;background:rgba(255,255,255,.2);border:1px solid rgba(255,255,255,.3);border-radius:8px;color:#fff;font-size:.875rem;font-weight:600;cursor:pointer;transition:all .3s}
.chat-btn:hover{background:rgba(255,255,255,.3);transform:translateY(-1px)}
.chat-body{height:500px;background:#fafafa}
.chat-messages{padding:1.5rem;height:calc(100% - 60px);overflow-y:auto}
.message{display:flex;gap:1rem;margin-bottom:1.5rem}
.message.user{flex-direction:row-reverse}
.msg-avatar{width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1rem;color:#fff;flex-shrink:0}
.message.user .msg-avatar{background:linear-gradient(135deg,var(--g1),var(--teal))}
.message.ai .msg-avatar{background:linear-gradient(135deg,var(--g1),var(--g2))}
.msg-content{max-width:70%}
.msg-text{padding:1rem 1.5rem;border-radius:18px;font-size:.9rem;line-height:1.6;margin-bottom:.5rem}
.message.user .msg-text{background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;border-radius:18px 18px 4px 18px}
.message.ai .msg-text{background:#fff;color:var(--dark);border:1px solid rgba(44,95,45,.08);border-radius:18px 18px 18px 4px}
.msg-time{font-size:.75rem;color:#6b7280}
.chat-input-container{padding:1.5rem 2rem;background:#fff;border-top:1px solid rgba(44,95,45,.08)}
.chat-input-wrapper{display:flex;gap:1rem}
.chat-input{flex:1;padding:1rem 1.5rem;border:1px solid rgba(44,95,45,.12);border-radius:12px;font-size:.9rem;transition:all .3s}
.chat-input:focus{outline:none;border-color:var(--g1);box-shadow:0 0 0 4px rgba(44,95,45,.1)}
.chat-send{padding:1rem 2rem;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;border:none;border-radius:12px;font-weight:700;cursor:pointer;transition:all .3s}
.chat-send:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(44,95,45,.25)}

/* ════ FEATURES ═════════════════════════ */
.features-sec{background:var(--cream);padding:5rem 0 4rem}
.features-container{max-width:1200px;margin:0 auto}
.features-header{text-align:center;margin-bottom:3rem}
.features-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem}
.feature-card{background:#fff;border-radius:20px;border:1px solid rgba(44,95,45,.08);padding:2.5rem;text-align:center;transition:all .4s cubic-bezier(.4,0,.2,1);box-shadow:0 12px 40px rgba(44,95,45,.08)}
.feature-card:hover{transform:translateY(-8px);box-shadow:0 24px 80px rgba(44,95,45,.15);border-color:rgba(44,95,45,.15)}
.feature-icon{width:60px;height:60px;border-radius:16px;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;font-size:1.5rem;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;box-shadow:0 8px 24px rgba(44,95,45,.2)}
.feature-title{font-size:1.3rem;font-weight:900;color:var(--dark);margin-bottom:1rem;line-height:1.2}
.feature-desc{font-size:.95rem;color:#6b7280;line-height:1.7}

/* ════ STATS ══════════════════════════════ */
.stats-sec{background:var(--dark);padding:4rem 0 5rem;position:relative;overflow:hidden}
.stats-bg{position:absolute;inset:0;background:radial-gradient(circle,rgba(44,95,45,.1) 0%,transparent 70%)}
.stats-container{max-width:800px;margin:0 auto;position:relative;z-index:2}
.stats-header{text-align:center;margin-bottom:3rem}
.stats-title{font-size:2.5rem;font-weight:900;color:#fff;margin-bottom:1rem}
.stats-subtitle{font-size:1.1rem;color:rgba(255,255,255,.7)}
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:2rem}
.stat-item{text-align:center}
.stat-number{font-size:3rem;font-weight:900;color:var(--gold);margin-bottom:.5rem}
.stat-label{font-size:1rem;color:rgba(255,255,255,.8);font-weight:600}

/* ════ FAQ ════════════════════════════════ */
.faq-sec{background:var(--cream);padding:5rem 0 6rem}
.faq-container{max-width:800px;margin:0 auto}
.faq-header{text-align:center;margin-bottom:3rem}
.faq-grid{display:grid;grid-template-columns:1fr;gap:1.3rem}
.faq-item{background:#fff;border-radius:20px;border:1px solid rgba(44,95,45,.08);padding:2rem;transition:all .35s cubic-bezier(.4,0,.2,1);box-shadow:0 8px 24px rgba(44,95,45,.06)}
.faq-item:hover{transform:translateY(-5px);box-shadow:0 16px 48px rgba(44,95,45,.12);border-color:rgba(44,95,45,.15)}
.faq-icon{width:48px;height:48px;border-radius:12px;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;font-size:1.2rem;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;box-shadow:0 6px 20px rgba(44,95,45,.15)}
.faq-question{font-size:1.1rem;font-weight:900;color:var(--dark);margin-bottom:.8rem;line-height:1.3}
.faq-answer{font-size:.95rem;color:#6b7280;line-height:1.8;font-weight:500}

/* ════ SCROLL REVEAL ═════════════════════ */
[data-reveal]{opacity:0;transition:opacity .8s cubic-bezier(.4,0,.2,1),transform .8s cubic-bezier(.4,0,.2,1)}
[data-reveal].revealed{opacity:1;transform:none}
[data-reveal-delay="1"]{transition-delay:.1s}[data-reveal-delay="2"]{transition-delay:.2s}
[data-reveal-delay="3"]{transition-delay:.3s}[data-reveal-delay="4"]{transition-delay:.4s}
[data-reveal-delay="5"]{transition-delay:.5s}

/* ════ RESPONSIVE ════════════════════════ */
@media(max-width:768px){
  .ai-hero{min-height:60vh}
  .chat-sec,.features-sec,.stats-sec,.faq-sec{padding:4rem 0 3rem}
  .chat-body{height:400px}
  .chat-messages{padding:1.5rem}
  .chat-input-container{padding:1rem 1.5rem}
  .chat-input-wrapper{flex-direction:column}
  .chat-input{width:100%;margin-bottom:1rem}
  .chat-send{width:100%;justify-content:center}
  .features-grid{grid-template-columns:1fr;gap:1.5rem}
  .feature-card{padding:2rem 1.5rem}
  .feature-icon{width:50px;height:50px;font-size:1.2rem}
  .stats-grid{grid-template-columns:1fr;gap:1.5rem}
  .stat-number{font-size:2.5rem}
  .faq-item{padding:1.5rem}
  .faq-icon{width:40px;height:40px;font-size:1rem}
}
@media(max-width:576px){
  .chat-sec,.features-sec,.stats-sec,.faq-sec{padding:3rem 0 2.5rem}
  .chat-header-bar{padding:1rem 1.5rem}
  .chat-avatar{width:40px;height:40px;font-size:1.1rem}
  .chat-name{font-size:1rem}
  .chat-status{font-size:.75rem}
  .chat-actions{gap:.25rem}
  .chat-btn{padding:.4rem .8rem;font-size:.75rem}
  .chat-body{height:350px}
  .chat-messages{padding:1rem;gap:1rem}
  .message{max-width:85%}
  .msg-avatar{width:32px;height:32px;font-size:.8rem}
  .msg-content{padding:.8rem 1rem}
  .msg-text{font-size:.85rem}
  .chat-input-container{padding:1rem}
  .chat-input{padding:.8rem 1rem;font-size:.9rem}
  .chat-send{padding:.8rem 1.5rem;font-size:.9rem}
  .feature-card{padding:1.5rem 1rem}
  .feature-icon{width:45px;height:45px;font-size:1.1rem}
  .feature-title{font-size:1.1rem}
  .feature-desc{font-size:.85rem}
  .stat-number{font-size:2rem}
  .stat-label{font-size:.9rem}
  .faq-item{padding:1.2rem}
  .faq-icon{width:36px;height:36px;font-size:.9rem}
  .faq-question{font-size:1rem}
  .faq-answer{font-size:.85rem}
}
</style>
@endpush

@section('content')
<div class="ai-page">

<!-- ════════════════════════════════════════════
     AI ASSISTANT HERO
════════════════════════════════════════════ -->
<section class="ai-hero">
  <div class="ai-hero-bg"></div>
  <div class="ai-hero-grid"></div>
  <div class="ai-shape"></div><div class="ai-shape"></div><div class="ai-shape"></div>
  <div class="ai-orb ai-orb-1"></div>
  <div class="ai-orb ai-orb-2"></div>
  <div class="ai-orb ai-orb-3"></div>

  <div class="container position-relative" style="z-index:2;padding:5rem 1.5rem 4.5rem">
    <div style="max-width:800px;margin:0 auto;text-align:center">
      <div class="ai-tag" style="margin-bottom:1.2rem">
        <span style="display:inline-flex;align-items:center;gap:.55rem;padding:.42rem 1.2rem;background:rgba(44,95,45,.1);border:1px solid rgba(44,95,45,.2);border-radius:50px;backdrop-filter:blur(8px)">
          <span class="ai-dot"></span>
          <span style="color:rgba(44,95,45,.9);font-size:.8rem;font-weight:700">المساعد الذكي المدعوم بالذكاء الاصطناعي</span>
        </span>
      </div>
      <div class="ai-h1">
        <h1 style="font-size:clamp(2.5rem,6vw,4.8rem);font-weight:900;line-height:1.06;color:#fff;margin:0 0 1.1rem">
          المساعد <span class="ai-shine">الذكي</span>
        </h1>
      </div>
      <p class="ai-p" style="font-size:1.1rem;color:rgba(255,255,255,.8);line-height:1.9;max-width:600px;margin:0 auto 2.5rem">
        تجربة استثنائية للإجابة على جميع استفساراتك حول التوعية والخدمات المتاحة بدقة 98%
      </p>
      <div class="ai-chips" style="display:flex;flex-wrap:wrap;gap:.7rem;justify-content:center">
        <div class="chip">
          <div class="chip-icon" style="background:linear-gradient(135deg,var(--g1),var(--teal))"><i class="bi bi-clock-fill"></i></div>
          <div><div class="chip-number">24/7</div><div class="chip-label">خدمة متاحة</div></div>
        </div>
        <div class="chip">
          <div class="chip-icon" style="background:linear-gradient(135deg,var(--teal),var(--g2))"><i class="bi bi-graph-up"></i></div>
          <div><div class="chip-number">98%</div><div class="chip-label">دقة الإجابات</div></div>
        </div>
        <div class="chip">
          <div class="chip-icon" style="background:linear-gradient(135deg,var(--g2),var(--g1))"><i class="bi bi-people-fill"></i></div>
          <div><div class="chip-number">50K+</div><div class="chip-label">مستخدم نشط</div></div>
        </div>
      </div>
    </div>
  </div>
  <div class="hero-wave">
    <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block">
      <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,42 1440,38 L1440,70 L0,70 Z" fill="#F0EFEC"/>
    </svg>
  </div>
</section>

<!-- ════════════════════════════════════════════
     CHAT SECTION
════════════════════════════════════════════ -->
<section class="chat-sec">
  <div class="chat-container">
    <div class="chat-header" data-reveal>
      <div class="section-badge"><i class="bi bi-chat-dots"></i> محادثة ذكية</div>
      <h2 class="section-title mb-3">ابدأ <span class="accent">المحادثة</span> الآن</h2>
      <p class="section-subtitle">احصل على إجابات دقيقة ومفصلة من مساعدنا الذكي</p>
    </div>
    
    <div class="chat-box" data-reveal data-reveal-delay="1">
      <div class="chat-header-bar">
        <div class="chat-avatar">
          <i class="bi bi-robot"></i>
        </div>
        <div class="chat-info">
          <h3 class="chat-name">المساعد الذكي</h3>
          <div class="chat-status">
            <span class="status-dot"></span>
            <span>متواجد للرد على استفساراتك • دقة 98%</span>
          </div>
        </div>
        <div class="chat-actions">
          <button class="chat-btn" onclick="clearChat()">
            <i class="bi bi-arrow-clockwise"></i> مسح
          </button>
          <button class="chat-btn" onclick="exportChat()">
            <i class="bi bi-download"></i> تصدير
          </button>
        </div>
      </div>
      
      <div class="chat-body">
        <div class="chat-messages" id="chatMessages">
          <div class="message ai">
            <div class="msg-avatar">
              <i class="bi bi-robot"></i>
            </div>
            <div class="msg-content">
              <div class="msg-text">مرحباً! أنا المساعد الذكي الخاص بمنصة وعي. كيف يمكنني مساعدتك اليوم؟</div>
              <div class="msg-time">الآن</div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="chat-input-container">
        <div class="chat-input-wrapper">
          <input type="text" class="chat-input" id="chatInput" placeholder="اكتب سؤالك هنا..." onkeypress="handleKeyPress(event)">
          <button class="chat-send" onclick="sendMessage()">
            <i class="bi bi-send-fill"></i> إرسال
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ════ FEATURES ═══════════════════════════ --}}
<section class="features-sec">
  <div class="features-container">
    <div class="features-header" data-reveal>
      <div class="section-badge"><i class="bi bi-stars"></i> المميزات</div>
      <h2 class="section-title mb-3">لماذا <span class="accent">المساعد الذكي</span>؟</h2>
      <p class="section-subtitle">مميزات متقدمة تجعل تجربتك فريدة</p>
    </div>
    
    <div class="features-grid">
      <div class="feature-card" data-reveal data-reveal-delay="1">
        <div class="feature-icon">
          <i class="bi bi-lightning-fill"></i>
        </div>
        <h3 class="feature-title">استجابات فورية</h3>
        <p class="feature-desc">احصل على إجابات دقيقة في أقل من ثانية باستخدام تقنيات الذكاء الاصطناعي المتقدمة</p>
      </div>
      
      <div class="feature-card" data-reveal data-reveal-delay="2">
        <div class="feature-icon">
          <i class="bi bi-shield-check"></i>
        </div>
        <h3 class="feature-title">خصوصية تامة</h3>
        <p class="feature-desc">جميع المحادثات مشفرة بالكامل ولا تتم مشاركتها مع أي طرف ثالث</p>
      </div>
      
      <div class="feature-card" data-reveal data-reveal-delay="3">
        <div class="feature-icon">
          <i class="bi bi-globe"></i>
        </div>
        <h3 class="feature-title">دعم متعدد اللغات</h3>
        <p class="feature-desc">يدعم العربية والعديد من اللغات الأخرى بدقة وفعالية</p>
      </div>
      
      <div class="feature-card" data-reveal data-reveal-delay="4">
        <div class="feature-icon">
          <i class="bi bi-clock-history"></i>
        </div>
        <h3 class="feature-title">خدمة على مدار الساعة</h3>
        <p class="feature-desc">متاح 24/7 للإجابة على جميع استفساراتك في أي وقت</p>
      </div>
    </div>
  </div>
</section>

{{-- ════ STATS ══════════════════════════════ --}}
<section class="stats-sec">
  <div class="stats-bg"></div>
  <div class="container">
    <div class="stats-container" data-sr="up">
      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-n">50K+</div>
          <div class="stat-l">مستخدم نشط</div>
        </div>
        <div class="stat-item">
          <div class="stat-n">98%</div>
          <div class="stat-l">دقة الإجابات</div>
        </div>
        <div class="stat-item">
          <div class="stat-n">24/7</div>
          <div class="stat-l">خدمة متاحة</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ════════════════════════════════════════════
     FAQ SECTION
════════════════════════════════════════════ --}}
<section class="faq-sec">
  <div class="faq-container">
    <div class="faq-header" data-reveal>
      <div class="section-badge"><i class="bi bi-question-circle"></i> أسئلة شائعة</div>
      <h2 class="section-title mb-3">كل ما <span class="accent">تحتاج معرفته</span></h2>
      <p class="section-subtitle">إجابات على الأسئلة الأكثر شيوعاً</p>
    </div>
    
    <div class="faq-grid">
      <div class="faq-item" data-reveal data-reveal-delay="1">
        <div class="faq-icon">
          <i class="bi bi-question-lg"></i>
        </div>
        <h3 class="faq-question">ما هو المساعد الذكي؟</h3>
        <p class="faq-answer">المساعد الذكي هو نظام ذكاء اصطناعي متقدم مصمم للإجابة على استفساراتك حول الخدمات والتوعية بشكل دقيق وسريع.</p>
      </div>
      
      <div class="faq-item" data-reveal data-reveal-delay="2">
        <div class="faq-icon">
          <i class="bi bi-shield-lock"></i>
        </div>
        <h3 class="faq-question">هل محادثاتي آمنة؟</h3>
        <p class="faq-answer">نعم، جميع المحادثات مشفرة بالكامل ولا تتم مشاركتها مع أي طرف ثالث. نحن نلتزم بأعلى معايير الخصوصية والأمان.</p>
      </div>
      
      <div class="faq-item" data-reveal data-reveal-delay="3">
        <div class="faq-icon">
          <i class="bi bi-clock-history"></i>
        </div>
        <h3 class="faq-question">كم يستغرق الرد؟</h3>
        <p class="faq-answer">يستغرق الرد عادة أقل من ثانية واحدة بفضل تقنيات المعالجة المتقدمة والبنية التحتية القوية التي نستخدمها.</p>
      </div>
      
      <div class="faq-item" data-reveal data-reveal-delay="4">
        <div class="faq-icon">
          <i class="bi bi-globe2"></i>
        </div>
        <h3 class="faq-question">هل يدعم لغات أخرى؟</h3>
        <p class="faq-answer">نعم، المساعد الذكي يدعم عدة لغات بما فيها العربية، ويعمل على تحسين دعم اللغات باستمرار.</p>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
// Scroll Reveal - Same as home page
const srIO = new IntersectionObserver(es => {
  es.forEach(e => { if(e.isIntersecting){ e.target.classList.add('revealed'); srIO.unobserve(e.target); }});
}, { threshold: 0.07 });
document.querySelectorAll('[data-reveal]').forEach(el => srIO.observe(el));

// Chat functionality
let chatHistory = [];

function sendMessage() {
  const input = document.getElementById('chatInput');
  const message = input.value.trim();
  
  if (!message) return;
  
  // Add user message
  addMessage(message, 'user');
  input.value = '';
  
  // Show typing indicator
  showTypingIndicator();
  
  // Simulate AI response
  setTimeout(() => {
    hideTypingIndicator();
    const responses = [
      'أنا هنا لمساعدتك! هل يمكنك توضيح سؤالك أكثر؟',
      'هذا سؤال ممتاز! دعني أبحث لك عن المعلومات...',
      'بناءً على ما فهمت، يمكنني مساعدتك في...',
      'شكراً لاستخدامك المساعد الذكي. سأقدم لك أفضل إجابة ممكنة.',
      'هذه معلومات مهمة جداً. هل لديك أسئلة أخرى؟'
    ];
    const response = responses[Math.floor(Math.random() * responses.length)];
    addMessage(response, 'ai');
  }, 1000);
}

function addMessage(text, type) {
  const messagesContainer = document.getElementById('chatMessages');
  const messageDiv = document.createElement('div');
  messageDiv.className = `message ${type}`;
  
  const time = new Date().toLocaleTimeString('ar-SA', { hour: '2-digit', minute: '2-digit' });
  
  messageDiv.innerHTML = `
    <div class="msg-avatar">
      <i class="bi bi-${type === 'user' ? 'person-fill' : 'robot'}"></i>
    </div>
    <div class="msg-content">
      <div class="msg-text">${text}</div>
      <div class="msg-time">${time}</div>
    </div>
  `;
  
  messagesContainer.appendChild(messageDiv);
  messagesContainer.scrollTop = messagesContainer.scrollHeight;
  
  chatHistory.push({ text, type, time });
}

function showTypingIndicator() {
  const messagesContainer = document.getElementById('chatMessages');
  const typingDiv = document.createElement('div');
  typingDiv.className = 'message ai typing-indicator';
  typingDiv.id = 'typingIndicator';
  
  typingDiv.innerHTML = `
    <div class="msg-avatar">
      <i class="bi bi-robot"></i>
    </div>
    <div class="msg-content">
      <div class="msg-text">
        <span class="typing-dot"></span>
        <span class="typing-dot"></span>
        <span class="typing-dot"></span>
      </div>
    </div>
  `;
  
  messagesContainer.appendChild(typingDiv);
  messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function hideTypingIndicator() {
  const typingIndicator = document.getElementById('typingIndicator');
  if (typingIndicator) {
    typingIndicator.remove();
  }
}

function handleKeyPress(event) {
  if (event.key === 'Enter') {
    sendMessage();
  }
}

function clearChat() {
  const messagesContainer = document.getElementById('chatMessages');
  messagesContainer.innerHTML = `
    <div class="message ai">
      <div class="msg-avatar">
        <i class="bi bi-robot"></i>
      </div>
      <div class="msg-content">
        <div class="msg-text">مرحباً! أنا المساعد الذكي الخاص بمنصة وعي. كيف يمكنني مساعدتك اليوم؟</div>
        <div class="msg-time">الآن</div>
      </div>
    </div>
  `;
  chatHistory = [];
}

function exportChat() {
  const chatText = chatHistory.map(msg => `[${msg.time}] ${msg.type === 'user' ? 'أنت' : 'المساعد'}: ${msg.text}`).join('\n');
  const blob = new Blob([chatText], { type: 'text/plain' });
  const url = window.URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'chat-export.txt';
  a.click();
  window.URL.revokeObjectURL(url);
}

// Add typing indicator styles
const style = document.createElement('style');
style.textContent = `
  .typing-indicator .msg-text {
    display: flex;
    gap: 4px;
    padding: 1rem 1.5rem;
  }
  .typing-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--g1);
    animation: typingBounce 1.4s infinite ease-in-out;
  }
  .typing-dot:nth-child(2) {
    animation-delay: 0.2s;
  }
  .typing-dot:nth-child(3) {
    animation-delay: 0.4s;
  }
  @keyframes typingBounce {
    0%, 60%, 100% {
      transform: translateY(0);
      opacity: 0.7;
    }
    30% {
      transform: translateY(-10px);
      opacity: 1;
    }
  }
`;
document.head.appendChild(style);
</script>
@endpush
