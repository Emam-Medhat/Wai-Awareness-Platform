<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'لوحة التحكم') - منصة توعوية حكومية</title>
    
    <!-- Google Fonts - Cairo & Tajawal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --wa3y-green: #2D5E3A;
            --wa3y-green-dark: #1e3f27;
            --wa3y-green-mid: #3d7a4e;
            --wa3y-teal: #3A7D6E;
            --wa3y-gold: #C4A882;
            --wa3y-gold-dark: #a8885e;
            --wa3y-gold-light: #d4bfa0;
            --wa3y-cream: #F0EFEC;
            --wa3y-cream-dark: #e5e3de;
            --wa3y-white: #ffffff;
            --wa3y-text-dark: #1a2e20;
            --wa3y-text-mid: #4a5e50;
            --wa3y-text-light: #7a8e80;
        }
        
        body {
            font-family: 'Cairo', 'Tajawal', sans-serif;
            background: var(--wa3y-cream);
            min-height: 100vh;
        }
        
        .admin-header {
            background: linear-gradient(135deg, var(--wa3y-green) 0%, var(--wa3y-teal) 100%);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(45,94,58,0.15);
            position: relative;
            overflow: hidden;
        }

        .admin-header::before {
            content: '';
            position: absolute; inset: 0;
            background-image: radial-gradient(circle, rgba(196,168,130,0.1) 1px, transparent 1px);
            background-size: 28px 28px;
        }
        
        .admin-sidebar {
            background: linear-gradient(180deg, var(--wa3y-green-dark) 0%, #0f172a 100%);
            box-shadow: 4px 0 20px rgba(45,94,58,0.15);
            border-left: 1px solid rgba(196,168,130,0.2);
        }
        
        .admin-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(196,168,130,0.15);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(45,94,58,0.08);
            transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        
        .admin-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 48px rgba(45,94,58,0.12);
            border-color: rgba(196,168,130,0.3);
        }
        
        .nav-link {
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 4px 8px;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute; top: 0; left: -100%; right: 100%; bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: all 0.5s ease;
        }

        .nav-link:hover::before { left: 100%; right: -100%; }
        
        .nav-link:hover {
            background: rgba(45,94,58,0.15);
            transform: translateX(-4px);
            border-color: rgba(196,168,130,0.3);
        }
        
        .nav-link.active {
            background: linear-gradient(135deg, var(--wa3y-green), var(--wa3y-teal));
            box-shadow: 0 4px 15px rgba(45,94,58,0.3);
            border-color: rgba(196,168,130,0.4);
        }

        .nav-link.active::before {
            display: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--wa3y-green), var(--wa3y-teal));
            border: none;
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(45,94,58,0.25);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute; top: 0; left: -100%; right: 100%; bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: all 0.5s ease;
        }

        .btn-primary:hover::before { left: 100%; right: -100%; }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(45,94,58,0.35);
            background: linear-gradient(135deg, var(--wa3y-green-dark), var(--wa3y-green));
        }
        
        .stats-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(255,255,255,0.85));
            backdrop-filter: blur(15px);
            border: 1px solid rgba(196,168,130,0.2);
            border-radius: 20px;
            padding: 28px;
            transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, var(--wa3y-gold), var(--wa3y-green), var(--wa3y-teal), var(--wa3y-gold));
            transform: scaleX(0); transform-origin: right;
            transition: transform 0.4s ease;
        }

        .stats-card:hover::before { transform: scaleX(1); }
        
        .stats-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 60px rgba(45,94,58,0.15);
            border-color: rgba(196,168,130,0.4);
            background: rgba(255,255,255,0.98);
        }
        
        .badge-primary {
            background: linear-gradient(135deg, var(--wa3y-gold), var(--wa3y-green));
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(196,168,130,0.3);
        }
        
        .table-hover tbody tr:hover {
            background: rgba(45,94,58,0.05);
            transition: all 0.2s ease;
        }
        
        .form-control, .form-select {
            border-radius: 14px;
            border: 2px solid rgba(196,168,130,0.2);
            padding: 14px 18px;
            transition: all 0.3s ease;
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(5px);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--wa3y-green);
            box-shadow: 0 0 0 4px rgba(45,94,58,0.1);
            background: rgba(255,255,255,0.95);
        }

        /* Enhanced sidebar sections */
        .admin-sidebar h6 {
            position: relative;
            padding-bottom: 12px;
            margin-bottom: 16px;
        }

        .admin-sidebar h6::after {
            content: '';
            position: absolute; bottom: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--wa3y-gold), transparent);
            border-radius: 1px;
        }

        /* Enhanced dropdown */
        .dropdown-menu {
            background: rgba(255,255,255,0.98);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(196,168,130,0.2);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(45,94,58,0.15);
            padding: 8px;
        }

        .dropdown-item {
            border-radius: 10px;
            transition: all 0.2s ease;
            margin: 2px 0;
        }

        .dropdown-item:hover {
            background: var(--wa3y-green);
            color: white;
            transform: translateX(-4px);
        }

        /* Enhanced alerts */
        .alert {
            border-radius: 16px;
            border: none;
            backdrop-filter: blur(10px);
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(45,94,58,0.1), rgba(45,94,58,0.05));
            color: var(--wa3y-green);
            border: 1px solid rgba(45,94,58,0.2);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(239,68,68,0.1), rgba(239,68,68,0.05));
            color: #dc2626;
            border: 1px solid rgba(239,68,68,0.2);
        }
    </style>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    @stack('styles')
</head>
<body class="font-arabic" style="font-family: 'Cairo', 'Tajawal', sans-serif;">
    <!-- Admin Header -->
    <header class="admin-header text-white py-4 px-6 shadow-lg">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--wa3y-gold), var(--wa3y-green)); border-radius: 16px; margin-left: 16px;">
                            <i class="fas fa-cube fa-lg text-white"></i>
                        </div>
                        <div>
                            <h1 class="h3 mb-0 fw-bold text-white">منصة وعي</h1>
                            <small class="opacity-75 text-white">لوحة التحكم الإدارية</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex align-items-center justify-content-md-end gap-3">
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle ml-2"></i>
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="fas fa-user ml-2"></i> الملف الشخصي
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-cog ml-2"></i> الإعدادات
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="{{ route('logout') }}" method="POST">
                                    <i class="fas fa-sign-out-alt ml-2"></i> تسجيل الخروج
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Admin Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block admin-sidebar min-vh-100 p-0">
                <div class="admin-sidebar text-white p-4">
                    <div class="mb-4">
                        <h6 class="text-uppercase fw-bold mb-3 text-warning">
                            <i class="fas fa-tachometer-alt ml-2"></i> لوحة التحكم
                        </h6>
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} text-white d-flex align-items-center py-3">
                            <i class="fas fa-home ml-3"></i>
                            <span>الرئيسية</span>
                        </a>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-uppercase fw-bold mb-3 text-info">
                            <i class="fas fa-layer-group ml-2"></i> إدارة المحتوى
                        </h6>
                        <a href="{{ route('admin.articles') }}" class="nav-link {{ request()->routeIs('admin.articles*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-newspaper ml-3"></i>
                            <span>المقالات</span>
                        </a>
                        <a href="{{ route('admin.videos') }}" class="nav-link {{ request()->routeIs('admin.videos*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-video ml-3"></i>
                            <span>الفيديوهات</span>
                        </a>
                        <a href="{{ route('admin.books.index') }}" class="nav-link {{ request()->routeIs('admin.books*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-book-open ml-3"></i>
                            <span>الكتب</span>
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-tags ml-3"></i>
                            <span>الفئات</span>
                        </a>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-uppercase fw-bold mb-3 text-primary">
                            <i class="fas fa-globe ml-2"></i> الصفحات الرئيسية
                        </h6>
                        <a href="{{ route('home') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-home ml-3"></i>
                            <span>الصفحة الرئيسية</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('about') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-info-circle ml-3"></i>
                            <span>من نحن</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('contact') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-envelope ml-3"></i>
                            <span>اتصل بنا</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('articles') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-newspaper ml-3"></i>
                            <span>جميع المقالات</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('videos') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-video ml-3"></i>
                            <span>جميع الفيديوهات</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('books') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-book ml-3"></i>
                            <span>جميع الكتب</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('categories') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-tags ml-3"></i>
                            <span>جميع الفئات</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('stories.index') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-book-open ml-3"></i>
                            <span>القصص</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('habits.index') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-heart ml-3"></i>
                            <span>العادات</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('ai-assistant') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-robot ml-3"></i>
                            <span>المساعد الذكي</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('journey') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-route ml-3"></i>
                            <span>رحلة التغيير</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                        <a href="{{ route('addiction') }}" target="_blank" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-heart-broken ml-3"></i>
                            <span>علاج الإدمان</span>
                            <i class="fas fa-external-link-alt ms-auto text-warning"></i>
                        </a>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-uppercase fw-bold mb-3 text-success">
                            <i class="fas fa-user-shield ml-2"></i> إدارة المستخدمين
                        </h6>
                        <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-users ml-3"></i>
                            <span>المستخدمون</span>
                        </a>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-uppercase fw-bold mb-3 text-warning">
                            <i class="fas fa-comments ml-2"></i> إدارة المجتمع
                        </h6>
                        <a href="{{ route('admin.stories') }}" class="nav-link {{ request()->routeIs('admin.stories*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-book-open ml-3"></i>
                            <span>القصص</span>
                        </a>
                        <a href="{{ route('admin.habits') }}" class="nav-link {{ request()->routeIs('admin.habits*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-heart ml-3"></i>
                            <span>العادات</span>
                        </a>
                    </div>

                    <div>
                        <h6 class="text-uppercase fw-bold mb-3 text-danger">
                            <i class="fas fa-cogs ml-2"></i> إدارة النظام
                        </h6>
                        <a href="{{ route('admin.future-messages') }}" class="nav-link {{ request()->routeIs('admin.future-messages*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-envelope ml-3"></i>
                            <span>الرسائل المستقبلية</span>
                        </a>
                        <a href="{{ route('admin.campaigns') }}" class="nav-link {{ request()->routeIs('admin.campaigns*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-bullhorn ml-3"></i>
                            <span>الحملات</span>
                        </a>
                        <a href="{{ route('admin.contacts') }}" class="nav-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-envelope-open-text ml-3"></i>
                            <span>رسائل التواصل</span>
                        </a>
                        <a href="{{ route('admin.analytics') }}" class="nav-link {{ request()->routeIs('admin.analytics') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-chart-line ml-3"></i>
                            <span>التحليلات</span>
                        </a>
                        <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-cog ml-3"></i>
                            <span>الإعدادات</span>
                        </a>
                        <a href="{{ route('admin.logs') }}" class="nav-link {{ request()->routeIs('admin.logs') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-file-alt ml-3"></i>
                            <span>السجلات</span>
                        </a>
                        <a href="{{ route('admin.backup') }}" class="nav-link {{ request()->routeIs('admin.backup') ? 'active' : '' }} text-white d-flex align-items-center py-2">
                            <i class="fas fa-database ml-3"></i>
                            <span>النسخ الاحتياطي</span>
                        </a>
                    </div>

                    <div class="mt-4 pt-4 border-top border-secondary">
                        <h6 class="text-uppercase fw-bold mb-3 text-warning">
                            <i class="fas fa-tools ml-2"></i> أدوات سريعة
                        </h6>
                        <a href="{{ route('admin.articles.create') }}" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-plus-circle ml-3"></i>
                            <span>إضافة مقال</span>
                        </a>
                        <a href="{{ route('admin.videos.create') }}" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-plus-circle ml-3"></i>
                            <span>إضافة فيديو</span>
                        </a>
                        <a href="{{ route('admin.users.create') }}" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-user-plus ml-3"></i>
                            <span>إضافة مستخدم</span>
                        </a>
                        <a href="{{ route('admin.contacts') }}" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-envelope ml-3"></i>
                            <span>رسائل جديدة</span>
                            @if(isset($unreadContacts) && $unreadContacts > 0)
                            <span class="badge bg-danger ms-auto">{{ $unreadContacts }}</span>
                            @endif
                        </a>
                        <a href="{{ route('admin.stories') }}" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-book-open ml-3"></i>
                            <span>قصص معلقة</span>
                            @if(isset($pendingStories) && $pendingStories > 0)
                            <span class="badge bg-warning ms-auto">{{ $pendingStories }}</span>
                            @endif
                        </a>
                        <a href="{{ route('admin.habits') }}" class="nav-link text-white d-flex align-items-center py-2">
                            <i class="fas fa-heart ml-3"></i>
                            <span>عادات معلقة</span>
                            @if(isset($pendingHabits) && $pendingHabits > 0)
                            <span class="badge bg-warning ms-auto">{{ $pendingHabits }}</span>
                            @endif
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });
        
        // Auto-hide alerts
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
    
    @stack('scripts')
</body>
</html>
