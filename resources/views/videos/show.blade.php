@extends('layouts.app')

@section('title', $video->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 space-x-reverse text-sm">
            <li>
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-primary transition">الرئيسية</a>
            </li>
            <li>
                <span class="text-gray-400">/</span>
            </li>
            <li>
                <a href="{{ route('videos') }}" class="text-gray-500 hover:text-primary transition">الفيديوهات</a>
            </li>
            <li>
                <span class="text-gray-400">/</span>
            </li>
            <li class="text-gray-800 font-medium">{{ $video->title }}</li>
        </ol>
    </nav>

    <!-- Video Player Section -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8" data-aos="fade-up" data-aos-duration="1000">
        <div class="relative aspect-video bg-black">
            <video 
                controls 
                poster="{{ $video->thumbnail_url }}"
                class="w-full h-full"
            >
                <source src="{{ $video->video_url }}" type="video/mp4">
                متصفحك لا يدعم تشغيل الفيديو.
            </video>
            
            <!-- Video Overlay Info -->
            <div class="absolute bottom-0 right-0 left-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">{{ $video->title }}</h1>
                <div class="flex items-center space-x-6 space-x-reverse text-white text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-eye ml-2"></i>
                        {{ $video->formatted_views }} مشاهدة
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clock ml-2"></i>
                        {{ $video->duration }}
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-calendar ml-2"></i>
                        {{ $video->published_at->format('d M Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Info and Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Video Details -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <!-- Speaker Info -->
                <div class="flex items-center justify-between pb-6 border-b border-gray-200 mb-6">
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <img src="{{ $video->speaker_avatar_url }}" alt="{{ $video->speaker_name }}" class="w-12 h-12 rounded-full">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $video->speaker_name }}</h3>
                            <p class="text-gray-600">{{ $video->speaker_title }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <button class="flex items-center text-gray-600 hover:text-red-500 transition">
                            <i class="fas fa-heart ml-2"></i>
                            <span>{{ $video->likes_count ?? 0 }}</span>
                        </button>
                        <button class="flex items-center text-gray-600 hover:text-blue-500 transition">
                            <i class="fas fa-share ml-2"></i>
                            <span>مشاركة</span>
                        </button>
                    </div>
                </div>

                <!-- Video Description -->
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    <h3 class="text-xl font-semibold mb-4">عن الفيديو</h3>
                    <p>{{ $video->description }}</p>
                    
                    @if($video->transcript)
                        <h3 class="text-xl font-semibold mb-4 mt-8">النص الكامل</h3>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <p class="whitespace-pre-line">{{ $video->transcript }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Comments Section -->
            <div class="bg-white rounded-2xl shadow-lg p-8" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <h3 class="text-2xl font-bold mb-6">التعليقات ({{ $video->comments_count ?? 0 }})</h3>
                
                <!-- Comment Form -->
                @auth()
                    <form class="mb-8">
                        <div class="mb-4">
                            <textarea 
                                rows="4" 
                                placeholder="اكتب تعليقك..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary"
                            ></textarea>
                        </div>
                        <button type="submit" class="btn-primary-custom">
                            <i class="fas fa-paper-plane ml-2"></i>
                            إرسال التعليق
                        </button>
                    </form>
                @else
                    <div class="bg-gray-50 rounded-lg p-6 text-center mb-8">
                        <i class="fas fa-user-circle text-4xl text-gray-400 mb-3"></i>
                        <p class="text-gray-600 mb-4">يجب تسجيل الدخول لإضافة تعليق</p>
                        <a href="{{ route('login') }}" class="btn-primary-custom">
                            <i class="fas fa-sign-in-alt ml-2"></i>
                            تسجيل الدخول
                        </a>
                    </div>
                @endauth

                <!-- Comments List -->
                <div class="space-y-6">
                    <!-- Sample Comment -->
                    <div class="flex space-x-4 space-x-reverse">
                        <img src="https://picsum.photos/seed/user1/40/40.jpg" alt="User" class="w-10 h-10 rounded-full">
                        <div class="flex-1">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-semibold">أحمد محمد</h4>
                                    <span class="text-sm text-gray-500">منذ ساعتين</span>
                                </div>
                                <p class="text-gray-700">فيديو ممتاز ومفيد جداً. شكراً على هذا المحتوى القيم.</p>
                            </div>
                            <div class="flex items-center space-x-4 space-x-reverse mt-2 text-sm">
                                <button class="text-gray-500 hover:text-primary transition">
                                    <i class="fas fa-thumbs-up ml-1"></i>
                                    إعجاب
                                </button>
                                <button class="text-gray-500 hover:text-primary transition">
                                    <i class="fas fa-reply ml-1"></i>
                                    رد
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Related Videos -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <h3 class="text-xl font-bold mb-6">فيديوهات ذات صلة</h3>
                <div class="space-y-4">
                    @for($i = 1; $i <= 3; $i++)
                        <div class="flex space-x-4 space-x-reverse cursor-pointer group">
                            <div class="relative w-32 h-20 rounded-lg overflow-hidden">
                                <img src="https://picsum.photos/seed/video{{ $i }}/128/80.jpg" alt="Related Video" class="w-full h-full object-cover group-hover:scale-105 transition">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                    <i class="fas fa-play text-white text-xs"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 group-hover:text-primary transition line-clamp-2">
                                    فيديو ذو صلة {{ $i }}
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    <i class="fas fa-clock ml-1"></i>
                                    {{ rand(5, 30) }} دقيقة
                                </p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Categories -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <h3 class="text-xl font-bold mb-6">التصنيفات</h3>
                <div class="space-y-2">
                    <a href="{{ route('videos', ['category' => 'psychology']) }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition">
                        <span class="flex items-center">
                            <i class="fas fa-brain text-primary ml-3"></i>
                            علم النفس
                        </span>
                        <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-sm">12</span>
                    </a>
                    <a href="{{ route('videos', ['category' => 'addiction']) }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition">
                        <span class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-warning ml-3"></i>
                            الإدمان
                        </span>
                        <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-sm">8</span>
                    </a>
                    <a href="{{ route('videos', ['category' => 'relationships']) }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition">
                        <span class="flex items-center">
                            <i class="fas fa-heart text-red-500 ml-3"></i>
                            العلاقات
                        </span>
                        <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-sm">6</span>
                    </a>
                </div>
            </div>

            <!-- Download Options -->
            <div class="bg-gradient-to-br from-primary to-primary-dark text-white rounded-2xl p-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                <h3 class="text-xl font-bold mb-4">تحميل الفيديو</h3>
                <div class="space-y-3">
                    <button class="w-full bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg text-white px-4 py-3 rounded-lg font-semibold hover:bg-opacity-30 transition flex items-center justify-center">
                        <i class="fas fa-download ml-2"></i>
                        جودة عالية (HD)
                    </button>
                    <button class="w-full bg-white bg-opacity-20 backdrop-filter backdrop-blur-lg text-white px-4 py-3 rounded-lg font-semibold hover:bg-opacity-30 transition flex items-center justify-center">
                        <i class="fas fa-download ml-2"></i>
                        جودة متوسطة (SD)
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
