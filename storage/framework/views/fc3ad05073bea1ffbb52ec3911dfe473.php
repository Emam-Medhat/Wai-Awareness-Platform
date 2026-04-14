<?php $__env->startSection('title', 'اتصل بنا'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ════════════════════════════════════════════
   WA3Y CONTACT PAGE v3 — ENHANCED DESIGN
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
.cp{font-family:'Tajawal',sans-serif}

/* ════ HERO ════════════════════════════════ */
.cp-hero{
  min-height:75vh;background:linear-gradient(135deg,var(--dark) 0%,#0f1f15 50%,#0a1409 100%);
  position:relative;overflow:hidden;display:flex;align-items:center;
}
.cp-hero-bg{
  position:absolute;inset:0;
  background:
    radial-gradient(ellipse 80% 70% at 15% 25%,rgba(45,94,58,.85) 0%,transparent 60%),
    radial-gradient(ellipse 65% 75% at 88% 75%,rgba(58,125,110,.65) 0%,transparent 55%),
    radial-gradient(ellipse 45% 55% at 45% 85%,rgba(233,30,99,.25) 0%,transparent 50%),
    linear-gradient(165deg,#0c1c11 0%,#1a2e20 40%,#0f1f15 80%,#0a1409 100%);
}
.cp-hero-grid{
  position:absolute;inset:0;
  background-image:
    linear-gradient(rgba(196,168,130,.08) 1px,transparent 1px),
    linear-gradient(90deg,rgba(196,168,130,.08) 1px,transparent 1px);
  background-size:64px 64px;animation:cpGrid 32s linear infinite;
}
@keyframes cpGrid{to{background-position:64px 64px}}
.cp-orb{position:absolute;border-radius:50%;filter:blur(100px);pointer-events:none}
.cp-orb-1{width:600px;height:600px;background:radial-gradient(circle,rgba(45,94,58,.35) 0%,rgba(45,94,58,.1) 70%,transparent 100%);top:-150px;right:-100px;animation:cpOrb 12s ease-in-out infinite}
.cp-orb-2{width:450px;height:450px;background:radial-gradient(circle,rgba(58,125,110,.25) 0%,rgba(58,125,110,.08) 70%,transparent 100%);bottom:-100px;left:-80px;animation:cpOrb 15s ease-in-out infinite reverse}
.cp-orb-3{width:300px;height:300px;background:radial-gradient(circle,rgba(233,30,99,.2) 0%,rgba(233,30,99,.05) 70%,transparent 100%);top:20%;left:10%;animation:cpOrb 18s ease-in-out infinite 2s}
@keyframes cpOrb{0%,100%{transform:scale(1) rotate(0deg)}50%{transform:scale(1.3) rotate(180deg);opacity:.7}}
.cp-shape{position:absolute;border-radius:50%;background:linear-gradient(135deg,rgba(196,168,130,.12),rgba(45,94,58,.08));border:1px solid rgba(196,168,130,.1);animation:cpFlt 16s ease-in-out infinite;box-shadow:0 8px 32px rgba(196,168,130,.1)}
.cp-shape:nth-child(3){width:80px;height:80px;top:15%;right:12%;animation-delay:0s}
.cp-shape:nth-child(4){width:55px;height:55px;top:70%;right:28%;animation-delay:5s}
.cp-shape:nth-child(5){width:95px;height:95px;top:35%;left:8%;animation-delay:10s}
.cp-shape:nth-child(6){width:40px;height:40px;top:45%;right:65%;animation-delay:7s}
@keyframes cpFlt{0%,100%{transform:translateY(0) rotate(0deg)}50%{transform:translateY(-25px) rotate(180deg)}}
.cp-wave{position:absolute;bottom:-2px;left:0;right:0}

/* hero text animations */
@keyframes cpIn{from{opacity:0;transform:translateY(26px)}to{opacity:1;transform:translateY(0)}}
@keyframes cpGold{0%{background-position:200% center}100%{background-position:-200% center}}
@keyframes cpBlink{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(74,222,128,.5)}50%{opacity:.7;box-shadow:0 0 0 8px rgba(74,222,128,0)}}
.cp-tag  {animation:cpIn .7s .1s ease both}
.cp-h1   {animation:cpIn .8s .22s ease both}
.cp-p    {animation:cpIn .8s .38s ease both}
.cp-chips{animation:cpIn .8s .52s ease both}
.cp-dot  {width:10px;height:10px;border-radius:50%;background:var(--success);animation:cpBlink 2s infinite;flex-shrink:0;box-shadow:0 0 12px rgba(74,222,128,.5)}
.gold-shine{
  background:linear-gradient(135deg,var(--gold) 0%,#fff 25%,var(--gold) 50%,#fff 75%,var(--gold) 100%);
  background-size:300% auto;-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  animation:cpGold 5s linear infinite;filter:drop-shadow(0 2px 8px rgba(196,168,130,.3));
}
/* hero stat chips */
.cp-chip{
  display:flex;align-items:center;gap:.75rem;
  background:rgba(255,255,255,.08);backdrop-filter:blur(20px);
  border:1px solid rgba(255,255,255,.15);border-radius:20px;
  padding:1rem 1.4rem;flex:1;min-width:140px;transition:all .4s cubic-bezier(.4,0,.2,1);
  box-shadow:0 8px 32px rgba(0,0,0,.1);
}
.cp-chip:hover{background:rgba(45,94,58,.25);border-color:rgba(45,94,58,.5);transform:translateY(-6px) scale(1.02);box-shadow:0 16px 48px rgba(45,94,58,.2)}
.cp-chip-ico{width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;color:#fff;font-size:.9rem;flex-shrink:0;box-shadow:0 6px 20px rgba(45,94,58,.3)}
.cp-chip-n{font-size:1rem;font-weight:900;color:#fff;line-height:1.2;letter-spacing:.02em}
.cp-chip-l{font-size:.72rem;color:rgba(255,255,255,.6);font-weight:600}

/* ════ WHY SECTION ═════════════════════════ */
.why-sec{background:linear-gradient(135deg,var(--cream) 0%,rgba(240,239,236,.8) 100%);padding:5rem 0 4rem}
.sec-tag{display:inline-flex;align-items:center;gap:.6rem;padding:.45rem 1.2rem;background:linear-gradient(135deg,rgba(45,94,58,.08),rgba(45,94,58,.04));border:1px solid rgba(45,94,58,.12);border-radius:50px;font-size:.82rem;font-weight:700;color:var(--g1);margin-bottom:1rem;backdrop-filter:blur(10px)}
.sec-h2{font-size:clamp(2rem,4.5vw,2.8rem);font-weight:900;color:var(--dark);line-height:1.1;margin-bottom:.6rem}
.why-card{
  background:#fff;border-radius:24px;border:1px solid rgba(45,94,58,.08);
  padding:2.5rem 2rem;text-align:center;
  transition:all .42s cubic-bezier(.4,0,.2,1);position:relative;overflow:hidden;
  box-shadow:0 8px 32px rgba(45,94,58,.06);
}
.why-card::before{content:'';position:absolute;bottom:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--g1),var(--teal),var(--gold));transform:scaleX(0);transform-origin:right;transition:transform .42s cubic-bezier(.4,0,.2,1)}
.why-card:hover{transform:translateY(-12px) scale(1.02);box-shadow:0 24px 80px rgba(45,94,58,.15);border-color:rgba(45,94,58,.15)}
.why-card:hover::before{transform:scaleX(1)}
.why-card:hover .why-ico{transform:scale(1.15) rotate(-8deg);box-shadow:0 12px 40px rgba(45,94,58,.25)}
.why-ico{width:72px;height:72px;border-radius:20px;display:flex;align-items:center;justify-content:center;font-size:1.6rem;color:#fff;margin:0 auto 1.5rem;transition:transform .5s cubic-bezier(.34,1.56,.64,1);box-shadow:0 12px 32px rgba(45,94,58,.15)}
.why-title{font-size:1.05rem;font-weight:900;color:var(--dark);margin-bottom:.5rem;line-height:1.3}
.why-sub{font-size:.85rem;color:var(--muted);line-height:1.8}

/* ════ TEAM SECTION ═══════════════════════ */
.team-sec{background:linear-gradient(135deg,#fff 0%,rgba(240,239,236,.5) 100%);padding:5rem 0 4rem}
.team-card{
  background:linear-gradient(135deg,var(--cream) 0%,#fff 100%);border-radius:28px;border:1px solid rgba(45,94,58,.08);
  padding:2.5rem 2rem;text-align:center;
  transition:all .45s cubic-bezier(.4,0,.2,1);position:relative;overflow:hidden;
  box-shadow:0 12px 40px rgba(45,94,58,.08);
}
.team-card::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--g1),var(--teal),var(--gold));transform:scaleX(0);transform-origin:left;transition:transform .45s cubic-bezier(.4,0,.2,1)}
.team-card:hover{transform:translateY(-15px) scale(1.03);box-shadow:0 32px 100px rgba(45,94,58,.18);border-color:rgba(45,94,58,.15)}
.team-card:hover::before{transform:scaleX(1)}
.team-card:hover .team-av{transform:scale(1.08) rotate(5deg);box-shadow:0 20px 60px rgba(45,94,58,.25)}
.team-av{width:96px;height:96px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:2.4rem;color:#fff;margin:0 auto 1.5rem;transition:transform .5s cubic-bezier(.34,1.56,.64,1);box-shadow:0 16px 40px rgba(45,94,58,.2)}
.team-name{font-size:1.15rem;font-weight:900;color:var(--dark);margin-bottom:.3rem;line-height:1.2}
.team-role{font-size:.82rem;color:var(--muted);margin-bottom:.8rem;font-weight:600}
.team-bio{font-size:.85rem;color:#4b5563;line-height:1.8;margin-bottom:1.2rem}
.team-stats{display:flex;justify-content:center;gap:2rem;padding-top:1rem;border-top:1px solid rgba(45,94,58,.08)}
.team-stat-n{font-size:1.3rem;font-weight:900;color:var(--g1);line-height:1}
.team-stat-l{font-size:.72rem;color:var(--muted);font-weight:600}

/* ════ SERVICES SECTION ═══════════════════ */
.srv-sec{background:linear-gradient(135deg,var(--cream) 0%,rgba(240,239,236,.8) 100%);padding:5rem 0 4rem}
.srv-card{
  background:linear-gradient(135deg,#fff 0%,rgba(255,255,255,.95) 100%);border-radius:24px;border:1px solid rgba(45,94,58,.08);
  padding:2rem;display:flex;align-items:flex-start;gap:1.5rem;
  transition:all .4s cubic-bezier(.4,0,.2,1);box-shadow:0 8px 32px rgba(45,94,58,.06);
}
.srv-card:hover{transform:translateY(-8px) translateX(-6px) scale(1.02);box-shadow:0 24px 80px rgba(45,94,58,.15);border-color:rgba(45,94,58,.15)}
.srv-card:hover .srv-ico{transform:scale(1.12) rotate(-8deg);box-shadow:0 16px 48px rgba(45,94,58,.25)}
.srv-ico{width:64px;height:64px;border-radius:18px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:#fff;flex-shrink:0;transition:transform .5s cubic-bezier(.34,1.56,.64,1);box-shadow:0 12px 32px rgba(45,94,58,.15)}
.srv-title{font-size:1.1rem;font-weight:900;color:var(--dark);margin-bottom:.4rem;line-height:1.3}
.srv-sub{font-size:.88rem;color:var(--muted);margin-bottom:.8rem;line-height:1.7}
.srv-tags{display:flex;flex-wrap:wrap;gap:.5rem}
.srv-tag{padding:.25rem .8rem;border-radius:20px;font-size:.72rem;font-weight:700;letter-spacing:.02em;transition:all .3s}
.srv-tag:hover{transform:translateY(-2px);box-shadow:0 4px 12px rgba(0,0,0,.1)}

/* ════ CONTACT FORM + INFO GRID ══════════ */
.cf-sec{background:linear-gradient(135deg,#fff 0%,rgba(240,239,236,.6) 100%);padding:5rem 0 4rem}
.cf-grid{display:grid;grid-template-columns:1fr 420px;gap:2.5rem;align-items:start}

/* shared card */
.cp-card{background:linear-gradient(135deg,var(--cream) 0%,#fff 100%);border-radius:28px;border:1px solid rgba(45,94,58,.08);overflow:hidden;margin-bottom:1.5rem;box-shadow:0 12px 40px rgba(45,94,58,.08)}
.cp-card::before{content:'';display:block;height:4px;background:linear-gradient(90deg,var(--g1),var(--teal),var(--gold))}
.cp-card-head{padding:1.5rem 2rem 1.2rem;border-bottom:1px solid rgba(45,94,58,.08);display:flex;align-items:center;gap:.8rem;background:rgba(255,255,255,.5)}
.cp-card-ico{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:.9rem;flex-shrink:0;box-shadow:0 8px 24px rgba(45,94,58,.15)}
.cp-card-title{font-size:1.1rem;font-weight:900;color:var(--dark);line-height:1.2}
.cp-card-sub{font-size:.78rem;color:var(--muted);font-weight:600}
.cp-card-body{padding:2rem}

/* form inputs */
.f-group{margin-bottom:1.2rem}
.f-label{display:block;font-size:.85rem;font-weight:800;color:var(--dark);margin-bottom:.5rem;letter-spacing:.02em}
.f-req{color:var(--danger);margin-right:.2rem;font-weight:900}
.f-wrap{position:relative}
.f-ico{position:absolute;right:0;top:0;bottom:0;width:48px;display:flex;align-items:center;justify-content:center;pointer-events:none}
.f-ico-inner{width:32px;height:32px;border-radius:8px;background:linear-gradient(135deg,var(--g1),var(--teal));display:flex;align-items:center;justify-content:center;color:#fff;font-size:.75rem;box-shadow:0 4px 12px rgba(45,94,58,.2)}
.f-input{width:100%;padding:.9rem 1.1rem .9rem 1.1rem;padding-right:56px;border:2px solid rgba(45,94,58,.08);border-radius:14px;font-size:.9rem;font-family:'Tajawal',sans-serif;background:rgba(255,255,255,.9);color:var(--dark);transition:all .3s cubic-bezier(.4,0,.2,1);box-shadow:0 2px 8px rgba(45,94,58,.04)}
.f-input:focus{outline:none;border-color:var(--g1);box-shadow:0 0 0 4px rgba(45,94,58,.1),0 4px 16px rgba(45,94,58,.08);background:#fff;transform:translateY(-1px)}
.f-input::placeholder{color:#a0aba4;font-weight:500}
.f-ta{min-height:130px;resize:vertical}
.f-err{font-size:.75rem;color:var(--danger);margin-top:.3rem;display:flex;align-items:center;gap:.25rem;font-weight:600}
.f-submit{width:100%;padding:1rem;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;font-size:.95rem;font-weight:900;border:none;border-radius:16px;cursor:pointer;font-family:'Tajawal',sans-serif;display:flex;align-items:center;justify-content:center;gap:.6rem;box-shadow:0 12px 32px rgba(45,94,58,.25);transition:all .3s cubic-bezier(.4,0,.2,1);letter-spacing:.02em}
.f-submit:hover{transform:translateY(-3px);box-shadow:0 20px 48px rgba(45,94,58,.35);background:linear-gradient(135deg,var(--teal),var(--g1))}
.f-submit:active{transform:translateY(-1px)}
.f-success{display:flex;align-items:center;gap:.75rem;padding:1rem 1.2rem;background:linear-gradient(135deg,rgba(74,222,128,.08),rgba(74,222,128,.04));border:1px solid rgba(74,222,128,.15);border-radius:14px;font-size:.88rem;font-weight:700;color:var(--success);margin-bottom:1.3rem;box-shadow:0 4px 16px rgba(74,222,128,.1)}

/* contact info items */
.ci-item{display:flex;align-items:flex-start;gap:1rem;padding:1rem 1.2rem;border-radius:16px;background:linear-gradient(135deg,#fff 0%,rgba(255,255,255,.9) 100%);border:1px solid rgba(45,94,58,.08);transition:all .3s cubic-bezier(.4,0,.2,1);margin-bottom:.8rem;box-shadow:0 4px 16px rgba(45,94,58,.04)}
.ci-item:last-child{margin-bottom:0}
.ci-item:hover{background:rgba(45,94,58,.04);border-color:rgba(45,94,58,.15);transform:translateX(-6px) translateY(-2px);box-shadow:0 8px 32px rgba(45,94,58,.1)}
.ci-ico{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:.95rem;flex-shrink:0;box-shadow:0 6px 20px rgba(45,94,58,.15)}
.ci-main{font-size:.9rem;font-weight:900;color:var(--dark);margin-bottom:.2rem;line-height:1.2}
.ci-val{font-size:.85rem;color:var(--muted);margin-bottom:.1rem;font-weight:600}
.ci-sub{font-size:.72rem;color:rgba(107,114,128,.7);font-weight:500}

/* social */
.sl-grid{display:flex;flex-wrap:wrap;gap:.8rem}
.sl{width:48px;height:48px;border-radius:14px;display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;font-size:1.1rem;transition:all .3s cubic-bezier(.34,1.56,.64,1);box-shadow:0 6px 20px rgba(0,0,0,.1)}
.sl:hover{transform:translateY(-6px) scale(1.15) rotate(5deg);box-shadow:0 16px 40px rgba(0,0,0,.25)}

/* emergency */
.emg-wrap{background:linear-gradient(135deg,rgba(220,38,38,.08),rgba(220,38,38,.04));border:2px solid rgba(220,38,38,.18);border-radius:24px;padding:1.5rem;box-shadow:0 8px 32px rgba(220,38,38,.1)}
.emg-hd{display:flex;align-items:center;gap:.8rem;margin-bottom:1.2rem;padding-bottom:1rem;border-bottom:1px solid rgba(220,38,38,.15)}
.emg-hd-ico{width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#dc2626,#b91c1c);display:flex;align-items:center;justify-content:center;color:#fff;font-size:.9rem;flex-shrink:0;box-shadow:0 6px 20px rgba(220,38,38,.2)}
.emg-item{display:flex;align-items:center;gap:1rem;padding:.9rem 1rem;background:rgba(255,255,255,.9);border-radius:16px;border:1px solid rgba(220,38,38,.12);margin-bottom:.8rem;transition:all .25s;box-shadow:0 4px 16px rgba(220,38,38,.05)}
.emg-item:last-child{margin-bottom:0}
.emg-item:hover{background:#fff;box-shadow:0 8px 32px rgba(220,38,38,.12);transform:translateX(-4px) translateY(-2px)}
.emg-item-ico{width:40px;height:40px;border-radius:11px;background:linear-gradient(135deg,#dc2626,#b91c1c);display:flex;align-items:center;justify-content:center;color:#fff;font-size:.85rem;flex-shrink:0;box-shadow:0 4px 16px rgba(220,38,38,.15)}
.emg-name{font-size:.85rem;font-weight:900;color:#dc2626;line-height:1.2}
.emg-num{font-size:1.1rem;font-weight:900;color:var(--dark);letter-spacing:.05em}
.emg-avail{font-size:.68rem;color:var(--success);font-weight:700;display:flex;align-items:center;gap:.3rem}

/* ════ FAQ ════════════════════════════════ */
.faq-sec{background:linear-gradient(135deg,var(--cream) 0%,rgba(240,239,236,.8) 100%);padding:5rem 0 6rem}
.faq-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1.3rem}
.faq-item{background:linear-gradient(135deg,#fff 0%,rgba(255,255,255,.95) 100%);border-radius:20px;border:1px solid rgba(45,94,58,.08);padding:1.6rem;transition:all .35s cubic-bezier(.4,0,.2,1);box-shadow:0 8px 24px rgba(45,94,58,.06)}
.faq-item:hover{transform:translateY(-8px) scale(1.02);box-shadow:0 20px 60px rgba(45,94,58,.12);border-color:rgba(45,94,58,.15)}
.faq-item:hover .faq-ico{transform:scale(1.15) rotate(8deg);box-shadow:0 8px 24px rgba(45,94,58,.15)}
.faq-ico{width:40px;height:40px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:.9rem;flex-shrink:0;transition:transform .4s cubic-bezier(.34,1.56,.64,1);box-shadow:0 6px 20px rgba(45,94,58,.1)}
.faq-q{font-size:.95rem;font-weight:900;color:var(--dark);margin-bottom:.5rem;line-height:1.3}
.faq-a{font-size:.82rem;color:var(--muted);line-height:1.8;font-weight:500}

/* ════ SCROLL REVEAL ═════════════════════ */
[data-sr]{opacity:0;transition:opacity .8s cubic-bezier(.4,0,.2,1),transform .8s cubic-bezier(.4,0,.2,1)}
[data-sr="up"]{transform:translateY(30px)}
[data-sr="left"]{transform:translateX(30px)}
[data-sr="zoom"]{transform:scale(.88)}
[data-sr].done{opacity:1;transform:none}
[data-sr-d="1"]{transition-delay:.08s}[data-sr-d="2"]{transition-delay:.16s}
[data-sr-d="3"]{transition-delay:.24s}[data-sr-d="4"]{transition-delay:.32s}

/* ════ ENHANCED RESPONSIVE ════════════════ */
@media(max-width:1200px){.cf-grid{grid-template-columns:1fr;gap:2rem}}
@media(max-width:991px){
  .faq-grid{grid-template-columns:1fr}
  .cp-hero{min-height:60vh}
  .sec-h2{font-size:clamp(1.8rem,5vw,2.4rem)}
}
@media(max-width:768px){
  .why-sec,.team-sec,.srv-sec,.cf-sec,.faq-sec{padding:4rem 0 3rem}
  .cp-chip{flex-direction:column;gap:.5rem;text-align:center;padding:.8rem 1rem}
  .cp-chip-ico{width:36px;height:36px;font-size:.8rem}
  .cp-chip-n{font-size:.9rem}
  .cp-chip-l{font-size:.65rem}
  .why-card{padding:1.8rem 1.2rem}
  .why-ico{width:60px;height:60px;font-size:1.3rem}
  .team-card{padding:2rem 1.5rem}
  .team-av{width:80px;height:80px;font-size:2rem}
  .srv-card{flex-direction:column;text-align:center;gap:1rem;padding:1.5rem}
  .srv-ico{width:56px;height:56px;font-size:1.3rem}
  .cp-card{margin-bottom:1.2rem}
  .cp-card-head{padding:1.2rem 1.5rem 1rem}
  .cp-card-body{padding:1.5rem}
  .f-input{padding:.8rem 1rem .8rem 1rem;padding-right:48px;font-size:.85rem}
  .f-ico{width:44px}
  .f-ico-inner{width:28px;height:28px;font-size:.65rem}
  .ci-item{padding:.8rem 1rem;gap:.8rem}
  .ci-ico{width:38px;height:38px;font-size:.85rem}
  .sl{width:44px;height:44px;font-size:1rem}
  .emg-wrap{padding:1.2rem}
  .emg-item{padding:.8rem;gap:.8rem}
  .faq-item{padding:1.3rem}
  .faq-ico{width:36px;height:36px;font-size:.85rem}
}
@media(max-width:576px){
  .why-sec,.team-sec,.srv-sec,.cf-sec,.faq-sec{padding:3rem 0 2.5rem}
  .cp-hero{min-height:50vh}
  .cp-chips{gap:.5rem}
  .cp-chip{min-width:100px;padding:.6rem .8rem}
  .why-card{padding:1.5rem 1rem}
  .why-ico{width:52px;height:52px;font-size:1.2rem}
  .team-card{padding:1.5rem 1rem}
  .team-av{width:70px;height:70px;font-size:1.8rem}
  .team-stats{gap:1.5rem}
  .srv-card{padding:1.2rem}
  .srv-ico{width:48px;height:48px;font-size:1.1rem}
  .cp-card-head{padding:1rem 1.2rem .8rem;gap:.6rem}
  .cp-card-ico{width:36px;height:36px;font-size:.8rem}
  .cp-card-body{padding:1.2rem}
  .f-label{font-size:.8rem}
  .f-input{padding:.7rem .9rem .7rem .9rem;padding-right:44px;font-size:.8rem}
  .f-submit{padding:.8rem;font-size:.85rem}
  .ci-item{padding:.7rem .8rem;gap:.6rem}
  .ci-ico{width:34px;height:34px;font-size:.8rem}
  .sl-grid{gap:.6rem}
  .sl{width:40px;height:40px;font-size:.9rem}
  .emg-wrap{padding:1rem}
  .emg-hd{gap:.6rem;margin-bottom:1rem}
  .emg-hd-ico{width:36px;height:36px;font-size:.8rem}
  .emg-item{padding:.7rem .8rem;gap:.7rem}
  .emg-item-ico{width:34px;height:34px;font-size:.75rem}
  .faq-item{padding:1.1rem}
  .faq-ico{width:32px;height:32px;font-size:.8rem}
  .faq-q{font-size:.88rem}
  .faq-a{font-size:.78rem}
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="cp">


<section class="cp-hero">
  <div class="cp-hero-bg"></div>
  <div class="cp-hero-grid"></div>
  <div class="cp-shape"></div><div class="cp-shape"></div><div class="cp-shape"></div><div class="cp-shape"></div>
  <div class="cp-orb cp-orb-1"></div>
  <div class="cp-orb cp-orb-2"></div>
  <div class="cp-orb cp-orb-3"></div>

  <div class="container position-relative" style="z-index:2;padding:5rem 1.5rem 4.5rem">
    <div style="max-width:650px;margin:0 auto;text-align:center">
      <div class="cp-tag" style="margin-bottom:1.2rem">
        <span style="display:inline-flex;align-items:center;gap:.55rem;padding:.42rem 1.2rem;background:rgba(196,168,130,.1);border:1px solid rgba(196,168,130,.28);border-radius:50px;backdrop-filter:blur(8px)">
          <span class="cp-dot"></span>
          <span style="color:rgba(196,168,130,.9);font-size:.8rem;font-weight:700">فريق الدعم جاهز للمساعدة الآن</span>
        </span>
      </div>
      <div class="cp-h1">
        <h1 style="font-size:clamp(2.5rem,6vw,4.4rem);font-weight:900;line-height:1.06;color:#fff;margin:0 0 1.1rem">
          تواصل معنا<br><span class="gold-shine">نحن هنا لك دائماً</span>
        </h1>
      </div>
      <p class="cp-p" style="font-size:1.05rem;color:rgba(255,255,255,.6);line-height:1.9;max-width:520px;margin:0 auto 2.5rem">
        لا تتردد في التواصل معنا عبر أي من الوسائل المتاحة. فريق متخصص يجيب على استفساراتك في أقرب وقت.
      </p>
      <div class="cp-chips" style="display:flex;flex-wrap:wrap;gap:.7rem;justify-content:center">
        <?php $hChips=[['i'=>'bi-envelope-fill','n'=>'info@wa3y.gov.sa','l'=>'البريد الرسمي'],['i'=>'bi-telephone-fill','n'=>'920000000','l'=>'الهاتف الرئيسي'],['i'=>'bi-clock-fill','n'=>'أحد – خميس','l'=>'8:00 ص – 4:00 م']] ?>
        <?php $__currentLoopData = $hChips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="cp-chip">
          <div class="cp-chip-ico"><i class="bi <?php echo e($hc['i']); ?>"></i></div>
          <div><div class="cp-chip-n"><?php echo e($hc['n']); ?></div><div class="cp-chip-l"><?php echo e($hc['l']); ?></div></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  <div class="cp-wave">
    <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block">
      <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,42 1440,38 L1440,70 L0,70 Z" fill="#F0EFEC"/>
    </svg>
  </div>
</section>


<section class="why-sec">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-stars"></i> لماذا وعي؟</div>
      <h2 class="sec-h2">لماذا تتواصل <span style="color:var(--g1)">معنا؟</span></h2>
      <p style="color:var(--muted);font-size:.9rem;max-width:520px;margin:0 auto">فريق من الخبراء والمتخصصين جاهز لتقديم الدعم لك</p>
    </div>
    <div class="row g-4">
      <?php $whys=[
        ['i'=>'bi-speedometer2',       'bg'=>'linear-gradient(135deg,var(--g1),var(--teal))', 't'=>'استجابة سريعة',  's'=>'نرد على استفساراتك خلال 24 ساعة من الاستلام'],
        ['i'=>'bi-shield-check-fill',  'bg'=>'linear-gradient(135deg,var(--teal),var(--teal2))','t'=>'خصوصية تامة',  's'=>'جميع بياناتك مؤمّنة ومحفوظة بالكامل'],
        ['i'=>'bi-award-fill',         'bg'=>'linear-gradient(135deg,var(--gold),var(--gold2))','t'=>'خبراء معتمدون','s'=>'فريق من الأطباء والمتخصصين المعتمدين'],
        ['i'=>'bi-heart-fill',         'bg'=>'linear-gradient(135deg,var(--g2),var(--g1))',   't'=>'دعم مجاني 100%', 's'=>'جميع خدماتنا مقدمة مجاناً لكل مواطن'],
      ] ?>
      <?php $__currentLoopData = $whys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wi=>$w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-sm-6 col-lg-3" data-sr="up" data-sr-d="<?php echo e($wi+1); ?>">
        <div class="why-card">
          <div class="why-ico" style="background:<?php echo e($w['bg']); ?>"><i class="bi <?php echo e($w['i']); ?>"></i></div>
          <div class="why-title"><?php echo e($w['t']); ?></div>
          <div class="why-sub"><?php echo e($w['s']); ?></div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>


<section class="team-sec">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-people-fill"></i> فريق العمل</div>
      <h2 class="sec-h2">خبراؤنا <span style="color:var(--g1)">المتخصصون</span></h2>
      <p style="color:var(--muted);font-size:.9rem;max-width:520px;margin:0 auto">تعرف على الفريق الذي سيساعدك في رحلتك</p>
    </div>
    <div class="row g-4">
      <?php $team=[
        ['av'=>'bi-person-workspace',  'bg'=>'linear-gradient(135deg,var(--g1),var(--teal))',  'n'=>'د. أحمد محمد',  'r'=>'استشاري طب نفسي',      'b'=>'خبرة 15 عاماً في العلاج النفسي والاستشارات الأسرية','s1'=>'5000+','l1'=>'مريض','s2'=>'15+','l2'=>'سنة'],
        ['av'=>'bi-person-heart',      'bg'=>'linear-gradient(135deg,var(--teal),var(--teal2))','n'=>'د. سارة أحمد',  'r'=>'أخصائية علاج سلوكي',    'b'=>'متخصصة في العلاج المعرفي السلوكي وتطوير المهارات',  's1'=>'3000+','l1'=>'جلسة','s2'=>'10+','l2'=>'سنة'],
        ['av'=>'bi-person-raised-hand','bg'=>'linear-gradient(135deg,var(--gold),var(--gold2))','n'=>'د. محمد خالد',  'r'=>'مستشار أسري',           'b'=>'خبير في حل المشاكل الأسرية وتقوية العلاقات الزوجية', 's1'=>'2000+','l1'=>'أسرة','s2'=>'12+','l2'=>'سنة'],
      ] ?>
      <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ti=>$tm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4" data-sr="up" data-sr-d="<?php echo e($ti+1); ?>">
        <div class="team-card">
          <div class="team-av" style="background:<?php echo e($tm['bg']); ?>"><i class="bi <?php echo e($tm['av']); ?>"></i></div>
          <div class="team-name"><?php echo e($tm['n']); ?></div>
          <div class="team-role"><?php echo e($tm['r']); ?></div>
          <div class="team-bio"><?php echo e($tm['b']); ?></div>
          <div class="team-stats">
            <div><div class="team-stat-n"><?php echo e($tm['s1']); ?></div><div class="team-stat-l"><?php echo e($tm['l1']); ?></div></div>
            <div style="width:1px;background:var(--bd)"></div>
            <div><div class="team-stat-n"><?php echo e($tm['s2']); ?></div><div class="team-stat-l"><?php echo e($tm['l2']); ?></div></div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>


<section class="srv-sec">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-grid-fill"></i> خدماتنا</div>
      <h2 class="sec-h2">ماذا نقدم <span style="color:var(--g1)">لك؟</span></h2>
      <p style="color:var(--muted);font-size:.9rem;max-width:520px;margin:0 auto">خدمات شاملة مصممة لتلبية جميع احتياجاتك</p>
    </div>
    <div class="row g-3">
      <?php $srvs=[
        ['i'=>'bi-chat-heart-fill',    'bg'=>'linear-gradient(135deg,var(--g1),var(--teal))',  't'=>'استشارات فردية',  's'=>'جلسات علاجية فردية مع أطباء متخصصين معتمدين','tags'=>[['علاج نفسي','rgba(45,94,58,.08)','var(--g1)'],['دعم عاطفي','rgba(58,125,110,.08)','var(--teal)']]],
        ['i'=>'bi-people-fill',        'bg'=>'linear-gradient(135deg,var(--teal),var(--teal2))','t'=>'علاج جماعي',     's'=>'جلسات علاجية للمجموعات والأسر بإشراف متخصص',   'tags'=>[['علاج أسري','rgba(45,94,58,.08)','var(--g1)'],['دعم جماعي','rgba(196,168,130,.1)','var(--gold2)']]],
        ['i'=>'bi-phone-vibrate-fill', 'bg'=>'linear-gradient(135deg,var(--gold),var(--gold2))','t'=>'دعم عن بعد',     's'=>'استشارات عبر الفيديو والهاتف في أي وقت',        'tags'=>[['فيديو','rgba(196,168,130,.1)','var(--gold2)'],['هاتف','rgba(45,94,58,.08)','var(--g1)']]],
        ['i'=>'bi-heart-pulse-fill',   'bg'=>'linear-gradient(135deg,#dc2626,#b91c1c)',         't'=>'طوارئ نفسية',    's'=>'دعم فوري على مدار الساعة للحالات العاجلة',      'tags'=>[['24/7','rgba(220,38,38,.08)','#dc2626'],['فوري','rgba(45,94,58,.08)','var(--g1)']]],
      ] ?>
      <?php $__currentLoopData = $srvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $si=>$srv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-6" data-sr="up" data-sr-d="<?php echo e(($si%2)+1); ?>">
        <div class="srv-card">
          <div class="srv-ico" style="background:<?php echo e($srv['bg']); ?>"><i class="bi <?php echo e($srv['i']); ?>"></i></div>
          <div style="flex:1">
            <div class="srv-title"><?php echo e($srv['t']); ?></div>
            <div class="srv-sub"><?php echo e($srv['s']); ?></div>
            <div class="srv-tags">
              <?php $__currentLoopData = $srv['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="srv-tag" style="background:<?php echo e($tag[1]); ?>;color:<?php echo e($tag[2]); ?>"><?php echo e($tag[0]); ?></span>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>


<section class="cf-sec">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-envelope-fill"></i> تواصل مباشر</div>
      <h2 class="sec-h2">راسلنا أو <span style="color:var(--g1)">اتصل بنا</span></h2>
    </div>
    <div class="cf-grid">

      
      <div data-sr="up">
        <div class="cp-card">
          <div class="cp-card-head">
            <div class="cp-card-ico" style="background:linear-gradient(135deg,var(--g1),var(--teal))"><i class="bi bi-envelope-fill"></i></div>
            <div><div class="cp-card-title">أرسل رسالة</div><div class="cp-card-sub">سنرد عليك في أقرب وقت</div></div>
          </div>
          <div class="cp-card-body">
            <?php if(session('success')): ?>
            <div class="f-success"><i class="bi bi-check-circle-fill"></i> <?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('contact.send')); ?>">
              <?php echo csrf_field(); ?>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="f-group">
                    <label class="f-label"><span class="f-req">*</span>الاسم الكامل</label>
                    <div class="f-wrap"><div class="f-ico"><div class="f-ico-inner"><i class="bi bi-person-fill"></i></div></div>
                    <input type="text" name="name" class="f-input" value="<?php echo e(old('name')); ?>" placeholder="أدخل اسمك الكامل" required></div>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="f-err"><i class="bi bi-exclamation-circle" style="font-size:.65rem"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="f-group">
                    <label class="f-label"><span class="f-req">*</span>البريد الإلكتروني</label>
                    <div class="f-wrap"><div class="f-ico"><div class="f-ico-inner"><i class="bi bi-envelope-fill"></i></div></div>
                    <input type="email" name="email" class="f-input" value="<?php echo e(old('email')); ?>" placeholder="example@email.com" required></div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="f-err"><i class="bi bi-exclamation-circle" style="font-size:.65rem"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="f-group">
                    <label class="f-label">رقم الهاتف</label>
                    <div class="f-wrap"><div class="f-ico"><div class="f-ico-inner"><i class="bi bi-telephone-fill"></i></div></div>
                    <input type="tel" name="phone" class="f-input" value="<?php echo e(old('phone')); ?>" placeholder="05xxxxxxxx"></div>
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="f-err"><i class="bi bi-exclamation-circle" style="font-size:.65rem"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="f-group">
                    <label class="f-label"><span class="f-req">*</span>الموضوع</label>
                    <div class="f-wrap"><div class="f-ico"><div class="f-ico-inner"><i class="bi bi-chat-text-fill"></i></div></div>
                    <input type="text" name="subject" class="f-input" value="<?php echo e(old('subject')); ?>" placeholder="موضوع الرسالة" required></div>
                    <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="f-err"><i class="bi bi-exclamation-circle" style="font-size:.65rem"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-12">
                  <div class="f-group" style="margin-bottom:.2rem">
                    <label class="f-label"><span class="f-req">*</span>الرسالة</label>
                    <textarea name="message" class="f-input f-ta" placeholder="اكتب رسالتك بالتفصيل..." required><?php echo e(old('message')); ?></textarea>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="f-err"><i class="bi bi-exclamation-circle" style="font-size:.65rem"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="f-submit"><i class="bi bi-send-fill"></i> إرسال الرسالة</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      
      <div>
        
        <div class="cp-card" data-sr="left" data-sr-d="1">
          <div class="cp-card-head">
            <div class="cp-card-ico" style="background:linear-gradient(135deg,var(--teal),var(--teal2))"><i class="bi bi-info-circle-fill"></i></div>
            <div><div class="cp-card-title">معلومات الاتصال</div><div class="cp-card-sub">طرق التواصل المختلفة</div></div>
          </div>
          <div class="cp-card-body">
            <div class="ci-item"><div class="ci-ico" style="background:linear-gradient(135deg,var(--g1),var(--teal))"><i class="bi bi-envelope-fill"></i></div><div><div class="ci-main">البريد الإلكتروني</div><div class="ci-val">info@wa3y.gov.sa</div><div class="ci-sub">support@wa3y.gov.sa</div></div></div>
            <div class="ci-item"><div class="ci-ico" style="background:linear-gradient(135deg,var(--g2),var(--g1))"><i class="bi bi-telephone-fill"></i></div><div><div class="ci-main">الهاتف</div><div class="ci-val">920000000</div><div class="ci-sub">+966920000000 (دولي)</div></div></div>
            <div class="ci-item"><div class="ci-ico" style="background:linear-gradient(135deg,var(--gold),var(--gold2))"><i class="bi bi-geo-alt-fill"></i></div><div><div class="ci-main">العنوان</div><div class="ci-val">الرياض، المملكة العربية السعودية</div><div class="ci-sub">شارع الملك فهد، مبنى وزارة الصحة</div></div></div>
            <div class="ci-item"><div class="ci-ico" style="background:linear-gradient(135deg,var(--teal),var(--teal2))"><i class="bi bi-clock-fill"></i></div><div><div class="ci-main">ساعات العمل</div><div class="ci-val">الأحد – الخميس: 8:00 ص – 4:00 م</div><div class="ci-sub">الجمعة: 8:00 ص – 12:00 م</div></div></div>
          </div>
        </div>

        
        <div class="cp-card" data-sr="left" data-sr-d="2">
          <div class="cp-card-head">
            <div class="cp-card-ico" style="background:linear-gradient(135deg,var(--gold),var(--gold2))"><i class="bi bi-share-fill"></i></div>
            <div><div class="cp-card-title">تابعنا على</div><div class="cp-card-sub">وسائل التواصل الاجتماعي</div></div>
          </div>
          <div class="cp-card-body">
            <div class="sl-grid">
              <a href="#" class="sl" style="background:linear-gradient(135deg,#1DA1F2,#1a8cd8)"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="sl" style="background:linear-gradient(135deg,#1877F2,#166fe5)"><i class="bi bi-facebook"></i></a>
              <a href="#" class="sl" style="background:linear-gradient(135deg,#25D366,#20ba5a)"><i class="bi bi-whatsapp"></i></a>
              <a href="#" class="sl" style="background:linear-gradient(135deg,#E4405F,#d93651)"><i class="bi bi-instagram"></i></a>
              <a href="#" class="sl" style="background:linear-gradient(135deg,#0077B5,#0066a3)"><i class="bi bi-linkedin"></i></a>
              <a href="#" class="sl" style="background:linear-gradient(135deg,#FF0000,#e60000)"><i class="bi bi-youtube"></i></a>
              <a href="#" class="sl" style="background:linear-gradient(135deg,#2D5E3A,#3A7D6E)"><i class="bi bi-tiktok"></i></a>
              <a href="#" class="sl" style="background:linear-gradient(135deg,#1a2e20,#2D5E3A)"><i class="bi bi-snapchat"></i></a>
            </div>
          </div>
        </div>

        
       
      </div>

    </div>
  </div>
</section>


<section class="faq-sec">
  <div class="container">
    <div class="text-center mb-5" data-sr="up">
      <div class="sec-tag"><i class="bi bi-question-circle-fill"></i> الأسئلة الشائعة</div>
      <h2 class="sec-h2">إجابات على <span style="color:var(--g1)">استفساراتك</span></h2>
      <p style="color:var(--muted);font-size:.9rem">كل ما تحتاج معرفته قبل التواصل معنا</p>
    </div>
    <div class="faq-grid">
      <?php $faqs=[
        ['q'=>'كيف أحصل على المساعدة؟',            'a'=>'تواصل معنا عبر النموذج أعلاه أو الاتصال المباشر. الدعم الطارئ متاح 24/7.',                      'i'=>'bi-life-preserver',   'bg'=>'linear-gradient(135deg,var(--g1),var(--teal))'],
        ['q'=>'هل الخدمات مجانية؟',                'a'=>'نعم، جميع خدمات وعي مجانية 100% للمواطنين. منصة حكومية لدعم الصحة النفسية.',                      'i'=>'bi-shield-check-fill','bg'=>'linear-gradient(135deg,var(--teal),var(--teal2))'],
        ['q'=>'ما ساعات العمل؟',                   'a'=>'أحد – خميس من 8:00 ص إلى 4:00 م، الجمعة من 8:00 ص إلى 12:00 م. الطوارئ 24/7.',                   'i'=>'bi-clock-fill',       'bg'=>'linear-gradient(135deg,var(--gold),var(--gold2))'],
        ['q'=>'هل المعلومات موثوقة؟',              'a'=>'كل المحتوى معتمد من وزارة الصحة ومُعدّ من أطباء ومتخصصين معتمدين في المملكة.',                    'i'=>'bi-patch-check-fill', 'bg'=>'linear-gradient(135deg,var(--g2),var(--g1))'],
        ['q'=>'كيف أبلغ عن محتوى غير مناسب؟',     'a'=>'استخدم زر التبليغ في المحتوى أو راسلنا على support@wa3y.gov.sa مباشرة.',                           'i'=>'bi-flag-fill',        'bg'=>'linear-gradient(135deg,#dc2626,#b91c1c)'],
        ['q'=>'هل يمكنني طلب استشارة خاصة؟',      'a'=>'نعم، احجز موعداً مع أطباء معتمدين من خلال قسم الاستشارات في المنصة.',                              'i'=>'bi-person-video3',    'bg'=>'linear-gradient(135deg,var(--teal2),var(--g1))'],
      ] ?>
      <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fi=>$fq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="faq-item" data-sr="up" data-sr-d="<?php echo e(($fi%4)+1); ?>">
        <div style="display:flex;align-items:flex-start;gap:.9rem">
          <div class="faq-ico" style="background:<?php echo e($fq['bg']); ?>;color:#fff"><i class="bi <?php echo e($fq['i']); ?>"></i></div>
          <div><div class="faq-q"><?php echo e($fq['q']); ?></div><div class="faq-a"><?php echo e($fq['a']); ?></div></div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\pages\contact.blade.php ENDPATH**/ ?>