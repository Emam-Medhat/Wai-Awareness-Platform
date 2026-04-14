@extends('layouts.app')
@section('title', 'الفيديوهات')

@push('styles')
<style>
/* ════════════════════════════════════════════
   WA3Y VIDEOS PAGE — TOKENS
════════════════════════════════════════════ */
:root{
  --g1:#2D5E3A;--g2:#3d7a4e;--teal:#3A7D6E;--teal2:#2a6b5d;
  --gold:#C4A882;--gold2:#a8885e;--gold3:#e8d5b7;
  --cream:#F0EFEC;--dark:#1a2e20;--ink:#232f26;
  --muted:#6b7280;--bd:rgba(45,94,58,.12);
  --sh-sm:0 2px 12px rgba(45,94,58,.07);
  --sh-md:0 8px 32px rgba(45,94,58,.11);
  --sh-lg:0 24px 64px rgba(45,94,58,.15);
}
.vp{font-family:'Tajawal',sans-serif}

/* ════ 1. HERO ════════════════════════════ */
.vp-hero{
  min-height:70vh;background:var(--dark);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.vp-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 65% at 12% 15%,rgba(45,94,58,.65) 0%,transparent 55%),
    radial-gradient(ellipse 55% 75% at 90% 85%,rgba(58,125,110,.4) 0%,transparent 55%),
    linear-gradient(165deg,#0c1c11 0%,#1a2e20 52%,#0a1409 100%);
}
.vp-hero-grid{
  position:absolute;inset:0;
  background-image:
    linear-gradient(rgba(196,168,130,.06) 1px,transparent 1px),
    linear-gradient(90deg,rgba(196,168,130,.06) 1px,transparent 1px);
  background-size:54px 54px;animation:vpGrid 28s linear infinite;
}
@keyframes vpGrid{to{background-position:54px 54px}}
.vp-orb{position:absolute;border-radius:50%;filter:blur(80px);pointer-events:none}
.vp-orb-1{width:520px;height:520px;background:rgba(45,94,58,.27);top:-130px;right:-100px;animation:vpOrb 9s ease-in-out infinite}
.vp-orb-2{width:380px;height:380px;background:rgba(58,125,110,.18);bottom:-80px;left:-60px;animation:vpOrb 11s ease-in-out infinite reverse}
@keyframes vpOrb{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.22);opacity:.55}}
/* floating shapes */
.vp-shape{
  position:absolute;border-radius:50%;
  background:linear-gradient(135deg,rgba(196,168,130,.1),rgba(45,94,58,.06));
  border:1px solid rgba(196,168,130,.08);animation:vpShape 14s ease-in-out infinite;
}
.vp-shape:nth-child(4){width:60px;height:60px;top:10%;right:7%;animation-delay:0s}
.vp-shape:nth-child(5){width:40px;height:40px;top:68%;right:20%;animation-delay:5s}
.vp-shape:nth-child(6){width:76px;height:76px;top:30%;left:4%;animation-delay:9s}
@keyframes vpShape{0%,100%{transform:translateY(0) scale(1)}50%{transform:translateY(-18px) scale(1.05)}}
.vp-wave{position:absolute;bottom:-2px;left:0;right:0}

/* hero animations */
@keyframes vpIn{from{opacity:0;transform:translateY(26px)}to{opacity:1;transform:translateY(0)}}
@keyframes vpRight{from{opacity:0;transform:translateX(40px) scale(.94)}to{opacity:1;transform:none}}
@keyframes vpGold{0%{background-position:200% center}100%{background-position:-200% center}}
@keyframes vpBlink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 7px rgba(74,222,128,0)}}
.vp-tag  {animation:vpIn .7s .1s ease both}
.vp-h1   {animation:vpIn .8s .2s ease both}
.vp-p    {animation:vpIn .8s .35s ease both}
.vp-ctas {animation:vpIn .8s .5s ease both}
.vp-stats{animation:vpIn .8s .65s ease both;opacity:0}
.vp-right{animation:vpRight 1s .3s ease both}
.vp-dot{width:8px;height:8px;border-radius:50%;background:#4ade80;animation:vpBlink 1.6s infinite;flex-shrink:0}
.gold-shine{
  background:linear-gradient(135deg,var(--gold) 0%,#fff 50%,var(--gold) 100%);
  background-size:200% auto;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  animation:vpGold 4s linear infinite;
}
/* stat cards */
.vp-stat-card{
  background:rgba(255,255,255,.06);backdrop-filter:blur(16px);
  border:1px solid rgba(255,255,255,.1);border-radius:18px;
  padding:1.1rem 1.4rem;text-align:center;transition:all .3s;flex:1;min-width:110px;
}
.vp-stat-card:hover{background:rgba(45,94,58,.25);border-color:rgba(45,94,58,.4);transform:translateY(-5px)}
.vp-stat-num{font-size:2rem;font-weight:900;line-height:1;margin-bottom:.28rem;background:linear-gradient(135deg,var(--gold),#fff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.vp-stat-lbl{color:rgba(255,255,255,.6);font-size:.78rem;font-weight:600}
/* right mockup */
.vp-chip{position:absolute;background:rgba(255,255,255,.07);backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.12);border-radius:16px;padding:.75rem 1.1rem;display:flex;align-items:center;gap:.65rem}
.vp-chip-ico{width:34px;height:34px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
@keyframes chipFlt{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
.vp-mockup{background:rgba(255,255,255,.05);backdrop-filter:blur(24px);border:1px solid rgba(255,255,255,.1);border-radius:24px;padding:1.6rem;position:relative;overflow:hidden}
.vp-mockup::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,var(--gold),var(--g1),var(--gold),transparent)}
/* CTA buttons */
.btn-vp-pri{
  display:inline-flex;align-items:center;gap:.6rem;
  padding:.9rem 2rem;background:linear-gradient(135deg,var(--g1),var(--teal));
  color:#fff;font-weight:800;border-radius:14px;text-decoration:none;
  box-shadow:0 8px 32px rgba(45,94,58,.45);transition:all .35s;position:relative;overflow:hidden;
}
.btn-vp-pri::before{content:'';position:absolute;top:0;left:-100%;right:100%;bottom:0;background:linear-gradient(90deg,transparent,rgba(255,255,255,.14),transparent);transition:all .5s}
.btn-vp-pri:hover::before{left:100%;right:-100%}
.btn-vp-pri:hover{transform:translateY(-3px);box-shadow:0 16px 48px rgba(45,94,58,.55);color:#fff}
.btn-vp-ghost{
  display:inline-flex;align-items:center;gap:.6rem;
  padding:.9rem 2rem;background:rgba(255,255,255,.07);
  border:1.5px solid rgba(255,255,255,.2);color:rgba(255,255,255,.9);
  font-weight:700;border-radius:14px;text-decoration:none;backdrop-filter:blur(8px);transition:all .3s;
}
.btn-vp-ghost:hover{background:rgba(255,255,255,.15);border-color:rgba(255,255,255,.4);color:#fff;transform:translateY(-3px)}

/* ════ 2. LAYOUT ══════════════════════════ */
.vp-layout{
  display:grid;
  grid-template-columns:270px 1fr;
  gap:1.75rem;align-items:start;
  padding:2rem 0 4rem;
}
.vp-sidebar{
  position:sticky;top:84px;
  max-height:calc(100vh - 100px);
  overflow-y:auto;
  scrollbar-width:thin;scrollbar-color:rgba(196,168,130,.3) transparent;
}
.vp-sidebar::-webkit-scrollbar{width:4px}
.vp-sidebar::-webkit-scrollbar-thumb{background:rgba(196,168,130,.3);border-radius:2px}

/* filter panel */
.filter-panel{background:#fff;border-radius:20px;border:1px solid var(--bd);box-shadow:var(--sh-md);overflow:hidden}
.filter-panel::before{content:'';display:block;height:3px;background:linear-gradient(90deg,var(--g1),var(--teal),var(--gold))}
.filter-head{padding:1.2rem 1.4rem;border-bottom:1px solid rgba(196,168,130,.12);display:flex;align-items:center;justify-content:space-between}
.filter-head-title{display:flex;align-items:center;gap:.6rem;font-size:.92rem;font-weight:800;color:var(--dark)}
.filter-head-ico{width:32px;height:32px;border-radius:9px;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;color:#fff;font-size:.8rem;flex-shrink:0}
.filter-clear-all{display:inline-flex;align-items:center;gap:.3rem;padding:.28rem .7rem;border:1.5px solid rgba(196,168,130,.3);border-radius:20px;color:var(--gold2);font-size:.72rem;font-weight:700;text-decoration:none;transition:all .22s}
.filter-clear-all:hover{background:var(--gold2);color:#fff;border-color:var(--gold2)}
.filter-body{padding:1.2rem 1.4rem}
/* search */
.f-search-wrap{position:relative;margin-bottom:1.3rem}
.f-search-ico{position:absolute;right:.9rem;top:50%;transform:translateY(-50%);width:32px;height:32px;border-radius:8px;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;color:#fff;font-size:.78rem}
.f-search{width:100%;padding:.75rem .9rem .75rem 1rem;padding-right:52px;border:1.5px solid rgba(45,94,58,.12);border-radius:11px;font-size:.84rem;font-family:'Tajawal',sans-serif;background:var(--cream);color:var(--dark);transition:all .25s}
.f-search:focus{outline:none;border-color:var(--g1);box-shadow:0 0 0 3px rgba(45,94,58,.08);background:#fff}
.f-search::placeholder{color:#a0aba4}
/* sections */
.f-section{margin-bottom:1.25rem}
.f-sec-title{font-size:.7rem;font-weight:700;color:var(--gold2);letter-spacing:.07em;text-transform:uppercase;margin-bottom:.65rem;display:flex;align-items:center;gap:.4rem}
.f-sec-title::after{content:'';flex:1;height:1px;background:linear-gradient(90deg,rgba(196,168,130,.3),transparent)}
/* checkbox */
.f-check{display:flex;align-items:center;justify-content:space-between;padding:.38rem .45rem;border-radius:9px;cursor:pointer;transition:background .18s;margin-bottom:1px}
.f-check:hover{background:rgba(45,94,58,.05)}
.f-check input{display:none}
.f-check-label{display:flex;align-items:center;gap:.5rem;font-size:.83rem;color:var(--ink);cursor:pointer;flex:1;font-weight:500}
.f-check-box{width:17px;height:17px;border-radius:5px;border:1.5px solid rgba(45,94,58,.22);background:#fff;display:flex;align-items:center;justify-content:center;transition:all .2s;flex-shrink:0}
.f-check input:checked + .f-check-label .f-check-box{background:var(--g1);border-color:var(--g1)}
.f-check input:checked + .f-check-label .f-check-box::after{content:'\F633';font-family:'bootstrap-icons';color:#fff;font-size:.65rem}
.f-cnt{font-size:.68rem;color:var(--muted);background:rgba(196,168,130,.12);padding:1px 6px;border-radius:10px;flex-shrink:0}
.f-divider{height:1px;background:rgba(196,168,130,.15);margin:1.1rem 0}
/* apply/reset */
.f-apply{width:100%;padding:.7rem;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;border:none;border-radius:12px;font-family:'Tajawal',sans-serif;font-size:.88rem;font-weight:800;cursor:pointer;transition:all .28s;box-shadow:0 5px 18px rgba(45,94,58,.3);display:flex;align-items:center;justify-content:center;gap:.5rem}
.f-apply:hover{transform:translateY(-2px);box-shadow:0 10px 28px rgba(45,94,58,.4)}
.f-reset{width:100%;padding:.58rem;margin-top:.5rem;background:transparent;color:var(--muted);border:1.5px solid var(--bd);border-radius:12px;font-family:'Tajawal',sans-serif;font-size:.82rem;font-weight:600;cursor:pointer;transition:all .22s;display:flex;align-items:center;justify-content:center;gap:.45rem;text-decoration:none}
.f-reset:hover{border-color:var(--g1);color:var(--g1);background:rgba(45,94,58,.04)}

/* ════ 3. MAIN CONTENT ════════════════════ */
.vp-main{min-width:0}
/* results toolbar */
.results-bar{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem;padding:.85rem 1.2rem;background:#fff;border-radius:14px;border:1px solid var(--bd);box-shadow:var(--sh-sm);margin-bottom:1.4rem;position:sticky;top:84px;z-index:50}
.results-info{display:flex;align-items:center;gap:.55rem;font-size:.84rem;font-weight:600;color:var(--muted)}
.results-info strong{color:var(--g1);font-size:.9rem;font-weight:900}
.results-pill{padding:.2rem .65rem;background:rgba(196,168,130,.12);border:1px solid var(--bd);border-radius:20px;color:var(--gold2);font-size:.68rem;font-weight:700}
.sort-wrap{display:flex;align-items:center;gap:.5rem}
.sort-wrap label{font-size:.78rem;font-weight:700;color:var(--muted)}
.sort-sel{padding:.42rem .8rem;border:1.5px solid var(--bd);border-radius:9px;font-size:.8rem;font-family:'Tajawal',sans-serif;background:#fff;color:var(--dark);cursor:pointer;transition:border-color .2s}
.sort-sel:focus{outline:none;border-color:var(--g1)}

/* ════ FEATURED VIDEO ══════════════════════ */
.feat-vid{background:#fff;border-radius:20px;border:1px solid var(--bd);box-shadow:var(--sh-md);overflow:hidden;margin-bottom:1.75rem;position:relative}
.feat-vid::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--g1),var(--gold),var(--teal));z-index:1}
.feat-img{position:relative;min-height:260px;overflow:hidden;background:linear-gradient(145deg,var(--g1),var(--teal))}
.feat-img img{width:100%;height:100%;object-fit:cover;transition:transform .6s}
.feat-vid:hover .feat-img img{transform:scale(1.04)}
.feat-img-grad{position:absolute;inset:0;background:linear-gradient(135deg,rgba(30,63,39,.35),transparent 60%)}
/* play button overlay */
.feat-play{
  position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);
  width:64px;height:64px;border-radius:50%;
  background:rgba(255,255,255,.15);backdrop-filter:blur(8px);
  border:2px solid rgba(255,255,255,.4);
  display:flex;align-items:center;justify-content:center;
  color:#fff;font-size:1.6rem;transition:all .3s;cursor:pointer;
}
.feat-vid:hover .feat-play{background:rgba(255,255,255,.28);transform:translate(-50%,-50%) scale(1.12)}
.feat-badge{position:absolute;top:14px;right:14px;background:linear-gradient(135deg,var(--gold),var(--gold2));color:var(--dark);padding:.28rem .8rem;border-radius:20px;font-size:.72rem;font-weight:700;display:inline-flex;align-items:center;gap:.32rem}
.feat-dur{position:absolute;bottom:14px;left:14px;background:rgba(0,0,0,.6);backdrop-filter:blur(4px);color:rgba(255,255,255,.9);padding:.25rem .72rem;border-radius:20px;font-size:.7rem;font-weight:700;display:inline-flex;align-items:center;gap:.28rem}
.feat-cat{position:absolute;bottom:14px;right:14px;background:rgba(45,94,58,.9);color:#fff;padding:.25rem .72rem;border-radius:20px;font-size:.7rem;font-weight:700}
.feat-body{padding:1.8rem}
.feat-title{font-size:1.3rem;font-weight:900;color:var(--g1);margin-bottom:.65rem;line-height:1.3}
.feat-desc{font-size:.84rem;color:var(--muted);line-height:1.8;margin-bottom:1.1rem}
.feat-meta{display:flex;flex-wrap:wrap;gap:.85rem;margin-bottom:1.1rem}
.feat-meta-item{display:flex;align-items:center;gap:.35rem;font-size:.78rem;color:var(--muted)}
.feat-meta-item i{color:var(--gold)}

/* ════ VIDEO CARDS ═════════════════════════ */
.vc{
  background:#fff;border-radius:20px;border:1px solid var(--bd);
  overflow:hidden;height:100%;display:flex;flex-direction:column;
  transition:all .38s cubic-bezier(.4,0,.2,1);position:relative;
}
.vc::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--g1),var(--gold));transform:scaleX(0);transform-origin:right;transition:transform .38s}
.vc:hover{transform:translateY(-8px) scale(1.005);box-shadow:var(--sh-lg)}
.vc:hover::after{transform:scaleX(1)}
/* thumbnail */
.vc-img{position:relative;height:195px;overflow:hidden;flex-shrink:0;background:linear-gradient(145deg,var(--g1),var(--teal))}
.vc-img img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
.vc:hover .vc-img img{transform:scale(1.07)}
.vc-ph{position:absolute;inset:0;display:flex;align-items:center;justify-content:center}
.vc-ph i{font-size:3rem;color:rgba(255,255,255,.2)}
/* play overlay */
.vc-play-overlay{position:absolute;inset:0;background:rgba(0,0,0,.28);opacity:0;transition:opacity .3s;display:flex;align-items:center;justify-content:center}
.vc:hover .vc-play-overlay{opacity:1}
.vc-play-btn{width:54px;height:54px;border-radius:50%;background:rgba(255,255,255,.9);display:flex;align-items:center;justify-content:center;color:var(--g1);font-size:1.4rem;transition:all .3s}
.vc:hover .vc-play-btn{transform:scale(1.1);background:#fff;box-shadow:0 8px 28px rgba(0,0,0,.25)}
/* badges */
.vc-badge{position:absolute;padding:.22rem .65rem;border-radius:20px;font-size:.67rem;font-weight:700}
.vc-cat-b{top:11px;right:11px;background:rgba(45,94,58,.9);color:#fff}
.vc-dur-b{bottom:11px;right:11px;background:rgba(0,0,0,.6);color:rgba(255,255,255,.88);display:flex;align-items:center;gap:.25rem}
/* body */
.vc-body{padding:1rem 1.1rem 1.1rem;flex:1;display:flex;flex-direction:column}
.vc-title{font-size:.92rem;font-weight:800;color:var(--dark);line-height:1.35;margin-bottom:.3rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.vc-desc{font-size:.76rem;color:var(--muted);line-height:1.6;margin-bottom:.6rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.vc-auth{font-size:.74rem;color:var(--muted);font-weight:500;margin-bottom:.65rem;display:flex;align-items:center;gap:.3rem}
.vc-auth i{font-size:.68rem;color:var(--gold)}
.vc-foot{display:flex;align-items:center;justify-content:space-between;padding-top:.6rem;border-top:1px solid rgba(196,168,130,.15);margin-top:auto}
.vc-stats{display:flex;gap:.7rem}
.vc-stat{display:flex;align-items:center;gap:.25rem;font-size:.71rem;color:var(--muted)}
.vc-stat i{font-size:.64rem;color:var(--gold)}
.vc-watch{display:inline-flex;align-items:center;gap:.35rem;padding:.38rem .9rem;background:var(--g1);color:#fff;font-size:.75rem;font-weight:700;border-radius:9px;text-decoration:none;transition:all .22s}
.vc-watch:hover{background:var(--dark);color:#fff}

/* empty */
.vp-empty{background:#fff;border-radius:20px;border:1px dashed rgba(196,168,130,.3);padding:3.5rem 2rem;text-align:center}
.vp-empty-ico{width:72px;height:72px;border-radius:20px;background:var(--cream);border:1px solid var(--bd);display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--muted);margin:0 auto 1.2rem}

/* ════ CATEGORIES ══════════════════════════ */
.qcat{position:relative;overflow:hidden;display:block;text-decoration:none;border-radius:24px;padding:2rem 1.6rem;background:var(--cream);border:1.5px solid var(--bd);transition:all .38s cubic-bezier(.4,0,.2,1);color:inherit}
.qcat::before{content:'';position:absolute;inset:0;border-radius:calc(24px - 1px);background:linear-gradient(135deg,var(--g1),var(--teal));opacity:0;transition:opacity .35s}
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

/* ════ SCROLL REVEAL ══════════════════════ */
[data-sr]{opacity:0;transition:opacity .7s ease,transform .7s ease}
[data-sr="up"]{transform:translateY(26px)}
[data-sr="zoom"]{transform:scale(.9)}
[data-sr].done{opacity:1;transform:none}
[data-sr-d="1"]{transition-delay:.08s}[data-sr-d="2"]{transition-delay:.16s}
[data-sr-d="3"]{transition-delay:.24s}[data-sr-d="4"]{transition-delay:.32s}

/* ════ PAGINATION ══════════════════════════ */
.vp-pages{display:flex;justify-content:center;gap:.45rem;margin-top:2.5rem;flex-wrap:wrap}
.vp-pages .page-link{padding:.55rem 1rem;border:1.5px solid var(--bd);border-radius:9px;color:var(--muted);font-size:.8rem;font-weight:700;text-decoration:none;transition:all .22s;background:#fff;font-family:'Tajawal',sans-serif}
.vp-pages .page-link:hover{background:var(--g1);color:#fff;border-color:var(--g1);transform:translateY(-2px)}
.vp-pages .page-item.active .page-link{background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;border-color:var(--g1);box-shadow:0 5px 18px rgba(45,94,58,.28)}

/* ════ RESPONSIVE ══════════════════════════ */
@media(max-width:1100px){.vp-layout{grid-template-columns:240px 1fr}}
@media(max-width:991px){
  .vp-layout{grid-template-columns:1fr}
  .vp-sidebar{position:relative;top:0;max-height:none;overflow-y:visible}
  .vp-right{display:none!important}
  .results-bar{position:relative;top:0}
}
@media(max-width:576px){
  .vp-layout{padding:1.25rem 0 3rem}
}
</style>
@endpush

@section('content')
<div class="vp">

{{-- ════ HERO ════════════════════════════════ --}}
<section class="vp-hero">
  <div class="vp-hero-bg"></div>
  <div class="vp-hero-grid"></div>
  <div class="vp-shape"></div>
  <div class="vp-shape"></div>
  <div class="vp-shape"></div>
  <div class="vp-orb vp-orb-1"></div>
  <div class="vp-orb vp-orb-2"></div>

  <div class="container position-relative" style="z-index:2;padding:5rem 1.5rem 4.5rem">
    <div class="row align-items-center g-5">

      {{-- Left: text --}}
      <div class="col-lg-6">
        <div class="vp-tag">
          <span style="display:inline-flex;align-items:center;gap:.55rem;padding:.42rem 1.1rem;background:rgba(196,168,130,.1);border:1px solid rgba(196,168,130,.28);border-radius:50px;backdrop-filter:blur(8px)">
            <span class="vp-dot"></span>
            <span style="color:rgba(196,168,130,.9);font-size:.8rem;font-weight:700">فيديوهات توعوية صحية</span>
          </span>
        </div>

        <div class="vp-h1">
          <h1 style="font-size:clamp(2.4rem,6vw,4.4rem);font-weight:900;line-height:1.06;color:#fff;margin:1.1rem 0">
            تعلم العادات<br>
            <span class="gold-shine">الصحية والشرعية</span>
          </h1>
        </div>

        <p class="vp-p" style="font-size:1.05rem;color:rgba(255,255,255,.62);line-height:1.9;max-width:490px;margin-bottom:2rem">
          محاضرات ودروس مرئية متخصصة في العادات الصحية والطب الوقائي، مع توجيهات شرعية لحياة سليمة.
        </p>

        <div class="vp-ctas d-flex flex-wrap gap-3 mb-5">
          <a href="{{ route('videos') }}" class="btn-vp-pri"><i class="bi bi-play-circle-fill"></i> تصفح الفيديوهات</a>
          @guest
          <a href="{{ route('register') }}" class="btn-vp-ghost"><i class="bi bi-person-plus-fill"></i> انضم مجاناً</a>
          @endguest
        </div>

        <div class="vp-stats d-flex flex-wrap gap-3">
          @php $vstats=[
            ['n'=>\App\Models\Video::count(),'l'=>'فيديو متاح','i'=>'bi-play-circle-fill'],
            ['n'=>number_format(\App\Models\Video::sum('views')),'l'=>'مشاهدة','i'=>'bi-eye-fill'],
            ['n'=>number_format(\App\Models\Video::sum('duration')/60),'l'=>'دقيقة محتوى','i'=>'bi-clock-fill'],
          ]; @endphp
          @foreach($vstats as $vs)
          <div class="vp-stat-card">
            <div style="font-size:1rem;margin-bottom:.3rem"><i class="bi {{ $vs['i'] }}" style="color:var(--gold)"></i></div>
            <div class="vp-stat-num">{{ $vs['n'] }}</div>
            <div class="vp-stat-lbl">{{ $vs['l'] }}</div>
          </div>
          @endforeach
        </div>
      </div>

      {{-- Right: mockup --}}
      <div class="col-lg-6 d-none d-lg-block vp-right">
        <div class="position-relative" style="padding:2.5rem 1.5rem">
          <div class="vp-chip" style="top:-10px;right:-10px;animation:chipFlt 4.5s ease-in-out infinite">
            <div class="vp-chip-ico" style="background:rgba(74,222,128,.18)"><i class="bi bi-play-circle-fill" style="color:#4ade80;font-size:.85rem"></i></div>
            <div><div style="font-size:.9rem;font-weight:900;color:#fff;line-height:1">{{ \App\Models\Video::count() }}</div><div style="font-size:.63rem;color:rgba(255,255,255,.45)">فيديو متاح</div></div>
          </div>
          <div class="vp-chip" style="bottom:-5px;left:-15px;animation:chipFlt 6s ease-in-out infinite;animation-delay:2.5s">
            <div class="vp-chip-ico" style="background:rgba(196,168,130,.18)"><i class="bi bi-eye-fill" style="color:var(--gold);font-size:.85rem"></i></div>
            <div><div style="font-size:.9rem;font-weight:900;color:#fff;line-height:1">+50K</div><div style="font-size:.63rem;color:rgba(255,255,255,.45)">مشاهدة شهرياً</div></div>
          </div>
          <div class="vp-mockup">
            <div style="height:155px;border-radius:13px;background:linear-gradient(135deg,#1e3f27,#3A7D6E);margin-bottom:1.2rem;position:relative;overflow:hidden;display:flex;align-items:center;justify-content:center">
              <div style="position:absolute;inset:0;background-image:radial-gradient(circle,rgba(196,168,130,.1) 1px,transparent 1px);background-size:18px 18px"></div>
              <div style="width:52px;height:52px;border-radius:50%;background:rgba(255,255,255,.15);border:2px solid rgba(255,255,255,.3);display:flex;align-items:center;justify-content:center;font-size:1.3rem;color:#fff;position:relative;z-index:1"><i class="bi bi-play-fill"></i></div>
              <div style="position:absolute;bottom:1rem;right:1rem"><span style="padding:.24rem .68rem;border-radius:20px;font-size:.68rem;font-weight:700;background:rgba(45,94,58,.88);color:#fff">علم النفس</span></div>
              <div style="position:absolute;bottom:1rem;left:1rem"><span style="display:inline-flex;align-items:center;gap:.25rem;padding:.24rem .68rem;border-radius:20px;font-size:.68rem;background:rgba(0,0,0,.6);color:rgba(255,255,255,.88)"><i class="bi bi-clock" style="font-size:.58rem"></i> 12:34</span></div>
            </div>
            <div style="height:10px;border-radius:5px;background:linear-gradient(90deg,var(--gold),rgba(196,168,130,.4));margin-bottom:.7rem"></div>
            <div style="height:9px;border-radius:5px;background:rgba(255,255,255,.08);width:100%;margin-bottom:.6rem"></div>
            <div style="height:9px;border-radius:5px;background:rgba(255,255,255,.08);width:82%;margin-bottom:.6rem"></div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:.9rem">
              <div style="display:flex;align-items:center;gap:.6rem">
                <div style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;font-size:.78rem;font-weight:800;color:#fff">د</div>
                <div><div style="height:8px;border-radius:4px;background:rgba(255,255,255,.08);width:80px;margin-bottom:5px"></div><div style="height:6px;border-radius:3px;background:rgba(255,255,255,.06);width:55px"></div></div>
              </div>
              <div style="display:inline-flex;align-items:center;gap:.38rem;padding:.4rem .9rem;background:rgba(45,94,58,.35);border-radius:10px"><i class="bi bi-play-fill" style="color:var(--gold);font-size:.75rem"></i><span style="font-size:.73rem;color:rgba(255,255,255,.8);font-weight:600">شاهد</span></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="vp-wave">
    <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block">
      <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,42 1440,38 L1440,70 L0,70 Z" fill="#F0EFEC"/>
    </svg>
  </div>
</section>

{{-- ════ MAIN LAYOUT ══════════════════════════ --}}
<div style="background:var(--cream);min-height:60vh">
<div class="container">
<div class="vp-layout">

  {{-- ═══ SIDEBAR ═══ --}}
  <aside class="vp-sidebar">
    <div class="filter-panel">
      <div class="filter-head">
        <div class="filter-head-title">
          <div class="filter-head-ico"><i class="bi bi-sliders"></i></div>
          البحث والتصفية
        </div>
        @if(request()->hasAny(['search','category','duration']))
        <a href="{{ route('videos') }}" class="filter-clear-all"><i class="bi bi-x-circle"></i> مسح</a>
        @endif
      </div>
      <div class="filter-body">
        <form method="GET" action="{{ route('videos') }}" id="filterForm">
          {{-- Search --}}
          <div class="f-search-wrap">
            <div class="f-search-ico"><i class="bi bi-search"></i></div>
            <input type="text" name="search" class="f-search"
                   placeholder="ابحث عن فيديو أو متحدث..."
                   value="{{ request('search') }}">
          </div>

          {{-- Category --}}
          <div class="f-section">
            <div class="f-sec-title"><i class="bi bi-grid-3x3-gap" style="color:var(--gold2)"></i> التصنيف</div>
            @php $fCats=['psychology'=>'علم النفس','addiction'=>'الإدمان والعلاج','relationships'=>'العلاقات'] @endphp
            @foreach($fCats as $fv=>$fl)
            <label class="f-check">
              <input type="checkbox" name="category[]" value="{{ $fv }}" {{ in_array($fv,(array)request('category',[]))?'checked':'' }}>
              <span class="f-check-label"><span class="f-check-box"></span>{{ $fl }}</span>
              <span class="f-cnt">{{ \App\Models\Video::where('category',$fv)->count() }}</span>
            </label>
            @endforeach
          </div>

          <div class="f-divider"></div>

          {{-- Duration --}}
          <div class="f-section" style="margin-bottom:1.4rem">
            <div class="f-sec-title"><i class="bi bi-clock" style="color:var(--gold2)"></i> مدة الفيديو</div>
            @php $durs=['short'=>'قصير (أقل من 5 دقائق)','medium'=>'متوسط (5-20 دقيقة)','long'=>'طويل (أكثر من 20 دقيقة)'] @endphp
            @foreach($durs as $dv=>$dl)
            <label class="f-check">
              <input type="checkbox" name="duration[]" value="{{ $dv }}" {{ in_array($dv,(array)request('duration',[]))?'checked':'' }}>
              <span class="f-check-label"><span class="f-check-box"></span>{{ $dl }}</span>
            </label>
            @endforeach
          </div>

          <button type="submit" class="f-apply"><i class="bi bi-funnel-fill"></i> تطبيق الفلاتر</button>
          @if(request()->hasAny(['search','category','duration']))
          <a href="{{ route('videos') }}" class="f-reset"><i class="bi bi-arrow-clockwise"></i> مسح الكل</a>
          @endif
        </form>
      </div>
    </div>
  </aside>

  {{-- ═══ MAIN ═══ --}}
  <main class="vp-main">

    {{-- Results toolbar --}}
    <div class="results-bar" data-sr="up">
      <div class="results-info">
        <i class="bi bi-play-circle" style="color:var(--g1)"></i>
        <strong>{{ $videos->total() }}</strong> فيديو
        @if(request()->hasAny(['search','category','duration']))
        <span class="results-pill">نتائج البحث</span>
        @endif
      </div>
      <div class="sort-wrap">
        <label>ترتيب:</label>
        <select class="sort-sel">
          <option>الأحدث أولاً</option>
          <option>الأكثر مشاهدة</option>
          <option>الأطول</option>
        </select>
      </div>
    </div>

    {{-- Featured video --}}
    @if(isset($featuredVideo) && $featuredVideo && !request()->hasAny(['search','category','duration']))
    <div class="feat-vid" data-sr="up">
      <div class="row g-0">
        <div class="col-md-5">
          <div class="feat-img" style="min-height:260px">
            @if($featuredVideo->thumbnail_url)
              <img src="{{ $featuredVideo->thumbnail_url }}" alt="{{ $featuredVideo->title }}">
            @else
              <div style="position:absolute;inset:0;background:linear-gradient(145deg,#2D5E3A,#3A7D6E);display:flex;align-items:center;justify-content:center"><i class="bi bi-play-circle-fill" style="font-size:5rem;color:rgba(255,255,255,.15)"></i></div>
            @endif
            <div class="feat-img-grad"></div>
            <div class="feat-play"><i class="bi bi-play-fill"></i></div>
            <span class="feat-badge"><i class="bi bi-star-fill" style="font-size:.62rem"></i> مميز</span>
            @if($featuredVideo->category_label ?? null)<span class="feat-cat">{{ $featuredVideo->category_label }}</span>@endif
            <span class="feat-dur"><i class="bi bi-clock" style="font-size:.6rem"></i> {{ $featuredVideo->formatted_duration ?? '00:00' }}</span>
          </div>
        </div>
        <div class="col-md-7">
          <div class="feat-body">
            <div class="feat-title">{{ $featuredVideo->title }}</div>
            @if($featuredVideo->description)<p class="feat-desc">{{ Str::limit($featuredVideo->description,200) }}</p>@endif
            <div class="feat-meta">
              <span class="feat-meta-item"><i class="bi bi-person-fill"></i> {{ $featuredVideo->presenter?->name ?? 'مقدم' }}</span>
              <span class="feat-meta-item"><i class="bi bi-eye"></i> {{ number_format($featuredVideo->views??0) }}</span>
              @if($featuredVideo->published_at ?? null)<span class="feat-meta-item"><i class="bi bi-calendar3"></i> {{ $featuredVideo->published_at->format('d M Y') }}</span>@endif
            </div>
            <a href="{{ route('videos.show',$featuredVideo) }}"
               style="display:inline-flex;align-items:center;gap:.45rem;padding:.65rem 1.5rem;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;font-size:.85rem;font-weight:800;border-radius:12px;text-decoration:none;box-shadow:0 5px 18px rgba(45,94,58,.28);transition:all .28s"
               onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 10px 28px rgba(45,94,58,.4)'"
               onmouseout="this.style.transform='';this.style.boxShadow='0 5px 18px rgba(45,94,58,.28)'">
              <i class="bi bi-play-circle-fill"></i> شاهد الآن
            </a>
          </div>
        </div>
      </div>
    </div>
    @endif

    {{-- Videos grid --}}
    <div class="row g-3">
      @forelse($videos as $vi => $video)
      <div class="col-sm-6 col-xl-4" data-sr="up" data-sr-d="{{ ($vi%3)+1 }}">
        <div class="vc">
          <div class="vc-img">
            @if($video->thumbnail_url)
              <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}">
            @else
              @php $vBgs=['linear-gradient(145deg,#2D5E3A,#3A7D6E)','linear-gradient(145deg,#1a2e20,#2D5E3A)','linear-gradient(145deg,#3A7D6E,#2a6b5d)','linear-gradient(145deg,#C4A882,#a8885e)']; @endphp
              <div class="vc-ph" style="background:{{ $vBgs[$vi%4] }}"><i class="bi bi-play-circle-fill"></i></div>
            @endif
            <div class="vc-play-overlay">
              <div class="vc-play-btn"><i class="bi bi-play-fill"></i></div>
            </div>
            @if($video->category_label ?? null)<span class="vc-badge vc-cat-b">{{ $video->category_label }}</span>@endif
            <span class="vc-badge vc-dur-b" style="position:absolute"><i class="bi bi-clock" style="font-size:.6rem"></i> {{ $video->formatted_duration ?? '00:00' }}</span>
          </div>
          <div class="vc-body">
            <div class="vc-title">{{ $video->title }}</div>
            @if($video->description)<div class="vc-desc">{{ $video->description }}</div>@endif
            <div class="vc-auth"><i class="bi bi-person-fill"></i> {{ $video->presenter?->name ?? 'مقدم' }}</div>
            <div class="vc-foot">
              <div class="vc-stats">
                <span class="vc-stat"><i class="bi bi-eye"></i> {{ number_format($video->views??0) }}</span>
                @if($video->published_at ?? null)<span class="vc-stat"><i class="bi bi-calendar3"></i> {{ $video->published_at->format('M Y') }}</span>@endif
              </div>
              <a href="{{ route('videos.show',$video) }}" class="vc-watch"><i class="bi bi-play-fill" style="font-size:.68rem"></i> شاهد</a>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12" data-sr="zoom">
        <div class="vp-empty">
          <div class="vp-empty-ico"><i class="bi bi-play-circle"></i></div>
          <h3 style="font-size:1.2rem;font-weight:800;color:var(--dark);margin-bottom:.6rem">لا توجد فيديوهات</h3>
          <p style="color:var(--muted);font-size:.85rem;margin-bottom:1.5rem">لم يتم العثور على فيديوهات تطابق معايير البحث</p>
          <a href="{{ route('videos') }}" class="btn-vp-pri" style="font-size:.84rem;padding:.6rem 1.5rem"><i class="bi bi-arrow-clockwise"></i> عرض الكل</a>
        </div>
      </div>
      @endforelse
    </div>

    {{-- Pagination --}}
    @if($videos->hasPages())
    <div class="vp-pages" data-sr="up">{{ $videos->withQueryString()->links() }}</div>
    @endif

  </main>

</div>{{-- /vp-layout --}}
</div>{{-- /container --}}
</div>

{{-- ════ QUICK CATEGORIES ══════════════════════ --}}
@if(!request()->hasAny(['search','category','duration']))
<section style="background:#fff;padding:5rem 0">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <span style="display:inline-flex;align-items:center;gap:.5rem;padding:.35rem 1rem;background:rgba(45,94,58,.08);border-radius:50px;font-size:.78rem;font-weight:700;color:var(--g1);margin-bottom:.7rem">
        <i class="bi bi-grid-3x3-gap-fill"></i> استكشف التصنيفات
      </span>
      <h2 style="font-size:clamp(1.7rem,4vw,2.3rem);font-weight:900;color:var(--dark);line-height:1.2">
        ابحث حسب <span style="color:var(--g1);position:relative">التصنيف</span>
      </h2>
    </div>
    <div class="row g-4">
      @php $qcats=[
        ['nm'=>'علم النفس',       'slug'=>'psychology',    'i'=>'bi-heart-pulse-fill', 'bg'=>'linear-gradient(135deg,#2D5E3A,#3A7D6E)','d'=>'فيديوهات متخصصة في الصحة النفسية والسلوك البشري'],
        ['nm'=>'الإدمان والعلاج', 'slug'=>'addiction',     'i'=>'bi-shield-heart-fill','bg'=>'linear-gradient(135deg,#1a2e20,#2D5E3A)','d'=>'دعم علمي موثوق في رحلة التعافي والعلاج'],
        ['nm'=>'العلاقات',        'slug'=>'relationships', 'i'=>'bi-people-fill',      'bg'=>'linear-gradient(135deg,#3A7D6E,#2a6b5d)','d'=>'محتوى توعوي حول العلاقات الصحية والمجتمع'],
      ]; @endphp
      @foreach($qcats as $qi=>$qc)
      <div class="col-md-4" data-sr="up" data-sr-d="{{ $qi+1 }}">
        <a href="{{ route('videos',['category'=>$qc['slug']]) }}" class="qcat">
          <div class="qcat-ico" style="background:{{ $qc['bg'] }}"><i class="bi {{ $qc['i'] }}"></i></div>
          <div class="qcat-n">{{ $qc['nm'] }}</div>
          <div class="qcat-d">{{ $qc['d'] }}</div>
          <div class="qcat-cnt-wrap">
            <i class="bi bi-play-circle" style="font-size:.63rem;color:var(--g1)"></i>
            <span class="qcat-cnt">{{ \App\Models\Video::where('category',$qc['slug'])->count() }} فيديو</span>
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
const srIO = new IntersectionObserver(es => {
  es.forEach(e => { if(e.isIntersecting){ e.target.classList.add('done'); srIO.unobserve(e.target); }});
}, { threshold: 0.08 });
document.querySelectorAll('[data-sr]').forEach(el => srIO.observe(el));

/* Card tilt */
document.querySelectorAll('.vc').forEach(card => {
  card.addEventListener('mousemove', e => {
    const r = card.getBoundingClientRect();
    const x = (e.clientX - r.left)/r.width  - 0.5;
    const y = (e.clientY - r.top) /r.height - 0.5;
    card.style.transform = `translateY(-8px) scale(1.005) rotateY(${x*5}deg) rotateX(${-y*3}deg)`;
  });
  card.addEventListener('mouseleave', () => { card.style.transform = ''; });
});
</script>
@endpush