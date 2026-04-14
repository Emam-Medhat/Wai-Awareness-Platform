<?php $__env->startSection('title', 'رسائل المستقبل'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ════════════════════════════════════════════
   WA3Y FUTURE MESSAGE PAGE — SITE CONSISTENT DESIGN
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
.future-message-page{font-family:'Tajawal',sans-serif}

/* ════ HERO ════════════════════════════════ */
.future-hero{
  min-height:60vh;background:var(--dark);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.future-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 60% at 20% 20%, rgba(44,95,45,.55) 0%, transparent 60%),
    radial-gradient(ellipse 60% 80% at 80% 80%, rgba(58,125,110,.4) 0%, transparent 55%),
    radial-gradient(ellipse 50% 50% at 50% 50%, rgba(196,168,130,.08) 0%, transparent 70%),
    linear-gradient(170deg, #0d1f13 0%, #1a2e20 50%, #0a1a10 100%);
}
.future-hero-grid{
  position:absolute;inset:0;
  background-image:radial-gradient(circle, rgba(196,168,130,.18) 1px, transparent 1px);
  background-size:40px 40px;animation:dotsDrift 20s linear infinite;
}
@keyframes dotsDrift{0%{transform:translateY(0)}100%{transform:translateY(40px)}}
.future-orb{position:absolute;border-radius:50%;filter:blur(100px);pointer-events:none}
.future-orb-1{width:600px;height:600px;background:radial-gradient(circle, rgba(44,95,45,.35) 0%, transparent 70%);top:-100px;right:-100px;animation:glowPulse 8s ease-in-out infinite}
.future-orb-2{width:500px;height:500px;background:radial-gradient(circle, rgba(58,125,110,.25) 0%, transparent 70%);bottom:-80px;left:-80px;animation:glowPulse 10s ease-in-out infinite reverse}
.future-orb-3{width:300px;height:300px;background:radial-gradient(circle, rgba(196,168,130,.15) 0%, transparent 70%);top:50%;left:45%;animation:glowPulse 6s ease-in-out infinite;animation-delay:3s}
@keyframes glowPulse{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.2);opacity:.6}}
.future-shape{position:absolute;border-radius:50%;background:linear-gradient(135deg,rgba(196,168,130,.1),rgba(44,95,45,.05));border:1px solid rgba(196,168,130,.08);animation:floatShape 20s infinite ease-in-out}
.future-shape:nth-child(3){width:80px;height:80px;top:15%;right:12%;animation-delay:0s}
.future-shape:nth-child(4){width:55px;height:55px;top:70%;right:28%;animation-delay:5s}
.future-shape:nth-child(5){width:95px;height:95px;top:35%;left:8%;animation-delay:10s}
@keyframes floatShape{0%,100%{transform:translateY(0) translateX(0) rotate(0deg)}25%{transform:translateY(-30px) translateX(20px) rotate(90deg)}50%{transform:translateY(-15px) translateX(-15px) rotate(180deg)}75%{transform:translateY(-25px) translateX(10px) rotate(270deg)}}

/* Site consistent animations */
@keyframes fadeSlideDown{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
@keyframes blink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 6px rgba(74,222,128,0)}}
@keyframes shimmerText{0%{background-position:200% center}100%{background-position:-200% center}}
.future-tag{animation:fadeSlideDown .8s .1s ease both}
.future-h1{animation:fadeSlideDown .9s .22s ease both}
.future-p{animation:fadeSlideDown .8s .38s ease both}
.future-chips{animation:fadeSlideDown .8s .52s ease both}
.future-dot{width:8px;height:8px;border-radius:50%;background:#4ade80;animation:blink 1.5s ease-in-out infinite}
.future-shine{background:linear-gradient(135deg,var(--gold) 0%,#fff 50%,var(--gold) 100%);background-size:200% auto;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;animation:shimmerText 4s linear infinite;filter:drop-shadow(0 2px 8px rgba(196,168,130,.3))}

/* ════ MESSAGES SECTION ═════════════════════════ */
.messages-sec{background:var(--cream);padding:5rem 0 4rem}
.messages-container{max-width:1200px;margin:0 auto}
.messages-header{text-align:center;margin-bottom:3rem}
.messages-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:2rem}
.message-card{
  background:#fff;border-radius:20px;border:1px solid rgba(44,95,45,.08);
  padding:2rem;position:relative;overflow:hidden;
  transition:all .4s cubic-bezier(.4,0,.2,1);
  box-shadow:0 12px 40px rgba(44,95,45,.08);
}
.message-card:hover{transform:translateY(-8px);box-shadow:0 24px 80px rgba(44,95,45,.15);border-color:rgba(44,95,45,.15)}
.message-card::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--g1),var(--teal),var(--g2));transform:scaleX(0);transform-origin:left;transition:transform .4s cubic-bezier(.4,0,.2,1)}
.message-card:hover::before{transform:scaleX(1)}
.message-date{display:flex;align-items:center;gap:.5rem;color:var(--teal);font-weight:700;font-size:.9rem;margin-bottom:1rem}
.message-date i{font-size:1.1rem}
.message-content{font-size:1rem;color:var(--dark);line-height:1.7;margin-bottom:1.5rem}
.message-status{padding:.6rem 1.2rem;border-radius:8px;font-weight:700;text-align-center;font-size:.9rem}
.message-status.pending{background:rgba(44,95,45,.1);color:var(--g1);border:1px solid rgba(44,95,45,.2)}
.message-status.sent{background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff}
.message-actions{display:flex;gap:.5rem;margin-top:1.5rem}
.message-btn{padding:.5rem 1rem;border:1px solid rgba(44,95,45,.2);border-radius:8px;color:var(--g1);font-size:.8rem;font-weight:600;cursor:pointer;transition:all .3s;background:rgba(255,255,255,.8)}
.message-btn:hover{background:var(--g1);color:#fff;transform:translateY(-2px)}
.message-btn.delete:hover{background:#dc2626;border-color:#dc2626}

/* ════ FORM SECTION ═════════════════════════ */
.form-sec{background:var(--dark);padding:5rem 0 4rem;position:relative;overflow:hidden}
.form-bg{position:absolute;inset:0;background:radial-gradient(circle,rgba(44,95,45,.1) 0%,transparent 70%)}
.form-container{max-width:600px;margin:0 auto;position:relative;z-index:2}
.form-header{text-align:center;margin-bottom:3rem}
.form-title{font-size:2.5rem;font-weight:900;color:#fff;margin-bottom:1rem}
.form-subtitle{font-size:1.1rem;color:rgba(255,255,255,.8)}
.form-card{background:rgba(255,255,255,.1);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,.2);border-radius:24px;padding:3rem}
.form-group{margin-bottom:2rem}
.form-label{display:block;color:rgba(255,255,255,.9);font-weight:700;margin-bottom:.8rem}
.form-input{width:100%;padding:1rem 1.5rem;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:12px;color:#fff;font-size:1rem;transition:all .3s}
.form-input::placeholder{color:rgba(255,255,255,.5)}
.form-input:focus{outline:none;border-color:var(--gold);box-shadow:0 0 0 4px rgba(196,168,130,.2);background:rgba(255,255,255,.15)}
.form-textarea{min-height:120px;resize:vertical}
.form-btn{width:100%;padding:1rem 2rem;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;border:none;border-radius:12px;font-weight:700;font-size:1rem;cursor:pointer;transition:all .3s}
.form-btn:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(44,95,45,.25)}

/* ════ SCROLL REVEAL ═════════════════════ */
[data-reveal]{opacity:0;transition:opacity .8s cubic-bezier(.4,0,.2,1),transform .8s cubic-bezier(.4,0,.2,1)}
[data-reveal].revealed{opacity:1;transform:none}
[data-reveal-delay="1"]{transition-delay:.1s}[data-reveal-delay="2"]{transition-delay:.2s}
[data-reveal-delay="3"]{transition-delay:.3s}[data-reveal-delay="4"]{transition-delay:.4s}

/* ════ RESPONSIVE ════════════════════════ */
@media(max-width:768px){
  .future-hero{min-height:50vh}
  .messages-sec,.form-sec{padding:4rem 0 3rem}
  .messages-container{max-width:700px}
  .messages-grid{grid-template-columns:1fr;gap:1.5rem}
  .message-card{padding:1.5rem}
  .form-container{max-width:500px}
  .form-card{padding:2rem}
  .form-title{font-size:2.2rem}
}
@media(max-width:576px){
  .messages-sec,.form-sec{padding:3rem 0 2.5rem}
  .messages-container{max-width:500px}
  .message-card{padding:1.2rem}
  .form-container{max-width:400px}
  .form-card{padding:1.5rem}
  .form-title{font-size:2rem}
  .form-input{padding:.8rem 1.2rem;font-size:.9rem}
  .form-btn{padding:.8rem 1.5rem;font-size:.9rem}
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="future-message-page">

<!-- ════════════════════════════════════════════
     FUTURE MESSAGE HERO
════════════════════════════════════════════ -->
<section class="future-hero">
  <div class="future-hero-bg"></div>
  <div class="future-hero-grid"></div>
  <div class="future-shape"></div><div class="future-shape"></div><div class="future-shape"></div>
  <div class="future-orb future-orb-1"></div>
  <div class="future-orb future-orb-2"></div>
  <div class="future-orb future-orb-3"></div>

  <div class="container position-relative" style="z-index:2;padding:5rem 1.5rem 4.5rem">
    <div style="max-width:800px;margin:0 auto;text-align:center">
      <div class="future-tag" style="margin-bottom:1.2rem">
        <span style="display:inline-flex;align-items:center;gap:.55rem;padding:.42rem 1.2rem;background:rgba(44,95,45,.1);border:1px solid rgba(44,95,45,.2);border-radius:50px;backdrop-filter:blur(8px)">
          <span class="future-dot"></span>
          <span style="color:rgba(44,95,45,.9);font-size:.8rem;font-weight:700">رسائل المستقبل</span>
        </span>
      </div>
      <div class="future-h1">
        <h1 style="font-size:clamp(2.5rem,6vw,4.8rem);font-weight:900;line-height:1.06;color:#fff;margin:0 0 1.1rem">
          رسائل <span class="future-shine">المستقبل</span>
        </h1>
      </div>
      <p class="future-p" style="font-size:1.1rem;color:rgba(255,255,255,.8);line-height:1.9;max-width:600px;margin:0 auto 2.5rem">
        جدد رسائل لنفسك في المستقبل واحصل على تذكيرات في الوقت المناسب
      </p>
    </div>
  </div>
  <div class="hero-wave">
    <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block">
      <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,42 1440,38 L1440,70 L0,70 Z" fill="#F0EFEC"/>
    </svg>
  </div>
</section>

<!-- ════════════════════════════════════════════
     MESSAGES SECTION
════════════════════════════════════════════ -->
<section class="messages-sec">
  <div class="messages-container">
    <div class="messages-header" data-reveal>
      <div class="section-badge"><i class="bi bi-envelope"></i> رسائلك</div>
      <h2 class="section-title mb-3">رسائل <span class="accent">المستقبل</span></h2>
      <p class="section-subtitle">جميع رسائلك المجدولة للإرسال المستقبلي</p>
    </div>

    <?php if($messages->count() > 0): ?>
    <div class="messages-grid">
      <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="message-card" data-reveal data-reveal-delay="<?php echo e($loop->index + 1); ?>">
        <div class="message-date">
          <i class="bi bi-calendar-event"></i>
          <span><?php echo e($message->remind_at->format('Y-m-d H:i')); ?></span>
        </div>
        <div class="message-content"><?php echo e($message->content); ?></div>
        <div class="message-status <?php echo e($message->is_sent ? 'sent' : 'pending'); ?>">
          <?php if($message->is_sent): ?>
            <i class="bi bi-check-circle me-2"></i> تم الإرسال
          <?php else: ?>
            <i class="bi bi-clock me-2"></i> في الانتظار
          <?php endif; ?>
        </div>
        <?php if(!$message->is_sent): ?>
        <div class="message-actions">
          <form action="<?php echo e(route('future-message.destroy', $message)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="message-btn delete">
              <i class="bi bi-trash me-1"></i> حذف
            </button>
          </form>
        </div>
        <?php endif; ?>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5" data-reveal data-reveal-delay="10">
      <?php echo e($messages->links()); ?>

    </div>
    <?php else: ?>
    <div class="text-center py-5" data-reveal>
      <div style="width:80px;height:80px;background:linear-gradient(135deg,var(--g1),var(--teal));border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 2rem">
        <i class="bi bi-envelope" style="font-size:2rem;color:#fff"></i>
      </div>
      <h3 style="color:var(--dark);font-size:1.5rem;font-weight:900;margin-bottom:1rem">لا توجد رسائل بعد</h3>
      <p style="color:#6b7280;font-size:1rem">ابدأ بإنشاء رسالتك الأولى للمستقبل</p>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ════════════════════════════════════════════
     FORM SECTION
════════════════════════════════════════════ -->
<section class="form-sec">
  <div class="form-bg"></div>
  <div class="form-container">
    <div class="form-header" data-reveal>
      <h2 class="form-title">إنشاء رسالة جديدة</h2>
      <p class="form-subtitle">جدد رسالة لنفسك في المستقبل</p>
    </div>

    <?php if(session('success')): ?>
    <div class="alert alert-success" style="background:linear-gradient(135deg,rgba(44,95,45,.1),rgba(44,95,45,.05));color:var(--g1);border:1px solid rgba(44,95,45,.2);border-radius:12px;padding:1rem;margin-bottom:2rem" data-reveal>
      <i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="alert alert-danger" style="background:linear-gradient(135deg,rgba(239,68,68,.1),rgba(239,68,68,.05));color:#dc2626;border:1px solid rgba(239,68,68,.2);border-radius:12px;padding:1rem;margin-bottom:2rem" data-reveal>
      <i class="bi bi-exclamation-triangle me-2"></i><?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>

    <div class="form-card" data-reveal data-reveal-delay="1">
      <form action="<?php echo e(route('future-message.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
          <label class="form-label" for="content">محتوى الرسالة</label>
          <textarea name="content" id="content" class="form-input form-textarea" placeholder="اكتب رسالتك هنا..." required><?php echo e(old('content')); ?></textarea>
          <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div style="color:#ef4444;font-size:.875rem;margin-top:.5rem">
            <i class="bi bi-exclamation-circle me-1"></i><?php echo e($message); ?>

          </div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
          <label class="form-label" for="remind_at">تاريخ التذكير</label>
          <input type="datetime-local" name="remind_at" id="remind_at" class="form-input" required value="<?php echo e(old('remind_at')); ?>">
          <?php $__errorArgs = ['remind_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div style="color:#ef4444;font-size:.875rem;margin-top:.5rem">
            <i class="bi bi-exclamation-circle me-1"></i><?php echo e($message); ?>

          </div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="form-btn">
          <i class="bi bi-send me-2"></i> جدد الرسالة
        </button>
      </form>
    </div>
  </div>
</section>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
// Scroll Reveal - Same as other pages
const srIO = new IntersectionObserver(es => {
  es.forEach(e => { if(e.isIntersecting){ e.target.classList.add('revealed'); srIO.unobserve(e.target); }});
}, { threshold: 0.07 });
document.querySelectorAll('[data-reveal]').forEach(el => srIO.observe(el));

// Set minimum date for datetime input to tomorrow
document.addEventListener('DOMContentLoaded', function() {
  const remindAtInput = document.getElementById('remind_at');
  if (remindAtInput) {
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    const minDate = tomorrow.toISOString().slice(0, 16);
    remindAtInput.min = minDate;
  }
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\pages\future-message.blade.php ENDPATH**/ ?>