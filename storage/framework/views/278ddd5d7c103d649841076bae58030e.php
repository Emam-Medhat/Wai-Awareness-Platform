<?php $__env->startSection('title', $article->title); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ══ WA3Y ARTICLE SHOW ══════════════════════
   Tokens
═══════════════════════════════════════════ */
:root{
  --g1:#2D5E3A;--g2:#3d7a4e;--teal:#3A7D6E;--teal2:#2a6b5d;
  --gold:#C4A882;--gold2:#a8885e;--gold3:#e8d5b7;
  --cream:#F0EFEC;--dark:#1a2e20;--ink:#232f26;
  --muted:#6b7280;--bd:rgba(45,94,58,.12);
  --sh-sm:0 2px 12px rgba(45,94,58,.07);
  --sh-md:0 8px 32px rgba(45,94,58,.11);
  --sh-lg:0 24px 64px rgba(45,94,58,.14);
}
.as-page{font-family:'Tajawal',sans-serif;background:var(--cream)}

/* ── Reading progress bar ── */
.read-progress{
  position:fixed;top:0;left:0;height:3px;width:0;
  background:linear-gradient(90deg,var(--g1),var(--gold),var(--teal));
  z-index:9999;transition:width .1s linear;border-radius:0 2px 2px 0;
}

/* ── Breadcrumb ── */
.as-bc{
  background:#fff;border-bottom:1px solid var(--bd);
  padding:.8rem 0;position:sticky;top:0;z-index:80;
  backdrop-filter:blur(14px);box-shadow:var(--sh-sm);
}
.bc-ol{display:flex;align-items:center;gap:.45rem;flex-wrap:wrap;list-style:none;margin:0;padding:0}
.bc-a{color:var(--muted);text-decoration:none;font-size:.8rem;font-weight:600;display:flex;align-items:center;gap:.3rem;transition:color .2s}
.bc-a:hover{color:var(--g1)}
.bc-sep{color:rgba(45,94,58,.2);font-size:.65rem}
.bc-cur{font-size:.8rem;font-weight:700;color:var(--dark);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:280px}

/* ── Hero ── */
.as-hero{position:relative;height:500px;overflow:hidden}
.as-hero-img{width:100%;height:100%;object-fit:cover;transition:transform 9s ease}
.as-hero:hover .as-hero-img{transform:scale(1.05)}
.as-hero-grad{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(26,46,32,.94) 0%,rgba(26,46,32,.48) 50%,rgba(26,46,32,.08) 100%);
}
.as-hero-ph{
  position:absolute;inset:0;display:flex;align-items:center;justify-content:center;
}
.as-hero-ph i{font-size:7rem;color:rgba(255,255,255,.08)}

/* hero badges */
.h-badges{position:absolute;top:1.4rem;right:1.6rem;display:flex;gap:.5rem}
.h-badge{padding:.28rem .82rem;border-radius:20px;font-size:.7rem;font-weight:700;backdrop-filter:blur(8px)}
.h-cat{background:rgba(45,94,58,.88);color:#fff}
.h-feat{background:linear-gradient(135deg,rgba(196,168,130,.95),rgba(168,136,94,.95));color:var(--dark);display:inline-flex;align-items:center;gap:.28rem}

/* hero content bottom */
.as-hero-body{position:absolute;bottom:0;left:0;right:0;padding:2rem 2rem 2.2rem}
.as-hero-title{
  font-size:clamp(1.55rem,3.5vw,2.6rem);font-weight:900;color:#fff;
  line-height:1.25;margin-bottom:1rem;
  text-shadow:0 2px 14px rgba(0,0,0,.45);
}
.as-hero-meta{display:flex;flex-wrap:wrap;align-items:center;gap:.9rem}
.h-meta-chip{display:inline-flex;align-items:center;gap:.38rem;font-size:.76rem;color:rgba(255,255,255,.8);font-weight:600}
.h-meta-chip i{font-size:.68rem;color:var(--gold)}
.h-author-av{
  width:30px;height:30px;border-radius:50%;flex-shrink:0;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  display:flex;align-items:center;justify-content:center;
  font-size:.72rem;font-weight:800;color:#fff;overflow:hidden;
  border:2px solid rgba(255,255,255,.25);
}
.h-author-av img{width:100%;height:100%;object-fit:cover}

/* ── Layout ── */
.as-layout{
  display:grid;
  grid-template-columns:1fr 292px;
  gap:1.75rem;
  align-items:start;
  padding:2rem 0 4rem;
  max-width:100%;
}
/* sidebar sticky */
.as-sidebar{
  position:sticky;top:88px;
  max-height:calc(100vh - 108px);
  overflow-y:auto;
  scrollbar-width:thin;scrollbar-color:rgba(196,168,130,.3) transparent;
}
.as-sidebar::-webkit-scrollbar{width:4px}
.as-sidebar::-webkit-scrollbar-thumb{background:rgba(196,168,130,.28);border-radius:2px}

/* ── Card shell ── */
.as-card{
  background:#fff;border-radius:20px;
  border:1px solid var(--bd);box-shadow:var(--sh-sm);
  overflow:hidden;margin-bottom:1.25rem;
}
.as-card::before{content:'';display:block;height:3px;background:linear-gradient(90deg,var(--g1),var(--teal),var(--gold))}
.as-card-head{
  padding:1rem 1.35rem;border-bottom:1px solid rgba(196,168,130,.1);
  display:flex;align-items:center;gap:.55rem;
}
.as-card-ico{
  width:30px;height:30px;border-radius:8px;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  display:flex;align-items:center;justify-content:center;
  color:#fff;font-size:.76rem;flex-shrink:0;
}
.as-card-title{font-size:.88rem;font-weight:800;color:var(--dark)}
.as-card-body{padding:1.15rem 1.35rem}

/* ── Actions bar ── */
.as-actions{
  display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.65rem;
  padding:.9rem 1.25rem;background:#fff;border-radius:16px;
  border:1px solid var(--bd);box-shadow:var(--sh-sm);margin-bottom:1.35rem;
}
.act-btns{display:flex;gap:.45rem;flex-wrap:wrap}
.act-btn{
  display:inline-flex;align-items:center;gap:.38rem;
  padding:.45rem 1rem;border-radius:10px;font-size:.78rem;font-weight:700;
  font-family:'Tajawal',sans-serif;cursor:pointer;transition:all .22s;
  border:1.5px solid var(--bd);background:var(--cream);color:var(--muted);
}
.act-btn:hover{border-color:var(--g1);color:var(--g1);background:rgba(45,94,58,.05)}
.act-btn.on-heart{background:#fee2e2;border-color:#fca5a5;color:#ef4444}
.act-btn.on-save{background:rgba(196,168,130,.1);border-color:var(--gold);color:var(--gold2)}
.as-tags{display:flex;flex-wrap:wrap;gap:.38rem}
.as-tag{
  display:inline-flex;align-items:center;gap:.25rem;
  padding:.2rem .6rem;border-radius:20px;
  background:rgba(45,94,58,.07);border:1px solid rgba(45,94,58,.11);
  color:var(--g1);font-size:.7rem;font-weight:600;text-decoration:none;transition:all .2s;
}
.as-tag:hover{background:var(--g1);color:#fff}

/* ── Article body card ── */
.as-body-card{
  background:#fff;border-radius:20px;border:1px solid var(--bd);
  box-shadow:var(--sh-sm);padding:2rem 2.4rem;margin-bottom:1.35rem;
}
/* typography */
.article-content{font-size:1.02rem;color:#374151;line-height:2.05}
.article-content h2{
  font-size:1.4rem;font-weight:800;color:var(--dark);
  margin:2rem 0 .8rem;padding-right:1rem;
  border-right:4px solid var(--g1);line-height:1.3;
}
.article-content h3{font-size:1.12rem;font-weight:700;color:var(--g1);margin:1.5rem 0 .6rem}
.article-content p{margin-bottom:1.2rem}
.article-content ul,.article-content ol{padding-right:1.4rem;margin-bottom:1.2rem}
.article-content li{margin-bottom:.45rem}
.article-content blockquote{
  border-right:4px solid var(--gold);padding:1rem 1.4rem;
  margin:1.5rem 0;background:rgba(196,168,130,.07);
  border-radius:0 12px 12px 0;color:var(--ink);font-style:italic;line-height:1.9;
}
.article-content img{border-radius:14px;box-shadow:var(--sh-md);margin:1.4rem 0;max-width:100%;height:auto}
.article-content a{color:var(--g1);font-weight:600;text-underline-offset:3px}
.article-content strong{color:var(--dark);font-weight:800}

/* ── Author bio ── */
.author-bio{
  display:flex;align-items:flex-start;gap:1.1rem;
  margin-top:2.2rem;padding-top:1.8rem;
  border-top:1px solid rgba(196,168,130,.18);
}
.bio-av{
  width:58px;height:58px;border-radius:50%;flex-shrink:0;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  display:flex;align-items:center;justify-content:center;
  font-weight:900;font-size:1.2rem;color:#fff;overflow:hidden;
  border:3px solid rgba(45,94,58,.15);
}
.bio-av img{width:100%;height:100%;object-fit:cover}
.bio-name{font-size:.95rem;font-weight:800;color:var(--dark)}
.bio-role{
  display:inline-flex;align-items:center;gap:.28rem;
  padding:.18rem .6rem;border-radius:20px;
  background:rgba(45,94,58,.08);font-size:.68rem;font-weight:700;color:var(--g1);
  margin-bottom:.4rem;
}
.bio-sub{font-size:.75rem;color:var(--muted);margin-bottom:.35rem}
.bio-text{font-size:.83rem;color:#4b5563;line-height:1.75}

/* ── Comments ── */
.as-comments{
  background:#fff;border-radius:20px;border:1px solid var(--bd);
  box-shadow:var(--sh-sm);padding:1.8rem 2rem;
}
.comments-hd{
  display:flex;align-items:center;gap:.6rem;
  padding-bottom:1.1rem;border-bottom:1px solid rgba(196,168,130,.13);
  margin-bottom:1.5rem;
}
.comments-hd-ico{
  width:34px;height:34px;border-radius:10px;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  display:flex;align-items:center;justify-content:center;color:#fff;font-size:.84rem;flex-shrink:0;
}
.comments-hd-title{font-size:.95rem;font-weight:800;color:var(--dark)}
.comments-hd-cnt{font-size:.7rem;color:var(--muted);margin-top:1px}
/* form */
.cm-textarea{
  width:100%;padding:1rem 1.15rem;
  border:1.5px solid rgba(45,94,58,.12);border-radius:13px;
  font-size:.88rem;font-family:'Tajawal',sans-serif;
  background:var(--cream);color:var(--dark);resize:vertical;
  transition:all .25s;min-height:95px;
}
.cm-textarea:focus{outline:none;border-color:var(--g1);box-shadow:0 0 0 3px rgba(45,94,58,.08);background:#fff}
.cm-textarea::placeholder{color:#a0aba4}
.btn-cm-submit{
  display:inline-flex;align-items:center;gap:.48rem;
  padding:.68rem 1.55rem;background:linear-gradient(135deg,var(--g1),var(--teal));
  color:#fff;font-size:.84rem;font-weight:800;border-radius:12px;
  border:none;cursor:pointer;font-family:'Tajawal',sans-serif;
  box-shadow:0 5px 18px rgba(45,94,58,.28);transition:all .28s;
}
.btn-cm-submit:hover{transform:translateY(-2px);box-shadow:0 10px 28px rgba(45,94,58,.4)}
/* login prompt */
.cm-login{
  background:rgba(45,94,58,.03);border:1px dashed rgba(45,94,58,.15);
  border-radius:14px;padding:1.5rem;text-align:center;margin-bottom:1.5rem;
}
/* comment item */
.cm-item{display:flex;gap:.9rem;padding-bottom:1.3rem;border-bottom:1px solid rgba(196,168,130,.1);margin-bottom:1.3rem}
.cm-item:last-child{border-bottom:none;margin-bottom:0;padding-bottom:0}
.cm-av{
  width:36px;height:36px;border-radius:50%;flex-shrink:0;
  background:linear-gradient(135deg,var(--g1),var(--teal));
  display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:.8rem;color:#fff;overflow:hidden;
}
.cm-av img{width:100%;height:100%;object-fit:cover}
.cm-bubble{background:var(--cream);border-radius:4px 16px 16px 16px;padding:.85rem 1.05rem;flex:1}
.cm-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:.38rem}
.cm-name{font-size:.82rem;font-weight:700;color:var(--dark)}
.cm-time{font-size:.68rem;color:var(--muted)}
.cm-text{font-size:.82rem;color:#4b5563;line-height:1.72}
.cm-acts{display:flex;gap:.85rem;margin-top:.5rem}
.cm-act{
  display:inline-flex;align-items:center;gap:.28rem;
  font-size:.7rem;color:var(--muted);font-weight:600;
  background:none;border:none;cursor:pointer;
  font-family:'Tajawal',sans-serif;padding:0;transition:color .2s;
}
.cm-act:hover{color:var(--g1)}

/* ── Sidebar: related ── */
.rel-item{display:flex;gap:.85rem;padding:.8rem 0;border-bottom:1px solid rgba(196,168,130,.09)}
.rel-item:last-child{border-bottom:none;padding-bottom:0}
.rel-thumb{
  width:68px;height:68px;border-radius:11px;flex-shrink:0;overflow:hidden;
  background:linear-gradient(135deg,var(--g1),var(--teal));
}
.rel-thumb img{width:100%;height:100%;object-fit:cover;transition:transform .35s}
.rel-item:hover .rel-thumb img{transform:scale(1.08)}
.rel-ph{width:100%;height:100%;display:flex;align-items:center;justify-content:center}
.rel-ph i{font-size:1.5rem;color:rgba(255,255,255,.28)}
.rel-title{
  font-size:.8rem;font-weight:700;color:var(--dark);line-height:1.4;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
  text-decoration:none;transition:color .2s;margin-bottom:.28rem;display:block;
}
.rel-title:hover{color:var(--g1)}
.rel-meta{font-size:.68rem;color:var(--muted);display:flex;align-items:center;gap:.28rem}

/* ── Sidebar: categories ── */
.cat-row{
  display:flex;align-items:center;justify-content:space-between;
  padding:.6rem .8rem;border-radius:10px;text-decoration:none;
  color:var(--ink);font-size:.82rem;font-weight:600;transition:all .22s;margin-bottom:1px;
}
.cat-row:hover{background:rgba(45,94,58,.06);color:var(--g1)}
.cat-row:hover .c-ico{transform:scale(1.14)}
.c-left{display:flex;align-items:center;gap:.58rem}
.c-ico{
  width:28px;height:28px;border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  font-size:.74rem;color:#fff;flex-shrink:0;transition:transform .3s;
}
.c-cnt{font-size:.68rem;color:var(--muted);background:var(--cream);padding:1px 7px;border-radius:10px}

/* ── Sidebar: newsletter ── */
.nl-card{
  background:linear-gradient(145deg,var(--dark),#1e3f27);
  border-radius:20px;padding:1.4rem;position:relative;overflow:hidden;
}
.nl-card::before{
  content:'';position:absolute;inset:0;
  background-image:radial-gradient(circle,rgba(196,168,130,.07) 1px,transparent 1px);
  background-size:22px 22px;pointer-events:none;
}
.nl-content{position:relative;z-index:1}
.nl-title{font-size:.95rem;font-weight:800;color:#fff;margin-bottom:.38rem}
.nl-sub{font-size:.75rem;color:rgba(255,255,255,.5);margin-bottom:1rem;line-height:1.6}
.nl-inp{
  width:100%;padding:.68rem .95rem;border:1.5px solid rgba(255,255,255,.1);
  border-radius:10px;font-size:.82rem;font-family:'Tajawal',sans-serif;
  background:rgba(255,255,255,.07);color:#fff;margin-bottom:.6rem;transition:all .25s;
}
.nl-inp:focus{outline:none;border-color:var(--gold);background:rgba(255,255,255,.12)}
.nl-inp::placeholder{color:rgba(255,255,255,.3)}
.nl-btn{
  width:100%;padding:.68rem;background:linear-gradient(135deg,var(--gold),var(--gold2));
  color:var(--dark);font-weight:800;font-size:.82rem;border:none;border-radius:10px;
  cursor:pointer;font-family:'Tajawal',sans-serif;transition:all .25s;
}
.nl-btn:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(196,168,130,.38)}

/* ── Scroll Reveal ── */
[data-sr]{opacity:0;transition:opacity .7s ease,transform .7s ease}
[data-sr="up"]{transform:translateY(24px)}
[data-sr="right"]{transform:translateX(-24px)}
[data-sr].done{opacity:1;transform:none}
[data-sr-d="1"]{transition-delay:.08s}
[data-sr-d="2"]{transition-delay:.18s}
[data-sr-d="3"]{transition-delay:.28s}

/* ── Responsive ── */
@media(max-width:991px){
  .as-layout{grid-template-columns:1fr}
  .as-sidebar{position:relative;top:0;max-height:none;overflow-y:visible}
  .as-hero{height:340px}
  .as-hero-title{font-size:1.5rem}
  .as-hero-body{padding:1.3rem}
  .as-body-card{padding:1.3rem}
  .as-comments{padding:1.3rem}
}
@media(max-width:576px){
  .as-hero{height:260px}
  .as-body-card{padding:1rem}
  .as-comments{padding:1rem}
  .as-actions{flex-direction:column;align-items:flex-start}
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="as-page">
<div class="read-progress" id="readProg"></div>


<div class="as-bc">
  <div class="container">
    <ol class="bc-ol">
      <li><a href="<?php echo e(route('home')); ?>" class="bc-a"><i class="bi bi-house-fill"></i> الرئيسية</a></li>
      <li><i class="bi bi-chevron-left bc-sep" style="font-size:.6rem"></i></li>
      <li><a href="<?php echo e(route('articles')); ?>" class="bc-a"><i class="bi bi-newspaper"></i> المقالات</a></li>
      <li><i class="bi bi-chevron-left bc-sep" style="font-size:.6rem"></i></li>
      <li><span class="bc-cur"><?php echo e($article->title); ?></span></li>
    </ol>
  </div>
</div>


<div class="as-hero">
  <?php if($article->image_url ?? null): ?>
    <img src="<?php echo e($article->image_url); ?>" alt="<?php echo e($article->title); ?>" class="as-hero-img">
  <?php else: ?>
    <?php $pBgs=['linear-gradient(145deg,#2D5E3A,#3A7D6E)','linear-gradient(145deg,#1a2e20,#2D5E3A)','linear-gradient(145deg,#3A7D6E,#2a6b5d)']; ?>
    <div class="as-hero-ph" style="background:<?php echo e($pBgs[abs(crc32($article->slug??'x'))%3]); ?>">
      <i class="bi bi-file-richtext-fill"></i>
    </div>
  <?php endif; ?>
  <div class="as-hero-grad"></div>

  <div class="h-badges">
    <?php if($article->category_label ?? null): ?>
      <span class="h-badge h-cat"><?php echo e($article->category_label); ?></span>
    <?php endif; ?>
    <?php if($article->featured ?? false): ?>
      <span class="h-badge h-feat"><i class="bi bi-star-fill" style="font-size:.58rem"></i> مميز</span>
    <?php endif; ?>
  </div>

  <div class="as-hero-body">
    <h1 class="as-hero-title"><?php echo e($article->title); ?></h1>
    <div class="as-hero-meta">
      <span class="h-meta-chip">
        <div class="h-author-av">
          <?php if($article->author_avatar_url ?? null): ?>
            <img src="<?php echo e($article->author_avatar_url); ?>" alt="">
          <?php else: ?>
            <?php echo e(mb_substr($article->author_name ?? $article->author?->first_name ?? 'و', 0, 1)); ?>

          <?php endif; ?>
        </div>
        <span style="color:#fff;font-weight:700"><?php echo e($article->author_name ?? $article->author?->full_name ?? 'فريق وعي'); ?></span>
        <span style="color:rgba(255,255,255,.4);font-size:.65rem">·</span>
        <span style="color:rgba(255,255,255,.6);font-size:.7rem"><?php echo e($article->author_title ?? ($article->author?->role === 'doctor' ? 'طبيب' : 'متخصص')); ?></span>
      </span>
      <span class="h-meta-chip"><i class="bi bi-calendar3"></i> <?php echo e(($article->published_at ?? now())->format('d M Y')); ?></span>
      <span class="h-meta-chip"><i class="bi bi-clock"></i> <?php echo e($article->reading_time ?? 5); ?> دقائق</span>
      <span class="h-meta-chip"><i class="bi bi-eye"></i> <?php echo e(number_format($article->views ?? 0)); ?></span>
    </div>
  </div>
</div>


<div style="background:var(--cream)">
  <div class="container">
    <div class="as-layout">

      
      <div>

        
        <div class="as-actions" data-sr="up">
          <div class="act-btns">
            <button class="act-btn" id="heartBtn" onclick="toggleHeart(this)">
              <i class="bi bi-heart" id="heartIco"></i>
              <span id="heartCnt"><?php echo e($article->likes_count ?? 0); ?></span>
            </button>
            <button class="act-btn" onclick="shareArticle(this)">
              <i class="bi bi-share" id="shareIco"></i>
              <span id="shareLbl">مشاركة</span>
            </button>
            <button class="act-btn" id="saveBtn" onclick="toggleSave(this)">
              <i class="bi bi-bookmark" id="saveIco"></i>
              <span id="saveLbl">حفظ</span>
            </button>
            <?php if(auth()->guard()->check()): ?>
            <button class="act-btn" onclick="window.print()">
              <i class="bi bi-printer"></i> طباعة
            </button>
            <?php endif; ?>
          </div>
          <?php if(!empty($article->tags)): ?>
          <div class="as-tags">
            <?php $__currentLoopData = (array)$article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('articles',['tag'=>$tag])); ?>" class="as-tag">
              <i class="bi bi-hash" style="font-size:.58rem"></i><?php echo e($tag); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php endif; ?>
        </div>

        
        <div class="as-body-card" id="articleBody" data-sr="up" data-sr-d="1">
          <div class="article-content">
            <?php echo $article->content ?? $article->body; ?>

          </div>

          
          <div class="author-bio">
            <div class="bio-av">
              <?php if($article->author_avatar_url ?? null): ?>
                <img src="<?php echo e($article->author_avatar_url); ?>" alt="<?php echo e($article->author_name); ?>">
              <?php else: ?>
                <?php echo e(mb_substr($article->author_name ?? $article->author?->first_name ?? 'و', 0, 1)); ?>

              <?php endif; ?>
            </div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;flex-wrap:wrap;gap:.5rem;margin-bottom:.25rem">
                <div class="bio-name"><?php echo e($article->author_name ?? $article->author?->full_name ?? 'فريق وعي'); ?></div>
                <span class="bio-role"><i class="bi bi-patch-check-fill"></i><?php echo e(($article->author?->role ?? '') === 'doctor' ? 'طبيب معتمد' : 'متخصص معتمد'); ?></span>
              </div>
              <div class="bio-sub"><?php echo e($article->author_title ?? $article->author?->title ?? 'متخصص في الصحة النفسية والتوعية'); ?></div>
              <p class="bio-text"><?php echo e($article->author_bio ?? $article->author?->bio ?? 'كاتب متخصص في مجال الصحة النفسية والتوعية المجتمعية، يهدف إلى نشر الوعي وتقديم المحتوى العلمي الموثوق.'); ?></p>
            </div>
          </div>
        </div>

        
        <div class="as-comments" data-sr="up" data-sr-d="2">
          <div class="comments-hd">
            <div class="comments-hd-ico"><i class="bi bi-chat-dots-fill"></i></div>
            <div>
              <div class="comments-hd-title">التعليقات</div>
              <div class="comments-hd-cnt"><?php echo e($article->comments_count ?? 0); ?> تعليق</div>
            </div>
          </div>

          
          <?php if(auth()->guard()->check()): ?>
          <form action="<?php echo e(route('articles.comment.store', $article->slug)); ?>" method="POST" style="margin-bottom:1.6rem">
            <?php echo csrf_field(); ?>
            <textarea class="cm-textarea" rows="3" name="body" placeholder="شاركنا رأيك في هذا المقال..."></textarea>
            <div style="display:flex;justify-content:flex-end;margin-top:.7rem">
              <button type="submit" class="btn-cm-submit"><i class="bi bi-send-fill"></i> إرسال التعليق</button>
            </div>
          </form>
          <?php else: ?>
          <div class="cm-login" style="margin-bottom:1.5rem">
            <div style="width:48px;height:48px;border-radius:14px;background:var(--cream);border:1px solid var(--bd);display:flex;align-items:center;justify-content:center;margin:0 auto .8rem"><i class="bi bi-person-circle" style="font-size:1.4rem;color:var(--muted)"></i></div>
            <p style="font-size:.84rem;color:var(--muted);margin-bottom:.9rem">يجب تسجيل الدخول لإضافة تعليق</p>
            <a href="<?php echo e(route('login')); ?>" style="display:inline-flex;align-items:center;gap:.42rem;padding:.62rem 1.5rem;background:linear-gradient(135deg,var(--g1),var(--teal));color:#fff;font-size:.82rem;font-weight:700;border-radius:12px;text-decoration:none;box-shadow:0 5px 18px rgba(45,94,58,.25)">
              <i class="bi bi-box-arrow-in-right"></i> تسجيل الدخول
            </a>
          </div>
          <?php endif; ?>

          
          <div>
            <?php if($article->comments_count ?? 0 > 0): ?>
              <?php $__currentLoopData = $article->comments ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="cm-item">
                <div class="cm-av">
                  <?php if($cm->user?->avatar ?? null): ?><img src="<?php echo e($cm->user->avatar); ?>" alt="">
                  <?php else: ?><?php echo e(mb_substr($cm->user?->name ?? 'م',0,1)); ?><?php endif; ?>
                </div>
                <div style="flex:1">
                  <div class="cm-bubble">
                    <div class="cm-head">
                      <span class="cm-name"><?php echo e($cm->user?->full_name ?? 'مستخدم'); ?></span>
                      <span class="cm-time"><?php echo e($cm->created_at?->diffForHumans()); ?></span>
                    </div>
                    <p class="cm-text"><?php echo e($cm->body); ?></p>
                  </div>
                  <div class="cm-acts">
                    <button class="cm-act"><i class="bi bi-hand-thumbs-up"></i> إعجاب</button>
                    <button class="cm-act"><i class="bi bi-reply-fill"></i> رد</button>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
          </div>
        </div>

      </div>

      
      <aside class="as-sidebar">

        
        <div class="as-card" data-sr="right" data-sr-d="1">
          <div class="as-card-head">
            <div class="as-card-ico"><i class="bi bi-file-earmark-text-fill"></i></div>
            <div class="as-card-title">مقالات ذات صلة</div>
          </div>
          <div class="as-card-body" style="padding-top:.7rem">
            <?php $__empty_1 = true; $__currentLoopData = $relatedArticles ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="rel-item">
              <div class="rel-thumb">
                <?php if($rel->image_url ?? null): ?><img src="<?php echo e($rel->image_url); ?>" alt="<?php echo e($rel->title); ?>">
                <?php else: ?><div class="rel-ph" style="background:linear-gradient(135deg,var(--g1),var(--teal))"><i class="bi bi-file-richtext-fill"></i></div><?php endif; ?>
              </div>
              <div style="flex:1">
                <a href="<?php echo e(route('articles.show',$rel->slug)); ?>" class="rel-title"><?php echo e($rel->title); ?></a>
                <div class="rel-meta"><i class="bi bi-clock" style="color:var(--gold);font-size:.6rem"></i> <?php echo e($rel->reading_time ?? 5); ?> دقائق</div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php $relColors=['linear-gradient(135deg,#2D5E3A,#3A7D6E)','linear-gradient(135deg,#1a2e20,#2D5E3A)','linear-gradient(135deg,#C4A882,#a8885e)'] ?>
            <?php for($ri=0;$ri<3;$ri++): ?>
            <div class="rel-item">
              <div class="rel-thumb"><div class="rel-ph" style="background:<?php echo e($relColors[$ri]); ?>"><i class="bi bi-file-richtext-fill"></i></div></div>
              <div style="flex:1">
                <span class="rel-title" style="display:block">مقال ذو صلة <?php echo e($ri+1); ?></span>
                <div class="rel-meta"><i class="bi bi-clock" style="color:var(--gold);font-size:.6rem"></i> 5 دقائق</div>
              </div>
            </div>
            <?php endfor; ?>
            <?php endif; ?>
          </div>
        </div>

        
        <div class="as-card" data-sr="right" data-sr-d="2">
          <div class="as-card-head">
            <div class="as-card-ico"><i class="bi bi-grid-fill"></i></div>
            <div class="as-card-title">التصنيفات</div>
          </div>
          <div class="as-card-body" style="padding-top:.5rem">
            <?php $sideCats=[
              ['slug'=>'psychology',    'n'=>'علم النفس',      'i'=>'bi-heart-pulse-fill', 'bg'=>'linear-gradient(135deg,#2D5E3A,#3A7D6E)'],
              ['slug'=>'addiction',     'n'=>'الإدمان والعلاج','i'=>'bi-shield-heart-fill','bg'=>'linear-gradient(135deg,#1a2e20,#2D5E3A)'],
              ['slug'=>'relationships', 'n'=>'العلاقات',        'i'=>'bi-people-fill',      'bg'=>'linear-gradient(135deg,#3A7D6E,#2a6b5d)'],
              ['slug'=>'self',          'n'=>'التطوير الذاتي',  'i'=>'bi-person-check-fill','bg'=>'linear-gradient(135deg,#a8885e,#C4A882)'],
            ] ?>
            <?php $__currentLoopData = $sideCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('articles',['category'=>$sc['slug']])); ?>" class="cat-row">
              <div class="c-left">
                <div class="c-ico" style="background:<?php echo e($sc['bg']); ?>"><i class="bi <?php echo e($sc['i']); ?>"></i></div>
                <?php echo e($sc['n']); ?>

              </div>
              <span class="c-cnt"><?php echo e(\App\Models\Article::where('category',$sc['slug'])->published()->count()); ?></span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>

        
        <div class="nl-card" data-sr="right" data-sr-d="3">
          <div class="nl-content">
            <div style="font-size:1.35rem;margin-bottom:.5rem">📬</div>
            <div class="nl-title">النشرة البريدية</div>
            <div class="nl-sub">أحدث المقالات والمحتوى التوعوي مباشرة في بريدك</div>
            <form>
              <input type="email" class="nl-inp" placeholder="بريدك الإلكتروني">
              <button type="submit" class="nl-btn">اشترك مجاناً</button>
            </form>
          </div>
        </div>

      </aside>

    </div>
  </div>
</div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
/* Scroll Reveal */
const srIO = new IntersectionObserver(es => {
  es.forEach(e => { if(e.isIntersecting){ e.target.classList.add('done'); srIO.unobserve(e.target); }});
}, { threshold: 0.07 });
document.querySelectorAll('[data-sr]').forEach(el => srIO.observe(el));

/* Reading progress */
const prog = document.getElementById('readProg');
const body = document.getElementById('articleBody');
if(prog && body){
  window.addEventListener('scroll', () => {
    const r = body.getBoundingClientRect();
    prog.style.width = Math.min(100, Math.max(0, (-r.top / r.height) * 100)) + '%';
  }, { passive: true });
}

/* Heart toggle */
function toggleHeart(btn){
  const ico = document.getElementById('heartIco');
  const cnt = document.getElementById('heartCnt');
  const on = ico.classList.contains('bi-heart-fill');
  ico.classList.toggle('bi-heart', on);
  ico.classList.toggle('bi-heart-fill', !on);
  btn.classList.toggle('on-heart', !on);
  cnt.textContent = +cnt.textContent + (on ? -1 : 1);
}

/* Save toggle */
function toggleSave(btn){
  const ico = document.getElementById('saveIco');
  const lbl = document.getElementById('saveLbl');
  const on = ico.classList.contains('bi-bookmark-fill');
  ico.classList.toggle('bi-bookmark', on);
  ico.classList.toggle('bi-bookmark-fill', !on);
  btn.classList.toggle('on-save', !on);
  lbl.textContent = on ? 'حفظ' : 'تم الحفظ';
}

/* Share */
function shareArticle(btn){
  if(navigator.share){
    navigator.share({ title: document.title, url: location.href });
    return;
  }
  navigator.clipboard?.writeText(location.href).then(() => {
    const lbl = document.getElementById('shareLbl');
    const ico = document.getElementById('shareIco');
    lbl.textContent = 'تم النسخ!';
    ico.className = 'bi bi-check2';
    btn.style.color = 'var(--g1)';
    setTimeout(() => { 
      lbl.textContent = 'مشاركة'; 
      ico.className = 'bi bi-share'; 
      btn.style.color = ''; 
    }, 2200);
  });
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\articles\show.blade.php ENDPATH**/ ?>