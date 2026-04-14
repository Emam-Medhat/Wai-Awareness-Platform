<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>فوتر وعي — معاينة</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Tajawal', sans-serif;
  background: #F0EFEC;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

.spacer {
  flex: 1;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem; color: #7a8e80; font-family: 'Tajawal', sans-serif;
}

/* ═══════════════════════════════════════════════════
   FOOTER
═══════════════════════════════════════════════════ */
.wa3y-footer {
  position: relative;
  background: #1a2e20;
  overflow: hidden;
  font-family: 'Tajawal', sans-serif;
}

/* ── Background texture ── */
.footer-bg {
  position: absolute; inset: 0; pointer-events: none;
}

/* Radial glow top-right */
.footer-bg::before {
  content: '';
  position: absolute;
  top: -120px; right: -100px;
  width: 500px; height: 500px;
  background: radial-gradient(circle, rgba(196,168,130,0.12) 0%, transparent 70%);
  border-radius: 50%;
}

/* Radial glow bottom-left */
.footer-bg::after {
  content: '';
  position: absolute;
  bottom: -80px; left: -80px;
  width: 400px; height: 400px;
  background: radial-gradient(circle, rgba(45,94,58,0.3) 0%, transparent 70%);
  border-radius: 50%;
}

/* Dot grid pattern */
.footer-dots {
  position: absolute; inset: 0;
  background-image: radial-gradient(circle, rgba(196,168,130,0.07) 1px, transparent 1px);
  background-size: 28px 28px;
}

/* ── Top gold shimmer line ── */
.footer-top-line {
  height: 3px;
  background: linear-gradient(90deg,
    transparent 0%,
    rgba(196,168,130,0.3) 10%,
    #C4A882 30%,
    #2D5E3A 50%,
    #C4A882 70%,
    rgba(196,168,130,0.3) 90%,
    transparent 100%);
  background-size: 200% 100%;
  animation: footerShimmer 5s linear infinite;
}

@keyframes footerShimmer {
  0%   { background-position: 200% 0; }
  100% { background-position: -200% 0; }
}

/* ── Newsletter strip ── */
.footer-newsletter {
  position: relative; z-index: 2;
  border-bottom: 1px solid rgba(196,168,130,0.12);
  padding: 1.4rem 0;
}

.newsletter-inner {
  max-width: 1200px; margin: 0 auto; padding: 0 2rem;
  display: flex; align-items: center; justify-content: space-between;
  gap: 2rem; flex-wrap: wrap;
}

.newsletter-text .label {
  display: inline-flex; align-items: center; gap: 0.5rem;
  background: rgba(196,168,130,0.15);
  border: 1px solid rgba(196,168,130,0.25);
  border-radius: 20px; padding: 0.3rem 0.9rem;
  font-size: 0.75rem; font-weight: 700;
  color: #C4A882; letter-spacing: 0.05em;
  margin-bottom: 0.7rem;
}

.newsletter-text h3 {
  font-size: 1.35rem; font-weight: 800; color: #fff;
  margin-bottom: 0.3rem;
}

.newsletter-text p {
  font-size: 0.85rem; color: rgba(255,255,255,0.55);
}

.newsletter-form {
  display: flex; gap: 0; flex-shrink: 0;
  border-radius: 12px; overflow: hidden;
  box-shadow: 0 4px 24px rgba(0,0,0,0.25);
  border: 1px solid rgba(196,168,130,0.2);
}

.newsletter-input {
  padding: 0.65rem 1.1rem; width: 250px;
  background: rgba(255,255,255,0.06);
  border: none; outline: none;
  color: #fff; font-family: 'Tajawal', sans-serif;
  font-size: 0.85rem;
  border-left: 1px solid rgba(196,168,130,0.2);
  border-radius: 12px;
}

.newsletter-input::placeholder { color: rgba(255,255,255,0.35); }

.newsletter-btn {
  padding: 0.65rem 1.1rem;
  background: linear-gradient(135deg, #2D5E3A, #3A7D6E);
  border: none; color: #fff; cursor: pointer;
  font-family: 'Tajawal', sans-serif;
  font-size: 0.88rem; font-weight: 800;
  display: flex; align-items: center; gap: 0.5rem;
  transition: all 0.25s ease;
  white-space: nowrap;
}

.newsletter-btn:hover { background: linear-gradient(135deg, #3d7a4e, #4a9080); }

/* ── Main grid ── */
.footer-main {
  position: relative; z-index: 2;
  max-width: 1200px; margin: 0 auto; padding: 2rem 2rem 1.2rem;
  display: grid;
  grid-template-columns: 1.6fr 1fr 1fr 1.2fr;
  gap: 2.5rem;
}

/* ── Brand column ── */
.brand-logo {
  display: flex; align-items: center; gap: 0.75rem;
  text-decoration: none; margin-bottom: 1.2rem;
}

.brand-logo-icon {
  width: 42px; height: 42px;
  filter: drop-shadow(0 4px 14px rgba(45,94,58,0.5));
}

.brand-logo-name {
  font-size: 1.6rem; font-weight: 900; color: #fff;
}

.brand-logo-sub {
  display: block; font-size: 0.65rem; font-weight: 400;
  color: rgba(196,168,130,0.8); letter-spacing: 0.07em; margin-top: 1px;
}

.brand-desc {
  font-size: 0.87rem; line-height: 1.9;
  color: rgba(255,255,255,0.5); margin-bottom: 1.2rem;
}

/* Stats row */
.brand-stats {
  display: grid; grid-template-columns: repeat(3,1fr);
  gap: 1px; background: rgba(196,168,130,0.1);
  border-radius: 12px; overflow: hidden; margin-bottom: 1.6rem;
}

.stat-cell {
  background: rgba(255,255,255,0.03);
  padding: 0.6rem 0.4rem; text-align: center;
  transition: background 0.2s;
}

.stat-cell:hover { background: rgba(255,255,255,0.07); }

.stat-num {
  display: block; font-size: 1.2rem; font-weight: 900;
  color: #C4A882; line-height: 1;
}

.stat-lbl {
  display: block; font-size: 0.67rem; color: rgba(255,255,255,0.4);
  margin-top: 3px;
}

/* Social icons */
.social-row { display: flex; gap: 0.55rem; }

.social-btn {
  width: 36px; height: 36px; border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.9rem; text-decoration: none; color: #fff;
  background: rgba(255,255,255,0.07);
  transition: all 0.25s ease;
}

.social-btn:hover {
  transform: translateY(-3px);
  border-color: rgba(196,168,130,0.4);
}

.social-btn.fb:hover  { background: #1877F2; border-color: #1877F2; }
.social-btn.tw:hover  { background: #000; border-color: #333; }
.social-btn.ig:hover  { background: linear-gradient(45deg,#833ab4,#fd1d1d,#fcb045); border-color: transparent; }
.social-btn.yt:hover  { background: #FF0000; border-color: #FF0000; }
.social-btn.snap:hover{ background: #FFFC00; color: #000; border-color: #FFFC00; }

/* ── Links columns ── */
.footer-col h4 {
  font-size: 1rem; font-weight: 800; color: #fff;
  margin-bottom: 1.3rem; display: flex; align-items: center; gap: 0.5rem;
}

.footer-col h4::after {
  content: '';
  flex: 1; height: 1px;
  background: linear-gradient(90deg, rgba(196,168,130,0.4), transparent);
}

.footer-links { list-style: none; display: flex; flex-direction: column; gap: 0.1rem; }

.footer-links a {
  display: flex; align-items: center; gap: 0.55rem;
  padding: 0.42rem 0; font-size: 0.87rem;
  color: rgba(255,255,255,0.48); text-decoration: none;
  transition: all 0.22s ease; border-radius: 6px;
}

.footer-links a .link-ico {
  width: 26px; height: 26px; border-radius: 7px;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.72rem;
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.07);
  color: rgba(196,168,130,0.7);
  flex-shrink: 0;
  transition: all 0.22s ease;
}

.footer-links a:hover {
  color: #C4A882;
  padding-right: 6px;
}

.footer-links a:hover .link-ico {
  background: rgba(196,168,130,0.15);
  border-color: rgba(196,168,130,0.3);
  color: #C4A882;
  transform: scale(1.1);
}

/* ── Contact column ── */
.contact-items { display: flex; flex-direction: column; gap: 0.85rem; }

.contact-item {
  display: flex; align-items: flex-start; gap: 0.85rem;
}

.contact-ico-wrap {
  width: 36px; height: 36px; border-radius: 10px; flex-shrink: 0;
  background: rgba(45,94,58,0.35);
  border: 1px solid rgba(45,94,58,0.5);
  display: flex; align-items: center; justify-content: center;
  font-size: 0.85rem; color: #6dbd82;
  transition: all 0.25s ease;
}

.contact-item:hover .contact-ico-wrap {
  background: rgba(45,94,58,0.6);
  transform: scale(1.08);
}

.contact-label { font-size: 0.7rem; color: rgba(255,255,255,0.35); margin-bottom: 2px; }
.contact-value { font-size: 0.88rem; font-weight: 600; color: rgba(255,255,255,0.8); direction: ltr; }

/* ── App badges ── */
.app-badges { margin-top: 1.5rem; }

.app-badges p { font-size: 0.75rem; color: rgba(255,255,255,0.35); margin-bottom: 0.6rem; }

.badge-row { display: flex; gap: 0.55rem; flex-wrap: wrap; }

.app-badge {
  display: flex; align-items: center; gap: 0.5rem;
  padding: 0.4rem 0.75rem;
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 9px; text-decoration: none; color: #fff;
  transition: all 0.25s ease;
}

.app-badge:hover {
  background: rgba(255,255,255,0.12);
  border-color: rgba(196,168,130,0.3);
  color: #fff;
}

.app-badge i { font-size: 1.3rem; }
.app-badge-txt small { display: block; font-size: 0.6rem; color: rgba(255,255,255,0.5); }
.app-badge-txt span  { display: block; font-size: 0.82rem; font-weight: 700; }

/* ── Bottom bar ── */
.footer-bottom {
  position: relative; z-index: 2;
  border-top: 1px solid rgba(196,168,130,0.1);
  padding: 0.8rem 2rem;
}

.footer-bottom-inner {
  max-width: 1200px; margin: 0 auto;
  display: flex; align-items: center; justify-content: space-between;
  flex-wrap: wrap; gap: 1rem;
}

.copyright {
  font-size: 0.82rem; color: rgba(255,255,255,0.3);
}

.copyright span { color: rgba(196,168,130,0.7); font-weight: 700; }

.bottom-links { display: flex; gap: 1.5rem; }

.bottom-links a {
  font-size: 0.8rem; color: rgba(255,255,255,0.3);
  text-decoration: none; transition: color 0.2s;
}

.bottom-links a:hover { color: #C4A882; }

.made-with {
  font-size: 0.78rem; color: rgba(255,255,255,0.2);
  display: flex; align-items: center; gap: 0.35rem;
}

.made-with i { color: #e74c3c; font-size: 0.75rem; animation: pulse 1.5s ease infinite; }

@keyframes pulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.25); }
}

/* ── Responsive ── */
@media (max-width: 1024px) {
  .footer-main { grid-template-columns: 1fr 1fr; gap: 2rem; }
}

@media (max-width: 640px) {
  .footer-main { grid-template-columns: 1fr; gap: 2rem; padding: 2rem 1.25rem; }
  .newsletter-form { width: 100%; }
  .newsletter-input { width: 100%; }
  .newsletter-inner { flex-direction: column; }
  .footer-bottom-inner { flex-direction: column; text-align: center; }
  .bottom-links { justify-content: center; }
}
</style>
</head>
<body>


<footer class="wa3y-footer">
  <div class="footer-top-line"></div>
  <div class="footer-bg"></div>
  <div class="footer-dots"></div>

  <!-- ── Newsletter ── -->
  <div class="footer-newsletter">
    <div class="newsletter-inner">
      <div class="newsletter-text">
        <div class="label"><i class="bi bi-bell-fill"></i> اشترك في نشرتنا</div>
        <h3>كن أول من يعلم بالمحتوى الجديد</h3>
        <p>مقالات ونصائح أسبوعية مباشرة إلى بريدك الإلكتروني</p>
      </div>
      <div class="newsletter-form">
        <input class="newsletter-input" type="email" placeholder="بريدك الإلكتروني...">
        <button class="newsletter-btn">
          <i class="bi bi-send-fill"></i>
          اشتراك
        </button>
      </div>
    </div>
  </div>

  <!-- ── Main Grid ── -->
  <div class="footer-main">

    <!-- Brand -->
    <div>
      <a href="#" class="brand-logo">
        <svg class="brand-logo-icon" viewBox="0 0 48 48" fill="none">
          <rect width="48" height="48" rx="14" fill="#2D5E3A"/>
          <rect x="1" y="1" width="46" height="46" rx="13" fill="url(#fg)" opacity="0.9"/>
          <path d="M10 24 C14 16, 22 12, 24 12 C26 12, 34 16, 38 24 C34 32, 26 36, 24 36 C22 36, 14 32, 10 24Z"
                fill="none" stroke="white" stroke-width="2.5" stroke-linejoin="round"/>
          <circle cx="24" cy="24" r="5.5" fill="white" opacity="0.95"/>
          <circle cx="24" cy="24" r="2.5" fill="#2D5E3A"/>
          <circle cx="32" cy="16" r="2.5" fill="#C4A882"/>
          <defs>
            <linearGradient id="fg" x1="0" y1="0" x2="48" y2="48">
              <stop offset="0%" stop-color="#3d7a4e"/>
              <stop offset="100%" stop-color="#2D5E3A"/>
            </linearGradient>
          </defs>
        </svg>
        <div>
          <span class="brand-logo-name">وعي</span>
          <small class="brand-logo-sub">منصة التوعية الوطنية</small>
        </div>
      </a>

      <p class="brand-desc">
        منصة توعوية وطنية متكاملة تهدف إلى نشر الوعي وتقديم الدعم النفسي والاجتماعي، نحو مجتمع أكثر صحةً ووعياً.
      </p>

      <!-- Stats -->
      <div class="brand-stats">
        <div class="stat-cell">
          <span class="stat-num">+50K</span>
          <span class="stat-lbl">مستخدم</span>
        </div>
        <div class="stat-cell">
          <span class="stat-num">+320</span>
          <span class="stat-lbl">مقال</span>
        </div>
        <div class="stat-cell">
          <span class="stat-num">+80</span>
          <span class="stat-lbl">فيديو</span>
        </div>
      </div>

      <!-- Social -->
      <div class="social-row">
        <a href="#" class="social-btn fb" title="Facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="social-btn tw" title="X / Twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="social-btn ig" title="Instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="social-btn yt" title="YouTube"><i class="bi bi-youtube"></i></a>
        <a href="#" class="social-btn snap" title="Snapchat"><i class="bi bi-snapchat"></i></a>
      </div>
    </div>

    <!-- Quick Links -->
    <div class="footer-col">
      <h4>روابط سريعة</h4>
      <ul class="footer-links">
        <li><a href="#"><div class="link-ico"><i class="bi bi-house-fill"></i></div> الصفحة الرئيسية</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-newspaper"></i></div> المقالات</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-play-circle-fill"></i></div> الفيديوهات</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-book-fill"></i></div> المكتبة</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-grid-3x3-gap-fill"></i></div> الأقسام</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-chat-quote-fill"></i></div> قصص وتجارب</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-trophy-fill"></i></div> عادات وإنجازات</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-info-circle-fill"></i></div> عن وعي</a></li>
      </ul>
    </div>

    <!-- Services -->
    <div class="footer-col">
      <h4>خدماتنا</h4>
      <ul class="footer-links">
        <li><a href="#"><div class="link-ico"><i class="bi bi-robot"></i></div> المساعد الذكي</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-envelope-heart-fill"></i></div> رسالة المستقبل</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-person-check-fill"></i></div> رحلة وعي</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-shield-heart-fill"></i></div> وعي للإدمان</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-people-fill"></i></div> مجتمع وعي</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-bar-chart-fill"></i></div> لوحة المبادرات</a></li>
        <li><a href="#"><div class="link-ico"><i class="bi bi-envelope-fill"></i></div> تواصل معنا</a></li>
      </ul>
    </div>

    <!-- Contact -->
    <div class="footer-col">
      <h4>تواصل معنا</h4>
      <div class="contact-items">
        <div class="contact-item">
          <div class="contact-ico-wrap"><i class="bi bi-envelope-fill"></i></div>
          <div>
            <div class="contact-label">البريد الإلكتروني</div>
            <div class="contact-value">info@wa3y.gov.sa</div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-ico-wrap"><i class="bi bi-telephone-fill"></i></div>
          <div>
            <div class="contact-label">خط الدعم</div>
            <div class="contact-value">920-000-000</div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-ico-wrap"><i class="bi bi-geo-alt-fill"></i></div>
          <div>
            <div class="contact-label">المقر الرئيسي</div>
            <div class="contact-value" style="direction:rtl">الرياض، المملكة العربية السعودية</div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-ico-wrap"><i class="bi bi-clock-fill"></i></div>
          <div>
            <div class="contact-label">ساعات العمل</div>
            <div class="contact-value" style="direction:rtl">الأحد – الخميس: 8ص – 4م</div>
          </div>
        </div>
      </div>

      <!-- App badges -->
      <div class="app-badges">
        <p>حمّل التطبيق</p>
        <div class="badge-row">
          <a href="#" class="app-badge">
            <i class="bi bi-apple"></i>
            <div class="app-badge-txt">
              <small>Download on the</small>
              <span>App Store</span>
            </div>
          </a>
          <a href="#" class="app-badge">
            <i class="bi bi-google-play"></i>
            <div class="app-badge-txt">
              <small>Get it on</small>
              <span>Google Play</span>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>

  <!-- ── Bottom bar ── -->
  <div class="footer-bottom">
    <div class="footer-bottom-inner">
      <p class="copyright">
        &copy; {{ date('Y') }} جميع الحقوق محفوظة لـ <span>منصة وعي</span>
      </p>
      <div class="bottom-links">
        <a href="#">سياسة الخصوصية</a>
        <a href="#">الشروط والأحكام</a>
        <a href="#">خريطة الموقع</a>
        <a href="#">إمكانية الوصول</a>
      </div>
      <div class="made-with">
        صُنع بـ <i class="bi bi-heart-fill"></i> في المملكة
      </div>
    </div>
  </div>

</footer>

</body>
</html>