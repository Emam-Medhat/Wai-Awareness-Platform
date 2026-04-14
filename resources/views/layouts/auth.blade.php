<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'منصة وعي') - منصة توعوية حكومية</title>
    
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
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --wa3y-primary: #2C5F2D;
            --wa3y-primary-dark: #1a2e20;
            --wa3y-primary-light: #4A7C59;
            --wa3y-secondary: #3A7D6E;
            --wa3y-secondary-dark: #2d6356;
            --wa3y-gold: #C4A882;
            --wa3y-gold-dark: #a8885e;
            --wa3y-success: #4A7C59;
            --wa3y-danger: #ef4444;
            --wa3y-warning: #C4A882;
            --wa3y-info: #3A7D6E;
            --wa3y-dark: #1a2e20;
            --wa3y-light: #f0efec;
            --wa3y-gradient: linear-gradient(135deg, #2C5F2D 0%, #3A7D6E 50%, #C4A882 100%);
            --wa3y-gradient-primary: linear-gradient(135deg, #2C5F2D 0%, #4A7C59 100%);
            --wa3y-gradient-secondary: linear-gradient(135deg, #3A7D6E 0%, #2C5F2D 100%);
            --wa3y-gradient-gold: linear-gradient(135deg, #C4A882 0%, #a8885e 100%);
        }
        
        * {
            font-family: 'Cairo', 'Tajawal', sans-serif;
        }
        
        body {
            font-family: 'Cairo', 'Tajawal', sans-serif;
            background: linear-gradient(170deg, #0d1f13 0%, #1a2e20 50%, #0a1a10 100%);
            min-height: 100vh;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--wa3y-primary);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--wa3y-primary-dark);
        }
        
        /* Auth Background */
        .auth-gradient {
            background: linear-gradient(170deg, #1a2e20 0%, #2C5F2D 50%, #3A7D6E 100%);
            position: relative;
            overflow: hidden;
        }
        
        .auth-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        /* Auth Card */
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 32px;
            box-shadow: 0 32px 64px rgba(0, 0, 0, 0.1), 0 16px 32px rgba(0, 0, 0, 0.08);
            padding: 4rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
        }
        
        .auth-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.15), 0 20px 40px rgba(0, 0, 0, 0.12);
        }
        
        /* Button Styles */
        .btn-primary-custom {
            background: var(--wa3y-gradient-primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(44, 95, 45, 0.3);
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(44, 95, 45, 0.4);
        }
        
        .btn-secondary-custom {
            background: var(--wa3y-gradient-gold);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(196, 168, 130, 0.3);
        }
        
        .btn-secondary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(196, 168, 130, 0.4);
        }
        
        /* Input Styles */
        .input-custom {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(44, 95, 45, 0.1);
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }
        
        .input-custom:focus {
            border-color: var(--wa3y-primary);
            box-shadow: 0 0 0 3px rgba(44, 95, 45, 0.1);
            background: white;
        }
        
        /* Logo Animation */
        .logo-animation {
            animation: float 3s ease-in-out infinite, glow 2s ease-in-out infinite alternate;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-10px) scale(1.05); }
        }
        
        @keyframes glow {
            0% { box-shadow: 0 0 20px rgba(44, 95, 45, 0.3); }
            100% { box-shadow: 0 0 40px rgba(44, 95, 45, 0.6), 0 0 60px rgba(74, 124, 89, 0.4); }
        }
        
        /* Floating Particles */
        .particle-container {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }
        
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            animation: floatUp 8s linear infinite;
        }
        
        @keyframes floatUp {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }
        
        .particle:nth-child(odd) {
            animation-duration: 10s;
        }
        
        .particle:nth-child(even) {
            animation-duration: 12s;
        }
        .social-btn {
            background: white;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        /* Bootstrap Component Styles */
        .card-wa3y {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            background: white;
        }
        
        .card-wa3y:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        
        .btn-wa3y-primary {
            background: var(--wa3y-primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(44, 95, 45, 0.3);
        }
        
        .btn-wa3y-primary:hover {
            background: var(--wa3y-primary-dark);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(44, 95, 45, 0.4);
        }
        
        .btn-wa3y-outline {
            background: transparent;
            color: var(--wa3y-primary);
            border: 2px solid var(--wa3y-primary);
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-wa3y-outline:hover {
            background: var(--wa3y-primary);
            color: white;
        }
        
        /* RTL fixes for Bootstrap */
        .dropdown-menu {
            right: 0 !important;
            left: auto !important;
        }
        
        .form-check {
            padding-right: 0;
            padding-left: 2.5rem;
        }
        
        .form-check-input {
            margin-left: -1.5rem;
            margin-right: auto;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .auth-card {
                margin: 1rem;
                border-radius: 20px;
            }
        }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2C5F2D',
                        'primary-dark': '#1a2e20',
                        'primary-light': '#4A7C59',
                        secondary: '#3A7D6E',
                        'secondary-dark': '#2d6356',
                        gold: '#C4A882',
                        'gold-dark': '#a8885e',
                        success: '#4A7C59',
                        danger: '#ef4444',
                        warning: '#C4A882',
                        info: '#3A7D6E',
                        dark: '#1a2e20',
                        light: '#f0efec',
                    },
                    fontFamily: {
                        'arabic': ['Cairo', 'Tajawal', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-in-out',
                        'bounce-in': 'bounceIn 0.8s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        bounceIn: {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)' },
                            '70%': { transform: 'scale(0.9)' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        },
                    },
                },
            },
        }
    </script>
    
    @stack('styles')
</head>
<body class="font-arabic">
    <!-- Auth Background -->
    <div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-32 h-32 bg-primary bg-opacity-20 rounded-full blur-3xl animate-pulse" style="animation-delay: 0s;"></div>
            <div class="absolute top-20 right-20 w-48 h-48 bg-gold bg-opacity-10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-20 w-40 h-40 bg-secondary bg-opacity-20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-10 right-10 w-36 h-36 bg-primary-light bg-opacity-20 rounded-full blur-3xl animate-pulse" style="animation-delay: 3s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gold bg-opacity-5 rounded-full blur-3xl animate-pulse" style="animation-delay: 4s;"></div>
        </div>
        
        <!-- Floating Particles -->
        <div class="absolute inset-0">
            <div class="particle-container">
                <div class="particle" style="top: 20%; left: 10%; animation-delay: 0s;"></div>
                <div class="particle" style="top: 30%; right: 15%; animation-delay: 1s;"></div>
                <div class="particle" style="top: 60%; left: 20%; animation-delay: 2s;"></div>
                <div class="particle" style="top: 80%; right: 25%; animation-delay: 3s;"></div>
                <div class="particle" style="top: 40%; left: 30%; animation-delay: 4s;"></div>
                <div class="particle" style="top: 70%; right: 35%; animation-delay: 5s;"></div>
            </div>
        </div>
        
        <!-- Auth Card -->
        <div class="auth-card w-full max-w-6xl mx-auto relative z-10" data-aos="fade-up" data-aos-duration="1000">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="logo-animation inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-primary via-primary-light to-gold rounded-3xl mb-6 shadow-2xl">
                    <i class="fas fa-brain text-white text-4xl"></i>
                </div>
                <h1 class="text-5xl font-black text-gray-800 mb-3 tracking-tight">
                    منصة <span class="text-primary bg-gradient-to-r from-primary to-gold bg-clip-text text-transparent">وعي</span>
                </h1>
                <h2 class="text-3xl font-bold text-gray-700 mb-3">
                    @yield('auth-title', 'مرحباً بك!')
                </h2>
                <p class="text-xl text-gray-600 font-medium">
                    @yield('auth-subtitle', 'منصة توعوية حكومية متكاملة')
                </p>
            </div>
            
            <!-- Flash Messages -->
            @include('components.flash-messages')
            
            <!-- Auth Content -->
            <div>
                @yield('content')
            </div>
            
            <!-- Auth Footer -->
            <div class="text-center mt-8 pt-8 border-t border-gray-200">
                @yield('auth-footer')
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
    
    @stack('scripts')
</body>
</html>
