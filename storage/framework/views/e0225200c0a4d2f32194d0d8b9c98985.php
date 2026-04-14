<?php $__env->startSection('title', 'عن المنصة'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* WA3Y About Page Design Tokens */
:root {
  --g1: #2D5E3A;
  --g2: #3d7a4e;
  --g3: #4A8C5C;
  --teal: #3A7D6E;
  --gold: #C4A882;
  --gold2: #a8885e;
  --cream: #F0EFEC;
  --cream2: #e5e3de;
  --dark: #1a2e20;
}

/* Hero Section */
.about-hero {
  background: var(--dark);
  position: relative;
  overflow: hidden;
  color: white;
  padding: 120px 0 80px;
}

/* Mesh gradient background */
.about-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse 80% 60% at 20% 20%, rgba(45,94,58,.55) 0%, transparent 60%),
    radial-gradient(ellipse 60% 80% at 80% 80%, rgba(58,125,110,.4) 0%, transparent 55%),
    radial-gradient(ellipse 50% 50% at 50% 50%, rgba(196,168,130,.08) 0%, transparent 70%),
    linear-gradient(170deg, #0d1f13 0%, #1a2e20 50%, #0a1a10 100%);
}

/* Animated radial glow */
.about-hero::after {
  content: '';
  position: absolute;
  width: 600px; height: 600px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(45,94,58,.35) 0%, transparent 70%);
  top: -100px; right: -100px;
  animation: glowPulse 8s ease-in-out infinite;
}

/* Dot grid overlay */
.about-hero .hero-dots {
  position: absolute;
  inset: 0;
  background-image: radial-gradient(circle, rgba(196,168,130,.18) 1px, transparent 1px);
  background-size: 40px 40px;
  animation: dotsDrift 20s linear infinite;
}

@keyframes glowPulse {
  0%,100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.2); opacity: .6; }
}

@keyframes dotsDrift {
  0%   { transform: translateY(0); }
  100% { transform: translateY(40px); }
}

.hero-content {
  position: relative;
  z-index: 2;
}

.hero-title {
  font-size: 3.5rem;
  font-weight: 800;
  margin-bottom: 1.5rem;
  line-height: 1.2;
  background: linear-gradient(45deg, #fff, var(--gold), #fff);
  background-size: 300% 300%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  animation: gradient-shift 4s ease-in-out infinite;
}

@keyframes gradient-shift {
  0%, 100% { background-position: 0% 50%; }
  25% { background-position: 50% 0%; }
  50% { background-position: 100% 50%; }
  75% { background-position: 50% 100%; }
}

.hero-description {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.95;
    line-height: 1.6;
    text-shadow: 0 3px 6px rgba(0,0,0,0.2);
}

/* Section Styles */
.section-card {
    background: white;
    border-radius: 30px;
    box-shadow: 0 15px 50px rgba(0,0,0,0.15);
    padding: 4rem;
    margin-bottom: 3rem;
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
}

.section-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--g1), var(--teal), var(--gold));
}

.section-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 70px rgba(0,0,0,0.2);
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--g1);
    margin-bottom: 3rem;
    text-align: center;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -1rem;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--g1), var(--teal), var(--gold));
    border-radius: 2px;
}

/* Mission Section */
.mission-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

.mission-content h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--teal);
    margin-bottom: 1.5rem;
}

.mission-content p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #666;
    margin-bottom: 2rem;
}

.mission-icon {
    text-align: center;
    font-size: 12rem;
    color: var(--g1);
    opacity: 0.1;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Services Grid */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2.5rem;
}

.service-card {
    background: #f8f9fa;
    border: 2px solid #e0e0e0;
    border-radius: 25px;
    padding: 2.5rem;
    text-align: center;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--g1), var(--teal), var(--gold));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.service-card:hover::before {
    transform: scaleX(1);
}

.service-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    border-color: var(--teal);
}

.service-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 2rem;
    color: white;
    transition: all 0.4s ease;
}

.service-card:nth-child(1) .service-icon { background: linear-gradient(135deg, var(--g1), var(--teal)); }
.service-card:nth-child(2) .service-icon { background: linear-gradient(135deg, var(--teal), var(--g3)); }
.service-card:nth-child(3) .service-icon { background: linear-gradient(135deg, var(--g3), var(--g1)); }
.service-card:nth-child(4) .service-icon { background: linear-gradient(135deg, var(--gold), var(--gold2)); }
.service-card:nth-child(5) .service-icon { background: linear-gradient(135deg, var(--gold2), var(--gold)); }
.service-card:nth-child(6) .service-icon { background: linear-gradient(135deg, var(--teal), var(--gold)); }

.service-card:hover .service-icon {
    transform: scale(1.1) rotate(5deg);
}

.service-card h3 {
    font-size: 1.4rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.service-card p {
    color: #666;
    line-height: 1.6;
    font-size: 1rem;
}

/* Values Grid */
.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 3rem;
}

.value-card {
    text-align: center;
    padding: 2rem;
    transition: all 0.4s ease;
}

.value-icon {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 2.5rem;
    color: white;
    transition: all 0.4s ease;
}

.value-card:nth-child(1) .value-icon { background: linear-gradient(135deg, var(--g1), var(--teal)); }
.value-card:nth-child(2) .value-icon { background: linear-gradient(135deg, var(--teal), var(--g3)); }
.value-card:nth-child(3) .value-icon { background: linear-gradient(135deg, var(--g3), var(--g1)); }
.value-card:nth-child(4) .value-icon { background: linear-gradient(135deg, var(--gold), var(--gold2)); }

.value-card:hover .value-icon {
    transform: scale(1.15) rotate(10deg);
}

.value-card h3 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.value-card p {
    color: #666;
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Statistics Section */
.stats-section {
    background: linear-gradient(135deg, var(--g1), var(--teal));
    color: white;
    border-radius: 30px;
    padding: 4rem;
    position: relative;
    overflow: hidden;
}

.stats-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 3rem;
    position: relative;
    z-index: 2;
}

.stat-item {
    text-align: center;
    padding: 2rem;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 20px;
    transition: all 0.4s ease;
}

.stat-item:hover {
    transform: translateY(-10px);
    background: rgba(255,255,255,0.15);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.stat-number {
    font-size: 3rem;
    font-weight: 900;
    color: var(--gold);
    margin-bottom: 1rem;
    text-shadow: 0 3px 6px rgba(0,0,0,0.3);
}

.stat-label {
    font-size: 1.1rem;
    opacity: 0.9;
    font-weight: 600;
}

/* Team Section */
.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 3rem;
}

.team-member {
    text-align: center;
    padding: 2.5rem;
    background: #f8f9fa;
    border-radius: 25px;
    transition: all 0.4s ease;
    border: 2px solid #e0e0e0;
}

.team-member:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    border-color: var(--teal);
}

.member-avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--g1), var(--teal));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 3rem;
    color: white;
    transition: all 0.4s ease;
}

.team-member:hover .member-avatar {
    transform: scale(1.1) rotate(5deg);
}

.member-name {
    font-size: 1.4rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
}

.member-role {
    font-size: 1.1rem;
    color: var(--teal);
    font-weight: 600;
    margin-bottom: 1rem;
}

.member-bio {
    color: #666;
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .mission-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .section-card {
        padding: 2rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
    
    .values-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
    
    .team-grid {
        grid-template-columns: 1fr;
    }
    
    .stats-section {
        padding: 2rem;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="about-hero">
    <div class="hero-dots"></div>
    <div class="container mx-auto px-4">
        <div class="hero-content text-center">
            <h1 class="hero-title">عن منصة وعي</h1>
            <p class="hero-description">منصة توعوية حكومية متكاملة لدعم الصحة النفسية والاجتماعية</p>
        </div>
    </div>
</section>

<!-- About Content -->
<div class="container mx-auto px-4 py-12">
    <!-- Mission Section -->
    <div class="section-card">
        <h2 class="section-title">رؤيتنا ورسالتنا</h2>
        <div class="mission-grid">
            <div class="mission-content">
                <div>
                    <h3>رؤيتنا</h3>
                    <p>أن نكون المنصة الرائدة في التوعية الصحية النفسية والاجتماعية في المملكة العربية السعودية، مساهمين في بناء مجتمع صحوي ومتوازن.</p>
                </div>
                <div>
                    <h3>رسالتنا</h3>
                    <p>توفير محتوى توعوي عالي الجودة ومصادر موثوقة لدعم الأفراد والأسر في رحلتهم نحو الصحة النفسية والاجتماعية، من خلال منصة رقمية متكاملة وسهلة الوصول.</p>
                </div>
            </div>
            <div class="mission-icon">
                <i class="fas fa-eye"></i>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="section-card">
        <h2 class="section-title">خدماتنا</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h3>مكتبة الكتب</h3>
                <p>مجموعة مختارة من الكتب المتخصصة في الصحة النفسية والتطوير الشخصي</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h3>فيديوهات تعليمية</h3>
                <p>محتوى مرئي توعوي من خبراء ومتخصصين في مجال الصحة النفسية</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3>مقالات متخصصة</h3>
                <p>مقالات علمية وموثوقة تغطي مختلف جوانب الصحة النفسية</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>مجتمع تفاعلي</h3>
                <p>مساحة آمنة لمشاركة القصص والتجارب والاستفادة من الآخرين</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-robot"></i>
                </div>
                <h3>مساعد ذكي</h3>
                <p>دعم فوري وإجابات على استفساراتك عبر الذكاء الاصطناعي</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-calendar"></i>
                </div>
                <h3>رسائل مستقبلية</h3>
                <p>تذكيرات ودعم مستمر في رحلتك نحو التحسين</p>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="section-card">
        <h2 class="section-title">قيمنا</h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>الثقة والموثوقية</h3>
                <p>نلتزم بتقديم محتوى موثوق ومصادر معتمدة</p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>التعاطف والدعم</h3>
                <p>نقدم الدعم بتعاطف واحترام لجميع المستخدمين</p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>الابتكار والتطوير</h3>
                <p>نسعى دائماً لتطوير خدماتنا ومحتوانا</p>
            </div>

            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3>الوصول للجميع</h3>
                <p>نضمن أن خدماتنا متاحة لجميع فئات المجتمع</p>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="stats-section">
        <h2 class="section-title" style="color: white;">منصتنا بالأرقام</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">50,000+</div>
                <div class="stat-label">مستخدم نشط</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">1,000+</div>
                <div class="stat-label">محتوى تعليمي</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100+</div>
                <div class="stat-label">خبير ومتخصص</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">رضا المستخدمين</div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="section-card">
        <h2 class="section-title">فريق العمل</h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="member-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h3 class="member-name">د. أحمد محمد</h3>
                <p class="member-role">مدير المنصة</p>
                <p class="member-bio">خبير في الصحة النفسية بـ15 عام خبرة</p>
            </div>

            <div class="team-member">
                <div class="member-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h3 class="member-name">د. سارة أحمد</h3>
                <p class="member-role">مديرة المحتوى</p>
                <p class="member-bio">متخصصة في علم النفس التربوي</p>
            </div>

            <div class="team-member">
                <div class="member-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h3 class="member-name">محمد علي</h3>
                <p class="member-role">مطور تقني</p>
                <p class="member-bio">خبير في تطوير المنصات الرقمية</p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\saieed\وعي\resources\views\pages\about.blade.php ENDPATH**/ ?>