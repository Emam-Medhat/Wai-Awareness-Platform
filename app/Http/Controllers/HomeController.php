<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Video;
use App\Models\Book;
use App\Models\Story;
use App\Models\Habit;
use App\Models\ContactMessage;
use App\Models\AiConversation;
use App\Models\Campaign;
use App\Models\Visitor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageReceived;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Cache featured content for better performance
        $featuredArticles = Cache::remember('featured_articles', 3600, function () {
            return Article::published()->featured()->with('author')->limit(3)->get();
        });
        
        $featuredVideos = Cache::remember('featured_videos', 3600, function () {
            return Video::published()->featured()->with('presenter')->limit(3)->get();
        });
        
        $featuredBooks = Cache::remember('featured_books', 3600, function () {
            return Book::published()->featured()->limit(3)->get();
        });
        
        $latestStories = Cache::remember('latest_stories', 3600, function () {
            return Story::approved()->with('user')->latest()->limit(3)->get();
        });
        
        $latestHabits = Cache::remember('latest_habits', 3600, function () {
            return Habit::approved()->with('user')->latest()->limit(3)->get();
        });

        // Get statistics
        $stats = [
            'articles_count' => Article::published()->count(),
            'videos_count' => Video::published()->count(),
            'books_count' => Book::published()->count(),
            'users_count' => User::active()->count(),
        ];

        // Get active campaigns
        $activeCampaigns = Campaign::where('status', 'active')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->limit(3)
            ->get();

        return view('pages.home', compact(
            'featuredArticles',
            'featuredVideos', 
            'featuredBooks',
            'latestStories',
            'latestHabits',
            'stats',
            'activeCampaigns'
        ));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        // Get team members
        $teamMembers = User::admins()->get();
        
        // Get platform statistics
        $stats = [
            'total_articles' => Article::published()->count(),
            'total_videos' => Video::published()->count(),
            'total_books' => Book::published()->count(),
            'total_users' => User::count(),
            'total_stories' => Story::approved()->count(),
            'total_habits' => Habit::approved()->count(),
        ];

        return view('pages.about', compact('teamMembers', 'stats'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Display the guide page.
     */
    public function guide()
    {
        return view('pages.guide');
    }

    /**
     * Send contact message.
     */
    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'g-recaptcha-response.required' => 'يرجى التحقق من أنك لست روبوت'
        ]);

        // Create contact message
        $contactMessage = ContactMessage::create($validated);

        // Send email notification to admin
        try {
            Mail::to(config('mail.from.address'))->send(new ContactMessageReceived($contactMessage));
        } catch (\Exception $e) {
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        return back()->with('success', 'تم إرسال رسالتك بنجاح، سنتواصل معك قريباً');
    }

    /**
     * Search across all content.
     */
    public function search(Request $request)
    {
        $query = trim($request->input('q'));
        $category = $request->input('category');
        $type = $request->input('type');
        
        if (empty($query)) {
            return back()->with('error', 'يرجى إدخال كلمة البحث');
        }

        // Build search query
        $articlesQuery = Article::published()->where(function ($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%')
              ->orWhere('body', 'like', '%' . $query . '%')
              ->orWhere('excerpt', 'like', '%' . $query . '%');
        });

        $videosQuery = Video::published()->where(function ($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%')
              ->orWhere('description', 'like', '%' . $query . '%');
        });

        $booksQuery = Book::published()->where(function ($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%')
              ->orWhere('author_name', 'like', '%' . $query . '%')
              ->orWhere('description', 'like', '%' . $query . '%');
        });

        // Apply category filter
        if ($category) {
            $articlesQuery->where('category', $category);
            $videosQuery->where('category', $category);
            $booksQuery->where('category', $category);
        }

        // Get results
        $articles = $articlesQuery->limit(10)->get();
        $videos = $videosQuery->limit(10)->get();
        $books = $booksQuery->limit(10)->get();

        // Get search suggestions
        $suggestions = $this->getSearchSuggestions($query);

        return view('pages.search', compact(
            'query', 
            'category',
            'type',
            'articles', 
            'videos', 
            'books',
            'suggestions'
        ));
    }

    /**
     * Display all sections.
     */
    public function sections()
    {
        $sections = [
            'psychology' => [
                'title' => 'علم النفس',
                'description' => 'مقالات ومصادر في علم النفس والصحة النفسية',
                'icon' => 'bi-emoji-smile',
                'color' => 'primary'
            ],
            'health' => [
                'title' => 'الصحة والعلوم',
                'description' => 'معلومات علمية موثوقة في مجال الصحة',
                'icon' => 'bi-heart-pulse',
                'color' => 'danger'
            ],
            'family' => [
                'title' => 'الأسرة والتربية',
                'description' => 'نصائح وإرشادات للأسرة والتربية',
                'icon' => 'bi-people',
                'color' => 'info'
            ],
            'addiction' => [
                'title' => 'الإدمان والعلاج',
                'description' => 'معلومات حول الإدمان وطرق العلاج',
                'icon' => 'bi-exclamation-triangle',
                'color' => 'warning'
            ],
            'awareness' => [
                'title' => 'التوعية المجتمعية',
                'description' => 'حملات ومبادرات توعوية مجتمعية',
                'icon' => 'bi-megaphone',
                'color' => 'success'
            ],
            'self_development' => [
                'title' => 'التطوير الذاتي',
                'description' => 'مهارات وتقنيات للتطوير الشخصي',
                'icon' => 'bi-graph-up',
                'color' => 'secondary'
            ],
        ];

        return view('pages.sections', compact('sections'));
    }

    /**
     * Display addiction help page.
     */
    public function addiction()
    {
        // Get addiction-related content
        $articles = Article::published()
            ->where('category', 'addiction')
            ->limit(6)
            ->get();

        $videos = Video::published()
            ->where('category', 'addiction')
            ->limit(3)
            ->get();

        $books = Book::published()
            ->where('category', 'addiction')
            ->limit(3)
            ->get();

        return view('pages.addiction', compact('articles', 'videos', 'books'));
    }

    /**
     * Display AI assistant page.
     */
    public function aiAssistant()
    {
        return view('pages.ai-assistant');
    }

    /**
     * Handle AI chat requests.
     */
    public function aiChat(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
            'session_id' => 'nullable|string|max:255',
        ]);

        $sessionId = $validated['session_id'] ?? Str::uuid();
        $userId = Auth::id();

        // Get or create conversation
        $conversation = AiConversation::firstOrCreate(
            ['session_id' => $sessionId, 'user_id' => $userId],
            ['messages' => []]
        );

        // Add user message
        $userMessage = [
            'role' => 'user',
            'content' => $validated['message'],
            'timestamp' => now()->toISOString(),
        ];

        $conversation->addMessage($userMessage);

        // Generate AI response
        $aiResponse = $this->generateAiResponse($validated['message'], $conversation);

        // Add assistant message
        $assistantMessage = [
            'role' => 'assistant',
            'content' => $aiResponse,
            'timestamp' => now()->toISOString(),
        ];

        $conversation->addMessage($assistantMessage);

        return response()->json([
            'response' => $aiResponse,
            'session_id' => $sessionId,
            'timestamp' => now()->toISOString(),
        ]);
    }

    /**
     * Display journey page.
     */
    public function journey()
    {
        // Get user's journey progress if authenticated
        $userProgress = null;
        if (Auth::check()) {
            $userProgress = $this->getUserJourneyProgress(Auth::user());
        }

        // Get journey stages
        $stages = [
            [
                'id' => 1,
                'title' => 'الوعي الذاتي',
                'description' => 'فهم الذات والتعرف على نقاط القوة والضعف',
                'icon' => 'bi-search',
                'duration' => 'أسبوع',
                'completed' => $userProgress['stage_1_completed'] ?? false
            ],
            [
                'id' => 2,
                'title' => 'التخطيط للتغيير',
                'description' => 'وضع أهداف واقعية وخطة عمل للتغيير',
                'icon' => 'bi-clipboard-check',
                'duration' => 'أسبوعان',
                'completed' => $userProgress['stage_2_completed'] ?? false
            ],
            [
                'id' => 3,
                'title' => 'التنفيذ والممارسة',
                'description' => 'تطبيق المهارات والاستراتيجيات الجديدة',
                'icon' => 'bi-gear',
                'duration' => 'شهر',
                'completed' => $userProgress['stage_3_completed'] ?? false
            ],
            [
                'id' => 4,
                'title' => 'الحفاظ على الاستمرارية',
                'description' => 'الحفاظ على التقدم ومنع الانتكاس',
                'icon' => 'bi-shield-check',
                'duration' => 'مستمر',
                'completed' => $userProgress['stage_4_completed'] ?? false
            ],
        ];

        return view('pages.journey', compact('stages', 'userProgress'));
    }

    /**
     * Generate AI response based on message and conversation context.
     */
    private function generateAiResponse($message, $conversation)
    {
        // In production, integrate with actual AI service (OpenAI, etc.)
        // For now, provide contextual responses
        
        $lowerMessage = strtolower($message);
        
        // Check for common patterns and provide appropriate responses
        if (str_contains($lowerMessage, 'مرحبا') || str_contains($lowerMessage, 'اهلا')) {
            return 'أهلاً بك! أنا مساعدك الذكي في منصة وعي. كيف يمكنني مساعدتك اليوم؟';
        }
        
        if (str_contains($lowerMessage, 'قلق') || str_contains($lowerMessage, 'توتر')) {
            return 'أتفهم قلقك. القلق هو شعور طبيعي، لكن إذا أصبح مفرطاً قد يؤثر على حياتك. هل ترغب في معرفة بعض التقنيات للتعامل مع القلق؟';
        }
        
        if (str_contains($lowerMessage, 'اكتئاب') || str_contains($lowerMessage, 'حزن')) {
            return 'الحزن والاكتئاب من المشاعر الإنسانية الطبيعية. من المهم طلب المساعدة عندما تستمر هذه المشاعر لفترة طويلة. هل ترغب في التحدث أكثر عن ما تشعر به؟';
        }
        
        if (str_contains($lowerMessage, 'ادمان') || str_contains($lowerMessage, 'إدمان')) {
            return 'الإدمان مرض يمكن علاجه. الخطوة الأولى هي الاعتراف بالمشكلة. هناك العديد من الموارد المتاحة للمساعدة. هل تبحث عن معلومات حول نوع معين من الإدمان؟';
        }
        
        if (str_contains($lowerMessage, 'اسرة') || str_contains($lowerMessage, 'عائلة')) {
            return 'العلاقات الأسرية مهمة جداً للصحة النفسية. التواصل الفعال والاحترام المتبادل أساس العلاقة الصحية. هل تواجه تحديات معينة في علاقتك الأسرية؟';
        }
        
        // Default responses
        $defaultResponses = [
            'أهلاً بك! كيف يمكنني مساعدتك في رحلة التوعية؟',
            'شكراً لتواصلك معي. أنا هنا لدعمك.',
            'هذا سؤال مهم. دعني أساعدك في فهمه بشكل أفضل.',
            'أتفهم اهتمامك. هل يمكنك توضيح المزيد من التفاصيل؟',
            'أنا هنا للاستماع ومساعدتك. ما الذي يدور في ذهنك؟',
        ];

        return $defaultResponses[array_rand($defaultResponses)];
    }

    /**
     * Get search suggestions based on query.
     */
    private function getSearchSuggestions($query)
    {
        $suggestions = [];
        
        // Get popular search terms
        $popularTerms = ['قلق', 'اكتئاب', 'اسرة', 'اطفال', 'زواج', 'ادمان', 'تطوير ذاتي'];
        
        foreach ($popularTerms as $term) {
            if (str_contains(strtolower($term), strtolower($query))) {
                $suggestions[] = $term;
            }
        }
        
        return array_slice($suggestions, 0, 5);
    }

    /**
     * Get user journey progress.
     */
    private function getUserJourneyProgress($user)
    {
        // This would typically come from a user_progress table
        // For now, return mock data
        return [
            'stage_1_completed' => false,
            'stage_2_completed' => false,
            'stage_3_completed' => false,
            'stage_4_completed' => false,
            'overall_progress' => 0,
        ];
    }

    /**
     * Display the testimonials page.
     */
    public function testimonials()
    {
        // Mock testimonials data for now
        $testimonials = [
            [
                'id' => 1,
                'name' => 'أحمد محمد',
                'role' => 'مستفيد من الخدمات',
                'content' => 'منصة وعي غيرت حياتي تماماً. الدعم والمساعدة التي حصلت عليها كانت استثنائية، وأنا الآن أفضل حالاً من أي وقت مضى.',
                'rating' => 5,
                'avatar' => 'https://picsum.photos/seed/client1/60/60.jpg'
            ],
            [
                'id' => 2,
                'name' => 'فاطمة أحمد',
                'role' => 'أم',
                'content' => 'المحتوى المقدم في المنصة ساعدني كثيراً في فهم أطفالي وتحسين علاقتي بهم. شكراً لفريق وعي.',
                'rating' => 5,
                'avatar' => 'https://picsum.photos/seed/client2/60/60.jpg'
            ],
            [
                'id' => 3,
                'name' => 'محمد علي',
                'role' => 'طالب',
                'content' => 'المقالات والفيديوهات كانت مفيدة جداً في دراستي. أوصي بها بشدة لكل من يبحث عن معلومات موثوقة.',
                'rating' => 4,
                'avatar' => 'https://picsum.photos/seed/client3/60/60.jpg'
            ],
            [
                'id' => 4,
                'name' => 'سارة خالد',
                'role' => 'معلمة',
                'content' => 'استخدمت المنصة كمصدر للمعلومات في عملي. المحتوى منظم وسهل الفهم والاستخدام.',
                'rating' => 5,
                'avatar' => 'https://picsum.photos/seed/client4/60/60.jpg'
            ],
            [
                'id' => 5,
                'name' => 'عمر حسن',
                'role' => 'مهندس',
                'content' => 'الدعم النفسي الذي قدمته المنصة ساعدني في تجاوز فترة صعبة في حياتي. شكراً جزيلاً.',
                'rating' => 5,
                'avatar' => 'https://picsum.photos/seed/client5/60/60.jpg'
            ],
            [
                'id' => 6,
                'name' => 'نورا سالم',
                'role' => 'ربة منزل',
                'content' => 'أحببت جداً التنوع في المحتوى والطريقة السهلة في الوصول للمعلومات. منصة رائعة.',
                'rating' => 4,
                'avatar' => 'https://picsum.photos/seed/client6/60/60.jpg'
            ],
            [
                'id' => 7,
                'name' => 'خالد يوسف',
                'role' => 'طبيب',
                'content' => 'أوصي مرضاي باستخدام المنصة كمصدر إضافي للمعلومات. المحتوى دقيق وموثوق.',
                'rating' => 5,
                'avatar' => 'https://picsum.photos/seed/client7/60/60.jpg'
            ],
            [
                'id' => 8,
                'name' => 'ليلى محمود',
                'role' => 'طالبة',
                'content' => 'ساعدتني المنصة في فهم نفسي بشكل أفضل وتحسين علاقاتي مع الآخرين.',
                'rating' => 4,
                'avatar' => 'https://picsum.photos/seed/client8/60/60.jpg'
            ],
            [
                'id' => 9,
                'name' => 'إبراهيم أحمد',
                'role' => 'مدير',
                'content' => 'المحتوى المقدم احترافي ومفيد جداً في الحياة اليومية والعملية.',
                'rating' => 5,
                'avatar' => 'https://picsum.photos/seed/client9/60/60.jpg'
            ]
        ];

        // Video testimonials
        $videoTestimonials = [
            [
                'id' => 1,
                'title' => 'شهادة العميل 1',
                'description' => 'قصتي مع منصة وعي وكيف غيرت حياتي للأبد',
                'client_name' => 'محمد أحمد',
                'client_role' => 'عميل راضٍ',
                'thumbnail' => 'https://picsum.photos/seed/video1/400/300.jpg',
                'avatar' => 'https://picsum.photos/seed/video-client1/40/40.jpg'
            ],
            [
                'id' => 2,
                'title' => 'شهادة العميل 2',
                'description' => 'تجربتي في استخدام خدمات الدعم النفسي',
                'client_name' => 'فاطمة علي',
                'client_role' => 'مستفيدة',
                'thumbnail' => 'https://picsum.photos/seed/video2/400/300.jpg',
                'avatar' => 'https://picsum.photos/seed/video-client2/40/40.jpg'
            ],
            [
                'id' => 3,
                'title' => 'شهادة العميل 3',
                'description' => 'كيف ساعدتني المنصة في تطوير مهاراتي',
                'client_name' => 'أحمد خالد',
                'client_role' => 'مستفيد',
                'thumbnail' => 'https://picsum.photos/seed/video3/400/300.jpg',
                'avatar' => 'https://picsum.photos/seed/video-client3/40/40.jpg'
            ]
        ];

        return view('pages.testimonials', compact('testimonials', 'videoTestimonials'));
    }
}
