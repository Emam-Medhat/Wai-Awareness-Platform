@extends('layouts.app')
@section('title', 'الرئيسية')

@push('styles')
<style>
/* ══════════════════════════════════════════════════════
   WA3Y HOME — DESIGN TOKENS
══════════════════════════════════════════════════════ */
:root {
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

/* ══ HERO ════════════════════════════════════════════ */
.hero-section {
  min-height: 100vh;
  background: var(--dark);
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
}

/* Mesh gradient background */
.hero-mesh {
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 80% 60% at 20% 20%, rgba(45,94,58,.55) 0%, transparent 60%),
    radial-gradient(ellipse 60% 80% at 80% 80%, rgba(58,125,110,.4) 0%, transparent 55%),
    radial-gradient(ellipse 50% 50% at 50% 50%, rgba(196,168,130,.08) 0%, transparent 70%),
    linear-gradient(170deg, #0d1f13 0%, #1a2e20 50%, #0a1a10 100%);
}

/* Animated radial glow */
.hero-glow-1 {
  position: absolute;
  width: 600px; height: 600px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(45,94,58,.35) 0%, transparent 70%);
  top: -100px; right: -100px;
  animation: glowPulse 8s ease-in-out infinite;
}

.hero-glow-2 {
  position: absolute;
  width: 500px; height: 500px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(58,125,110,.25) 0%, transparent 70%);
  bottom: -80px; left: -80px;
  animation: glowPulse 10s ease-in-out infinite reverse;
}

.hero-glow-3 {
  position: absolute;
  width: 300px; height: 300px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(196,168,130,.15) 0%, transparent 70%);
  top: 50%; left: 45%;
  animation: glowPulse 6s ease-in-out infinite;
  animation-delay: 3s;
}

@keyframes glowPulse {
  0%,100% { transform: scale(1) rotate(0deg); opacity: 1; }
  50% { transform: scale(1.2) rotate(180deg); opacity: .6; }
}


/* Floating shapes */
.hero-shapes {
  position: absolute;
  inset: 0;
  overflow: hidden;
}

.shape {
  position: absolute;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(196,168,130,.1), rgba(45,94,58,.05));
  border: 1px solid rgba(196,168,130,.08);
  animation: floatShape 20s infinite ease-in-out;
}

.shape:nth-child(1) {
  width: 80px; height: 80px;
  top: 15%; right: 10%;
  animation-delay: 0s;
}

.shape:nth-child(2) {
  width: 60px; height: 60px;
  top: 70%; right: 25%;
  animation-delay: 5s;
}

.shape:nth-child(3) {
  width: 100px; height: 100px;
  top: 35%; left: 8%;
  animation-delay: 10s;
}

.shape:nth-child(4) {
  width: 45px; height: 45px;
  top: 50%; right: 60%;
  animation-delay: 15s;
}

@keyframes floatShape {
  0%, 100% {
    transform: translateY(0) translateX(0) rotate(0deg);
  }
  25% {
    transform: translateY(-30px) translateX(20px) rotate(90deg);
  }
  50% {
    transform: translateY(-15px) translateX(-15px) rotate(180deg);
  }
  75% {
    transform: translateY(-25px) translateX(10px) rotate(270deg);
  }
}

/* Enhanced wave animation */
.hero-wave-enhanced {
  position: absolute;
  bottom: 0; left: 0; right: 0;
  overflow: hidden;
  line-height: 0;
}

.hero-wave-enhanced svg {
  position: relative;
  display: block;
  width: calc(100% + 1.3px);
  height: 70px;
  animation: waveMove 10s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
}

.hero-wave-enhanced .wave-1 {
  fill: rgba(240,239,236,.3);
  animation: waveFade 8s infinite;
}

.hero-wave-enhanced .wave-2 {
  fill: rgba(240,239,236,.5);
  animation: waveFade 8s infinite 2s;
}

.hero-wave-enhanced .wave-3 {
  fill: #F0EFEC;
  animation: waveFade 8s infinite 4s;
}

@keyframes waveMove {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

@keyframes waveFade {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.7; }
}

/* Dot grid overlay */
.hero-dots {
  position: absolute;
  inset: 0;
  background-image: radial-gradient(circle, rgba(196,168,130,.18) 1px, transparent 1px);
  background-size: 40px 40px;
  animation: dotsDrift 20s linear infinite;
}

@keyframes dotsDrift {
  0%   { transform: translateY(0); }
  100% { transform: translateY(40px); }
}

/* Diagonal lines accent */
.hero-lines {
  position: absolute;
  inset: 0;
  background-image: repeating-linear-gradient(
    -45deg,
    transparent,
    transparent 60px,
    rgba(45,94,58,.06) 60px,
    rgba(45,94,58,.06) 61px
  );
}

/* Trust Indicators Animation */
.trust-item {
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.trust-item:hover {
  transform: translateY(-5px) scale(1.02);
  background: rgba(255,255,255,0.1);
  border-color: rgba(255,255,255,0.2);
  box-shadow: 0 12px 32px rgba(0,0,0,0.15);
}

.trust-item:hover .trust-icon-wrapper {
  transform: scale(1.1) rotate(5deg);
  box-shadow: 0 8px 24px rgba(0,0,0,0.2);
}

.trust-item:hover .trust-label {
  color: rgba(255,255,255,1);
}

.trust-item:hover .trust-desc {
  color: rgba(255,255,255,0.8);
}

/* Action Buttons Enhanced Animation */
.action-btn {
  position: relative;
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.action-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: left 0.5s;
}

.action-btn:hover::before {
  left: 100%;
}

.action-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 16px 48px rgba(0,0,0,0.25);
}

.secondary-action:hover {
  transform: translateY(-3px);
  background: rgba(255,255,255,0.15);
  border-color: rgba(255,255,255,0.3);
  box-shadow: 0 16px 48px rgba(0,0,0,0.15);
}

/* Hero Content Animation */
.hero-content-wrapper > * {
  animation: fadeInUp 0.8s ease-out both;
}

.hero-content-wrapper > *:nth-child(1) { animation-delay: 0.1s; }
.hero-content-wrapper > *:nth-child(2) { animation-delay: 0.2s; }
.hero-content-wrapper > *:nth-child(3) { animation-delay: 0.3s; }
.hero-content-wrapper > *:nth-child(4) { animation-delay: 0.4s; }

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Hero text */
.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: .6rem;
  padding: .5rem 1.2rem;
  background: rgba(196,168,130,.12);
  border: 1px solid rgba(196,168,130,.3);
  border-radius: 50px;
  backdrop-filter: blur(8px);
  margin-bottom: 1.8rem;
  animation: fadeSlideDown .8s ease both;
}

.badge-dot {
  width: 8px; height: 8px;
  background: #4ade80;
  border-radius: 50%;
  animation: blink 1.5s ease-in-out infinite;
}

@keyframes blink {
  0%,100% { opacity: 1; box-shadow: 0 0 0 0 rgba(74,222,128,.5); }
  50% { opacity: .7; box-shadow: 0 0 0 6px rgba(74,222,128,0); }
}

.hero-title {
  font-size: clamp(3rem, 8vw, 6rem);
  font-weight: 900;
  line-height: 1.05;
  color: #fff;
  animation: fadeSlideDown .9s .1s ease both;
}

.hero-title .line-gold {
  display: block;
  background: linear-gradient(135deg, var(--gold) 0%, #fff 50%, var(--gold) 100%);
  background-size: 200% auto;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  animation: shimmerText 4s linear infinite;
}

@keyframes shimmerText {
  0% { background-position: 200% center; }
  100% { background-position: -200% center; }
}

.hero-desc {
  font-size: 1.15rem;
  color: rgba(255,255,255,.7);
  line-height: 1.9;
  max-width: 520px;
  animation: fadeSlideDown .9s .2s ease both;
}

.hero-desc em {
  color: var(--gold);
  font-style: normal;
  font-weight: 700;
}

@keyframes fadeSlideDown {
  from { opacity: 0; transform: translateY(-20px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* Hero CTA buttons */
.btn-hero-primary {
  display: inline-flex; align-items: center; gap: .6rem;
  padding: .85rem 2rem;
  background: linear-gradient(135deg, var(--g1), var(--teal));
  color: #fff; font-weight: 800; font-size: 1rem;
  border-radius: 14px; text-decoration: none;
  border: none; cursor: pointer;
  position: relative; overflow: hidden;
  box-shadow: 0 8px 32px rgba(45,94,58,.5);
  transition: all .35s ease;
  animation: fadeSlideDown .9s .3s ease both;
}

.btn-hero-primary::before {
  content: '';
  position: absolute; top: 0; left: -100%; right: 100%; bottom: 0;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,.15), transparent);
  transition: all .5s ease;
}

.btn-hero-primary:hover::before { left: 100%; right: -100%; }
.btn-hero-primary:hover {
  transform: translateY(-3px);
  box-shadow: 0 16px 48px rgba(45,94,58,.6);
  color: #fff;
}

.btn-hero-outline {
  display: inline-flex; align-items: center; gap: .6rem;
  padding: .85rem 2rem;
  background: rgba(255,255,255,.07);
  border: 1.5px solid rgba(255,255,255,.2);
  color: rgba(255,255,255,.9); font-weight: 700; font-size: 1rem;
  border-radius: 14px; text-decoration: none;
  backdrop-filter: blur(8px);
  transition: all .3s ease;
  animation: fadeSlideDown .9s .4s ease both;
}

.btn-hero-outline:hover {
  background: rgba(255,255,255,.14);
  border-color: rgba(255,255,255,.4);
  color: #fff;
  transform: translateY(-3px);
}

/* Trust badges */
.trust-item {
  display: flex; align-items: center; gap: .6rem;
  animation: fadeSlideDown .9s .5s ease both;
}

.trust-icon {
  width: 38px; height: 38px;
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: .9rem;
}

/* Hero right card */
.hero-card {
  background: rgba(255,255,255,.06);
  backdrop-filter: blur(24px);
  border: 1px solid rgba(255,255,255,.1);
  border-radius: 28px;
  padding: 2.5rem;
  position: relative;
  overflow: hidden;
  animation: cardReveal 1s .3s ease both;
}

.hero-card::before {
  content: '';
  position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, transparent, var(--gold), var(--g1), var(--gold), transparent);
}

@keyframes cardReveal {
  from { opacity: 0; transform: translateX(40px) scale(.95); }
  to   { opacity: 1; transform: translateX(0) scale(1); }
}

.stat-block {
  background: rgba(255,255,255,.05);
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 18px;
  padding: 1.4rem 1rem;
  text-align: center;
  transition: all .3s ease;
  cursor: default;
}

.stat-block:hover {
  background: rgba(45,94,58,.25);
  border-color: rgba(45,94,58,.4);
  transform: translateY(-4px);
}

.stat-num {
  font-size: 2.5rem;
  font-weight: 900;
  background: linear-gradient(135deg, var(--gold), #fff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  line-height: 1;
  margin-bottom: .35rem;
}

.stat-label { color: rgba(255,255,255,.75); font-size: .85rem; font-weight: 600; }
.stat-sub   { color: rgba(255,255,255,.4); font-size: .72rem; margin-top: 2px; }

/* ══ SEARCH SECTION ════════════════════════════════ */
.search-section {
  background: var(--cream);
  padding: 5rem 0 4rem;
  position: relative;
}

.search-section::before {
  content: '';
  position: absolute; top: 0; left: 0; right: 0; height: 4px;
  background: linear-gradient(90deg, var(--g1), var(--gold), var(--teal));
}

.search-wrap {
  position: relative;
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 8px 48px rgba(45,94,58,.1), 0 0 0 1px rgba(196,168,130,.2);
  overflow: hidden;
  transition: box-shadow .3s;
}

.search-wrap:focus-within {
  box-shadow: 0 12px 64px rgba(45,94,58,.15), 0 0 0 2px var(--g1);
}

.search-input {
  width: 100%; padding: 1.2rem 1.5rem 1.2rem 7rem;
  font-size: 1.05rem; font-family: 'Tajawal', sans-serif;
  border: none; background: transparent; outline: none;
  color: var(--dark);
}

.search-icon-wrap {
  position: absolute; top: 50%; left: 1.2rem;
  transform: translateY(-50%);
  width: 44px; height: 44px;
  background: linear-gradient(135deg, var(--g1), var(--teal));
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 1rem;
}

.search-btn {
  position: absolute; top: 50%; right: 1rem;
  transform: translateY(-50%);
  padding: .65rem 1.6rem;
  background: var(--g1); color: #fff;
  font-weight: 800; font-size: .9rem;
  border: none; border-radius: 12px;
  font-family: 'Tajawal', sans-serif;
  cursor: pointer; transition: all .25s;
}

.search-btn:hover { background: var(--dark); transform: translateY(-50%) scale(1.04); }

/* Quick category pills */
.cat-pill {
  display: inline-flex; align-items: center; gap: .5rem;
  padding: .5rem 1.1rem;
  background: #fff;
  border: 1.5px solid rgba(45,94,58,.15);
  border-radius: 50px;
  font-size: .85rem; font-weight: 700;
  color: var(--dark); text-decoration: none;
  transition: all .25s ease;
  white-space: nowrap;
}

.cat-pill i { font-size: .8rem; }
.cat-pill:hover {
  background: var(--g1); color: #fff;
  border-color: var(--g1);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(45,94,58,.25);
}

/* ══ FEATURES SECTION ══════════════════════════════ */
.features-section {
  background: #fff;
  padding: 6rem 0;
  position: relative;
  overflow: hidden;
}

.features-section::before {
  content: '';
  position: absolute;
  width: 600px; height: 600px; border-radius: 50%;
  background: radial-gradient(circle, rgba(45,94,58,.04) 0%, transparent 70%);
  top: -100px; right: -100px;
  pointer-events: none;
}

.section-badge {
  display: inline-flex; align-items: center; gap: .5rem;
  padding: .4rem 1rem;
  background: rgba(45,94,58,.08);
  border-radius: 50px;
  font-size: .8rem; font-weight: 700;
  color: var(--g1);
  margin-bottom: .8rem;
}

.section-title {
  font-size: clamp(1.8rem, 4vw, 2.6rem);
  font-weight: 900;
  color: var(--dark);
  line-height: 1.2;
}

.section-title .accent {
  color: var(--g1);
  position: relative;
}

.section-title .accent::after {
  content: '';
  position: absolute; bottom: -4px; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--gold), var(--g1));
  border-radius: 2px;
}

.feature-card {
  background: var(--cream);
  border: 1.5px solid rgba(45,94,58,.08);
  border-radius: 24px;
  padding: 2.2rem;
  height: 100%;
  transition: all .35s cubic-bezier(.4,0,.2,1);
  position: relative;
  overflow: hidden;
}

.feature-card::before {
  content: '';
  position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, var(--g1), var(--gold));
  transform: scaleX(0); transform-origin: right;
  transition: transform .35s ease;
}

.feature-card:hover {
  transform: translateY(-8px);
  border-color: rgba(45,94,58,.2);
  box-shadow: 0 24px 64px rgba(45,94,58,.1);
  background: #fff;
}

.feature-card:hover::before { transform: scaleX(1); }

.feature-icon {
  width: 64px; height: 64px;
  border-radius: 18px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.5rem; color: #fff;
  margin-bottom: 1.4rem;
  transition: transform .4s cubic-bezier(.34,1.56,.64,1);
}

.feature-card:hover .feature-icon { transform: scale(1.12) rotate(-6deg); }

.feature-title { font-size: 1.1rem; font-weight: 800; color: var(--dark); margin-bottom: .6rem; }
.feature-desc  { font-size: .9rem; color: #6b7280; line-height: 1.75; }

/* ══ LATEST CONTENT ════════════════════════════════ */
.latest-section {
  background: var(--cream);
  padding: 6rem 0;
}

.content-card {
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  border: 1px solid rgba(196,168,130,.2);
  transition: all .3s ease;
  height: 100%;
}

.content-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 20px 60px rgba(45,94,58,.1);
}

.content-card-head {
  padding: 1.5rem 1.5rem 1.2rem;
  border-bottom: 1px solid rgba(196,168,130,.15);
  display: flex; align-items: center; gap: 1rem;
}

.content-head-icon {
  width: 44px; height: 44px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1rem; color: #fff;
  flex-shrink: 0;
}

.content-card-body { padding: 1.2rem 1.5rem; }

.content-item {
  display: flex; align-items: flex-start; gap: .8rem;
  padding: .9rem .8rem;
  border-radius: 12px;
  text-decoration: none; color: inherit;
  transition: all .2s ease;
  border-bottom: 1px solid rgba(196,168,130,.1);
}

.content-item:last-child { border-bottom: none; }
.content-item:hover {
  background: var(--cream);
  padding-right: 1.2rem;
}

.content-item-dot {
  width: 6px; height: 6px; border-radius: 50%;
  background: var(--g1); flex-shrink: 0; margin-top: 6px;
}

.content-item-title {
  font-size: .88rem; font-weight: 700; color: var(--dark);
  margin-bottom: 2px; line-height: 1.4;
  transition: color .2s;
}

.content-item:hover .content-item-title { color: var(--g1); }
.content-item-date { font-size: .72rem; color: #9ca3af; }

.content-card-foot {
  padding: 1rem 1.5rem;
  border-top: 1px solid rgba(196,168,130,.15);
  text-align: center;
}

.content-more {
  font-size: .85rem; font-weight: 700; color: var(--g1);
  text-decoration: none;
  display: inline-flex; align-items: center; gap: .4rem;
  transition: gap .2s;
}

.content-more:hover { gap: .8rem; color: var(--g1); }

/* ══ SECTIONS GRID ═════════════════════════════════ */
.sections-zone {
  background: #fff;
  padding: 6rem 0;
}

.section-tile {
  position: relative;
  background: var(--cream);
  border: 1.5px solid rgba(45,94,58,.08);
  border-radius: 20px;
  padding: 2rem 1.5rem;
  text-align: center;
  text-decoration: none; color: inherit;
  transition: all .35s cubic-bezier(.4,0,.2,1);
  overflow: hidden;
  display: block;
}

.section-tile::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(135deg, var(--g1), var(--teal));
  opacity: 0; transition: opacity .3s;
  border-radius: 18px;
}

.section-tile:hover { transform: translateY(-8px) scale(1.02); border-color: transparent; }
.section-tile:hover::before { opacity: 1; }
.section-tile:hover .tile-icon { transform: scale(1.2) rotate(-8deg); }
.section-tile:hover .tile-name { color: #fff; }
.section-tile:hover .tile-desc { color: rgba(255,255,255,.75); }

.tile-icon-wrap {
  position: relative; z-index: 1;
  width: 66px; height: 66px;
  border-radius: 18px;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 1.2rem;
  font-size: 1.6rem; color: #fff;
  transition: transform .4s cubic-bezier(.34,1.56,.64,1);
}

.tile-icon { transition: transform .4s cubic-bezier(.34,1.56,.64,1); font-size: 1.7rem; color: #fff; }

.tile-name { font-size: .95rem; font-weight: 800; color: var(--dark); margin-bottom: .3rem; position: relative; z-index: 1; transition: color .3s; }
.tile-desc { font-size: .75rem; color: #9ca3af; position: relative; z-index: 1; transition: color .3s; }

/* ══ CTA SECTION ═══════════════════════════════════ */
.cta-section {
  position: relative;
  overflow: hidden;
  padding: 7rem 0;
  background: var(--dark);
}

.cta-bg {
  position: absolute; inset: 0;
  background:
    radial-gradient(ellipse 70% 80% at 30% 50%, rgba(45,94,58,.5) 0%, transparent 60%),
    radial-gradient(ellipse 50% 60% at 80% 30%, rgba(58,125,110,.3) 0%, transparent 55%);
}

.cta-dots {
  position: absolute; inset: 0;
  background-image: radial-gradient(circle, rgba(196,168,130,.12) 1px, transparent 1px);
  background-size: 32px 32px;
}

.cta-title {
  font-size: clamp(2rem, 5vw, 3.5rem);
  font-weight: 900; color: #fff;
  line-height: 1.15;
}

.cta-title span { color: var(--gold); }

.btn-cta-main {
  display: inline-flex; align-items: center; gap: .7rem;
  padding: 1rem 2.4rem;
  background: linear-gradient(135deg, var(--g1), var(--teal));
  color: #fff; font-weight: 800; font-size: 1.05rem;
  border-radius: 16px; text-decoration: none;
  box-shadow: 0 8px 32px rgba(45,94,58,.5);
  transition: all .3s ease; position: relative; overflow: hidden;
}

.btn-cta-main:hover { transform: translateY(-3px); box-shadow: 0 16px 48px rgba(45,94,58,.6); color: #fff; }

.btn-cta-ghost {
  display: inline-flex; align-items: center; gap: .7rem;
  padding: 1rem 2.4rem;
  background: rgba(255,255,255,.08);
  border: 1.5px solid rgba(255,255,255,.2);
  color: rgba(255,255,255,.9); font-weight: 700; font-size: 1.05rem;
  border-radius: 16px; text-decoration: none;
  backdrop-filter: blur(8px);
  transition: all .3s ease;
}

.btn-cta-ghost:hover {
  background: rgba(255,255,255,.15);
  border-color: rgba(255,255,255,.4);
  color: #fff; transform: translateY(-3px);
}

/* ══ FLOATING NUMBERS (hero right) ════════════════ */
.floating-badge {
  position: absolute;
  background: rgba(255,255,255,.1);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,.15);
  border-radius: 16px;
  padding: .75rem 1.1rem;
  display: flex; align-items: center; gap: .7rem;
  animation: floatBadge 4s ease-in-out infinite;
}

.floating-badge.badge-right {
  top: -20px; left: -30px;
  animation-delay: 1s;
}

.floating-badge.badge-bottom {
  bottom: -20px; right: -20px;
  animation-delay: 2.5s;
}

@keyframes floatBadge {
  0%,100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

.fb-icon {
  width: 36px; height: 36px; border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: .9rem; color: #fff;
}

.fb-num { font-size: 1.2rem; font-weight: 900; color: #fff; line-height: 1; }
.fb-txt { font-size: .7rem; color: rgba(255,255,255,.6); }

/* ══ ANIMATIONS (AOS-like, CSS) ════════════════════ */
[data-reveal] {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity .7s ease, transform .7s ease;
}

[data-reveal].revealed {
  opacity: 1;
  transform: translateY(0);
}

[data-reveal-delay="1"] { transition-delay: .1s; }
[data-reveal-delay="2"] { transition-delay: .2s; }
[data-reveal-delay="3"] { transition-delay: .3s; }
[data-reveal-delay="4"] { transition-delay: .4s; }
[data-reveal-delay="5"] { transition-delay: .5s; }

/* Count up animation */
.countup { transition: all .5s; }

/* ══ RESPONSIVE ════════════════════════════════════ */
@media (max-width: 768px) {
  .hero-title { font-size: 2.8rem; }
  .hero-card { display: none; }
  .floating-badge { display: none; }
}
</style>
@endpush

@section('content')

{{-- ══════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════ --}}
<section class="hero-section" style="font-family:'Tajawal',sans-serif">
  <div class="hero-mesh"></div>
  <div class="hero-glow-1"></div>
  <div class="hero-glow-2"></div>
  <div class="hero-glow-3"></div>
  <div class="hero-dots"></div>
  <div class="hero-lines"></div>
  
  <!-- Floating Shapes -->
  <div class="hero-shapes">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>

  <div class="container position-relative" style="z-index:2; padding: 6rem 1.5rem 5rem;">
    <div class="row align-items-center g-5">

      {{-- Left: Hero Content --}}
      <div class="col-lg-6">
        <div class="hero-content-wrapper" style="max-width: 600px;">
          
          <!-- Hero Header -->
          <div class="hero-header mb-5">
            <!-- Status Badge -->
            <div class="hero-badge d-inline-flex align-items-center gap-2 mb-4" 
                 style="background: linear-gradient(135deg, rgba(233,30,99,0.15), rgba(233,30,99,0.05)); 
                        backdrop-filter: blur(20px); 
                        padding: 0.625rem 1.25rem; 
                        border-radius: 100px; 
                        border: 1px solid rgba(233,30,99,0.2);
                        box-shadow: 0 8px 32px rgba(233,30,99,0.1);
                        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
              <div class="badge-indicator" style="width: 10px; height: 10px; background: var(--accent); border-radius: 50%; box-shadow: 0 0 20px rgba(233,30,99,0.6); animation: pulse 2s infinite;"></div>
              <span style="color: rgba(255,255,255,0.95); font-size: 0.875rem; font-weight: 600; letter-spacing: 0.025em;">منصة توعوية حكومية رسمية</span>
            </div>

            <!-- Main Title -->
            <div class="hero-title-section mb-4">
              <h1 class="hero-title" style="font-size: clamp(2.75rem, 6vw, 4rem); font-weight: 900; line-height: 1.05; color: white; margin: 0;">
                <span class="title-line" style="display: block; margin-bottom: 2.25rem;">
                  منصة
                  <span class="brand-name" style="background: linear-gradient(135deg, var(--gold) 0%, #f4e4d4 50%, var(--gold) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; position: relative; padding: 0 0.125rem;">وعي</span>
                </span>
                <span class="subtitle-line" style="display: block; font-size: clamp(2rem, 5vw, 2.5rem); font-weight: 700; opacity: 0.9; background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(255,255,255,0.7)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                  للتوعية الحكومية
                </span>
              </h1>
            </div>

            <!-- Description -->
            <div class="hero-description mb-5">
              <p class="hero-desc" style="font-size: 1.125rem; line-height: 1.7; color: rgba(255,255,255,0.8); margin: 0; font-weight: 400;">
                منصة توعوية متخصصة في 
                <span class="highlight-text" style="color: var(--accent); font-weight: 600; position: relative;">العادات الصحية والسلوكيات اليومية</span>
                <br class="d-none d-lg-block">
                نقدم 
                <span class="highlight-text" style="color: var(--gold); font-weight: 600; position: relative;">نصائح طبية وشرعية</span>
                لحياة صحية وسليمة.
              </p>
            </div>
          </div>

          <!-- Hero Actions -->
          <div class="hero-actions mb-6">
            <div class="actions-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
              <a href="{{ route('sections') }}" 
                 class="action-btn primary-action" 
                 style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; 
                        padding: 1rem 1.5rem; 
                        background: linear-gradient(135deg, var(--accent), var(--accent-dark)); 
                        border: none; 
                        border-radius: 16px; 
                        color: white; 
                        font-weight: 600; 
                        font-size: 1rem; 
                        text-decoration: none; 
                        box-shadow: 0 10px 30px rgba(233,30,99,0.4); 
                        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                        position: relative;
                        overflow: hidden;">
                <i class="bi bi-compass-fill action-icon"></i>
                <span>استكشف الأقسام</span>
                <div class="btn-shine" style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.6s;"></div>
              </a>
              
              <a href="{{ route('about') }}" 
                 class="action-btn secondary-action" 
                 style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; 
                        padding: 1rem 1.5rem; 
                        background: rgba(255,255,255,0.08); 
                        backdrop-filter: blur(20px); 
                        border: 2px solid rgba(255,255,255,0.2); 
                        border-radius: 16px; 
                        color: white; 
                        font-weight: 600; 
                        font-size: 1rem; 
                        text-decoration: none; 
                        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);">
                <i class="bi bi-info-circle action-icon"></i>
                <span>تعرف أكثر</span>
              </a>
            </div>
          </div>

          <!-- Trust Indicators -->
          <div class="trust-indicators">
            <div class="trust-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1.5rem;">
              <div class="trust-item" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); transition: all 0.3s ease;">
                <div class="trust-icon-wrapper" style="display: flex; align-items: center; justify-content: center; width: 48px; height: 48px; background: linear-gradient(135deg, rgba(44,95,45,0.2), rgba(44,95,45,0.1)); border-radius: 12px; backdrop-filter: blur(10px); border: 1px solid rgba(44,95,45,0.2);">
                  <i class="bi bi-heart-pulse-fill" style="color: #4A7C59; font-size: 1.25rem;"></i>
                </div>
                <div class="trust-content">
                  <div class="trust-label" style="color: rgba(255,255,255,0.9); font-size: 0.95rem; font-weight: 600; line-height: 1.2;">نصائح صحية</div>
                  <div class="trust-desc" style="color: rgba(255,255,255,0.6); font-size: 0.8rem; margin-top: 0.125rem;">موثوقة ومحدثة</div>
                </div>
              </div>

              <div class="trust-item" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); transition: all 0.3s ease;">
                <div class="trust-icon-wrapper" style="display: flex; align-items: center; justify-content: center; width: 48px; height: 48px; background: linear-gradient(135deg, rgba(196,168,130,0.2), rgba(196,168,130,0.1)); border-radius: 12px; backdrop-filter: blur(10px); border: 1px solid rgba(196,168,130,0.2);">
                  <i class="bi bi-shield-exclamation" style="color: var(--gold); font-size: 1.25rem;"></i>
                </div>
                <div class="trust-content">
                  <div class="trust-label" style="color: rgba(255,255,255,0.9); font-size: 0.95rem; font-weight: 600; line-height: 1.2;">وعي شرعي</div>
                  <div class="trust-desc" style="color: rgba(255,255,255,0.6); font-size: 0.8rem; margin-top: 0.125rem;">موجهات شرعية</div>
                </div>
              </div>

              <div class="trust-item" style="display: flex; align-items: center; gap: 1rem; padding: 1rem; background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); transition: all 0.3s ease;">
                <div class="trust-icon-wrapper" style="display: flex; align-items: center; justify-content: center; width: 48px; height: 48px; background: linear-gradient(135deg, rgba(44,95,45,0.2), rgba(44,95,45,0.1)); border-radius: 12px; backdrop-filter: blur(10px); border: 1px solid rgba(44,95,45,0.2);">
                  <i class="bi bi-people-fill" style="color: var(--gold); font-size: 1.25rem;"></i>
                </div>
                <div class="trust-content">
                  <div class="trust-label" style="color: rgba(255,255,255,0.9); font-size: 0.95rem; font-weight: 600; line-height: 1.2;">{{ number_format($stats['users_count'] ?? 0) }}+ مستفيد</div>
                  <div class="trust-desc" style="color: rgba(255,255,255,0.6); font-size: 0.8rem; margin-top: 0.125rem;">ينضمون يومياً</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Right: Stats card --}}
      <div class="col-lg-6 d-none d-lg-block">
        <div class="position-relative" style="max-width:480px; margin-right:auto;">

          {{-- Floating badges --}}
          <div class="floating-badge badge-right">
            <div class="fb-icon" style="background:rgba(74,222,128,.2)">
              <i class="bi bi-graph-up-arrow" style="color:#4ade80"></i>
            </div>
            <div>
              <div class="fb-num">+{{ number_format($stats['articles_count'] ?? 0) }}</div>
              <div class="fb-txt">مقال منشور</div>
            </div>
          </div>

          <div class="floating-badge badge-bottom">
            <div class="fb-icon" style="background:rgba(196,168,130,.2)">
              <i class="bi bi-star-fill" style="color:var(--gold)"></i>
            </div>
            <div>
              <div class="fb-num">{{ number_format($stats['videos_count'] ?? 0) }}</div>
              <div class="fb-txt">فيديو تعليمي</div>
            </div>
          </div>

          {{-- Main card --}}
          <div class="hero-card">
            <div class="text-center mb-4">
              <p style="color:rgba(255,255,255,.5); font-size:.78rem; font-weight:700; letter-spacing:.08em; text-transform:uppercase; margin-bottom:.4rem;">إحصائيات المنصة</p>
              <h3 style="color:#fff; font-size:1.3rem; font-weight:800;">أرقام حقيقية من مجتمعنا</h3>
            </div>

            <div class="row g-3">
              @php
                $heroStats = [
                  ['num' => $stats['articles_count'] ?? 0, 'label' => 'مقال', 'sub' => 'محتوى متخصص',   'icon' => 'bi-newspaper',     'color' => 'rgba(45,94,58,.35)'],
                  ['num' => $stats['videos_count']   ?? 0, 'label' => 'فيديو', 'sub' => 'محتوى مرئي',   'icon' => 'bi-play-circle-fill','color' => 'rgba(58,125,110,.35)'],
                  ['num' => $stats['books_count']    ?? 0, 'label' => 'كتاب',  'sub' => 'مكتبة رقمية',  'icon' => 'bi-book-fill',      'color' => 'rgba(196,168,130,.25)'],
                  ['num' => $stats['users_count']    ?? 0, 'label' => 'عضو',   'sub' => 'مجتمع نشط',    'icon' => 'bi-people-fill',    'color' => 'rgba(45,94,58,.4)'],
                ];
              @endphp
              @foreach($heroStats as $s)
              <div class="col-6">
                <div class="stat-block">
                  <div style="font-size:1.4rem; margin-bottom:.4rem;">
                    <i class="bi {{ $s['icon'] }}" style="color:var(--gold)"></i>
                  </div>
                  <div class="stat-num">{{ number_format($s['num']) }}</div>
                  <div class="stat-label">{{ $s['label'] }}</div>
                  <div class="stat-sub">{{ $s['sub'] }}</div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="text-center mt-4">
              <a href="{{ route('register') }}" class="btn-hero-primary" style="width:100%; justify-content:center;">
                <i class="bi bi-person-plus-fill"></i> انضم الينا الآن
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


</section>

{{-- ══════════════════════════════════════════════════
     SEARCH
══════════════════════════════════════════════════ --}}
<section class="search-section">
  <div class="container">

    <div class="text-center mb-4" data-reveal>
      <div class="section-badge"><i class="bi bi-search"></i> ابحث في المحتوى</div>
      <h2 class="section-title mb-2">ابحث عن <span class="accent">ما تحتاجه</span></h2>
      <p style="color:#6b7280; font-size:.95rem;">اكتشف آلاف المقالات والفيديوهات والكتب المتخصصة</p>
    </div>

    <div class="row justify-content-center mb-4" data-reveal data-reveal-delay="1">
      <div class="col-lg-8">
        <form action="{{ route('search') }}" method="GET">
          <div class="search-wrap">
            <div class="search-icon-wrap"><i class="bi bi-search"></i></div>
            <input class="search-input" type="text" name="q" placeholder="ابحث عن مقالات، فيديوهات، أو كتب...">
            <button type="submit" class="search-btn">بحث</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-2" data-reveal data-reveal-delay="2">
      @php
        $cats = [
          ['label'=>'علم النفس',  'icon'=>'bi-heart-pulse-fill', 'url'=> route('articles', ['author_type'=>'doctor'])],
          ['label'=>'الإدمان',    'icon'=>'bi-shield-heart-fill','url'=> route('addiction')],
          ['label'=>'فيديوهات',   'icon'=>'bi-play-circle-fill', 'url'=> route('videos')],
          ['label'=>'الكتب',      'icon'=>'bi-book-fill',        'url'=> route('books')],
          ['label'=>'القصص',      'icon'=>'bi-chat-quote-fill',  'url'=> route('stories.index')],
          ['label'=>'العادات',    'icon'=>'bi-trophy-fill',      'url'=> route('habits.index')],
        ];
      @endphp
      @foreach($cats as $cat)
        <a href="{{ $cat['url'] }}" class="cat-pill">
          <i class="bi {{ $cat['icon'] }}"></i> {{ $cat['label'] }}
        </a>
      @endforeach
    </div>

  </div>
</section>

{{-- ══════════════════════════════════════════════════
     FEATURES
══════════════════════════════════════════════════ --}}
<section class="features-section">
  <div class="container">

    <div class="text-center mb-5" data-reveal>
      <div class="section-badge" style="background: rgba(233,30,99,.1); color: var(--accent);"><i class="bi bi-stars"></i> خدمات التوعية</div>
      <h2 class="section-title">ماذا نقدم في <span style="color: var(--accent);">منصة وعي</span></h2>
    </div>

    <div class="row g-4">
      @php
        $features = [
          ['icon'=>'bi-heart-pulse-fill', 'bg'=>'linear-gradient(135deg,#2C5F2D,#4A7C59)', 'title'=>'العادات الصحية', 'desc'=>'نصائح يومية للعادات الصحية والسلوكيات الوقائية.'],
          ['icon'=>'bi-shield-exclamation', 'bg'=>'linear-gradient(135deg,#4A7C59,#3A7D6E)', 'title'=>'الوعي الشرعي', 'desc'=>'توجيهات شرعية للسلوكيات الصحية اليومية.'],
          ['icon'=>'bi-droplet', 'bg'=>'linear-gradient(135deg,#C4A882,#a8885e)', 'title'=>'النظافة الشخصية', 'desc'=>'كيفية الحفاظ على نظافة الجسم والبيئة المحيطة.'],
          ['icon'=>'bi-activity', 'bg'=>'linear-gradient(135deg,#1a2e20,#2C5F2D)', 'title'=>'الصحة العامة', 'desc'=>'معلومات طبية للوقاية من الأمراض والعادات الضارة.'],
          ['icon'=>'bi-house-heart', 'bg'=>'linear-gradient(135deg,#2C5F2D,#C4A882)', 'title'=>'عادات منزلية', 'desc'=>'سلوكيات صحية صحيحة داخل المنزل وخارجه.'],
          ['icon'=>'bi-book', 'bg'=>'linear-gradient(135deg,#3A7D6E,#1a2e20)', 'title'=>'المكتبة الصحية', 'desc'=>'مقالات وكتب عن العادات الصحية والطب الوقائي.'],
          ['icon'=>'bi-chat-heart-fill', 'bg'=>'linear-gradient(135deg,#1a2e20,#2C5F2D)', 'title'=>'تجارب المجتمع', 'desc'=>'شارك تجاربك واستفد من تجارب الآخرين.'],
          ['icon'=>'bi-phone', 'bg'=>'linear-gradient(135deg,#a8885e,#C4A882)', 'title'=>'استشارات فورية', 'desc'=>'احصل على إجابات لأسئلتك الصحية والشرعية.']
        ];
      @endphp

      @foreach($features as $i => $f)
      <div class="col-sm-6 col-lg-3" data-reveal data-reveal-delay="{{ ($i % 4) + 1 }}">
        <div class="feature-card">
          <div class="feature-icon" style="background:{{ $f['bg'] }}; box-shadow: 0 8px 24px rgba(0,0,0,.15);">
            <i class="bi {{ $f['icon'] }}"></i>
          </div>
          <div class="feature-title">{{ $f['title'] }}</div>
          <div class="feature-desc">{{ $f['desc'] }}</div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     LATEST CONTENT
══════════════════════════════════════════════════ --}}
<section class="latest-section">
  <div class="container">

    <div class="text-center mb-5" data-reveal>
      <div class="section-badge"><i class="bi bi-lightning-charge-fill"></i> أحدث المحتويات</div>
      <h2 class="section-title">آخر ما أُضيف إلى <span class="accent">المنصة</span></h2>
    </div>

    <div class="row g-4">

      {{-- Videos --}}
      <div class="col-lg-4" data-reveal data-reveal-delay="1">
        <div class="content-card">
          <div class="content-card-head">
            <div class="content-head-icon" style="background:linear-gradient(135deg,#3A7D6E,#2a6b5d)">
              <i class="bi bi-play-circle-fill"></i>
            </div>
            <div>
              <div style="font-weight:800; font-size:.95rem; color:var(--dark)">أحدث الفيديوهات</div>
              <div style="font-size:.72rem; color:#9ca3af">{{ $stats['videos_count'] ?? 0 }} فيديو منشور</div>
            </div>
          </div>
          <div class="content-card-body">
            @forelse(($featuredVideos ?? collect())->take(4) as $video)
            <a href="{{ route('videos.show', $video->slug) }}" class="content-item">
              <span class="content-item-dot" style="background:var(--teal)"></span>
              <div>
                <div class="content-item-title">{{ Str::limit($video->title, 55) }}</div>
                <div class="content-item-date">
                  <i class="bi bi-clock"></i>
                  @if($video->duration) {{ gmdate('i:s', $video->duration) }} · @endif
                  {{ $video->created_at->format('d M Y') }}
                </div>
              </div>
            </a>
            @empty
            <div class="text-center py-4 text-muted">
              <i class="bi bi-play-circle" style="font-size:2rem;opacity:.3"></i>
              <p class="mt-2 small">لا توجد فيديوهات حالياً</p>
            </div>
            @endforelse
          </div>
          <div class="content-card-foot">
            <a href="{{ route('videos') }}" class="content-more">
              عرض جميع الفيديوهات <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- Articles --}}
      <div class="col-lg-4" data-reveal data-reveal-delay="2">
        <div class="content-card">
          <div class="content-card-head">
            <div class="content-head-icon" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)">
              <i class="bi bi-newspaper"></i>
            </div>
            <div>
              <div style="font-weight:800; font-size:.95rem; color:var(--dark)">أحدث المقالات</div>
              <div style="font-size:.72rem; color:#9ca3af">{{ $stats['articles_count'] ?? 0 }} مقال منشور</div>
            </div>
          </div>
          <div class="content-card-body">
            @forelse(($featuredArticles ?? collect())->take(4) as $article)
            <a href="{{ route('articles.show', $article->slug) }}" class="content-item">
              <span class="content-item-dot"></span>
              <div>
                <div class="content-item-title">{{ Str::limit($article->title, 55) }}</div>
                <div class="content-item-date">
                  <i class="bi bi-calendar3"></i> {{ $article->created_at->format('d M Y') }}
                  @if($article->author) · {{ $article->author->first_name }} @endif
                </div>
              </div>
            </a>
            @empty
            <div class="text-center py-4 text-muted">
              <i class="bi bi-newspaper" style="font-size:2rem;opacity:.3"></i>
              <p class="mt-2 small">لا توجد مقالات حالياً</p>
            </div>
            @endforelse
          </div>
          <div class="content-card-foot">
            <a href="{{ route('articles') }}" class="content-more">
              عرض جميع المقالات <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- Books --}}
      <div class="col-lg-4" data-reveal data-reveal-delay="3">
        <div class="content-card">
          <div class="content-card-head">
            <div class="content-head-icon" style="background:linear-gradient(135deg,#C4A882,#a8885e)">
              <i class="bi bi-book-fill"></i>
            </div>
            <div>
              <div style="font-weight:800; font-size:.95rem; color:var(--dark)">أحدث الكتب</div>
              <div style="font-size:.72rem; color:#9ca3af">{{ $stats['books_count'] ?? 0 }} كتاب متاح</div>
            </div>
          </div>
          <div class="content-card-body">
            @forelse(($featuredBooks ?? collect())->take(4) as $book)
            <a href="{{ route('books.show', $book->slug) }}" class="content-item">
              <span class="content-item-dot" style="background:var(--gold2)"></span>
              <div>
                <div class="content-item-title">{{ Str::limit($book->title, 55) }}</div>
                <div class="content-item-date">
                  <i class="bi bi-person"></i> {{ $book->author_name }}
                  @if($book->pages) · {{ $book->pages }} صفحة @endif
                </div>
              </div>
            </a>
            @empty
            <div class="text-center py-4 text-muted">
              <i class="bi bi-book" style="font-size:2rem;opacity:.3"></i>
              <p class="mt-2 small">لا توجد كتب حالياً</p>
            </div>
            @endforelse
          </div>
          <div class="content-card-foot">
            <a href="{{ route('books') }}" class="content-more">
              عرض جميع الكتب <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     HEALTH TIPS
══════════════════════════════════════════════════ --}}
<section class="latest-section">
  <div class="container">

    <div class="text-center mb-5" data-reveal>
      <div class="section-badge"><i class="bi bi-heart-pulse-fill"></i> نصائح يومية</div>
      <h2 class="section-title">عادات <span class="accent">صحية وشرعية</span></h2>
      <p style="color:#6b7280; font-size:.95rem;">توجيهات طبية وشرعية لحياة صحية وسليمة</p>
    </div>

    <div class="row g-4">
      
      {{-- Health Habits Card --}}
      <div class="col-lg-6" data-reveal data-reveal-delay="1">
        <div class="content-card">
          <div class="content-card-head">
            <div class="content-head-icon" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)">
              <i class="bi bi-heart-pulse"></i>
            </div>
            <div>
              <div style="font-weight:800; font-size:.95rem; color:var(--dark)">عادات صحية يومية</div>
              <div style="font-size:.72rem; color:#9ca3af">نصائح طبية للوقاية</div>
            </div>
          </div>
          <div class="content-card-body">
            <div class="content-item">
              <span class="content-item-dot"></span>
              <div>
                <div class="content-item-title">تجنب إدخال الهاتف في الحمام</div>
                <div class="content-item-date">
                  <i class="bi bi-shield-exclamation"></i> خطر صحي ينقل البكتيريا والجراثيم
                </div>
              </div>
            </div>
            <div class="content-item">
              <span class="content-item-dot"></span>
              <div>
                <div class="content-item-title">لا تجلس طويلاً في الحمام</div>
                <div class="content-item-date">
                  <i class="bi bi-clock-history"></i> يرفع خطر الإصابة بالبواسير ومشاكل صحية
                </div>
              </div>
            </div>
            <div class="content-item">
              <span class="content-item-dot"></span>
              <div>
                <div class="content-item-title">نظافة الهاتف بانتظام</div>
                <div class="content-item-date">
                  <i class="bi bi-droplet"></i> استخدام مطهرات لتجنب نقل العدوى
                </div>
              </div>
            </div>
            <div class="content-item">
              <span class="content-item-dot"></span>
              <div>
                <div class="content-item-title">غسل اليدين بعد الحمام</div>
                <div class="content-item-date">
                  <i class="bi bi-soap"></i> أهمية غسل اليدين للمحافظة على الصحة
                </div>
              </div>
            </div>
          </div>
          <div class="content-card-foot">
            <a href="#" class="content-more">
              عرض جميع النصائح الصحية <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        </div>
      </div>

      {{-- Religious Guidance Card --}}
      <div class="col-lg-6" data-reveal data-reveal-delay="2">
        <div class="content-card">
          <div class="content-card-head">
            <div class="content-head-icon" style="background:linear-gradient(135deg,#C4A882,#a8885e)">
              <i class="bi bi-shield-exclamation"></i>
            </div>
            <div>
              <div style="font-weight:800; font-size:.95rem; color:var(--dark)">توجيهات شرعية</div>
              <div style="font-size:.72rem; color:#9ca3af">الوعي الشرعي للسلوكيات</div>
            </div>
          </div>
          <div class="content-card-body">
            <div class="content-item">
              <span class="content-item-dot" style="background:var(--gold2)"></span>
              <div>
                <div class="content-item-title">إدخال الهاتف في الحمام مكروه</div>
                <div class="content-item-date">
                  <i class="bi bi-book"></i> خاصة إذا كان عليه قرآن أو أذكار ظاهرة
                </div>
              </div>
            </div>
            <div class="content-item">
              <span class="content-item-dot" style="background:var(--gold2)"></span>
              <div>
                <div class="content-item-title">وضع الهاتف صامتاً في الجيب</div>
                <div class="content-item-date">
                  <i class="bi bi-bell-slash"></i> للحفاظ على الطهارة والاحترام
                </div>
              </div>
            </div>
            <div class="content-item">
              <span class="content-item-dot" style="background:var(--gold2)"></span>
              <div>
                <div class="content-item-title">لا حرج في الضرورة</div>
                <div class="content-item-date">
                  <i class="bi bi-shield-check"></i> إذا خشي على الهاتف من السرقة أو التلف
                </div>
              </div>
            </div>
            <div class="content-item">
              <span class="content-item-dot" style="background:var(--gold2)"></span>
              <div>
                <div class="content-item-title">النية والاحتساب في العادات</div>
                <div class="content-item-date">
                  <i class="bi bi-heart"></i> احتساب الأجر في العادات الصحية اليومية
                </div>
              </div>
            </div>
          </div>
          <div class="content-card-foot">
            <a href="#" class="content-more">
              عرض جميع التوجيهات الشرعية <i class="bi bi-arrow-left"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     SECTIONS GRID
══════════════════════════════════════════════════ --}}
<section class="sections-zone">
  <div class="container">
    <div class="text-center mb-5" data-reveal>
      <div class="section-badge"><i class="bi bi-grid-3x3-gap-fill"></i> تصفح الأقسام</div>
      <h2 class="section-title">كل ما في <span class="accent">منصة وعي</span></h2>
    </div>

    <div class="row g-3">
      @php
        $tiles = [
          ['icon'=>'bi-play-circle-fill','bg'=>'linear-gradient(135deg,#3A7D6E,#2D5E3A)', 'name'=>'الفيديوهات',       'desc'=>'محتوى مرئي',         'url'=> route('videos')],
          ['icon'=>'bi-newspaper',       'bg'=>'linear-gradient(135deg,#2D5E3A,#3A7D6E)', 'name'=>'المقالات',         'desc'=>'محتوى علمي',         'url'=> route('articles')],
          ['icon'=>'bi-book-fill',       'bg'=>'linear-gradient(135deg,#C4A882,#a8885e)', 'name'=>'المكتبة',           'desc'=>'كتب للتحميل',        'url'=> route('books')],
          ['icon'=>'bi-chat-quote-fill', 'bg'=>'linear-gradient(135deg,#1e3f27,#2D5E3A)', 'name'=>'القصص والتجارب',   'desc'=>'شارك تجربتك',        'url'=> route('stories.index')],
          ['icon'=>'bi-trophy-fill',     'bg'=>'linear-gradient(135deg,#a8885e,#C4A882)', 'name'=>'العادات والإنجازات','desc'=>'ابدأ عادة جديدة',    'url'=> route('habits.index')],
          ['icon'=>'bi-shield-heart-fill','bg'=>'linear-gradient(135deg,#1a2e20,#2D5E3A)','name'=>'وعي للإدمان',      'desc'=>'دعم التعافي',        'url'=> route('addiction')],
          ['icon'=>'bi-envelope-heart',  'bg'=>'linear-gradient(135deg,#2D5E3A,#C4A882)', 'name'=>'رسالة المستقبل',   'desc'=>'راسل نفسك',          'url'=> route('future-message.index')],
          ['icon'=>'bi-robot',           'bg'=>'linear-gradient(135deg,#3A7D6E,#1a2e20)', 'name'=>'المساعد الذكي',    'desc'=>'دعم فوري بالذكاء',   'url'=> route('ai-assistant')],
          ['icon'=>'bi-person-check-fill','bg'=>'linear-gradient(135deg,#a8885e,#3A7D6E)', 'name'=>'رحلة وعي',        'desc'=>'ابدأ رحلتك',         'url'=> route('journey')],
        ];
      @endphp

      @foreach($tiles as $i => $t)
      <div class="col-6 col-sm-4 col-lg-2-4" data-reveal data-reveal-delay="{{ ($i % 5) + 1 }}" style="flex:0 0 auto; width: calc(100% / {{ count($tiles) <= 5 ? count($tiles) : 4 }})">
        <a href="{{ $t['url'] }}" class="section-tile">
          <div class="tile-icon-wrap" style="background:{{ $t['bg'] }}">
            <i class="bi {{ $t['icon'] }} tile-icon"></i>
          </div>
          <div class="tile-name">{{ $t['name'] }}</div>
          <div class="tile-desc">{{ $t['desc'] }}</div>
        </a>
      </div>
      @endforeach

    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════════
     CTA
══════════════════════════════════════════════════ --}}
<section class="cta-section" style="font-family:'Tajawal',sans-serif">
  <div class="cta-bg"></div>
  <div class="cta-dots"></div>

  <div class="container position-relative" style="z-index:2">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center" data-reveal>

        <div class="section-badge mb-3" style="background:rgba(196,168,130,.12); color:var(--gold);">
          <i class="bi bi-rocket-takeoff-fill"></i> ابدأ رحلتك
        </div>

        <h2 class="cta-title mb-3">
          انضم إلى مجتمع <span>وعي</span><br>وتعلم العادات الصحية
        </h2>
        <p style="color:rgba(255,255,255,.65); font-size:1.05rem; margin-bottom:2.5rem; max-width:500px; margin-right:auto; margin-left:auto;">
          أكثر من {{ number_format($stats['users_count'] ?? 0) }} مستفيد يتعلمون العادات الصحية. انضم الآن وابدأ رحلتك نحو حياة صحية وسليمة.
        </p>

        <div class="d-flex flex-wrap gap-3 justify-content-center">
          @guest
          <a href="{{ route('register') }}" class="btn-cta-main">
            <i class="bi bi-person-plus-fill"></i> إنشاء حساب مجاني
          </a>
          <a href="{{ route('login') }}" class="btn-cta-ghost">
            <i class="bi bi-box-arrow-in-right"></i> تسجيل الدخول
          </a>
          @else
          <a href="{{ route('sections') }}" class="btn-cta-main">
            <i class="bi bi-compass-fill"></i> تصفح الأقسام
          </a>
          <a href="{{ route('journey') }}" class="btn-cta-ghost">
            <i class="bi bi-person-check-fill"></i> ابدأ رحلة وعي
          </a>
          @endguest
        </div>

      </div>
    </div>
  </div>
</section>

<style>
/* Hero Section - Professional Design */
.hero-content-wrapper {
  animation: fadeInUp 0.8s ease-out;
}

/* Status Badge */
.hero-badge {
  animation: slideInLeft 0.6s ease-out 0.2s both;
}

.hero-badge:hover {
  transform: translateY(-3px) scale(1.02);
  background: linear-gradient(135deg, rgba(233,30,99,0.2), rgba(233,30,99,0.08));
  box-shadow: 0 12px 40px rgba(233,30,99,0.15);
}

.badge-indicator {
  animation: pulse 2s infinite, glow 3s ease-in-out infinite;
}

/* Title Section */
.hero-title-section {
  animation: fadeInUp 0.8s ease-out 0.4s both;
}

.brand-name {
  background-size: 200% auto;
  animation: shimmerGradient 3s ease-in-out infinite;
}

.brand-name::after {
  content: '';
  position: absolute;
  bottom: -8px;
  left: 50%;
  transform: translateX(-50%);
  width: 80%;
  height: 3px;
  background: linear-gradient(90deg, transparent, var(--gold), transparent);
  border-radius: 2px;
  animation: slideUnderline 2s ease-in-out infinite;
}

/* Description */
.hero-description {
  animation: fadeInUp 0.8s ease-out 0.6s both;
}

.highlight-text {
  position: relative;
}

.highlight-text::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 100%;
  height: 2px;
  background: currentColor;
  border-radius: 1px;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.4s ease;
}

.hero-description:hover .highlight-text::after {
  transform: scaleX(1);
  transform-origin: left;
}

/* Action Buttons */
.hero-actions {
  animation: fadeInUp 0.8s ease-out 0.8s both;
}

.action-btn {
  position: relative;
  overflow: hidden;
}

.action-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
  transition: left 0.6s ease;
}

.primary-action:hover::before {
  left: 100%;
}

.primary-action:hover {
  transform: translateY(-4px) scale(1.02);
  box-shadow: 0 15px 40px rgba(233,30,99,0.5) !important;
  background: linear-gradient(135deg, var(--accent-dark), var(--accent)) !important;
}

.secondary-action:hover {
  transform: translateY(-4px) scale(1.02);
  background: rgba(255,255,255,0.15) !important;
  border-color: rgba(255,255,255,0.4) !important;
  box-shadow: 0 15px 40px rgba(255,255,255,0.2) !important;
}

.action-icon {
  transition: transform 0.3s ease;
}

.action-btn:hover .action-icon {
  transform: scale(1.1) rotate(5deg);
}

/* Trust Indicators */
.trust-indicators {
  animation: fadeInUp 0.8s ease-out 1s both;
}

.trust-item {
  position: relative;
  overflow: hidden;
}

.trust-item::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);
  transition: left 0.6s ease;
}

.trust-item:hover::before {
  left: 100%;
}

.trust-item:hover {
  transform: translateY(-4px) scale(1.02);
  background: rgba(255,255,255,0.08) !important;
  box-shadow: 0 12px 30px rgba(0,0,0,0.1);
}

.trust-item:hover .trust-icon-wrapper {
  transform: scale(1.05);
  box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.trust-icon-wrapper {
  transition: all 0.3s ease;
}

/* Animations */
@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.8; transform: scale(1.2); }
}

@keyframes glow {
  0%, 100% { box-shadow: 0 0 20px rgba(233,30,99,0.6); }
  50% { box-shadow: 0 0 30px rgba(233,30,99,0.8); }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-30px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes shimmerGradient {
  0%, 100% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
}

@keyframes slideUnderline {
  0%, 100% { opacity: 0.3; transform: translateX(-50%) scaleX(0.8); }
  50% { opacity: 1; transform: translateX(-50%) scaleX(1); }
}

/* Responsive Design */
@media (max-width: 992px) {
  .hero-content-wrapper {
    max-width: 100% !important;
  }
  
  .actions-grid {
    grid-template-columns: 1fr !important;
    gap: 0.75rem !important;
  }
  
  .trust-grid {
    grid-template-columns: 1fr !important;
    gap: 1rem !important;
  }
}

@media (max-width: 768px) {
  .hero-title {
    font-size: clamp(2rem, 8vw, 2.5rem) !important;
  }
  
  .subtitle-line {
    font-size: clamp(1.5rem, 6vw, 1.8rem) !important;
  }
  
  .hero-desc {
    font-size: 1rem !important;
  }
  
  .trust-item {
    padding: 0.75rem !important;
  }
  
  .trust-icon-wrapper {
    width: 40px !important;
    height: 40px !important;
  }
  
  .trust-label {
    font-size: 0.875rem !important;
  }
  
  .trust-desc {
    font-size: 0.75rem !important;
  }
}

@media (max-width: 576px) {
  .hero-badge {
    padding: 0.5rem 1rem !important;
    font-size: 0.8rem !important;
  }
  
  .action-btn {
    padding: 0.875rem 1.25rem !important;
    font-size: 0.9rem !important;
  }
  
  .hero-desc br {
    display: none !important;
  }
}
</style>

@endsection

@push('scripts')
<script>
// ── Performance optimizations ─────────────────────
// Use requestIdleCallback for non-critical operations
const scheduleWork = (callback) => {
  if ('requestIdleCallback' in window) {
    requestIdleCallback(callback);
  } else {
    setTimeout(callback, 1);
  }
};

// ── Optimized Reveal on scroll ───────────────────
scheduleWork(() => {
  const revealEls = document.querySelectorAll('[data-reveal]');
  if (!revealEls.length) return;
  
  const revealObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        requestAnimationFrame(() => {
          entry.target.classList.add('revealed');
        });
        revealObs.unobserve(entry.target);
      }
    });
  }, { 
    threshold: 0.12,
    rootMargin: '50px' // Start loading earlier
  });
  
  revealEls.forEach(el => revealObs.observe(el));
});

// ── Optimized Count-up animation ──────────────────
const countUp = (el, target, duration = 1200) => {
  let start = 0;
  const increment = target / (duration / 16);
  let lastTime = 0;
  
  const animate = (currentTime) => {
    if (!lastTime) lastTime = currentTime;
    const deltaTime = currentTime - lastTime;
    
    if (deltaTime >= 16) { // Throttle to ~60fps
      start += increment;
      const current = Math.min(Math.floor(start), target);
      el.textContent = current.toLocaleString('ar');
      lastTime = currentTime;
      
      if (current < target) {
        requestAnimationFrame(animate);
      }
    } else {
      requestAnimationFrame(animate);
    }
  };
  
  requestAnimationFrame(animate);
};

// ── Optimized stats observer ───────────────────────
scheduleWork(() => {
  const statNums = document.querySelectorAll('.stat-num');
  if (!statNums.length) return;
  
  const statsObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const raw = entry.target.textContent.replace(/,/g, '').trim();
        const target = parseInt(raw) || 0;
        
        // Only animate if target is reasonable
        if (target > 0 && target < 100000) {
          requestAnimationFrame(() => {
            countUp(entry.target, target);
          });
        }
        
        statsObs.unobserve(entry.target);
      }
    });
  }, { 
    threshold: 0.5,
    rootMargin: '50px'
  });
  
  statNums.forEach(el => statsObs.observe(el));
});

// ── Debounced resize handler ───────────────────────
const debounce = (func, wait) => {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
};

// ── Optimized tiles layout ─────────────────────────
const updateTilesLayout = debounce(() => {
  const tiles = document.querySelectorAll('.col-lg-2-4');
  tiles.forEach(el => {
    el.style.flex = '0 0 auto';
    const width = window.innerWidth >= 992 ? '20%' : 
                  window.innerWidth >= 576 ? '33.33%' : '50%';
    el.style.width = width;
  });
}, 100);

// Only add resize listener if tiles exist
if (document.querySelector('.col-lg-2-4')) {
  // Initial layout
  updateTilesLayout();
  // Add debounced resize listener
  window.addEventListener('resize', updateTilesLayout, { passive: true });
}

// ── Preload critical resources ─────────────────────
if ('requestIdleCallback' in window) {
  requestIdleCallback(() => {
    // Preload images that might be needed later
    const images = document.querySelectorAll('img[data-src]');
    images.forEach(img => {
      if (img.dataset.src) {
        img.src = img.dataset.src;
        img.removeAttribute('data-src');
      }
    });
  });
}
</script>
@endpush