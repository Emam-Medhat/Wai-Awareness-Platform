@extends('layouts.auth')

@section('title', 'تسجيل الدخول')

@section('auth-title', 'مرحباً بعودتك!')
@section('auth-subtitle', 'قم بتسجيل الدخول لحسابك')

@section('content')
<form action="{{ route('login.post') }}" method="POST" class="space-y-6">
    @csrf
    
    <div>
        <label for="login" class="block text-sm font-medium text-gray-700 mb-2">
            البريد الإلكتروني أو رقم الهاتف
        </label>
        <div class="relative">
            <input 
                id="login" 
                name="login" 
                type="text" 
                required 
                value="{{ old('login') }}"
                class="input-custom w-full"
                placeholder="أدخل بريدك الإلكتروني أو رقم هاتفك"
            >
            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                <i class="fas fa-user"></i>
            </div>
        </div>
        @error('login')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
            كلمة المرور
        </label>
        <div class="relative">
            <input 
                id="password" 
                name="password" 
                type="password" 
                required 
                class="input-custom w-full"
                placeholder="أدخل كلمة المرور"
                x-data="{ show: false }"
                :type="show ? 'text' : 'password'"
            >
            <button type="button" 
                    @click="show = !show"
                    class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                </svg>
            </button>
        </div>
        @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input 
                id="remember-me" 
                name="remember" 
                type="checkbox" 
                class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
            >
            <label for="remember-me" class="mr-2 block text-sm text-gray-700 cursor-pointer">
                تذكرني
            </label>
        </div>

        <div class="text-sm">
            <a href="{{ route('password.request') }}" class="font-medium text-primary hover:text-primary-700 transition">
                نسيت كلمة المرور؟
            </a>
        </div>
    </div>

    <button type="submit" class="btn-primary-custom w-full text-center">
        <i class="fas fa-sign-in-alt ml-2"></i>
        تسجيل الدخول
    </button>
</form>

<!-- Social Login -->
<div class="mt-6">
    <div class="relative">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="px-4 bg-white text-gray-500">أو سجل الدخول باستخدام</span>
        </div>
    </div>

    <div class="mt-4 grid grid-cols-2 gap-3">
        <a href="#" class="social-btn flex justify-center items-center">
            <svg class="w-5 h-5 ml-2" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
            </svg>
            جوجل
        </a>

        <a href="#" class="social-btn flex justify-center items-center">
            <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"/>
            </svg>
            تويتر
        </a>
    </div>
</div>
@endsection

@section('auth-footer')
    <span class="text-gray-600">
        ليس لديك حساب؟
        <a href="{{ route('register') }}" class="font-medium text-primary hover:text-primary-700 transition">
            إنشاء حساب جديد
        </a>
    </span>
@endsection
