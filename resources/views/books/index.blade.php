@extends('layouts.app')
@section('title', 'المكتبة')

@push('styles')
<style>
/* ════════════════════════════════════════════
   WA3Y BOOKS PAGE — TOKENS
════════════════════════════════════════════ */
:root{
  --g1:#2D5E3A;--g2:#3d7a4e;--teal:#3A7D6E;--teal2:#2a6b5d;
  --gold:#C4A882;--gold2:#a8885e;--gold3:#e8d5b7;
  --cream:#F0EFEC;--cream2:#e5e3de;--dark:#1a2e20;
  --muted:#6b7280;--ink:#2c3e35;
  --bd:rgba(196,168,130,.18);
  --sh-sm:0 2px 12px rgba(45,94,58,.07);
  --sh-md:0 6px 28px rgba(45,94,58,.11);
  --sh-lg:0 20px 56px rgba(45,94,58,.14);
}
.bp{font-family:'Tajawal',sans-serif}

/* ════ HERO ════════════════════════════════ */
.bp-hero{
  background:var(--dark);position:relative;
  overflow:hidden;padding:4.5rem 0 5.5rem;
}
.bp-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 75% 65% at 10% 10%,rgba(45,94,58,.65) 0%,transparent 55%),
    radial-gradient(ellipse 55% 70% at 90% 88%,rgba(58,125,110,.38) 0%,transparent 55%),
    linear-gradient(165deg,#0c1c11 0%,#1a2e20 52%,#091409 100%);
}
.bp-hero-grid{
  position:absolute;inset:0;
  background-image:
    linear-gradient(rgba(196,168,130,.06) 1px,transparent 1px),
    linear-gradient(90deg,rgba(196,168,130,.06) 1px,transparent 1px);
  background-size:52px 52px;
  animation:bpGrid 28s linear infinite;
}
@keyframes bpGrid{to{background-position:52px 52px}}
.bp-orb{position:absolute;border-radius:50%;filter:blur(72px);pointer-events:none}
.bp-orb-1{width:480px;height:480px;background:rgba(45,94,58,.27);top:-130px;right:-80px;animation:bpOrb 9s ease-in-out infinite}
.bp-orb-2{width:360px;height:360px;background:rgba(58,125,110,.17);bottom:-80px;left:-60px;animation:bpOrb 11s ease-in-out infinite reverse}
@keyframes bpOrb{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.22);opacity:.55}}
.bp-wave{position:absolute;bottom:-2px;left:0;right:0}

/* hero text */
@keyframes bpIn{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}
@keyframes bpGold{0%{background-position:200% center}100%{background-position:-200% center}}
@keyframes bpBlink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 7px rgba(74,222,128,0)}}
.bp-tag  {animation:bpIn .7s .1s ease both}
.bp-h1   {animation:bpIn .8s .2s ease both}
.bp-p    {animation:bpIn .8s .35s ease both}
.bp-stats{animation:bpIn .8s .5s ease both;opacity:0}
.bp-dot  {width:8px;height:8px;border-radius:50%;background:#4ade80;animation:bpBlink 1.6s infinite;flex-shrink:0}
.gold-shine{
  background:linear-gradient(135deg,var(--gold) 0%,#fff 50%,var(--gold) 100%);
  background-size:200% auto;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  animation:bpGold 4s linear infinite;
}

/* stats strip */
.bp-stat-strip{
  display:flex;flex-wrap:wrap;gap:.75rem;margin-top:2.2rem;
}
.bp-stat{
  display:flex;align-items:center;gap:.65rem;
  background:rgba(255,255,255,.06);backdrop-filter:blur(14px);
  border:1px solid rgba(255,255,255,.1);border-radius:14px;
  padding:.75rem 1.2rem;flex:1;min-width:120px;
  transition:all .3s;
}
.bp-stat:hover{background:rgba(45,94,58,.22);border-color:rgba(45,94,58,.35);transform:translateY(-3px)}
.bp-stat-ico{
  width:36px;height:36px;border-radius:10px;
  display:flex;align-items:center;justify-content:center;
  font-size:.9rem;color:#fff;flex-shrink:0;
}
.bp-stat-num{font-size:1.2rem;font-weight:900;color:#fff;line-height:1}
.bp-stat-lbl{font-size:.68rem;color:rgba(255,255,255,.45);margin-top:2px}

/* ════ LAYOUT WRAPPER ══════════════════════ */
/* KEY: sidebar is fixed-position via sticky inside a scroll container */
.bp-layout{
  display:grid;
  grid-template-columns:280px 1fr;
  grid-template-rows:1fr;
  gap:1.75rem;
  align-items:start;
  padding:2rem 1.5rem 4rem;
  max-width:1400px;
  margin:0 auto;
}

/* ════ SIDEBAR ═════════════════════════════ */
.bp-sidebar{
  position:sticky;
  top:84px;               /* below navbar */
  max-height:calc(100vh - 100px);
  overflow-y:auto;
  /* hide scrollbar but keep scrollable */
  scrollbar-width:thin;
  scrollbar-color:rgba(196,168,130,.3) transparent;
}
.bp-sidebar::-webkit-scrollbar{width:4px}
.bp-sidebar::-webkit-scrollbar-track{background:transparent}
.bp-sidebar::-webkit-scrollbar-thumb{background:rgba(196,168,130,.3);border-radius:2px}

.filter-panel{
  background:#fff;border-radius:20px;
  border:1px solid var(--bd);
  box-shadow:var(--sh-md);
  overflow:hidden;
}
.filter-panel::before{
  content:'';display:block;height:3px;
  background:linear-gradient(90deg,var(--g1),var(--teal),var(--gold));
}
.filter-head{
  padding:1.25rem 1.4rem;
  display:flex;align-items:center;justify-content:space-between;
  border-bottom:1px solid rgba(196,168,130,.12);
}
.filter-head-title{
  display:flex;align-items:center;gap:.6rem;
  font-size:.92rem;font-weight:800;color:var(--dark);
}
.filter-head-ico{
  width:32px;height:32px;border-radius:9px;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  display:flex;align-items:center;justify-content:center;
  color:#fff;font-size:.8rem;flex-shrink:0;
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
  display:flex;align-items:center;justify-content:center;
  color:#fff;font-size:.78rem;
}
.f-search{
  width:100%;padding:.75rem .9rem .75rem 1rem;
  padding-right:52px;
  border:1.5px solid rgba(45,94,58,.12);border-radius:11px;
  font-size:.84rem;font-family:'Tajawal',sans-serif;
  background:var(--cream);color:var(--dark);transition:all .25s;
}
.f-search:focus{outline:none;border-color:var(--g1);box-shadow:0 0 0 3px rgba(45,94,58,.08);background:#fff}
.f-search::placeholder{color:#a0aba4}

/* section */
.f-section{margin-bottom:1.3rem}
.f-sec-title{
  font-size:.7rem;font-weight:700;color:var(--gold2);
  letter-spacing:.07em;text-transform:uppercase;
  margin-bottom:.65rem;display:flex;align-items:center;gap:.4rem;
}
.f-sec-title::after{content:'';flex:1;height:1px;background:linear-gradient(90deg,rgba(196,168,130,.3),transparent)}

/* checkbox row */
.f-check{
  display:flex;align-items:center;justify-content:space-between;
  padding:.38rem .45rem;border-radius:9px;cursor:pointer;
  transition:background .18s;margin-bottom:1px;
}
.f-check:hover{background:rgba(45,94,58,.05)}
.f-check input{display:none}
.f-check-label{
  display:flex;align-items:center;gap:.5rem;
  font-size:.83rem;color:var(--ink);cursor:pointer;flex:1;font-weight:500;
}
.f-check-box{
  width:17px;height:17px;border-radius:5px;
  border:1.5px solid rgba(45,94,58,.22);background:#fff;
  display:flex;align-items:center;justify-content:center;
  transition:all .2s;flex-shrink:0;
}
.f-check input:checked + .f-check-label .f-check-box{
  background:var(--g1);border-color:var(--g1);
}
.f-check input:checked + .f-check-label .f-check-box::after{
  content:'\F633';font-family:'bootstrap-icons';color:#fff;font-size:.65rem;
}
.f-cnt{
  font-size:.68rem;color:var(--muted);
  background:rgba(196,168,130,.12);
  padding:1px 6px;border-radius:10px;flex-shrink:0;
}

/* active chips */
.f-chips{display:flex;flex-wrap:wrap;gap:.38rem;margin-bottom:1rem}
.f-chip{
  display:inline-flex;align-items:center;gap:.32rem;
  padding:.24rem .65rem;border-radius:20px;
  font-size:.72rem;font-weight:600;
  background:rgba(45,94,58,.08);border:1px solid rgba(45,94,58,.14);color:var(--g1);
}
.f-chip-x{cursor:pointer;color:var(--muted);transition:color .15s;line-height:1}
.f-chip-x:hover{color:#e74c3c}

/* divider */
.f-divider{height:1px;background:rgba(196,168,130,.15);margin:1.2rem 0}

/* apply / reset */
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
  display:flex;align-items:center;justify-content:center;gap:.45rem;
}
.f-reset:hover{border-color:var(--g1);color:var(--g1);background:rgba(45,94,58,.04)}

/* ════ MAIN CONTENT ════════════════════════ */
.bp-main{min-width:0} /* prevent overflow */

/* results toolbar */
.results-bar{
  display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem;
  padding:.85rem 1.2rem;background:#fff;border-radius:14px;
  border:1px solid var(--bd);box-shadow:var(--sh-sm);margin-bottom:1.4rem;
}
.results-info{
  display:flex;align-items:center;gap:.55rem;
  font-size:.84rem;font-weight:600;color:var(--muted);
}
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
  font-size:.8rem;font-family:'Tajawal',sans-serif;
  background:#fff;color:var(--dark);cursor:pointer;transition:border-color .2s;
}
.sort-sel:focus{outline:none;border-color:var(--g1)}

/* ════ FEATURED BOOK ═══════════════════════ */
.feat-book{
  background:#fff;border-radius:20px;
  border:1px solid var(--bd);box-shadow:var(--sh-md);
  overflow:hidden;margin-bottom:1.75rem;
  position:relative;
}
.feat-book::before{
  content:'';position:absolute;top:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg,var(--g1),var(--gold),var(--teal));
}
.feat-img{
  position:relative;min-height:260px;overflow:hidden;
  background:linear-gradient(145deg,var(--g1),var(--teal));
}
.feat-img img{width:100%;height:100%;object-fit:cover;transition:transform .6s}
.feat-book:hover .feat-img img{transform:scale(1.04)}
.feat-img-grad{
  position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(30,63,39,.35),transparent 60%);
}
.feat-badge{
  position:absolute;top:14px;right:14px;
  background:linear-gradient(135deg,var(--gold),var(--gold2));
  color:var(--dark);padding:.28rem .8rem;border-radius:20px;
  font-size:.72rem;font-weight:700;
  display:inline-flex;align-items:center;gap:.32rem;
}
.feat-cat{
  position:absolute;bottom:14px;right:14px;
  background:rgba(45,94,58,.9);backdrop-filter:blur(6px);
  color:#fff;padding:.25rem .72rem;border-radius:20px;font-size:.7rem;font-weight:700;
}
.feat-lang{
  position:absolute;bottom:14px;left:14px;
  background:rgba(255,255,255,.18);backdrop-filter:blur(6px);
  border:1px solid rgba(255,255,255,.28);
  color:#fff;padding:.25rem .72rem;border-radius:20px;font-size:.7rem;font-weight:700;
}
.feat-body{padding:1.8rem}
.feat-title{font-size:1.35rem;font-weight:900;color:var(--g1);margin-bottom:.65rem;line-height:1.3}
.feat-desc{font-size:.84rem;color:var(--muted);line-height:1.8;margin-bottom:1.1rem}
.feat-meta{display:flex;flex-wrap:wrap;gap:.85rem;margin-bottom:1.1rem}
.feat-meta-item{display:flex;align-items:center;gap:.35rem;font-size:.78rem;color:var(--muted)}
.feat-meta-item i{color:var(--gold)}
.feat-author{
  display:flex;align-items:center;gap:.7rem;
  padding:.75rem;border-radius:13px;
  background:rgba(45,94,58,.04);border:1px solid rgba(196,168,130,.15);
  margin-bottom:1.3rem;
}
.feat-av{
  width:42px;height:42px;border-radius:50%;flex-shrink:0;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:.95rem;color:#fff;overflow:hidden;
}
.feat-av img{width:100%;height:100%;object-fit:cover}
.feat-an{font-size:.85rem;font-weight:700;color:var(--g1)}
.feat-ar{font-size:.7rem;color:var(--muted)}
.feat-btns{display:flex;gap:.65rem;flex-wrap:wrap}

/* btn shortcuts */
.btn-pri{
  display:inline-flex;align-items:center;gap:.45rem;
  padding:.65rem 1.4rem;background:linear-gradient(135deg,var(--g1),var(--teal));
  color:#fff;font-size:.85rem;font-weight:800;border-radius:12px;
  text-decoration:none;border:none;cursor:pointer;
  box-shadow:0 5px 18px rgba(45,94,58,.3);transition:all .28s;
}
.btn-pri:hover{transform:translateY(-2px);box-shadow:0 10px 28px rgba(45,94,58,.4);color:#fff}
.btn-out{
  display:inline-flex;align-items:center;gap:.45rem;
  padding:.65rem 1.4rem;background:transparent;
  border:1.5px solid rgba(45,94,58,.22);color:var(--g1);
  font-size:.85rem;font-weight:700;border-radius:12px;
  text-decoration:none;cursor:pointer;transition:all .25s;
}
.btn-out:hover{background:var(--g1);color:#fff;border-color:var(--g1)}

/* ════ CATEGORY SECTION HEADER ══════════════ */
.cat-hd{
  display:flex;align-items:center;justify-content:space-between;
  margin-bottom:1rem;padding-bottom:.8rem;
  border-bottom:1.5px solid rgba(196,168,130,.15);
}
.cat-hd-left{display:flex;align-items:center;gap:.65rem}
.cat-hd-ico{
  width:38px;height:38px;border-radius:11px;
  display:flex;align-items:center;justify-content:center;
  font-size:.95rem;color:#fff;
}
.cat-hd-name{font-size:1rem;font-weight:800;color:var(--dark)}
.cat-hd-cnt{font-size:.75rem;color:var(--muted);font-weight:500;margin-top:1px}
.cat-hd-link{
  display:inline-flex;align-items:center;gap:.38rem;
  font-size:.78rem;font-weight:700;color:var(--g1);text-decoration:none;
  padding:.38rem .85rem;border:1.5px solid rgba(45,94,58,.18);
  border-radius:9px;transition:all .22s;
}
.cat-hd-link:hover{background:var(--g1);color:#fff;border-color:var(--g1)}

/* ════ BOOK CARD ═══════════════════════════ */
.bk{
  background:#fff;border-radius:18px;
  border:1px solid var(--bd);box-shadow:var(--sh-sm);
  overflow:hidden;height:100%;display:flex;flex-direction:column;
  transition:all .35s cubic-bezier(.4,0,.2,1);position:relative;
}
.bk::after{
  content:'';position:absolute;bottom:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg,var(--g1),var(--gold));
  transform:scaleX(0);transform-origin:right;transition:transform .35s;
}
.bk:hover{transform:translateY(-7px);box-shadow:var(--sh-lg)}
.bk:hover::after{transform:scaleX(1)}

/* cover */
.bk-img{position:relative;height:200px;overflow:hidden;flex-shrink:0}
.bk-img img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
.bk:hover .bk-img img{transform:scale(1.07)}
.bk-ph{
  position:absolute;inset:0;display:flex;align-items:center;justify-content:center;
}
.bk-ph i{font-size:3rem;color:rgba(255,255,255,.22)}
.bk-overlay{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(26,46,32,.88) 0%,transparent 55%);
  opacity:0;transition:opacity .3s;
  display:flex;align-items:flex-end;padding:1rem;gap:.5rem;
}
.bk:hover .bk-overlay{opacity:1}
.ov-btn{
  flex:1;padding:.42rem;border:none;border-radius:8px;
  font-family:'Tajawal',sans-serif;font-size:.75rem;font-weight:700;
  cursor:pointer;text-align:center;text-decoration:none;
  display:flex;align-items:center;justify-content:center;gap:.32rem;
  transition:all .2s;
}
.ov-read{background:#fff;color:var(--g1)}.ov-read:hover{background:var(--g1);color:#fff}
.ov-dl{background:var(--gold);color:var(--dark)}.ov-dl:hover{background:var(--gold2);color:#fff}
/* badges */
.bk-badge{
  position:absolute;padding:.22rem .65rem;border-radius:20px;
  font-size:.67rem;font-weight:700;
}
.bk-cat-b{top:11px;right:11px;background:rgba(45,94,58,.9);color:#fff}
.bk-lang-b{top:11px;left:11px;background:rgba(196,168,130,.92);color:var(--dark)}
.bk-pg-b{bottom:60px;right:11px;background:rgba(0,0,0,.55);color:rgba(255,255,255,.88);display:flex;align-items:center;gap:.25rem}

/* body */
.bk-body{padding:1rem 1.1rem 1.1rem;flex:1;display:flex;flex-direction:column}
.bk-title{
  font-size:.92rem;font-weight:800;color:var(--dark);line-height:1.35;
  margin-bottom:.3rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
}
.bk-auth{
  font-size:.74rem;color:var(--muted);font-weight:500;margin-bottom:.6rem;
  display:flex;align-items:center;gap:.3rem;
}
.bk-auth i{color:var(--gold);font-size:.68rem}
.bk-desc{
  font-size:.75rem;color:var(--muted);line-height:1.65;flex:1;
  margin-bottom:.7rem;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
}
.bk-foot{
  display:flex;align-items:center;justify-content:space-between;
  padding-top:.6rem;border-top:1px solid rgba(196,168,130,.15);margin-top:auto;
}
.bk-stats{display:flex;gap:.7rem}
.bk-stat{display:flex;align-items:center;gap:.25rem;font-size:.72rem;color:var(--muted)}
.bk-stat i{font-size:.65rem;color:var(--gold)}
.bk-read{
  display:inline-flex;align-items:center;gap:.35rem;
  padding:.38rem .9rem;background:var(--g1);color:#fff;
  font-size:.75rem;font-weight:700;border-radius:9px;
  text-decoration:none;transition:all .22s;
}
.bk-read:hover{background:var(--dark);color:#fff;transform:translateX(-2px)}

/* empty */
.bp-empty{
  background:#fff;border-radius:20px;border:1px dashed rgba(196,168,130,.3);
  padding:3.5rem 2rem;text-align:center;
}
.bp-empty-ico{
  width:72px;height:72px;border-radius:20px;
  background:var(--cream);border:1px solid var(--bd);
  display:flex;align-items:center;justify-content:center;
  font-size:2rem;color:var(--muted);margin:0 auto 1.2rem;
}

/* ════ SCROLL REVEAL ════════════════════════ */
[data-sr]{opacity:0;transition:opacity .68s ease,transform .68s ease}
[data-sr="up"]{transform:translateY(26px)}
[data-sr="zoom"]{transform:scale(.92)}
[data-sr].done{opacity:1;transform:none}
[data-sr-d="1"]{transition-delay:.08s}
[data-sr-d="2"]{transition-delay:.16s}
[data-sr-d="3"]{transition-delay:.24s}
[data-sr-d="4"]{transition-delay:.32s}
[data-sr-d="5"]{transition-delay:.4s}

/* ════ PAGINATION ═══════════════════════════ */
.bp-pages{display:flex;justify-content:center;gap:.45rem;margin-top:2.5rem;flex-wrap:wrap}
.bp-pages .page-link{
  padding:.5rem 1rem;border:1.5px solid var(--bd);border-radius:9px;
  color:var(--muted);font-size:.8rem;font-weight:700;text-decoration:none;
  transition:all .22s;background:#fff;font-family:'Tajawal',sans-serif;
}
.bp-pages .page-link:hover{background:var(--g1);color:#fff;border-color:var(--g1);transform:translateY(-2px)}
.bp-pages .page-item.active .page-link{
  background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;border-color:var(--g1);
  box-shadow:0 5px 18px rgba(45,94,58,.28);
}

/* ════ RESPONSIVE ══════════════════════════ */
@media(max-width:991px){
  .bp-layout{grid-template-columns:1fr;grid-template-rows:auto auto}
  .bp-sidebar{position:relative;top:0;max-height:none;overflow-y:visible}
  .filter-panel{margin-bottom:1.5rem}
}
@media(max-width:576px){
  .bp-layout{padding:1.25rem 1rem 3rem}
  .feat-title{font-size:1.1rem}
  .feat-btns{flex-direction:column}
}
</style>
@endpush

@section('content')
<div class="bp">

{{-- ════════════════════
     HERO
════════════════════ --}}
<section class="bp-hero">
  <div class="bp-hero-bg"></div>
  <div class="bp-hero-grid"></div>
  <div class="bp-orb bp-orb-1"></div>
  <div class="bp-orb bp-orb-2"></div>

  <div class="container position-relative" style="z-index:2">
    <div class="text-center">

      <div class="bp-tag d-inline-flex justify-content-center mb-3">
        <span style="display:inline-flex;align-items:center;gap:.55rem;padding:.42rem 1.2rem;background:rgba(196,168,130,.1);border:1px solid rgba(196,168,130,.28);border-radius:50px;backdrop-filter:blur(8px)">
          <span class="bp-dot"></span>
          <span style="color:rgba(196,168,130,.9);font-size:.82rem;font-weight:700">مكتبة وعي الرقمية</span>
        </span>
      </div>

      <h1 class="bp-h1" style="font-size:clamp(2.4rem,6vw,4.4rem);font-weight:900;line-height:1.06;color:#fff;margin-bottom:.9rem">
        مكتبة رقمية <span class="gold-shine">متخصصة ومجانية</span>
      </h1>

      <p class="bp-p" style="font-size:1.05rem;color:rgba(255,255,255,.62);line-height:1.9;max-width:540px;margin:0 auto 1.5rem">
        أجمل الكتب في العادات الصحية، الطب الوقائي، والتوعية المجتمعية — مصنّفة بعناية وجاهزة للتحميل المجاني.
      </p>

      <div class="bp-stats d-flex flex-wrap justify-content-center gap-3">
        @php $bstats=[
          ['n'=>\App\Models\Book::published()->count(),'l'=>'كتاب متاح','i'=>'bi-book-fill','bg'=>'linear-gradient(135deg,#2D5E3A,#3A7D6E)'],
          ['n'=>\App\Models\Book::published()->distinct('category')->count('category'),'l'=>'تصنيف','i'=>'bi-grid-fill','bg'=>'linear-gradient(135deg,#3A7D6E,#2a6b5d)'],
          ['n'=>number_format(\App\Models\Book::sum('views')),'l'=>'مشاهدة','i'=>'bi-eye-fill','bg'=>'linear-gradient(135deg,#C4A882,#a8885e)'],
          ['n'=>number_format(\App\Models\Book::sum('download_count')),'l'=>'تحميل','i'=>'bi-download','bg'=>'linear-gradient(135deg,#1a2e20,#2D5E3A)'],
        ]; @endphp
        @foreach($bstats as $bs)
        <div class="bp-stat">
          <div class="bp-stat-ico" style="background:{{ $bs['bg'] }}"><i class="bi {{ $bs['i'] }}"></i></div>
          <div>
            <div class="bp-stat-num">{{ $bs['n'] }}</div>
            <div class="bp-stat-lbl">{{ $bs['l'] }}</div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </div>

  <div class="bp-wave">
    <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block">
      <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,42 1440,38 L1440,70 L0,70 Z" fill="#F0EFEC"/>
    </svg>
  </div>
</section>

{{-- ════════════════════
     MAIN LAYOUT
     sidebar | content
════════════════════ --}}
<div style="background:var(--cream);min-height:70vh">
<div class="bp-layout">

  {{-- ═══ SIDEBAR (sticky filter) ═══ --}}
  <aside class="bp-sidebar">
    <div class="filter-panel">
      <div class="filter-head">
        <div class="filter-head-title">
          <div class="filter-head-ico"><i class="bi bi-sliders"></i></div>
          البحث والتصفية
        </div>
        @if(request()->hasAny(['search','category','language','author_type']))
        <a href="{{ route('books') }}" class="filter-clear-all">
          <i class="bi bi-x-circle"></i> مسح
        </a>
        @endif
      </div>

      <div class="filter-body">
        <form method="GET" action="{{ route('books') }}" id="filterForm">

          {{-- Active chips --}}
          @if(request()->hasAny(['search','category','language','author_type']))
          <div class="f-chips">
            @if(request('search'))
            <span class="f-chip">{{ Str::limit(request('search'),14) }}<span class="f-chip-x" onclick="rmFilter('search')">×</span></span>
            @endif
            @foreach((array)request('category',[]) as $cv)
            @php $cl=['psychology'=>'علم النفس','addiction'=>'الإدمان','relationships'=>'العلاقات','self_development'=>'التطوير الذاتي','family'=>'الأسرة'][$cv]??$cv @endphp
            <span class="f-chip">{{ $cl }}<span class="f-chip-x" onclick="rmArr('category','{{ $cv }}')">×</span></span>
            @endforeach
            @foreach((array)request('language',[]) as $lv)
            <span class="f-chip">{{ $lv==='ar'?'عربي':'English' }}<span class="f-chip-x" onclick="rmArr('language','{{ $lv }}')">×</span></span>
            @endforeach
          </div>
          @endif

          {{-- Search --}}
          <div class="f-search-wrap">
            <div class="f-search-ico"><i class="bi bi-search"></i></div>
            <input type="text" name="search" class="f-search"
                   placeholder="ابحث عن كتاب أو مؤلف..."
                   value="{{ request('search') }}">
          </div>

          {{-- Categories --}}
          <div class="f-section">
            <div class="f-sec-title"><i class="bi bi-grid-3x3-gap" style="color:var(--gold2)"></i> الفئة</div>
            @php $fCats=['psychology'=>'علم النفس','addiction'=>'الإدمان','relationships'=>'العلاقات','self_development'=>'التطوير الذاتي','family'=>'الأسرة والطفل'] @endphp
            @foreach($fCats as $fv=>$fl)
            <label class="f-check">
              <input type="checkbox" name="category[]" value="{{ $fv }}" {{ in_array($fv,(array)request('category',[]))?'checked':'' }}>
              <span class="f-check-label">
                <span class="f-check-box"></span>{{ $fl }}
              </span>
              <span class="f-cnt">{{ \App\Models\Book::published()->where('category',$fv)->count() }}</span>
            </label>
            @endforeach
          </div>

          <div class="f-divider"></div>

          {{-- Language --}}
          <div class="f-section">
            <div class="f-sec-title"><i class="bi bi-translate" style="color:var(--gold2)"></i> اللغة</div>
            @foreach(['ar'=>'عربي','en'=>'English'] as $lv=>$ll)
            <label class="f-check">
              <input type="checkbox" name="language[]" value="{{ $lv }}" {{ in_array($lv,(array)request('language',[]))?'checked':'' }}>
              <span class="f-check-label">
                <span class="f-check-box"></span>{{ $ll }}
              </span>
              <span class="f-cnt">{{ \App\Models\Book::published()->where('language',$lv)->count() }}</span>
            </label>
            @endforeach
          </div>

          <div class="f-divider"></div>

          {{-- Author type --}}
          <div class="f-section" style="margin-bottom:1.4rem">
            <div class="f-sec-title"><i class="bi bi-person-badge" style="color:var(--gold2)"></i> نوع المؤلف</div>
            @foreach(['doctor'=>'طبيب','psychologist'=>'أخصائي نفسي','other'=>'مؤلف عام'] as $av=>$al)
            <label class="f-check">
              <input type="checkbox" name="author_type[]" value="{{ $av }}" {{ in_array($av,(array)request('author_type',[]))?'checked':'' }}>
              <span class="f-check-label"><span class="f-check-box"></span>{{ $al }}</span>
            </label>
            @endforeach
          </div>

          <button type="submit" class="f-apply"><i class="bi bi-funnel-fill"></i> تطبيق الفلاتر</button>
          @if(request()->hasAny(['search','category','language','author_type']))
          <a href="{{ route('books') }}" class="f-reset d-flex"><i class="bi bi-arrow-clockwise"></i> مسح الكل</a>
          @endif

        </form>
      </div>
    </div>
  </aside>

  {{-- ═══ MAIN CONTENT ═══ --}}
  <main class="bp-main">

    {{-- Results toolbar --}}
    <div class="results-bar" data-sr="up">
      <div class="results-info">
        <i class="bi bi-book" style="color:var(--g1)"></i>
        <strong>{{ $books->total() }}</strong> كتاب
        @if(request()->hasAny(['search','category','language','author_type']))
        <span class="results-pill">نتائج البحث</span>
        @endif
      </div>
      <div class="sort-wrap">
        <label>ترتيب:</label>
        <select class="sort-sel" name="sort" form="filterForm" onchange="document.getElementById('filterForm').submit()">
          <option value="latest"    {{ request('sort','latest')==='latest'   ?'selected':'' }}>الأحدث</option>
          <option value="popular"   {{ request('sort')==='popular'           ?'selected':'' }}>الأكثر مشاهدة</option>
          <option value="downloads" {{ request('sort')==='downloads'         ?'selected':'' }}>الأكثر تحميلاً</option>
        </select>
      </div>
    </div>

    {{-- ═══ DEFAULT VIEW (no filters) ═══ --}}
    @if(!request()->hasAny(['search','category','language','author_type']))

      {{-- Featured book --}}
      @if(isset($featuredBook) && $featuredBook)
      <div class="feat-book" data-sr="up">
        <div class="row g-0">
          <div class="col-md-5">
            <div class="feat-img" style="min-height:280px">
              @if($featuredBook->cover_image)
                <img src="{{ asset('storage/'.$featuredBook->cover_image) }}" alt="{{ $featuredBook->title }}">
              @else
                <div style="position:absolute;inset:0;background:linear-gradient(145deg,#2D5E3A,#3A7D6E);display:flex;align-items:center;justify-content:center"><i class="bi bi-book-fill" style="font-size:6rem;color:rgba(255,255,255,.18)"></i></div>
              @endif
              <div class="feat-img-grad"></div>
              <span class="feat-badge"><i class="bi bi-star-fill" style="font-size:.65rem"></i> مميز</span>
              @if($featuredBook->category)<span class="feat-cat">{{ $featuredBook->category_label }}</span>@endif
              <span class="feat-lang">{{ $featuredBook->language==='ar'?'عربي':'English' }}</span>
            </div>
          </div>
          <div class="col-md-7">
            <div class="feat-body">
              <div class="feat-title">{{ $featuredBook->title }}</div>
              @if($featuredBook->description)<p class="feat-desc">{{ Str::limit($featuredBook->description,200) }}</p>@endif
              <div class="feat-meta">
                @if($featuredBook->pages)<span class="feat-meta-item"><i class="bi bi-file-text"></i> {{ $featuredBook->pages }} صفحة</span>@endif
                <span class="feat-meta-item"><i class="bi bi-eye"></i> {{ number_format($featuredBook->views??0) }}</span>
                <span class="feat-meta-item"><i class="bi bi-download"></i> {{ number_format($featuredBook->download_count??0) }}</span>
              </div>
              <div class="feat-author">
                <div class="feat-av">{{ mb_substr($featuredBook->author_name,0,1) }}</div>
                <div>
                  <div class="feat-an">{{ $featuredBook->author_name }}</div>
                  <div class="feat-ar">{{ ['doctor'=>'طبيب','psychologist'=>'أخصائي نفسي'][$featuredBook->author_type??'']??'مؤلف' }}</div>
                </div>
              </div>
              <div class="feat-btns">
                <a href="{{ route('books.show',$featuredBook->slug??$featuredBook->id) }}" class="btn-pri"><i class="bi bi-book-half"></i> قراءة الآن</a>
                @if($featuredBook->pdf_file)
                <a href="{{ route('books.download',$featuredBook->slug??$featuredBook->id) }}" class="btn-out"><i class="bi bi-download"></i> تحميل PDF</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

      {{-- Category sections --}}
      @php
        $catSections=[
          ['slug'=>'psychology',      'name'=>'علم النفس',      'ico'=>'bi-heart-pulse-fill','bg'=>'linear-gradient(135deg,#2D5E3A,#3A7D6E)'],
          ['slug'=>'addiction',       'name'=>'الإدمان',        'ico'=>'bi-shield-heart-fill','bg'=>'linear-gradient(135deg,#1a2e20,#2D5E3A)'],
          ['slug'=>'self_development','name'=>'التطوير الذاتي','ico'=>'bi-trophy-fill',      'bg'=>'linear-gradient(135deg,#a8885e,#C4A882)'],
          ['slug'=>'family',          'name'=>'الأسرة والطفل', 'ico'=>'bi-people-fill',      'bg'=>'linear-gradient(135deg,#3A7D6E,#2a6b5d)'],
          ['slug'=>'relationships',   'name'=>'العلاقات',       'ico'=>'bi-heart-fill',       'bg'=>'linear-gradient(135deg,#C4A882,#2D5E3A)'],
        ];
      @endphp

      @foreach($catSections as $cs)
      @php $catBooks=\App\Models\Book::published()->where('category',$cs['slug'])->take(6)->get() @endphp
      @if($catBooks->count()>0)
      <div class="mb-5" data-sr="up">
        <div class="cat-hd">
          <div class="cat-hd-left">
            <div class="cat-hd-ico" style="background:{{ $cs['bg'] }}"><i class="bi {{ $cs['ico'] }}"></i></div>
            <div>
              <div class="cat-hd-name">{{ $cs['name'] }}</div>
              <div class="cat-hd-cnt">{{ \App\Models\Book::published()->where('category',$cs['slug'])->count() }} كتاب</div>
            </div>
          </div>
          <a href="{{ route('books',['category'=>$cs['slug']]) }}" class="cat-hd-link">
            عرض الكل <i class="bi bi-arrow-left"></i>
          </a>
        </div>
        <div class="row g-3">
          @foreach($catBooks as $bi=>$book)
          <div class="col-sm-6 col-xl-4" data-sr="up" data-sr-d="{{ ($bi%3)+1 }}">
            @include('partials.book-card', ['book'=>$book, 'idx'=>$bi])
          </div>
          @endforeach
        </div>
      </div>
      @endif
      @endforeach

    @else
    {{-- ═══ FILTERED VIEW ═══ --}}

      @if($books->isEmpty())
      <div class="bp-empty" data-sr="zoom">
        <div class="bp-empty-ico"><i class="bi bi-book"></i></div>
        <h3 style="font-size:1.2rem;font-weight:800;color:var(--dark);margin-bottom:.6rem">لا توجد كتب مطابقة</h3>
        <p style="color:var(--muted);font-size:.85rem;margin-bottom:1.5rem">جرّب تعديل معايير البحث أو مسح الفلاتر</p>
        <a href="{{ route('books') }}" class="btn-pri" style="font-size:.84rem;padding:.6rem 1.5rem"><i class="bi bi-arrow-clockwise"></i> عرض الكل</a>
      </div>
      @else
      <div class="row g-3">
        @foreach($books as $bi=>$book)
        <div class="col-sm-6 col-xl-4" data-sr="up" data-sr-d="{{ ($bi%3)+1 }}">
          @include('partials.book-card', ['book'=>$book, 'idx'=>$bi])
        </div>
        @endforeach
      </div>
      @if($books->hasPages())
      <div class="bp-pages">{{ $books->withQueryString()->links() }}</div>
      @endif
      @endif

    @endif

    {{-- All books section (below category sections) --}}
    @if(!request()->hasAny(['search','category','language','author_type']))
    <div class="mt-2 mb-2" data-sr="up">
      <div class="cat-hd">
        <div class="cat-hd-left">
          <div class="cat-hd-ico" style="background:linear-gradient(135deg,#2D5E3A,#C4A882)"><i class="bi bi-collection-fill"></i></div>
          <div>
            <div class="cat-hd-name">جميع الكتب</div>
            <div class="cat-hd-cnt">{{ $books->total() }} كتاب</div>
          </div>
        </div>
      </div>
      <div class="row g-3">
        @foreach($books as $bi=>$book)
        <div class="col-sm-6 col-xl-4" data-sr="up" data-sr-d="{{ ($bi%3)+1 }}">
          @include('partials.book-card', ['book'=>$book, 'idx'=>$bi])
        </div>
        @endforeach
      </div>
      @if($books->hasPages())
      <div class="bp-pages">{{ $books->withQueryString()->links() }}</div>
      @endif
    </div>
    @endif

  </main>

</div>{{-- /bp-layout --}}
</div>

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

/* Filter chip helpers */
function rmFilter(name){
  const u = new URL(location.href);
  u.searchParams.delete(name);
  location.href = u.toString();
}
function rmArr(name, val){
  const u = new URL(location.href);
  const vals = u.searchParams.getAll(name+'[]').filter(v=>v!==val);
  u.searchParams.delete(name+'[]');
  vals.forEach(v=>u.searchParams.append(name+'[]',v));
  location.href = u.toString();
}

/* Book card tilt */
document.querySelectorAll('.bk').forEach(card => {
  card.addEventListener('mousemove', e => {
    const r = card.getBoundingClientRect();
    const x = (e.clientX - r.left)/r.width  - 0.5;
    const y = (e.clientY - r.top) /r.height - 0.5;
    card.style.transform = `translateY(-7px) scale(1.005) rotateY(${x*5}deg) rotateX(${-y*3}deg)`;
  });
  card.addEventListener('mouseleave', () => { card.style.transform = ''; });
});
</script>
@endpush