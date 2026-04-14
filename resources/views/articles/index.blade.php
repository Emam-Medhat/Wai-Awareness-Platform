@extends('layouts.app')
@section('title', 'المقالات الصحية')

@push('styles')
<style>
/* ════════════════════════════════════════════════
   WA3Y ARTICLES — TOKENS
════════════════════════════════════════════════ */
:root{
  --g1:#2D5E3A;--g2:#3d7a4e;--teal:#3A7D6E;--teal2:#2a6b5d;
  --gold:#C4A882;--gold2:#a8885e;--gold3:#e8d5b7;
  --cream:#F0EFEC;--dark:#1a2e20;--ink:#232f26;
  --muted:#6b7280;--bd:rgba(45,94,58,.12);
  --sh-sm:0 2px 12px rgba(45,94,58,.07);
  --sh-md:0 8px 32px rgba(45,94,58,.11);
  --sh-lg:0 24px 64px rgba(45,94,58,.15);
  --r-sm:12px;--r-md:18px;--r-lg:24px;
}
.ap{font-family:'Tajawal',sans-serif}

/* ════ 1. HERO ════════════════════════════════ */
.ap-hero{
  min-height:82vh;background:var(--dark);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.ap-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 65% at 12% 15%,rgba(45,94,58,.65) 0%,transparent 55%),
    radial-gradient(ellipse 55% 75% at 90% 85%,rgba(58,125,110,.4) 0%,transparent 55%),
    linear-gradient(165deg,#0c1c11 0%,#1a2e20 52%,#0a1409 100%);
}
.ap-hero-grid{
  position:absolute;inset:0;
  background-image:
    linear-gradient(rgba(196,168,130,.065) 1px,transparent 1px),
    linear-gradient(90deg,rgba(196,168,130,.065) 1px,transparent 1px);
  background-size:54px 54px;animation:gridMove 28s linear infinite;
}
@keyframes gridMove{to{background-position:54px 54px}}
.ap-shape{
  position:absolute;border-radius:4px;
  background:linear-gradient(135deg,rgba(196,168,130,.12),rgba(45,94,58,.08));
  border:1px solid rgba(196,168,130,.1);animation:shapeFlt 14s ease-in-out infinite;
}
.ap-shape:nth-child(3){width:52px;height:68px;top:8%;right:6%}
.ap-shape:nth-child(4){width:36px;height:48px;top:72%;right:18%;animation-delay:5s}
.ap-shape:nth-child(5){width:64px;height:84px;top:28%;left:3%;animation-delay:9s}
@keyframes shapeFlt{
  0%,100%{transform:translateY(0) rotate(0deg) scale(1)}
  33%{transform:translateY(-20px) rotate(5deg) scale(1.03)}
  66%{transform:translateY(10px) rotate(-4deg) scale(.97)}
}
.ap-orb{position:absolute;border-radius:50%;filter:blur(80px);pointer-events:none}
.ap-orb-1{width:520px;height:520px;background:rgba(45,94,58,.27);top:-130px;right:-100px;animation:orbPls 9s ease-in-out infinite}
.ap-orb-2{width:380px;height:380px;background:rgba(58,125,110,.18);bottom:-80px;left:-60px;animation:orbPls 11s ease-in-out infinite reverse}
@keyframes orbPls{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.24);opacity:.55}}
.ap-wave{position:absolute;bottom:-2px;left:0;right:0}

@keyframes apIn{from{opacity:0;transform:translateY(26px)}to{opacity:1;transform:translateY(0)}}
@keyframes apRight{from{opacity:0;transform:translateX(40px) scale(.94)}to{opacity:1;transform:translateX(0) scale(1)}}
@keyframes apGold{0%{background-position:200% center}100%{background-position:-200% center}}
@keyframes apBlink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 7px rgba(74,222,128,0)}}
.ap-tag  {animation:apIn .7s .1s ease both}
.ap-h1   {animation:apIn .8s .2s ease both}
.ap-p    {animation:apIn .8s .35s ease both}
.ap-ctas {animation:apIn .8s .5s ease both}
.ap-stats{animation:apIn .8s .65s ease both;opacity:0}
.ap-right{animation:apRight 1s .3s ease both}
.ap-dot{width:8px;height:8px;border-radius:50%;background:#4ade80;animation:apBlink 1.6s infinite;flex-shrink:0}
.gold-shine{
  background:linear-gradient(135deg,var(--gold) 0%,#fff 50%,var(--gold) 100%);
  background-size:200% auto;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  animation:apGold 4s linear infinite;
}
/* stat cards in hero */
.ap-stat-card{
  background:rgba(255,255,255,.06);backdrop-filter:blur(16px);
  border:1px solid rgba(255,255,255,.1);border-radius:18px;
  padding:1.2rem 1.5rem;text-align:center;transition:all .3s;
}
.ap-stat-card:hover{background:rgba(45,94,58,.25);border-color:rgba(45,94,58,.4);transform:translateY(-5px)}
.ap-stat-num{
  font-size:2.2rem;font-weight:900;line-height:1;margin-bottom:.3rem;
  background:linear-gradient(135deg,var(--gold),#fff);
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
}
.ap-stat-lbl{color:rgba(255,255,255,.6);font-size:.8rem;font-weight:600}
/* mockup right */
.ap-chip{
  position:absolute;background:rgba(255,255,255,.07);backdrop-filter:blur(14px);
  border:1px solid rgba(255,255,255,.12);border-radius:16px;
  padding:.75rem 1.1rem;display:flex;align-items:center;gap:.65rem;
}
.ap-chip-ico{width:34px;height:34px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
@keyframes chipFlt{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
.ap-mockup{
  background:rgba(255,255,255,.05);backdrop-filter:blur(24px);
  border:1px solid rgba(255,255,255,.1);border-radius:var(--r-lg);
  padding:1.8rem;position:relative;overflow:hidden;
}
.ap-mockup::before{
  content:'';position:absolute;top:0;left:0;right:0;height:2px;
  background:linear-gradient(90deg,transparent,var(--gold),var(--g1),var(--gold),transparent);
}
.ap-mock-line{height:10px;border-radius:5px;margin-bottom:.7rem;background:rgba(255,255,255,.08)}
.ap-mock-line.w100{width:100%}.ap-mock-line.w75{width:75%}.ap-mock-line.w88{width:88%}
.ap-mock-line.w60{width:60%}.ap-mock-line.w45{width:45%}
.ap-mock-line.gold{background:linear-gradient(90deg,var(--gold),rgba(196,168,130,.4));height:14px}
.ap-mock-tag{display:inline-flex;align-items:center;gap:.45rem;padding:.35rem .9rem;border-radius:20px;font-size:.72rem;font-weight:700;color:#fff;margin-bottom:1rem}
.ap-mock-avatar{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;font-size:.85rem;font-weight:800;color:#fff;flex-shrink:0}
/* CTA buttons */
.btn-ap-pri{
  display:inline-flex;align-items:center;gap:.6rem;
  padding:.9rem 2rem;background:linear-gradient(135deg,var(--g1),var(--teal));
  color:#fff;font-weight:800;border-radius:14px;text-decoration:none;
  box-shadow:0 8px 32px rgba(45,94,58,.45);transition:all .35s;position:relative;overflow:hidden;
}
.btn-ap-pri::before{content:'';position:absolute;top:0;left:-100%;right:100%;bottom:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,.14),transparent);transition:all .5s}
.btn-ap-pri:hover::before{left:100%;right:-100%}
.btn-ap-pri:hover{transform:translateY(-3px);box-shadow:0 16px 48px rgba(45,94,58,.55);color:#fff}
.btn-ap-ghost{
  display:inline-flex;align-items:center;gap:.6rem;
  padding:.9rem 2rem;background:rgba(255,255,255,.07);
  border:1.5px solid rgba(255,255,255,.2);color:rgba(255,255,255,.9);
  font-weight:700;border-radius:14px;text-decoration:none;backdrop-filter:blur(8px);transition:all .3s;
}
.btn-ap-ghost:hover{background:rgba(255,255,255,.15);border-color:rgba(255,255,255,.4);color:#fff;transform:translateY(-3px)}

/* ════ 2. LAYOUT (sidebar + main) ════════════ */
.ap-layout{
  display:grid;
  grid-template-columns:270px 1fr;
  gap:1.75rem;align-items:start;
  padding:2rem 1.5rem 4rem;
  max-width:1400px;margin:0 auto;
}
/* sidebar sticky */
.ap-sidebar{
  position:sticky;top:84px;
  max-height:calc(100vh - 100px);
  overflow-y:auto;
  scrollbar-width:thin;scrollbar-color:rgba(196,168,130,.3) transparent;
}
.ap-sidebar::-webkit-scrollbar{width:4px}
.ap-sidebar::-webkit-scrollbar-thumb{background:rgba(196,168,130,.3);border-radius:2px}

/* filter panel */
.filter-panel{background:#fff;border-radius:20px;border:1px solid var(--bd);box-shadow:var(--sh-md);overflow:hidden}
.filter-panel::before{content:'';display:block;height:3px;background:linear-gradient(90deg,var(--g1),var(--teal),var(--gold))}
.filter-head{
  padding:1.2rem 1.4rem;border-bottom:1px solid rgba(196,168,130,.12);
  display:flex;align-items:center;justify-content:space-between;
}
.filter-head-title{display:flex;align-items:center;gap:.6rem;font-size:.92rem;font-weight:800;color:var(--dark)}
.filter-head-ico{
  width:32px;height:32px;border-radius:9px;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  display:flex;align-items:center;justify-content:center;color:#fff;font-size:.8rem;flex-shrink:0;
}
.filter-clear-all{
  display:inline-flex;align-items:center;gap:.3rem;
  padding:.28rem .7rem;border:1.5px solid rgba(196,168,130,.3);
  border-radius:20px;color:var(--gold2);font-size:.72rem;font-weight:700;
  text-decoration:none;transition:all .22s;
}
.filter-clear-all:hover{background:var(--gold2);color:#fff;border-color:var(--gold2)}
.filter-body{padding:1.2rem 1.4rem}
/* search */
.f-search-wrap{position:relative;margin-bottom:1.3rem}
.f-search-ico{
  position:absolute;right:.9rem;top:50%;transform:translateY(-50%);
  width:32px;height:32px;border-radius:8px;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  display:flex;align-items:center;justify-content:center;color:#fff;font-size:.78rem;
}
.f-search{
  width:100%;padding:.75rem .9rem .75rem 1rem;padding-right:52px;
  border:1.5px solid rgba(45,94,58,.12);border-radius:11px;
  font-size:.84rem;font-family:'Tajawal',sans-serif;
  background:var(--cream);color:var(--dark);transition:all .25s;
}
.f-search:focus{outline:none;border-color:var(--g1);box-shadow:0 0 0 3px rgba(45,94,58,.08);background:#fff}
.f-search::placeholder{color:#a0aba4}
/* sections */
.f-section{margin-bottom:1.2rem}
.f-sec-title{
  font-size:.7rem;font-weight:700;color:var(--gold2);
  letter-spacing:.07em;text-transform:uppercase;
  margin-bottom:.65rem;display:flex;align-items:center;gap:.4rem;
}
.f-sec-title::after{content:'';flex:1;height:1px;background:linear-gradient(90deg,rgba(196,168,130,.3),transparent)}
/* select */
.f-label{display:block;font-size:.73rem;font-weight:700;color:var(--g1);margin-bottom:.38rem;letter-spacing:.04em}
.f-select{
  width:100%;padding:.65rem .9rem;
  border:1.5px solid rgba(45,94,58,.12);border-radius:10px;
  font-size:.84rem;font-family:'Tajawal',sans-serif;
  background:var(--cream);color:var(--dark);transition:all .25s;cursor:pointer;
}
.f-select:focus{outline:none;border-color:var(--g1);box-shadow:0 0 0 3px rgba(45,94,58,.08);background:#fff}
.f-divider{height:1px;background:rgba(196,168,130,.15);margin:1.1rem 0}
/* apply/reset */
.f-apply{
  width:100%;padding:.7rem;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  color:#fff;border:none;border-radius:12px;
  font-family:'Tajawal',sans-serif;font-size:.88rem;font-weight:800;
  cursor:pointer;transition:all .28s;
  box-shadow:0 5px 18px rgba(45,94,58,.3);
  display:flex;align-items:center;justify-content:center;gap:.5rem;
}
.f-apply:hover{transform:translateY(-2px);box-shadow:0 10px 28px rgba(45,94,58,.4)}
.f-reset{
  width:100%;padding:.58rem;margin-top:.5rem;
  background:transparent;color:var(--muted);
  border:1.5px solid var(--bd);border-radius:12px;
  font-family:'Tajawal',sans-serif;font-size:.82rem;font-weight:600;
  cursor:pointer;transition:all .22s;
  display:flex;align-items:center;justify-content:center;gap:.45rem;text-decoration:none;
}
.f-reset:hover{border-color:var(--g1);color:var(--g1);background:rgba(45,94,58,.04)}

/* ════ 3. MAIN CONTENT ═══════════════════════ */
.ap-main{min-width:0}
/* results toolbar */
.results-bar{
  display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem;
  padding:.85rem 1.2rem;background:#fff;border-radius:14px;
  border:1px solid var(--bd);box-shadow:var(--sh-sm);margin-bottom:1.4rem;
  position:sticky;top:84px;z-index:50;
}
.results-info{display:flex;align-items:center;gap:.55rem;font-size:.84rem;font-weight:600;color:var(--muted)}
.results-info strong{color:var(--g1);font-size:.9rem;font-weight:900}
.results-pill{
  padding:.2rem .65rem;background:rgba(196,168,130,.12);
  border:1px solid var(--bd);border-radius:20px;
  color:var(--gold2);font-size:.68rem;font-weight:700;
}
.sort-wrap{display:flex;align-items:center;gap:.5rem}
.sort-wrap label{font-size:.78rem;font-weight:700;color:var(--muted)}
.sort-sel{
  padding:.42rem .8rem;border:1.5px solid var(--bd);border-radius:9px;
  font-size:.8rem;font-family:'Tajawal',sans-serif;background:#fff;color:var(--dark);cursor:pointer;transition:border-color .2s;
}
.sort-sel:focus{outline:none;border-color:var(--g1)}

/* ════ 4. ARTICLE CARDS ══════════════════════ */
.ac{
  background:#fff;border-radius:var(--r-lg);overflow:hidden;
  border:1px solid var(--bd);height:100%;display:flex;flex-direction:column;
  transition:all .38s cubic-bezier(.4,0,.2,1);position:relative;
}
.ac::after{
  content:'';position:absolute;bottom:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg,var(--g1),var(--gold));
  transform:scaleX(0);transform-origin:right;transition:transform .38s;
}
.ac:hover{transform:translateY(-9px) scale(1.005);box-shadow:var(--sh-lg)}
.ac:hover::after{transform:scaleX(1)}
/* image */
.ac-img{position:relative;height:222px;overflow:hidden;flex-shrink:0}
.ac-img img{width:100%;height:100%;object-fit:cover;transition:transform .55s}
.ac:hover .ac-img img{transform:scale(1.07)}
.ac-img-ph{
  position:absolute;inset:0;display:flex;align-items:center;justify-content:center;
}
.ac-img-ph i{font-size:2.8rem;color:rgba(255,255,255,.22)}
.ac-img-grad{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(26,46,32,.72) 0%,rgba(26,46,32,.18) 40%,transparent 100%);
}
.ac-badge{position:absolute;padding:.26rem .72rem;border-radius:20px;font-size:.68rem;font-weight:700;backdrop-filter:blur(8px)}
.ac-cat-b{top:12px;right:12px;background:rgba(45,94,58,.9);color:#fff}
.ac-feat-b{top:12px;left:12px;background:linear-gradient(135deg,rgba(196,168,130,.95),rgba(168,136,94,.95));color:var(--dark);display:flex;align-items:center;gap:.28rem}
.ac-time-b{bottom:12px;right:12px;background:rgba(0,0,0,.55);color:rgba(255,255,255,.88);display:flex;align-items:center;gap:.28rem}
/* body */
.ac-body{padding:1.3rem;flex:1;display:flex;flex-direction:column}
.ac-author{display:flex;align-items:center;gap:.65rem;margin-bottom:.85rem;padding:.58rem;background:var(--cream);border-radius:11px}
.ac-author-av{width:32px;height:32px;border-radius:50%;flex-shrink:0;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:.78rem;color:#fff}
.ac-author-nm{font-size:.76rem;font-weight:700;color:var(--dark);line-height:1.2}
.ac-author-rl{font-size:.64rem;color:var(--muted)}
.ac-title{font-size:.95rem;font-weight:800;color:var(--dark);line-height:1.4;margin-bottom:.6rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.ac-title a{text-decoration:none;color:inherit;transition:color .2s}
.ac-title a:hover{color:var(--g1)}
.ac-excerpt{font-size:.8rem;color:var(--muted);line-height:1.72;flex:1;margin-bottom:.85rem;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
.ac-meta{display:flex;align-items:center;flex-wrap:wrap;gap:.5rem;margin-bottom:.85rem;padding-bottom:.85rem;border-bottom:1px solid rgba(196,168,130,.15)}
.ac-meta-item{display:flex;align-items:center;gap:.3rem;font-size:.71rem;color:var(--muted);font-weight:600}
.ac-meta-item i{font-size:.65rem;color:var(--g1)}
.ac-meta-dot{width:3px;height:3px;border-radius:50%;background:rgba(196,168,130,.5)}
.ac-foot{display:flex;align-items:center;justify-content:space-between;margin-top:auto}
.ac-read{
  display:inline-flex;align-items:center;gap:.42rem;
  padding:.5rem 1.15rem;background:var(--g1);color:#fff;
  font-size:.78rem;font-weight:700;border-radius:10px;text-decoration:none;transition:all .25s;
}
.ac-read:hover{background:var(--dark);color:#fff;transform:translateX(-2px)}
.ac-actions{display:flex;gap:.45rem}
.ac-action{
  width:34px;height:34px;border-radius:9px;
  background:var(--cream);border:1px solid var(--bd);
  display:flex;align-items:center;justify-content:center;
  color:var(--muted);font-size:.8rem;cursor:pointer;transition:all .25s;
}
.ac-action:hover{background:var(--g1);color:#fff;border-color:var(--g1);transform:scale(1.1)}
/* empty */
.ap-empty{background:#fff;border-radius:20px;border:1px dashed rgba(196,168,130,.3);padding:3.5rem 2rem;text-align:center}
.ap-empty-ico{width:72px;height:72px;border-radius:20px;background:var(--cream);border:1px solid var(--bd);display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--muted);margin:0 auto 1.2rem}

/* ════ 5. QUICK CATEGORIES ═══════════════════ */
.ap-cats{background:#fff;padding:5rem 0}
.sec-tag{display:inline-flex;align-items:center;gap:.5rem;padding:.35rem 1rem;background:rgba(45,94,58,.08);border-radius:50px;font-size:.78rem;font-weight:700;color:var(--g1);margin-bottom:.7rem}
.sec-h{font-size:clamp(1.7rem,4vw,2.4rem);font-weight:900;color:var(--dark);line-height:1.2}
.sec-h .hi{color:var(--g1);position:relative}
.sec-h .hi::after{content:'';position:absolute;bottom:-3px;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--gold),var(--g1));border-radius:2px}
.qcat{
  position:relative;overflow:hidden;display:block;text-decoration:none;
  border-radius:var(--r-lg);padding:2rem 1.6rem;
  background:var(--cream);border:1.5px solid var(--bd);
  transition:all .38s cubic-bezier(.4,0,.2,1);color:inherit;
}
.qcat::before{content:'';position:absolute;inset:0;border-radius:calc(var(--r-lg) - 1px);background:linear-gradient(135deg,var(--g1),var(--teal));opacity:0;transition:opacity .35s}
.qcat:hover{transform:translateY(-8px) scale(1.02);border-color:transparent;box-shadow:var(--sh-lg)}
.qcat:hover::before{opacity:1}
.qcat:hover .qcat-ico{transform:scale(1.18) rotate(-8deg)}
.qcat:hover .qcat-n,.qcat:hover .qcat-d,.qcat:hover .qcat-cnt{color:#fff}
.qcat:hover .qcat-cnt-wrap{background:rgba(255,255,255,.18);border-color:rgba(255,255,255,.3)}
.qcat-ico{position:relative;z-index:1;width:56px;height:56px;border-radius:15px;display:flex;align-items:center;justify-content:center;font-size:1.35rem;color:#fff;margin-bottom:1rem;box-shadow:0 6px 20px rgba(0,0,0,.12);transition:transform .4s cubic-bezier(.34,1.56,.64,1)}
.qcat-n{font-size:.95rem;font-weight:800;color:var(--dark);position:relative;z-index:1;margin-bottom:.3rem;transition:color .3s}
.qcat-d{font-size:.78rem;color:var(--muted);line-height:1.6;position:relative;z-index:1;margin-bottom:.9rem;transition:color .3s}
.qcat-cnt-wrap{display:inline-flex;align-items:center;gap:.4rem;padding:.25rem .75rem;border-radius:20px;background:rgba(45,94,58,.08);border:1px solid rgba(45,94,58,.12);position:relative;z-index:1;transition:all .3s}
.qcat-cnt{font-size:.71rem;font-weight:700;color:var(--g1);transition:color .3s}

/* ════ SCROLL REVEAL ═════════════════════════ */
[data-sr]{opacity:0;transition:opacity .72s ease,transform .72s ease}
[data-sr="up"]{transform:translateY(28px)}
[data-sr="zoom"]{transform:scale(.9)}
[data-sr].done{opacity:1;transform:none}
[data-sr-d="1"]{transition-delay:.08s}[data-sr-d="2"]{transition-delay:.16s}
[data-sr-d="3"]{transition-delay:.24s}[data-sr-d="4"]{transition-delay:.32s}
[data-sr-d="5"]{transition-delay:.4s}

/* ════ PAGINATION ════════════════════════════ */
.ap-pagination{display:flex;justify-content:center;gap:.45rem;margin-top:2.5rem;flex-wrap:wrap}
.ap-pagination .page-link{
  padding:.55rem 1rem;border:1.5px solid var(--bd);border-radius:9px;
  color:var(--muted);font-size:.8rem;font-weight:700;text-decoration:none;
  transition:all .22s;background:#fff;font-family:'Tajawal',sans-serif;
}
.ap-pagination .page-link:hover{background:var(--g1);color:#fff;border-color:var(--g1);transform:translateY(-2px)}
.ap-pagination .page-item.active .page-link{background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;border-color:var(--g1);box-shadow:0 5px 18px rgba(45,94,58,.28)}

/* ════ RESPONSIVE ════════════════════════════ */
@media(max-width:1100px){.ap-layout{grid-template-columns:240px 1fr}}
@media(max-width:991px){
  .ap-layout{grid-template-columns:1fr;grid-template-rows:auto auto}
  .ap-sidebar{position:relative;top:0;max-height:none;overflow-y:visible}
  .ap-right{display:none!important}
  .results-bar{position:relative;top:0}
}
@media(max-width:576px){
  .ap-layout{padding:1.25rem 1rem 3rem}
}
</style>
@endpush

@section('content')
<div class="ap">

{{-- ════════════════════════
     1 · HERO
════════════════════════ --}}
<section class="ap-hero">
  <div class="ap-hero-bg"></div>
  <div class="ap-hero-grid"></div>
  <div class="ap-shape"></div>
  <div class="ap-shape"></div>
  <div class="ap-shape"></div>
  <div class="ap-orb ap-orb-1"></div>
  <div class="ap-orb ap-orb-2"></div>

  <div class="container position-relative" style="z-index:2;padding:5rem 1.5rem 4.5rem">
    <div class="row align-items-center g-5">

      {{-- Left: text --}}
      <div class="col-lg-6">
        <div class="ap-tag">
          <span style="display:inline-flex;align-items:center;gap:.55rem;padding:.42rem 1.1rem;background:rgba(196,168,130,.1);border:1px solid rgba(196,168,130,.28);border-radius:50px;backdrop-filter:blur(8px)">
            <span class="ap-dot"></span>
            <span style="color:rgba(196,168,130,.9);font-size:.8rem;font-weight:700">مقالات توعوية صحية</span>
          </span>
        </div>

        <div class="ap-h1">
          <h1 style="font-size:clamp(2.5rem,6.5vw,4.6rem);font-weight:900;line-height:1.06;color:#fff;margin:1.1rem 0">
            مقالات صحية<br>
            <span class="gold-shine">وتوعوية</span>
          </h1>
        </div>

        <p class="ap-p" style="font-size:1.05rem;color:rgba(255,255,255,.62);line-height:1.9;max-width:490px;margin-bottom:2rem">
          محتوى توعوي متخصص في العادات الصحية والسلوكيات اليومية، مع نصائح طبية وشرعية لحياة سليمة.
        </p>

        <div class="ap-ctas d-flex flex-wrap gap-3 mb-5">
          <a href="{{ route('articles') }}" class="btn-ap-pri"><i class="bi bi-heart-pulse"></i> تصفح المقالات</a>
          @guest
          <a href="{{ route('register') }}" class="btn-ap-ghost"><i class="bi bi-person-plus-fill"></i> انضم مجاناً</a>
          @endguest
        </div>

        <div class="ap-stats d-flex flex-wrap gap-3">
          @php $heroStats=[
            ['n'=>$articles->total(),'l'=>'مقال منشور','i'=>'bi-newspaper'],
            ['n'=>\App\Models\Article::published()->count(),'l'=>'مقال نشط','i'=>'bi-patch-check-fill'],
            ['n'=>\App\Models\User::whereIn('role',['doctor','psychologist'])->count(),'l'=>'خبير معتمد','i'=>'bi-person-badge-fill'],
          ]; @endphp
          @foreach($heroStats as $hs)
          <div class="ap-stat-card" style="flex:1;min-width:110px">
            <div style="font-size:1rem;margin-bottom:.3rem"><i class="bi {{ $hs['i'] }}" style="color:var(--gold)"></i></div>
            <div class="ap-stat-num">{{ number_format($hs['n']) }}</div>
            <div class="ap-stat-lbl">{{ $hs['l'] }}</div>
          </div>
          @endforeach
        </div>
      </div>

      {{-- Right: article mockup --}}
      <div class="col-lg-6 d-none d-lg-block ap-right">
        <div class="position-relative" style="padding:2.5rem 1.5rem">
          <div class="ap-chip" style="top:-10px;right:-10px;animation:chipFlt 4.5s ease-in-out infinite">
            <div class="ap-chip-ico" style="background:rgba(74,222,128,.18)"><i class="bi bi-patch-check-fill" style="color:#4ade80;font-size:.85rem"></i></div>
            <div><div style="font-size:.9rem;font-weight:900;color:#fff;line-height:1">{{ \App\Models\Article::published()->count() }}</div><div style="font-size:.63rem;color:rgba(255,255,255,.45)">مقال موثّق</div></div>
          </div>
          <div class="ap-chip" style="bottom:-5px;left:-15px;animation:chipFlt 6s ease-in-out infinite;animation-delay:2.5s">
            <div class="ap-chip-ico" style="background:rgba(196,168,130,.18)"><i class="bi bi-eye-fill" style="color:var(--gold);font-size:.85rem"></i></div>
            <div><div style="font-size:.9rem;font-weight:900;color:#fff;line-height:1">+50K</div><div style="font-size:.63rem;color:rgba(255,255,255,.45)">مشاهدة شهرياً</div></div>
          </div>
          <div class="ap-mockup">
            <div style="height:155px;border-radius:13px;background:linear-gradient(135deg,#1e3f27,#3A7D6E);margin-bottom:1.2rem;position:relative;overflow:hidden">
              <div style="position:absolute;inset:0;background-image:radial-gradient(circle,rgba(196,168,130,.12) 1px,transparent 1px);background-size:18px 18px"></div>
              <div style="position:absolute;bottom:1rem;right:1rem"><span style="display:inline-block;padding:.26rem .72px;border-radius:20px;font-size:.68rem;font-weight:700;background:rgba(45,94,58,.9);color:#fff;padding:.26rem .72rem">علم النفس</span></div>
              <div style="position:absolute;bottom:1rem;left:1rem"><span style="display:inline-flex;align-items:center;gap:.28rem;padding:.26rem .72rem;border-radius:20px;font-size:.68rem;background:rgba(0,0,0,.55);color:rgba(255,255,255,.88)"><i class="bi bi-clock" style="font-size:.6rem"></i> 5 دقائق</span></div>
              <i class="bi bi-newspaper" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);font-size:2.8rem;color:rgba(255,255,255,.1)"></i>
            </div>
            <div style="margin-bottom:1rem">
              <div class="ap-mock-tag" style="background:rgba(45,94,58,.35)"><i class="bi bi-stars" style="font-size:.7rem"></i> مميز</div>
              <div class="ap-mock-line gold"></div>
              <div class="ap-mock-line w100"></div>
              <div class="ap-mock-line w88"></div>
              <div class="ap-mock-line w75"></div>
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between">
              <div style="display:flex;align-items:center;gap:.65rem">
                <div class="ap-mock-avatar">د</div>
                <div>
                  <div class="ap-mock-line w60" style="height:8px;margin:0 0 5px"></div>
                  <div class="ap-mock-line w45" style="height:6px;margin:0"></div>
                </div>
              </div>
              <div style="display:inline-flex;align-items:center;gap:.4rem;padding:.42rem 1rem;background:rgba(45,94,58,.35);border-radius:10px">
                <i class="bi bi-arrow-left" style="color:var(--gold);font-size:.78rem"></i>
                <span style="font-size:.75rem;color:rgba(255,255,255,.8);font-weight:600">اقرأ</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="ap-wave">
    <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block">
      <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,42 1440,38 L1440,70 L0,70 Z" fill="#F0EFEC"/>
    </svg>
  </div>
</section>

{{-- ════════════════════════
     MAIN LAYOUT (sidebar | content)
════════════════════════ --}}
<div style="background:var(--cream);min-height:60vh">
<div class="ap-layout">

  {{-- ═══ SIDEBAR ═══ --}}
  <aside class="ap-sidebar">
    <div class="filter-panel">
      <div class="filter-head">
        <div class="filter-head-title">
          <div class="filter-head-ico"><i class="bi bi-sliders"></i></div>
          البحث والتصفية
        </div>
        @if(request()->hasAny(['search','category','featured','size']))
        <a href="{{ route('articles') }}" class="filter-clear-all">
          <i class="bi bi-x-circle"></i> مسح
        </a>
        @endif
      </div>
      <div class="filter-body">
        <form action="{{ route('articles') }}" method="GET" id="filterForm">

          {{-- Search --}}
          <div class="f-search-wrap">
            <div class="f-search-ico"><i class="bi bi-search"></i></div>
            <input type="text" name="search" class="f-search"
                   placeholder="ابحث عن مقال أو كاتب..."
                   value="{{ request('search') }}">
          </div>

          {{-- Category --}}
          <div class="f-section">
            <div class="f-sec-title"><i class="bi bi-grid-3x3-gap" style="color:var(--gold2)"></i> التصنيف</div>
            <label class="f-label">اختر تصنيفاً</label>
            <select name="category" class="f-select">
              <option value="">جميع التصنيفات</option>
              @foreach($categories as $cat)
              <option value="{{ $cat }}" {{ request('category')==$cat?'selected':'' }}>
                {{ $cat=='psychology'?'علم النفس':($cat=='addiction'?'الإدمان والعلاج':($cat=='relationships'?'العلاقات':$cat)) }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="f-divider"></div>

          {{-- Type --}}
          <div class="f-section">
            <div class="f-sec-title"><i class="bi bi-star" style="color:var(--gold2)"></i> نوع المقال</div>
            <label class="f-label">تصفية حسب النوع</label>
            <select name="featured" class="f-select">
              <option value="">الكل</option>
              <option value="1" {{ request('featured')=='1'?'selected':'' }}>مميز فقط</option>
              <option value="0" {{ request('featured')=='0'?'selected':'' }}>عادي فقط</option>
            </select>
          </div>

          <div class="f-divider"></div>

          {{-- Size --}}
          <div class="f-section" style="margin-bottom:1.4rem">
            <div class="f-sec-title"><i class="bi bi-clock" style="color:var(--gold2)"></i> وقت القراءة</div>
            <label class="f-label">حجم المقال</label>
            <select name="size" class="f-select">
              <option value="">جميع الأحجام</option>
              <option value="small"  {{ request('size')=='small' ?'selected':'' }}>قصير (أقل من 5 دقائق)</option>
              <option value="medium" {{ request('size')=='medium'?'selected':'' }}>متوسط (5-10 دقائق)</option>
              <option value="large"  {{ request('size')=='large' ?'selected':'' }}>طويل (10+ دقائق)</option>
            </select>
          </div>

          <button type="submit" class="f-apply"><i class="bi bi-funnel-fill"></i> تطبيق الفلاتر</button>
          @if(request()->hasAny(['search','category','featured','size']))
          <a href="{{ route('articles') }}" class="f-reset"><i class="bi bi-arrow-clockwise"></i> مسح الكل</a>
          @endif
        </form>
      </div>
    </div>
  </aside>

  {{-- ═══ MAIN CONTENT ═══ --}}
  <main class="ap-main">

    {{-- Results toolbar --}}
    <div class="results-bar" data-sr="up">
      <div class="results-info">
        <i class="bi bi-file-text" style="color:var(--g1)"></i>
        <strong>{{ $articles->total() }}</strong> مقال
        @if(request()->hasAny(['search','category','featured','size']))
        <span class="results-pill">نتائج البحث</span>
        @endif
      </div>
      <div class="sort-wrap">
        <label>ترتيب:</label>
        <select class="sort-sel">
          <option>الأحدث أولاً</option>
          <option>الأكثر مشاهدة</option>
          <option>الأقدم أولاً</option>
        </select>
      </div>
    </div>

    {{-- Articles grid --}}
    <div class="row g-4">
      @forelse($articles as $i => $article)
      <div class="col-sm-6 col-xl-4" data-sr="up" data-sr-d="{{ ($i%3)+1 }}">
        <div class="ac">
          {{-- Cover --}}
          <div class="ac-img">
            @if($article->image_url ?? null)
              <img src="{{ $article->image_url }}" alt="{{ $article->title }}">
            @else
              @php $iBgs=['linear-gradient(145deg,#2D5E3A,#3A7D6E)','linear-gradient(145deg,#1a2e20,#2D5E3A)','linear-gradient(145deg,#3A7D6E,#2a6b5d)','linear-gradient(145deg,#C4A882,#a8885e)']; @endphp
              <div class="ac-img-ph" style="background:{{ $iBgs[$i%4] }}"><i class="bi bi-file-richtext-fill"></i></div>
            @endif
            <div class="ac-img-grad"></div>
            <span class="ac-badge ac-cat-b">{{ $article->category_label ?? 'عام' }}</span>
            @if($article->featured)
            <span class="ac-badge ac-feat-b"><i class="bi bi-star-fill" style="font-size:.62rem"></i> مميز</span>
            @endif
            <span class="ac-badge ac-time-b" style="position:absolute">
              <i class="bi bi-clock" style="font-size:.58rem"></i> {{ $article->reading_time ?? 5 }} دقائق
            </span>
          </div>
          {{-- Body --}}
          <div class="ac-body">
            <div class="ac-author">
              <div class="ac-author-av">{{ mb_substr($article->author?->first_name ?? 'و', 0, 1) }}</div>
              <div>
                <div class="ac-author-nm">{{ $article->author?->full_name ?? 'فريق وعي' }}</div>
                <div class="ac-author-rl">{{ $article->author?->role === 'doctor' ? 'طبيب' : 'متخصص' }}</div>
              </div>
            </div>
            <h3 class="ac-title">
              <a href="{{ route('articles.show', $article->slug ?? $article->id) }}">{{ $article->title }}</a>
            </h3>
            <p class="ac-excerpt">
              {{ $article->excerpt ?? Str::limit(strip_tags($article->body ?? ''), 110) }}
            </p>
            <div class="ac-meta">
              <span class="ac-meta-item"><i class="bi bi-eye"></i> {{ number_format($article->views ?? 0) }}</span>
              <span class="ac-meta-dot"></span>
              <span class="ac-meta-item"><i class="bi bi-calendar3"></i> {{ $article->published_at?->format('d M Y') ?? now()->format('d M Y') }}</span>
              @if($article->comments_count ?? 0)
              <span class="ac-meta-dot"></span>
              <span class="ac-meta-item"><i class="bi bi-chat"></i> {{ $article->comments_count }}</span>
              @endif
            </div>
            <div class="ac-foot">
              <a href="{{ route('articles.show', $article->slug ?? $article->id) }}" class="ac-read">
                اقرأ المقال <i class="bi bi-arrow-left"></i>
              </a>
              <div class="ac-actions">
                <button class="ac-action fav-btn" title="المفضلة"><i class="bi bi-heart"></i></button>
                <button class="ac-action" title="مشاركة"><i class="bi bi-share"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12" data-sr="zoom">
        <div class="ap-empty">
          <div class="ap-empty-ico"><i class="bi bi-newspaper"></i></div>
          <h3 style="font-size:1.3rem;font-weight:800;color:var(--dark);margin-bottom:.6rem">لا توجد مقالات</h3>
          <p style="color:var(--muted);font-size:.86rem;margin-bottom:1.6rem">لم يتم العثور على مقالات تطابق معايير البحث</p>
          <a href="{{ route('articles') }}" class="btn-ap-pri" style="font-size:.85rem;padding:.7rem 1.5rem">
            <i class="bi bi-arrow-clockwise"></i> إعادة التعيين
          </a>
        </div>
      </div>
      @endforelse
    </div>

    {{-- Pagination --}}
    @if($articles->hasPages())
    <div class="ap-pagination" data-sr="up">
      {{ $articles->links() }}
    </div>
    @endif

  </main>
</div>
</div>

{{-- ════════════════════════
     5 · QUICK CATEGORIES
════════════════════════ --}}
@if(!request()->hasAny(['search','category','featured','size']))
<section class="ap-cats">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-grid-3x3-gap-fill"></i> استكشف التصنيفات</div>
      <h2 class="sec-h">ابحث حسب <span class="hi">التصنيف</span></h2>
    </div>
    <div class="row g-4">
      @php $qcats=[
        ['nm'=>'علم النفس',        'slug'=>'psychology',    'i'=>'bi-heart-pulse-fill', 'bg'=>'linear-gradient(135deg,#2D5E3A,#3A7D6E)','d'=>'مقالات متخصصة في الصحة النفسية والسلوك البشري'],
        ['nm'=>'الإدمان والعلاج',  'slug'=>'addiction',     'i'=>'bi-shield-heart-fill','bg'=>'linear-gradient(135deg,#1a2e20,#2D5E3A)','d'=>'دعم علمي موثوق في رحلة التعافي والعلاج'],
        ['nm'=>'التوعية المجتمعية','slug'=>'relationships',  'i'=>'bi-people-fill',      'bg'=>'linear-gradient(135deg,#3A7D6E,#2a6b5d)','d'=>'محتوى توعوي حول العلاقات والمجتمع'],
      ]; @endphp
      @foreach($qcats as $qi=>$qc)
      <div class="col-md-4" data-sr="up" data-sr-d="{{ $qi+1 }}">
        <a href="{{ route('articles',['category'=>$qc['slug']]) }}" class="qcat">
          <div class="qcat-ico" style="background:{{ $qc['bg'] }}"><i class="bi {{ $qc['i'] }}"></i></div>
          <div class="qcat-n">{{ $qc['nm'] }}</div>
          <div class="qcat-d">{{ $qc['d'] }}</div>
          <div class="qcat-cnt-wrap">
            <i class="bi bi-newspaper" style="font-size:.63rem;color:var(--g1)"></i>
            <span class="qcat-cnt">{{ \App\Models\Article::where('category',$qc['slug'])->published()->count() }} مقال</span>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

</div>
@endsection

@push('scripts')
<script>
/* Scroll Reveal */
const srAll = document.querySelectorAll('[data-sr]');
const srIO = new IntersectionObserver(es => {
  es.forEach(e => { if(e.isIntersecting){ e.target.classList.add('done'); srIO.unobserve(e.target); }});
}, { threshold: 0.08 });
srAll.forEach(el => srIO.observe(el));

/* 3D Card Tilt */
document.querySelectorAll('.ac').forEach(card => {
  card.addEventListener('mousemove', e => {
    const r = card.getBoundingClientRect();
    const x = (e.clientX - r.left)/r.width  - 0.5;
    const y = (e.clientY - r.top) /r.height - 0.5;
    card.style.transform = `translateY(-9px) scale(1.005) rotateY(${x*5}deg) rotateX(${-y*3.5}deg)`;
  });
  card.addEventListener('mouseleave', () => { card.style.transform = ''; });
});

/* Favourite toggle */
document.querySelectorAll('.fav-btn').forEach(btn => {
  btn.addEventListener('click', function(){
    const ico = this.querySelector('i');
    const on = ico.classList.contains('bi-heart-fill');
    ico.classList.toggle('bi-heart', on);
    ico.classList.toggle('bi-heart-fill', !on);
    this.style.background = on ? '' : '#fee2e2';
    this.style.borderColor = on ? '' : '#fca5a5';
    ico.style.color = on ? '' : '#ef4444';
  });
});
</script>
@endpush