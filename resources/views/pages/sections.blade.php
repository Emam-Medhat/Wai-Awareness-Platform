@extends('layouts.app')

@section('title', 'الأقسام')

@section('content')
<div style="background: linear-gradient(135deg, #1a2e20 0%, #2C5F2D 30%, #4A7C59 70%, #97BC62 100%); font-family:'Tajawal',sans-serif; min-height: 100vh; position: relative; overflow: hidden;">
    
    <!-- Animated Background -->
    <div class="position-fixed" style="top:0; left:0; right:0; bottom:0; pointer-events:none; z-index:1;">
        <div class="position-absolute floating-orb" style="top:15%; left:10%; width:200px; height:200px; background:radial-gradient(circle, rgba(233,30,99,0.15) 0%, transparent 70%); border-radius:50%; animation: float 6s ease-in-out infinite;"></div>
        <div class="position-absolute floating-orb" style="top:70%; right:15%; width:180px; height:180px; background:radial-gradient(circle, rgba(196,168,130,0.12) 0%, transparent 70%); border-radius:50%; animation: float 8s ease-in-out infinite 1s;"></div>
        <div class="position-absolute floating-orb" style="bottom:25%; left:20%; width:150px; height:150px; background:radial-gradient(circle, rgba(74,124,89,0.1) 0%, transparent 70%); border-radius:50%; animation: float 7s ease-in-out infinite 2s;"></div>
        <div class="position-absolute" style="top:40%; right:40%; width:100px; height:100px; background:radial-gradient(circle, rgba(244,143,177,0.08) 0%, transparent 70%); border-radius:50%; animation: pulse 4s ease-in-out infinite;"></div>
    </div>

    <!-- Hero Section -->
    <div class="position-relative" style="z-index:2; padding: 6rem 1.5rem 4rem;">
        <div class="container">
            <div class="text-center mb-5">
                <!-- Status Badge -->
                <div class="d-inline-flex align-items-center gap-2 mb-4" 
                     style="background: linear-gradient(135deg, rgba(233,30,99,0.15), rgba(233,30,99,0.05)); 
                            backdrop-filter: blur(20px); 
                            padding: 0.625rem 1.25rem; 
                            border-radius: 100px; 
                            border: 1px solid rgba(233,30,99,0.2);
                            box-shadow: 0 8px 32px rgba(233,30,99,0.1);
                            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                    <div class="badge-indicator" style="width: 10px; height: 10px; background: var(--accent); border-radius: 50%; box-shadow: 0 0 20px rgba(233,30,99,0.6); animation: pulse 2s infinite;"></div>
                    <span style="color: rgba(255,255,255,0.95); font-size: 0.875rem; font-weight: 600; letter-spacing: 0.025em;">منصة متكاملة للتوعية</span>
                </div>

                <!-- Main Title -->
                <h1 class="hero-title mb-4" style="font-size: clamp(2.75rem, 6vw, 4rem); font-weight: 900; line-height: 1.05; color: white; margin: 0;">
                    <span class="title-line" style="display: block; margin-bottom: 0.25rem;">
                        استكشف
                        <span class="brand-name" style="background: linear-gradient(135deg, var(--gold) 0%, #f4e4d4 50%, var(--gold) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; position: relative; padding: 0 0.125rem;">أقسام المنصة</span>
                    </span>
                </h1>

                <!-- Description -->
                <p class="hero-desc mb-5" style="font-size: 1.125rem; line-height: 1.7; color: rgba(255,255,255,0.8); margin: 0; font-weight: 400; max-width: 600px; margin: 0 auto;">
                    جميع محتويات ومنصاتنا التوعوية في مكان واحد، مصممة لتلبية جميع احتياجاتك الصحية والنفسية.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="position-relative" style="z-index:2; padding-bottom: 4rem;">
        <div class="container">
            
            <!-- Content Library Section -->
            <div class="section-card mb-4" style="background: rgba(255,255,255,0.98); backdrop-filter: blur(20px); border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); overflow: hidden;">
                <div class="p-4 p-lg-5">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-6">
                            <div class="section-header mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--accent), var(--accent-dark)); box-shadow: 0 4px 15px rgba(233,30,99,0.3);">
                                            <i class="bi bi-book-fill text-white" style="font-size: 1.25rem;"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0 fw-bold" style="color: var(--dark); font-size: 1.75rem;">مكتبة المحتوى</h2>
                                        <p class="text-muted mb-0">مصدر شامل للمحتوى التوعوي الموثوق</p>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-muted mb-4" style="font-size: 1.05rem; line-height: 1.6;">
                                مصدر شامل للمحتوى التوعوي الموثوق، شامل الكتب والمقالات والفيديوهات في مجالات الصحة النفسية والتطوير الشخصي.
                            </p>
                            
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="content-item" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1.5rem; background: rgba(255,255,255,0.8); border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                        <div class="icon-wrapper mb-3" style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(233,30,99,0.1), rgba(233,30,99,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-book" style="color: var(--accent); font-size: 1.5rem;"></i>
                                        </div>
                                        <h3 class="fw-bold mb-2" style="color: var(--dark);">الكتب</h3>
                                        <p class="text-muted mb-3" style="font-size: 0.9rem;">مجموعة مختارة من الكتب المتخصصة</p>
                                        <a href="{{ route('books') }}" class="btn-link" style="color: var(--accent); text-decoration: none; font-weight: 600;">
                                            استكشف <i class="bi bi-arrow-left ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="content-item" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1.5rem; background: rgba(255,255,255,0.8); border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                        <div class="icon-wrapper mb-3" style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(44,95,45,0.1), rgba(44,95,45,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-newspaper" style="color: var(--g2); font-size: 1.5rem;"></i>
                                        </div>
                                        <h3 class="fw-bold mb-2" style="color: var(--dark);">المقالات</h3>
                                        <p class="text-muted mb-3" style="font-size: 0.9rem;">مقالات علمية وموثوقة</p>
                                        <a href="{{ route('articles') }}" class="btn-link" style="color: var(--g2); text-decoration: none; font-weight: 600;">
                                            استكشف <i class="bi bi-arrow-left ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="content-item" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1.5rem; background: rgba(255,255,255,0.8); border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                        <div class="icon-wrapper mb-3" style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(196,168,130,0.1), rgba(196,168,130,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-play-circle-fill" style="color: var(--gold); font-size: 1.5rem;"></i>
                                        </div>
                                        <h3 class="fw-bold mb-2" style="color: var(--dark);">الفيديوهات</h3>
                                        <p class="text-muted mb-3" style="font-size: 0.9rem;">محتوى مرئي تعليمي</p>
                                        <a href="{{ route('videos') }}" class="btn-link" style="color: var(--gold); text-decoration: none; font-weight: 600;">
                                            استكشف <i class="bi bi-arrow-left ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="text-center">
                                <div class="illustration-wrapper" style="background: linear-gradient(135deg, rgba(233,30,99,0.05), rgba(44,95,45,0.05)); border-radius: 20px; padding: 3rem;">
                                    <i class="bi bi-book-reader" style="font-size: 8rem; color: var(--accent); opacity: 0.3;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Community Section -->
            <div class="section-card mb-4" style="background: rgba(255,255,255,0.98); backdrop-filter: blur(20px); border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); overflow: hidden;">
                <div class="p-4 p-lg-5">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-6 order-2 order-lg-1">
                            <div class="text-center">
                                <div class="illustration-wrapper" style="background: linear-gradient(135deg, rgba(44,95,45,0.05), rgba(196,168,130,0.05)); border-radius: 20px; padding: 3rem;">
                                    <i class="bi bi-people-fill" style="font-size: 8rem; color: var(--g2); opacity: 0.3;"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 order-1 order-lg-2">
                            <div class="section-header mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--g2), var(--g3)); box-shadow: 0 4px 15px rgba(74,124,89,0.3);">
                                            <i class="bi bi-people-fill text-white" style="font-size: 1.25rem;"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h2 class="mb-0 fw-bold" style="color: var(--dark); font-size: 1.75rem;">المجتمع التفاعلي</h2>
                                        <p class="text-muted mb-0">مساحة آمنة للمشاركة والنمو</p>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-muted mb-4" style="font-size: 1.05rem; line-height: 1.6;">
                                مساحة آمنة لمشاركة القصص والتجارب، والاستفادة من خبرات الآخرين في رحلة التطور الشخصي.
                            </p>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="content-item" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1.5rem; background: rgba(255,255,255,0.8); border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                        <div class="icon-wrapper mb-3" style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(196,168,130,0.1), rgba(196,168,130,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-pencil-square" style="color: var(--gold); font-size: 1.5rem;"></i>
                                        </div>
                                        <h3 class="fw-bold mb-2" style="color: var(--dark);">القصص</h3>
                                        <p class="text-muted mb-3" style="font-size: 0.9rem;">قصص ملهمة وتجارب شخصية</p>
                                        <a href="{{ route('stories.index') }}" class="btn-link" style="color: var(--gold); text-decoration: none; font-weight: 600;">
                                            شارك قصتك <i class="bi bi-arrow-left ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="content-item" style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 1.5rem; background: rgba(255,255,255,0.8); border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                        <div class="icon-wrapper mb-3" style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(233,30,99,0.1), rgba(233,30,99,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-heart-pulse-fill" style="color: var(--accent); font-size: 1.5rem;"></i>
                                        </div>
                                        <h3 class="fw-bold mb-2" style="color: var(--dark);">العادات</h3>
                                        <p class="text-muted mb-3" style="font-size: 0.9rem;">تطوير عادات إيجابية</p>
                                        <a href="{{ route('habits.index') }}" class="btn-link" style="color: var(--accent); text-decoration: none; font-weight: 600;">
                                            ابدأ الآن <i class="bi bi-arrow-left ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tools Section -->
            <div class="section-card mb-4" style="background: rgba(255,255,255,0.98); backdrop-filter: blur(20px); border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); overflow: hidden;">
                <div class="p-4 p-lg-5">
                    <div class="text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--accent-dark), var(--accent)); box-shadow: 0 4px 15px rgba(233,30,99,0.3);">
                                <i class="bi bi-tools text-white" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-2" style="color: var(--dark); font-size: 2rem;">الأدوات التفاعلية</h2>
                        <p class="text-muted">أدوات ذكية لدعم رحلتك التطورية</p>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="tool-card text-center" style="padding: 2rem; background: rgba(255,255,255,0.8); border-radius: 20px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(233,30,99,0.1), rgba(233,30,99,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="bi bi-robot" style="color: var(--accent); font-size: 2rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-3" style="color: var(--dark); font-size: 1.25rem;">المساعد الذكي</h3>
                                <p class="text-muted mb-4">احصل على إجابات فورية ودعم شخصي عبر الذكاء الاصطناعي</p>
                                <a href="{{ route('ai-assistant') }}" class="btn-primary-action" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, var(--accent), var(--accent-dark)); border: none; border-radius: 50px; color: white; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">
                                    ابدأ المحادثة
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="tool-card text-center" style="padding: 2rem; background: rgba(255,255,255,0.8); border-radius: 20px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(44,95,45,0.1), rgba(44,95,45,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="bi bi-calendar-event" style="color: var(--g2); font-size: 2rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-3" style="color: var(--dark); font-size: 1.25rem;">الرسائل المستقبلية</h3>
                                <p class="text-muted mb-4">ارسل رسائل لنفسك في المستقبل للتذكير والدعم</p>
                                <a href="{{ route('future-message.index') }}" class="btn-secondary-action" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, var(--g2), var(--g3)); border: none; border-radius: 50px; color: white; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">
                                    اكتب رسالة
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="tool-card text-center" style="padding: 2rem; background: rgba(255,255,255,0.8); border-radius: 20px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(196,168,130,0.1), rgba(196,168,130,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="bi bi-signpost-2" style="color: var(--gold); font-size: 2rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-3" style="color: var(--dark); font-size: 1.25rem;">خارطة الطريق</h3>
                                <p class="text-muted mb-4">تتبع تقدمك في رحلة التطور الشخصي</p>
                                <a href="{{ route('journey') }}" class="btn-tertiary-action" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, var(--gold), #a8885e); border: none; border-radius: 50px; color: white; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">
                                    عرض رحلتك
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support Section -->
            <div class="section-card mb-4" style="background: rgba(255,255,255,0.98); backdrop-filter: blur(20px); border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); overflow: hidden;">
                <div class="p-4 p-lg-5">
                    <div class="text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--g2), var(--g3)); box-shadow: 0 4px 15px rgba(74,124,89,0.3);">
                                <i class="bi bi-hand-heart text-white" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold mb-2" style="color: var(--dark); font-size: 2rem;">الدعم والمساعدة</h2>
                        <p class="text-muted">فريق دعم متخصص لمساعدتك في أي وقت</p>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="support-card text-center" style="padding: 2rem; background: rgba(255,255,255,0.8); border-radius: 20px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(233,30,99,0.1), rgba(233,30,99,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="bi bi-telephone-fill" style="color: var(--accent); font-size: 2rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-3" style="color: var(--dark); font-size: 1.25rem;">اتصل بنا</h3>
                                <p class="text-muted mb-4">تواصل مع فريق الدعم للحصول على المساعدة</p>
                                <a href="{{ route('contact') }}" class="btn-primary-action" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, var(--accent), var(--accent-dark)); border: none; border-radius: 50px; color: white; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">
                                    تواصل الآن
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="support-card text-center" style="padding: 2rem; background: rgba(255,255,255,0.8); border-radius: 20px; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s ease;">
                                <div class="icon-wrapper mb-4" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(44,95,45,0.1), rgba(44,95,45,0.05)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    <i class="bi bi-info-circle-fill" style="color: var(--g2); font-size: 2rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-3" style="color: var(--dark); font-size: 1.25rem;">عن المنصة</h3>
                                <p class="text-muted mb-4">تعرف أكثر على رؤيتنا ورسالتنا وقيمنا</p>
                                <a href="{{ route('about') }}" class="btn-secondary-action" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, var(--g2), var(--g3)); border: none; border-radius: 50px; color: white; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">
                                    تعرف علينا
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Section -->
            <div class="stats-section" style="background: linear-gradient(135deg, var(--accent), var(--accent-dark)); border-radius: 24px; padding: 3rem; text-align: center; color: white; box-shadow: 0 20px 40px rgba(233,30,99,0.3);">
                <h2 class="fw-bold mb-5" style="font-size: 2rem;">منصتنا بالأرقام</h2>
                <div class="row g-4">
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number fw-bold mb-2" style="font-size: 2.5rem;">50,000+</div>
                            <p class="stat-label mb-0" style="opacity: 0.9;">مستخدم نشط</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number fw-bold mb-2" style="font-size: 2.5rem;">1,000+</div>
                            <p class="stat-label mb-0" style="opacity: 0.9;">محتوى تعليمي</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number fw-bold mb-2" style="font-size: 2.5rem;">100+</div>
                            <p class="stat-label mb-0" style="opacity: 0.9;">خبير ومتخصص</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number fw-bold mb-2" style="font-size: 2.5rem;">98%</div>
                            <p class="stat-label mb-0" style="opacity: 0.9;">رضا المستخدمين</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Animations */
@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.8; transform: scale(1.2); }
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

/* Section Cards */
.section-card {
  animation: fadeInUp 0.8s ease-out;
  transition: all 0.3s ease;
}

.section-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 25px 50px rgba(0,0,0,0.15) !important;
}

/* Content Items */
.content-item:hover {
  transform: translateY(-3px) scale(1.02);
  background: rgba(255,255,255,0.95) !important;
  box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.content-item:hover .icon-wrapper {
  transform: scale(1.1);
  box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.icon-wrapper {
  transition: all 0.3s ease;
}

/* Tool Cards */
.tool-card:hover {
  transform: translateY(-5px) scale(1.02);
  background: rgba(255,255,255,0.95) !important;
  box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.tool-card:hover .icon-wrapper {
  transform: scale(1.1) rotate(5deg);
  box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}

/* Support Cards */
.support-card:hover {
  transform: translateY(-5px) scale(1.02);
  background: rgba(255,255,255,0.95) !important;
  box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

/* Buttons */
.btn-primary-action:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(233,30,99,0.4) !important;
  background: linear-gradient(135deg, var(--accent-dark), var(--accent)) !important;
}

.btn-secondary-action:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(74,124,89,0.4) !important;
  background: linear-gradient(135deg, var(--g3), var(--g2)) !important;
}

.btn-tertiary-action:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(196,168,130,0.4) !important;
  background: linear-gradient(135deg, #a8885e, var(--gold)) !important;
}

.btn-link:hover {
  transform: translateX(-3px);
}

/* Stats */
.stat-item {
  padding: 1rem;
  border-radius: 12px;
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.stat-item:hover {
  transform: translateY(-3px) scale(1.05);
  background: rgba(255,255,255,0.15);
}

/* Responsive */
@media (max-width: 768px) {
  .hero-title {
    font-size: clamp(2rem, 8vw, 2.5rem) !important;
  }
  
  .section-card {
    margin-bottom: 1.5rem !important;
  }
  
  .content-item,
  .tool-card,
  .support-card {
    padding: 1rem !important;
  }
  
  .icon-wrapper {
    width: 50px !important;
    height: 50px !important;
  }
  
  .stats-section {
    padding: 2rem !important;
  }
  
  .stat-number {
    font-size: 2rem !important;
  }
}
</style>
@endsection
