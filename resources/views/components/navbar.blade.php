<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>نافبار وعي - معاينة</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --green:      #2D5E3A;
    --green-dark: #1e3f27;
    --green-mid:  #3d7a4e;
    --teal:       #3A7D6E;
    --gold:       #C4A882;
    --gold-light: #d4bfa0;
    --gold-dark:  #a8885e;
    --cream:      #F0EFEC;
    --cream-dark: #e5e3de;
    --white:      #ffffff;
    --text-dark:  #1a2e20;
    --text-mid:   #4a5e50;
    --text-light: #7a8e80;
  }

  body {
    font-family: 'Tajawal', sans-serif;
    background: var(--cream);
    min-height: 120vh;
    padding-top: 80px;
  }

  /* ══════════════════════════════════════════════
     NAVBAR BASE
  ══════════════════════════════════════════════ */
  .wa3y-nav {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Glass layer */
  .nav-glass {
    background: rgba(240, 239, 236, 0.88);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-bottom: 1px solid rgba(196, 168, 130, 0.25);
    box-shadow: 0 4px 32px rgba(45, 94, 58, 0.06), 0 1px 0 rgba(196, 168, 130, 0.2);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .wa3y-nav.scrolled .nav-glass {
    background: rgba(240, 239, 236, 0.97);
    box-shadow: 0 8px 48px rgba(45, 94, 58, 0.12), 0 1px 0 rgba(196, 168, 130, 0.3);
  }

  /* Animated bottom border */
  .nav-border-line {
    height: 2px;
    background: linear-gradient(90deg,
      transparent 0%,
      var(--gold) 20%,
      var(--green) 50%,
      var(--gold) 80%,
      transparent 100%);
    background-size: 200% 100%;
    animation: shimmerLine 4s linear infinite;
  }

  @keyframes shimmerLine {
    0%   { background-position: 200% 0; }
    100% { background-position: -200% 0; }
  }

  .nav-inner {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: height 0.4s ease;
  }

  .wa3y-nav.scrolled .nav-inner { height: 56px; }

  /* ══════════════════════════════════════════════
     LOGO
  ══════════════════════════════════════════════ */
  .nav-logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    text-decoration: none;
    flex-shrink: 0;
  }

  .logo-icon {
    position: relative;
    width: 113px;
    height: 48px;
    flex-shrink: 0;
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  }

  .nav-logo:hover .logo-icon { transform: rotate(-8deg) scale(1.08); }

  .logo-icon svg {
    width: 100%; height: 100%;
    filter: drop-shadow(0 4px 12px rgba(45,94,58,0.35));
  }

  .logo-text-wrap { display: flex; flex-direction: column; line-height: 1; }

  .logo-main {
    font-size: 1.5rem;
    font-weight: 900;
    color: var(--green);
    letter-spacing: -0.02em;
    line-height: 1;
  }

  .logo-sub {
    font-size: 0.65rem;
    color: var(--gold-dark);
    font-weight: 500;
    letter-spacing: 0.15em;
    text-transform: uppercase;
  }

  /* ══════════════════════════════════════════════
     DESKTOP MENU
  ══════════════════════════════════════════════ */
  .nav-links {
    display: flex;
    align-items: center;
    gap: 0.15rem;
    list-style: none;
  }

  .nav-link {
    position: relative;
    display: flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.5rem 0.85rem;
    font-size: 0.93rem;
    font-weight: 700;
    color: var(--text-mid);
    text-decoration: none;
    border-radius: 10px;
    transition: all 0.25s ease;
    cursor: pointer;
    border: none;
    background: none;
    font-family: 'Tajawal', sans-serif;
    white-space: nowrap;
  }

  .nav-link i { font-size: 0.85rem; transition: transform 0.3s ease; }
  .nav-link:hover i.icon-main { transform: translateY(-2px); }

  .nav-link::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 10px;
    background: var(--green);
    opacity: 0;
    transform: scale(0.88);
    transition: all 0.25s ease;
  }

  .nav-link:hover::before { opacity: 0.07; transform: scale(1); }
  .nav-link:hover { color: var(--green); }

  /* Active state */
  .nav-link.active {
    color: var(--green);
    background: rgba(45, 94, 58, 0.08);
  }

  .nav-link.active::after {
    content: '';
    position: absolute;
    bottom: 2px; left: 50%; right: 50%;
    height: 2.5px;
    background: linear-gradient(90deg, var(--gold), var(--green));
    border-radius: 2px;
    transition: left 0.3s ease, right 0.3s ease;
  }

  .nav-link.active::after,
  .nav-link:hover::after {
    content: '';
    position: absolute;
    bottom: 2px; left: 14px; right: 14px;
    height: 2.5px;
    background: linear-gradient(90deg, var(--gold), var(--green));
    border-radius: 2px;
  }

  .nav-link:not(.active)::after { opacity: 0; transition: opacity 0.25s; }
  .nav-link:hover::after { opacity: 1; }

  .chevron { font-size: 0.65rem !important; transition: transform 0.3s ease !important; }
  .chevron.open { transform: rotate(180deg) !important; }

  /* ══════════════════════════════════════════════
     MEGA DROPDOWN
  ══════════════════════════════════════════════ */
  .dropdown-wrap {
    position: relative;
  }

  .mega-dropdown {
    position: absolute;
    top: calc(100% + 14px);
    right: 0;
    min-width: 320px;
    background: #fff;
    border-radius: 20px;
    box-shadow:
      0 4px 6px rgba(0,0,0,0.04),
      0 20px 60px rgba(45,94,58,0.15),
      0 0 0 1px rgba(196,168,130,0.2);
    overflow: hidden;
    transform-origin: top right;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .mega-dropdown {
    opacity: 0;
    transform: scale(0.94) translateY(-8px);
    pointer-events: none;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .mega-dropdown.hidden-dd {
    opacity: 0;
    transform: scale(0.94) translateY(-8px);
    pointer-events: none;
  }

  .mega-dropdown.visible-dd {
    opacity: 1;
    transform: scale(1) translateY(0);
    pointer-events: auto;
  }

  /* Override when Alpine.js is loaded */
  [x-cloak] .mega-dropdown {
    opacity: 0;
    transform: scale(0.94) translateY(-8px);
    pointer-events: none;
  }

  /* Dropdown header */
  .dd-header {
    padding: 1.25rem 1.5rem 1rem;
    position: relative;
    overflow: hidden;
  }

  .dd-header::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--green) 0%, var(--teal) 100%);
  }

  .dd-header-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.08;
    background-image:
      radial-gradient(circle at 20% 50%, var(--gold) 2px, transparent 2px),
      radial-gradient(circle at 80% 20%, var(--gold) 1.5px, transparent 1.5px),
      radial-gradient(circle at 60% 80%, var(--gold) 1px, transparent 1px);
    background-size: 60px 60px, 40px 40px, 80px 80px;
  }

  .dd-header-content { position: relative; z-index: 1; }

  .dd-header-icon {
    width: 36px; height: 36px;
    background: rgba(255,255,255,0.2);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 0.6rem;
    font-size: 1rem;
    color: #fff;
  }

  .dd-header h4 {
    font-size: 1.05rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 0.2rem;
  }

  .dd-header p {
    font-size: 0.78rem;
    color: rgba(255,255,255,0.8);
    font-weight: 400;
  }

  /* Dropdown items */
  .dd-items { padding: 0.6rem; }

  .dd-item {
    display: flex;
    align-items: center;
    gap: 0.9rem;
    padding: 0.75rem 0.9rem;
    border-radius: 12px;
    text-decoration: none;
    color: var(--text-dark);
    transition: all 0.2s ease;
    position: relative;
    overflow: hidden;
  }

  .dd-item::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(45,94,58,0.06), rgba(58,125,110,0.04));
    border-radius: 12px;
    opacity: 0;
    transition: opacity 0.2s;
  }

  .dd-item:hover::before { opacity: 1; }
  .dd-item:hover { transform: translateX(-3px); }

  .dd-item-icon {
    width: 38px; height: 38px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.95rem;
    color: #fff;
    flex-shrink: 0;
    transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1);
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
  }

  .dd-item:hover .dd-item-icon { transform: scale(1.15) rotate(-5deg); }

  .dd-item-text { flex: 1; }
  .dd-item-text strong {
    display: block;
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1px;
  }
  .dd-item-text span {
    font-size: 0.75rem;
    color: var(--text-light);
    font-weight: 400;
  }

  .dd-item-arrow {
    color: var(--text-light);
    font-size: 0.75rem;
    transition: all 0.2s;
    transform: rotate(180deg);
  }

  .dd-item:hover .dd-item-arrow {
    color: var(--green);
    transform: rotate(180deg) translateX(-3px);
  }

  /* ══════════════════════════════════════════════
     NAV ACTIONS (login/register/user)
  ══════════════════════════════════════════════ */
  .nav-actions { display: flex; align-items: center; gap: 0.6rem; }

  .btn-nav-login {
    display: flex; align-items: center; gap: 0.4rem;
    padding: 0.45rem 1rem;
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--green);
    background: rgba(255,255,255,0.8);
    border: 1.5px solid rgba(45,94,58,0.25);
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .btn-nav-login:hover {
    background: rgba(45,94,58,0.06);
    border-color: var(--green);
    color: var(--green);
  }

  .btn-nav-admin {
    display: flex; align-items: center; gap: 0.4rem;
    padding: 0.45rem 1rem;
    font-size: 0.88rem;
    font-weight: 600;
    color: white;
    background: linear-gradient(135deg, var(--green), var(--green-dark));
    border: 1.5px solid var(--green);
    border-radius: 2rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(45,94,58,0.2);
  }

  .btn-nav-admin:hover {
    background: linear-gradient(135deg, var(--green-dark), var(--green));
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(45,94,58,0.3);
  }

  .btn-nav-join {
    display: flex; align-items: center; gap: 0.5rem;
    padding: 0.5rem 1.2rem;
    font-size: 0.88rem;
    font-weight: 800;
    color: #fff;
    background: linear-gradient(135deg, var(--green), var(--teal));
    border: none;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(45,94,58,0.25);
  }

  .btn-nav-join::before {
    content: '';
    position: absolute;
    top: 0; left: -100%; right: 100%; bottom: 0;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
    transition: all 0.5s ease;
  }

  .btn-nav-join:hover::before { left: 100%; right: -100%; }
  .btn-nav-join:hover {
    background: var(--green-dark);
    box-shadow: 0 6px 24px rgba(45,94,58,0.4);
    transform: translateY(-1px);
    color: #fff;
  }

  /* User menu button */
  .user-menu-btn {
    display: flex; align-items: center; gap: 0.7rem;
    padding: 0.35rem 0.8rem 0.35rem 0.45rem;
    background: rgba(255,255,255,0.8);
    border: 1px solid rgba(196,168,130,0.3);
    border-radius: 50px;
    cursor: pointer;
    font-family: 'Tajawal', sans-serif;
    transition: all 0.25s ease;
    box-shadow: 0 2px 8px rgba(45,94,58,0.08);
  }

  .user-menu-btn:hover {
    background: #fff;
    border-color: rgba(196,168,130,0.5);
    box-shadow: 0 4px 16px rgba(45,94,58,0.12);
  }

  .user-avatar {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--green), var(--teal));
    display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 700; font-size: 0.85rem;
    flex-shrink: 0;
  }

  .user-info { text-align: right; }
  .user-name { display: block; font-size: 0.85rem; font-weight: 700; color: var(--text-dark); line-height: 1.1; }
  .user-role { display: block; font-size: 0.68rem; font-weight: 400; color: var(--gold-dark); }

  /* User dropdown */
  .user-dropdown {
    min-width: 280px;
    right: auto;
    left: 0;
  }

  .user-dd-header {
    padding: 1.2rem 1.5rem;
    background: linear-gradient(135deg, var(--green), var(--teal));
    display: flex; align-items: center; gap: 1rem;
  }

  .user-dd-avatar {
    width: 50px; height: 50px;
    border-radius: 50%;
    background: rgba(255,255,255,0.25);
    display: flex; align-items: center; justify-content: center;
    color: #fff;
    font-weight: 900;
    font-size: 1.2rem;
    border: 2px solid rgba(255,255,255,0.4);
    flex-shrink: 0;
  }

  .user-dd-info .name { font-size: 1rem; font-weight: 800; color: #fff; }
  .user-dd-info .role {
    font-size: 0.75rem; color: rgba(255,255,255,0.8);
    margin-top: 2px; display: inline-block;
    background: rgba(255,255,255,0.15);
    padding: 1px 8px; border-radius: 10px;
  }

  .dd-divider { height: 1px; background: rgba(196,168,130,0.15); margin: 0.4rem 0.6rem; }

  .dd-item-danger { color: #dc2626 !important; }
  .dd-item-danger .dd-item-icon { background: linear-gradient(135deg, #ef4444, #dc2626) !important; }
  .dd-item-danger .dd-item-text strong { color: #dc2626 !important; }

  /* ══════════════════════════════════════════════
     MOBILE MENU BUTTON
  ══════════════════════════════════════════════ */
  .mobile-toggle {
    display: none;
    width: 44px; height: 44px;
    background: rgba(255,255,255,0.7);
    border: 1px solid rgba(196,168,130,0.3);
    border-radius: 12px;
    align-items: center; justify-content: center;
    cursor: pointer;
    transition: all 0.25s ease;
    flex-direction: column;
    gap: 5px;
  }

  .mobile-toggle:hover {
    background: #fff;
    border-color: var(--gold);
    box-shadow: 0 4px 12px rgba(45,94,58,0.1);
  }

  .burger-line {
    width: 20px; height: 2px;
    background: var(--green);
    border-radius: 2px;
    transition: all 0.3s ease;
    display: block;
  }

  /* ══════════════════════════════════════════════
     MOBILE DRAWER
  ══════════════════════════════════════════════ */
  .mobile-overlay {
    position: fixed;
    inset: 0;
    background: rgba(26, 46, 32, 0.5);
    z-index: 999;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s;
    backdrop-filter: blur(4px);
  }

  .mobile-overlay.open { opacity: 1; pointer-events: auto; }

  .mobile-drawer {
    position: fixed;
    top: 0; right: 0; bottom: 0;
    width: min(360px, 90vw);
    background: #fff;
    z-index: 1001;
    display: flex;
    flex-direction: column;
    transform: translateX(100%);
    transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: -8px 0 48px rgba(45,94,58,0.15);
  }

  .mobile-drawer.open { transform: translateX(0); }

  .drawer-head {
    padding: 1.5rem;
    background: linear-gradient(135deg, var(--green), var(--teal));
    display: flex; align-items: center; justify-content: space-between;
  }

  .drawer-logo { font-size: 1.5rem; font-weight: 900; color: #fff; }
  .drawer-logo span { font-size: 0.7rem; display: block; color: rgba(255,255,255,0.75); font-weight: 400; }

  .drawer-close {
    width: 36px; height: 36px;
    background: rgba(255,255,255,0.2);
    border: none;
    border-radius: 10px;
    color: #fff;
    font-size: 1rem;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: background 0.2s;
  }

  .drawer-close:hover { background: rgba(255,255,255,0.3); }

  .drawer-body {
    flex: 1;
    overflow-y: auto;
    padding: 1rem;
  }

  .drawer-section-title {
    font-size: 0.7rem;
    font-weight: 700;
    color: var(--gold-dark);
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 0.6rem 0.5rem 0.4rem;
  }

  .drawer-link {
    display: flex; align-items: center; gap: 0.8rem;
    padding: 0.75rem 0.75rem;
    border-radius: 12px;
    text-decoration: none;
    color: var(--text-dark);
    font-weight: 600;
    font-size: 0.92rem;
    transition: all 0.2s;
    margin-bottom: 2px;
  }

  .drawer-link:hover {
    background: rgba(45,94,58,0.06);
    color: var(--green);
    transform: translateX(-4px);
  }

  .drawer-icon {
    width: 36px; height: 36px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.9rem;
    color: #fff;
    flex-shrink: 0;
    box-shadow: 0 3px 8px rgba(0,0,0,0.15);
  }

  .drawer-foot {
    padding: 1rem 1.25rem;
    border-top: 1px solid rgba(196,168,130,0.2);
    display: flex; gap: 0.6rem;
  }

  .drawer-login {
    flex: 1; padding: 0.7rem;
    text-align: center;
    border: 1.5px solid rgba(45,94,58,0.25);
    border-radius: 12px;
    color: var(--green);
    text-decoration: none;
    font-weight: 700;
    font-size: 0.88rem;
    transition: all 0.2s;
  }

  .drawer-login:hover { background: rgba(45,94,58,0.06); border-color: var(--green); }

  .drawer-user-info {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    padding: 1rem;
    background: rgba(45,94,58,0.05);
    border-radius: 12px;
    margin-bottom: 0.5rem;
  }

  .drawer-user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--green), var(--teal));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.1rem;
  }

  .drawer-user-details {
    flex: 1;
  }

  .drawer-user-name {
    font-weight: 600;
    color: var(--text-dark);
    font-size: 0.9rem;
  }

  .drawer-user-role {
    font-size: 0.8rem;
    color: var(--text-mid);
    margin-top: 0.2rem;
  }

  .drawer-join {
    flex: 1.5; padding: 0.7rem;
    text-align: center;
    background: var(--green);
    border-radius: 12px;
    color: #fff;
    text-decoration: none;
    font-weight: 800;
    font-size: 0.88rem;
    transition: all 0.2s;
    box-shadow: 0 4px 12px rgba(45,94,58,0.25);
  }

  .drawer-join:hover { background: var(--green-dark); }

  /* ══════════════════════════════════════════════
     PAGE DEMO CONTENT
  ══════════════════════════════════════════════ */
  .demo-page {
    max-width: 1000px; margin: 2rem auto; padding: 2rem;
    text-align: center;
    color: var(--text-mid);
    font-family: 'Tajawal', sans-serif;
  }

  .demo-page h1 { font-size: 2.5rem; font-weight: 900; color: var(--green); margin-bottom: 1rem; }
  .demo-page p { font-size: 1.1rem; color: var(--text-light); }

  /* Responsive */
  @media (max-width: 1024px) {
    .nav-links { display: none; }
    .nav-actions .btn-nav-login,
    .nav-actions .btn-nav-join,
    .nav-actions .user-menu-btn { display: none; }
    .mobile-toggle { display: flex; }
  }
</style>
</head>

<body x-data="navController()">

<!-- ══════════════════════════════════════════
     MOBILE OVERLAY
════════════════════════════════════════════ -->
<div class="mobile-overlay" :class="{ open: mobileOpen }" @click="mobileOpen = false"></div>

<!-- ══════════════════════════════════════════
     MOBILE DRAWER
════════════════════════════════════════════ -->
<div class="mobile-drawer" :class="{ open: mobileOpen }">
  <div class="drawer-head">
    <div class="drawer-logo">
      <div style="display: flex; align-items: center; gap: 0.75rem;">
        <div style="width: 36px; height: 36px;">
          <img src="{{ asset('images/wa3y-logo.png') }}" alt="وعي" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div>
          وعي
          <span style="font-size: 0.7rem; display: block; color: rgba(255,255,255,0.75); font-weight: 400;">منصة التوعية</span>
        </div>
      </div>
    </div>
    <button class="drawer-close" @click="mobileOpen = false">
      <i class="bi bi-x-lg"></i>
    </button>
  </div>
  <div class="drawer-body">
    <div class="drawer-section-title">التصفح</div>
    <a href="{{ route('home') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)"><i class="bi bi-house-fill"></i></div>
      الصفحة الرئيسية
    </a>
    <a href="{{ route('articles') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#3A7D6E,#2a6b5d)"><i class="bi bi-newspaper"></i></div>
      المقالات
    </a>
    <a href="{{ route('videos') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#C4A882,#a8885e)"><i class="bi bi-play-circle-fill"></i></div>
      الفيديوهات
    </a>
    <a href="{{ route('books') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#5a7d4e,#2D5E3A)"><i class="bi bi-book-fill"></i></div>
      المكتبة
    </a>
    <a href="{{ route('sections') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#3A7D6E,#C4A882)"><i class="bi bi-grid-3x3-gap-fill"></i></div>
      الأقسام
    </a>
    <div class="drawer-section-title" style="margin-top:0.5rem">اكتشف</div>
    <a href="#" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#2D5E3A,#1e3f27)"><i class="bi bi-shield-heart-fill"></i></div>
      وعي للإدمان
    </a>
    <a href="{{ route('future-message.index') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#C4A882,#2D5E3A)"><i class="bi bi-envelope-heart-fill"></i></div>
      رسالة المستقبل
    </a>
    <a href="{{ route('ai-assistant') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#3A7D6E,#1a2e20)"><i class="bi bi-robot"></i></div>
      المساعد الذكي
    </a>
    <a href="{{ route('about') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#a8885e,#C4A882)"><i class="bi bi-info-circle-fill"></i></div>
      عن وعي
    </a>
    <a href="{{ route('guide') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)"><i class="bi bi-book-fill"></i></div>
      دليل وعي
    </a>
    <a href="{{ route('contact') }}" class="drawer-link">
      <div class="drawer-icon" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)"><i class="bi bi-envelope-fill"></i></div>
      تواصل معنا
    </a>
    
    <!-- Admin Dashboard (Mobile) -->
    @auth
      @if(auth()->user()->isAdmin())
        <a href="{{ route('admin.dashboard') }}" class="drawer-link">
          <div class="drawer-icon" style="background:linear-gradient(135deg,#dc2626,#b91c1c)"><i class="bi bi-speedometer2"></i></div>
          لوحة التحكم
        </a>
      @endif
    @endauth
  </div>
  <div class="drawer-foot">
    @guest
      <a href="{{ route('login') }}" class="drawer-login">تسجيل الدخول</a>
      <a href="{{ route('register') }}" class="drawer-join">انضم الينا</a>
    @else
      <div class="drawer-user-info">
        <div class="drawer-user-avatar">{{ substr(auth()->user()->first_name, 0, 1) }}</div>
        <div class="drawer-user-details">
          <div class="drawer-user-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
          <div class="drawer-user-role">{{ auth()->user()->role == 'admin' ? 'مدير' : (auth()->user()->role == 'campaign_manager' ? 'مدير حملات' : 'مستخدم') }}</div>
        </div>
      </div>
    @endguest
  </div>
</div>

<!-- ══════════════════════════════════════════
     MAIN NAVBAR
════════════════════════════════════════════ -->
<nav class="wa3y-nav" x-data="{ scrolled: false }" x-cloak :class="{ scrolled: scrolled }">
  <div class="nav-glass">
    <div class="nav-inner">

      <!-- LOGO -->
      <a href="{{ route('home') }}" class="nav-logo">
        <div class="logo-icon">
          <img src="{{ asset('images/wa3y-logo.png') }}" alt="وعي" style="width: 100%; height: 100%; object-fit: contain; filter: drop-shadow(0 4px 12px rgba(45,94,58,0.35));">
        </div>
       
      </a>

      <!-- DESKTOP LINKS -->
      <ul class="nav-links">

        <!-- الرئيسية -->
        <li>
          <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
            <i class="bi bi-house-fill icon-main"></i>
            الرئيسية
          </a>
        </li>

        <!-- المقالات dropdown -->
        <li class="dropdown-wrap" x-data="{ open: false }" x-cloak>
          <button class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}" :class="{ active: open }" @click="open = !open" @click.outside="open = false">
            <i class="bi bi-newspaper icon-main"></i>
            المقالات
            <i class="bi bi-chevron-down chevron" :class="{ open: open }"></i>
          </button>
          <div class="mega-dropdown" :class="open ? 'visible-dd' : 'hidden-dd'">
            <div class="dd-header">
              <div class="dd-header-pattern"></div>
              <div class="dd-header-content">
                <div class="dd-header-icon"><i class="bi bi-newspaper"></i></div>
                <h4>المقالات</h4>
                <p>مقالات متخصصة من أطباء ومختصين</p>
              </div>
            </div>
            <div class="dd-items">
              <a href="{{ route('articles') }}" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)"><i class="bi bi-grid-fill"></i></div>
                <div class="dd-item-text"><strong>جميع المقالات</strong><span>تصفح كل المقالات</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
              <a href="{{ route('articles', ['category' => 'psychology']) }}" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#3A7D6E,#2a6b5d)"><i class="bi bi-heart-pulse"></i></div>
                <div class="dd-item-text"><strong>علم النفس</strong><span>مقالات نفسية متخصصة</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
              <a href="{{ route('articles', ['category' => 'addiction']) }}" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#C4A882,#a8885e)"><i class="bi bi-shield-heart"></i></div>
                <div class="dd-item-text"><strong>الإدمان والعلاج</strong><span>طريق التعافي</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
              <a href="#" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#5a7d4e,#2D5E3A)"><i class="bi bi-people-fill"></i></div>
                <div class="dd-item-text"><strong>الصحة المجتمعية</strong><span>التوعية والمجتمع</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
            </div>
          </div>
        </li>

        <!-- الفيديوهات dropdown -->
        <li class="dropdown-wrap" x-data="{ open: false }" x-cloak>
          <button class="nav-link {{ request()->routeIs('videos.*') ? 'active' : '' }}" :class="{ active: open }" @click="open = !open" @click.outside="open = false">
            <i class="bi bi-play-circle icon-main"></i>
            الفيديوهات
            <i class="bi bi-chevron-down chevron" :class="{ open: open }"></i>
          </button>
          <div class="mega-dropdown" :class="open ? 'visible-dd' : 'hidden-dd'">
            <div class="dd-header" style="">
              <div class="dd-header-pattern"></div>
              <div class="dd-header-content">
                <div class="dd-header-icon"><i class="bi bi-play-circle-fill"></i></div>
                <h4>الفيديوهات</h4>
                <p>محتوى مرئي تعليمي وتثقيفي</p>
              </div>
            </div>
            <div class="dd-items">
              <a href="{{ route('videos') }}" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)"><i class="bi bi-collection-play-fill"></i></div>
                <div class="dd-item-text"><strong>جميع الفيديوهات</strong><span>مكتبة الفيديو الكاملة</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
              <a href="{{ route('videos', ['category' => 'psychology']) }}" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#3A7D6E,#2D5E3A)"><i class="bi bi-brain"></i></div>
                <div class="dd-item-text"><strong>التفكير والقلق</strong><span>إدارة العقل والمشاعر</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
              <a href="#" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#C4A882,#2D5E3A)"><i class="bi bi-clock-history"></i></div>
                <div class="dd-item-text"><strong>فيديوهات قصيرة</strong><span>أقل من 5 دقائق</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
            </div>
          </div>
        </li>

        <!-- المكتبة dropdown -->
        <li class="dropdown-wrap" x-data="{ open: false }" x-cloak>
          <button class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" :class="{ active: open }" @click="open = !open" @click.outside="open = false">
            <i class="bi bi-book-fill icon-main"></i>
            المكتبة
            <i class="bi bi-chevron-down chevron" :class="{ open: open }"></i>
          </button>
          <div class="mega-dropdown" style="min-width:320px" :class="open ? 'visible-dd' : 'hidden-dd'">
            <div class="dd-header">
              <div class="dd-header-pattern"></div>
              <div class="dd-header-content">
                <div class="dd-header-icon"><i class="bi bi-book-fill"></i></div>
                <h4>المكتبة</h4>
                <p>تصفح واستكشف الكتب القيمة</p>
              </div>
            </div>
            <div class="dd-items">
              <a href="{{ route('books') }}" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)"><i class="bi bi-grid"></i></div>
                <div class="dd-item-text"><strong>جميع الكتب</strong><span>استعراض المكتبة الكاملة</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
              
              {{-- Dynamic Categories --}}
              @php
                $categories = \App\Models\Category::where('is_active', true)->orderBy('name')->get();
              @endphp
              @if($categories->count() > 0)
                @foreach($categories as $category)
                <a href="{{ route('categories.show', $category) }}" class="dd-item">
                  <div class="dd-item-icon" style="background:linear-gradient(135deg,{{ $category->color ?? '#2D5E3A' }},{{ $category->color ?? '#3A7D6E' }})">
                    <i class="{{ $category->icon ?? 'bi bi-book' }}"></i>
                  </div>
                  <div class="dd-item-text">
                    <strong>{{ $category->name }}</strong>
                    <span>{{ \App\Models\Book::published()->where('category', $category->slug)->count() }} كتاب</span>
                  </div>
                  <i class="bi bi-chevron-left dd-item-arrow"></i>
                </a>
                @endforeach
              @endif
              
              <a href="#" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#3A7D6E,#2a6b5d)"><i class="bi bi-star"></i></div>
                <div class="dd-item-text"><strong>الكتب المميزة</strong><span>أفضل الكتب المختارة</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
              <a href="#" class="dd-item">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#2D5E3A,#1e3f27)"><i class="bi bi-download"></i></div>
                <div class="dd-item-text"><strong>الكتب المحملة</strong><span>كتبك المفضلة</span></div>
                <i class="bi bi-chevron-left dd-item-arrow"></i>
              </a>
            </div>
          </div>
        </li>

        <!-- الأقسام dropdown -->
        <li class="dropdown-wrap" x-data="{ open: false }" x-cloak>
          <button class="nav-link {{ request()->routeIs('sections') ? 'active' : '' }}" :class="{ active: open }" @click="open = !open" @click.outside="open = false">
            <i class="bi bi-grid-3x3-gap icon-main"></i>
            الأقسام
            <i class="bi bi-chevron-down chevron" :class="{ open: open }"></i>
          </button>
          <div class="mega-dropdown" style="min-width:360px" :class="open ? 'visible-dd' : 'hidden-dd'">
            <div class="dd-header">
              <div class="dd-header-pattern"></div>
              <div class="dd-header-content">
                <div class="dd-header-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
                <h4>أقسام وعي</h4>
                <p>استكشف كل ما تقدمه منصة وعي</p>
              </div>
            </div>
            <div class="dd-items" style="display:grid;grid-template-columns:1fr 1fr;gap:0.2rem;">
              <a href="#" class="dd-item" style="padding:0.65rem 0.75rem;">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#3A7D6E,#2D5E3A);width:32px;height:32px;font-size:0.8rem"><i class="bi bi-people-fill"></i></div>
                <div class="dd-item-text"><strong style="font-size:0.82rem">مجتمع وعي</strong></div>
              </a>
              <a href="{{ route('future-message.index') }}" class="dd-item" style="padding:0.65rem 0.75rem;">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#C4A882,#a8885e);width:32px;height:32px;font-size:0.8rem"><i class="bi bi-envelope-heart-fill"></i></div>
                <div class="dd-item-text"><strong style="font-size:0.82rem">رسالة المستقبل</strong></div>
              </a>
              <a href="#" class="dd-item" style="padding:0.65rem 0.75rem;">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#2D5E3A,#1e3f27);width:32px;height:32px;font-size:0.8rem"><i class="bi bi-shield-heart-fill"></i></div>
                <div class="dd-item-text"><strong style="font-size:0.82rem">وعي للإدمان</strong></div>
              </a>
              <a href="{{ route('ai-assistant') }}" class="dd-item" style="padding:0.65rem 0.75rem;">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#3A7D6E,#C4A882);width:32px;height:32px;font-size:0.8rem"><i class="bi bi-robot"></i></div>
                <div class="dd-item-text"><strong style="font-size:0.82rem">مساعد الذكاء</strong></div>
              </a>
              <a href="#" class="dd-item" style="padding:0.65rem 0.75rem;">
                <div class="dd-item-icon" style="background:linear-gradient(135deg,#a8885e,#2D5E3A);width:32px;height:32px;font-size:0.8rem"><i class="bi bi-person-check-fill"></i></div>
                <div class="dd-item-text"><strong style="font-size:0.82rem">رحلة وعي</strong></div>
              </a>
            </div>
          </div>
        </li>

        <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"><i class="bi bi-info-circle icon-main"></i> عن وعي</a></li>
        <li><a href="{{ route('guide') }}" class="nav-link {{ request()->routeIs('guide') ? 'active' : '' }}"><i class="bi bi-book icon-main"></i> دليل وعي</a></li>
        <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"><i class="bi bi-envelope icon-main"></i> تواصل معنا</a></li>
      </ul>

      <!-- ACTIONS -->
      <div class="nav-actions">
        <!-- GUEST state: show login + join -->
        @guest
          <div style="display:flex;gap:0.6rem;align-items:center">
            <a href="{{ route('login') }}" class="btn-nav-login"><i class="bi bi-box-arrow-in-right"></i> تسجيل الدخول</a>
            <a href="{{ route('register') }}" class="btn-nav-join"><i class="bi bi-person-plus-fill"></i> انضم الينا</a>
          </div>
        @endguest

        <!-- AUTH state: user menu -->
        @auth
          <!-- Admin Dashboard Button (only for admin) -->
          @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="btn-nav-admin">
              <i class="bi bi-speedometer2"></i>
              <span>لوحة التحكم</span>
            </a>
          @endif
          
          <div class="dropdown-wrap" x-data="{ open: false }" x-cloak>
            <button class="user-menu-btn" @click="open = !open" @click.outside="open = false">
              <div class="user-avatar">{{ substr(auth()->user()->first_name, 0, 1) }}</div>
              <div class="user-info">
                <span class="user-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                <span class="user-role">{{ auth()->user()->role == 'admin' ? 'مدير' : (auth()->user()->role == 'campaign_manager' ? 'مدير حملات' : 'مستخدم') }}</span>
              </div>
              <i class="bi bi-chevron-down" style="font-size:0.7rem;color:#7a8e80;transition:transform 0.3s" :style="open ? 'transform:rotate(180deg)' : ''"></i>
            </button>
            <div class="mega-dropdown user-dropdown" :class="open ? 'visible-dd' : 'hidden-dd'">
              <div class="user-dd-header">
                <div class="user-dd-avatar">{{ substr(auth()->user()->first_name, 0, 1) }}</div>
                <div class="user-dd-info">
                  <div class="name">{{ auth()->user()->full_name }}</div>
                  <span class="role">{{ get_user_role_name(auth()->user()->role) }}</span>
                </div>
              </div>
              <div class="dd-items">
                <a href="{{ route('profile.show') }}" class="dd-item">
                  <div class="dd-item-icon" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)"><i class="bi bi-person-fill"></i></div>
                  <div class="dd-item-text"><strong>الملف الشخصي</strong><span>إعدادات حسابك</span></div>
                  <i class="bi bi-chevron-left dd-item-arrow"></i>
                </a>
                <a href="{{ route('future-message.index') }}" class="dd-item">
                  <div class="dd-item-icon" style="background:linear-gradient(135deg,#3A7D6E,#2D5E3A)"><i class="bi bi-envelope-heart-fill"></i></div>
                  <div class="dd-item-text"><strong>رسائل المستقبل</strong><span>رسائلك المجدولة</span></div>
                  <i class="bi bi-chevron-left dd-item-arrow"></i>
                </a>
                <a href="{{ route('ai-assistant') }}" class="dd-item">
                  <div class="dd-item-icon" style="background:linear-gradient(135deg,#C4A882,#a8885e)"><i class="bi bi-robot"></i></div>
                  <div class="dd-item-text"><strong>المساعد الذكي</strong><span>AI Assistant</span></div>
                  <i class="bi bi-chevron-left dd-item-arrow"></i>
                </a>
                
                @if(auth()->user()->isAdmin())
                  <a href="{{ route('admin.dashboard') }}" class="dd-item">
                    <div class="dd-item-icon" style="background:linear-gradient(135deg,#dc2626,#b91c1c)"><i class="bi bi-gear-fill"></i></div>
                    <div class="dd-item-text"><strong>لوحة التحكم</strong><span>Admin Panel</span></div>
                    <i class="bi bi-chevron-left dd-item-arrow"></i>
                  </a>
                @endif
                
                @if(auth()->user()->isCampaignManager())
                  <a href="{{ route('community.index') }}" class="dd-item">
                    <div class="dd-item-icon" style="background:linear-gradient(135deg,#7c3aed,#6d28d9)"><i class="bi bi-people-fill"></i></div>
                    <div class="dd-item-text"><strong>الحملات التوعوية</strong><span>إدارة الحملات</span></div>
                    <i class="bi bi-chevron-left dd-item-arrow"></i>
                  </a>
                @endif
                
                <div class="dd-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dd-item dd-item-danger">
                    <div class="dd-item-icon"><i class="bi bi-box-arrow-right"></i></div>
                    <div class="dd-item-text"><strong>تسجيل الخروج</strong><span>خروج آمن</span></div>
                  </button>
                </form>
              </div>
            </div>
          </div>
        @endauth

        <!-- Mobile toggle -->
        <button class="mobile-toggle" @click="mobileOpen = true" aria-label="القائمة">
          <span class="burger-line"></span>
          <span class="burger-line" style="width:14px"></span>
          <span class="burger-line" style="width:17px"></span>
        </button>
      </div>

    </div>
    <div class="nav-border-line"></div>
  </div>
</nav>

</div>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('navController', () => ({
      scrolled: false,
      mobileOpen: false,
      loggedIn: false,

      init() {
        window.addEventListener('scroll', () => {
          this.scrolled = window.scrollY > 40;
        });
        this.$el.addEventListener('toggle-login', () => {
          this.loggedIn = !this.loggedIn;
        });
      }
    }));
  });
</script>
</body>
</html>