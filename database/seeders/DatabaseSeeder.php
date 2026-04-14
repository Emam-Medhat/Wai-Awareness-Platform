<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Article;
use App\Models\Video;
use App\Models\Book;
use App\Models\Story;
use App\Models\Habit;
use App\Models\FutureMessage;
use App\Models\Campaign;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles and assign to users
        $this->createRolesAndUsers();
        
        // Create categories
        $this->createCategories();
        
        // Create sample content
        $this->createSampleContent();
        
        $this->command->info('Database seeded successfully!');
        $this->command->info('Admin login: admin@wa3y.com / password');
        $this->command->info('User login: user1@wa3y.com / password');
    }
    
    private function createRolesAndUsers(): void
    {
        // Create Admin User if not exists
        $admin = User::firstOrCreate(
            ['email' => 'admin@wa3y.com'],
            [
                'first_name' => 'أحمد',
                'last_name' => 'محمد',
                'gender' => 'male',
                'phone' => '966500000001',
                'password' => Hash::make('password'),
                'city' => 'الرياض',
                'bio' => 'مدير النظام في منصة وعي',
                'is_active' => true,
            ]
        );
        $admin->assignRole('admin');

        // Create Regular Users if not exists
        $users = [];
        for ($i = 1; $i <= 10; $i++) {
            $user = User::firstOrCreate(
                ['email' => 'user' . $i . '@wa3y.com'],
                [
                    'first_name' => 'مستخدم' . $i,
                    'last_name' => 'تجريبي',
                    'gender' => $i % 2 == 0 ? 'male' : 'female',
                    'phone' => '966500000' . str_pad($i + 2, 3, '0', STR_PAD_LEFT),
                    'password' => Hash::make('password'),
                    'city' => ['الرياض', 'جدة', 'الدمام', 'مكة المكرمة', 'المدينة المنورة'][$i % 5],
                    'bio' => 'مستخدم عادي في منصة وعي',
                    'is_active' => true,
                ]
            );
            $user->assignRole('user');
            $users[] = $user;
        }

        $allUsers = collect([$admin])->merge(collect($users));
        $this->allUsers = $allUsers;
        $this->users = collect($users);
    }
    
    private function createCategories(): void
    {
        $categories = [
            [
                'name' => 'علم النفس',
                'slug' => 'psychology',
                'description' => 'كتب ومقالات في علم النفس والصحة النفسية',
                'icon' => 'fas fa-brain',
                'color' => '#6366f1',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'الإدمان والعلاج',
                'slug' => 'addiction-recovery',
                'description' => 'موارد حول الإدمان وطرق العلاج والتعافي',
                'icon' => 'fas fa-heart',
                'color' => '#ef4444',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'التطوير الذاتي',
                'slug' => 'self-development',
                'description' => 'كتب ومقالات لتطوير الذات والنمو الشخصي',
                'icon' => 'fas fa-rocket',
                'color' => '#10b981',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'العلاقات الأسرية',
                'slug' => 'family-relationships',
                'description' => 'دليل في بناء علاقات أسرية صحية ومستقرة',
                'icon' => 'fas fa-home',
                'color' => '#f59e0b',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'الصحة النفسية',
                'slug' => 'mental-health',
                'description' => 'مقالات وكتب حول الصحة النفسية والعافية',
                'icon' => 'fas fa-spa',
                'color' => '#8b5cf6',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }
        
        $this->categories = Category::all();
    }
    
    private function createSampleContent(): void
    {
        $allUsersArray = $this->allUsers->toArray();
        $usersArray = $this->users->toArray();
        $categories = $this->categories;

        // Create Books
        $bookTitles = [
            'قوة العقل الباطن',
            'العادات السبع للأشخاص الأكثر فعالية',
            'كيف تكسب الأصدقاء وتؤثر في الناس',
            'فن التفكير الإبداعي',
            'الطريق إلى السعادة',
            'التغلب على القلق',
            'علم نفسية النجاح',
            'الذكاء العاطفي',
            'التفكير السريع والبطيء',
            'القوة الغريزية',
        ];

        foreach ($bookTitles as $index => $title) {
            Book::firstOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'title' => $title,
                    'author_name' => 'مؤلف تجريبي ' . ($index + 1),
                    'description' => 'كتاب قيم في مجال تطوير الذات والصحة النفسية، يحتوي على معلومات مفيدة ونصائح عملية.',
                    'isbn' => '978-' . rand(1000000000, 9999999999),
                    'publisher' => 'دار النشر التجريبية',
                    'pages' => rand(150, 400),
                    'language' => $index % 2 == 0 ? 'ar' : 'en',
                    'publication_date' => now()->subYears(rand(1, 5))->subDays(rand(1, 365)),
                    'category' => ['self-development', 'psychology', 'mental-health'][$index % 3],
                    'user_id' => $allUsersArray[array_rand($allUsersArray)]['id'],
                    'published' => true,
                    'featured' => $index < 3,
                    'views' => rand(100, 2000),
                    'download_count' => rand(50, 500),
                    'rating' => rand(35, 50) / 10,
                    'rating_count' => rand(10, 100),
                ]
            );
        }

        // Create Articles
        $articleTitles = [
            'فهم الإدمان: الأسباب والعلاج',
            'التأمل واليقظة الذهنية',
            'كيفية التعامل مع القلق والتوتر',
            'أهمية النوم الصحي',
            'العلاقات الاجتماعية الصحية',
            'التوازن بين العمل والحياة',
            'مهارات إدارة الوقت',
            'التعامل مع الضغوط النفسية',
            'تطوير الذات والنمو الشخصي',
            'الصحة النفسية للأطفال',
        ];

        foreach ($articleTitles as $index => $title) {
            Article::firstOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'title' => $title,
                    'body' => 'هذا محتوى مقال تجريبي يتناول موضوع ' . $title . '. المقال يحتوي على معلومات قيمة ومفيدة للقراء المهتمين بالصحة النفسية والتوعية. المحتوى هنا سيكون مفصلاً وشاملاً يغطي جميع الجوانب المهمة للموضوع.',
                    'excerpt' => 'مقال شامل عن ' . $title . ' مع نصائح عملية ومعلومات مفيدة.',
                    'author_id' => $allUsersArray[array_rand($allUsersArray)]['id'],
                    'views' => rand(100, 5000),
                    'reading_time' => rand(5, 15),
                    'published_at' => now()->subDays(rand(1, 30)),
                ]
            );
        }

        // Create Stories
        for ($i = 1; $i <= 15; $i++) {
            Story::create([
                'user_id' => $usersArray[array_rand($usersArray)]['id'],
                'author_name' => 'كاتب قصة ' . $i,
                'author_city' => ['الرياض', 'جدة', 'الدمام'][$i % 3],
                'content' => 'هذه قصة تجريبية من أحد مستخدمي المنصة تشارك تجربتهم الشخصية في رحلة التوعية والتعافي. القصة تحتوي على تفاصيل مهمة ودروس مستفادة قد تفيد الآخرين.',
                'is_approved' => true,
                'is_anonymous' => $i % 3 == 0,
                'approved_at' => now()->subDays(rand(1, 20)),
            ]);
        }

        // Create Habits
        for ($i = 1; $i <= 15; $i++) {
            Habit::create([
                'user_id' => $usersArray[array_rand($usersArray)]['id'],
                'author_name' => 'صاحب عادة ' . $i,
                'author_city' => ['الرياض', 'جدة', 'الدمام', 'مكة'][$i % 4],
                'author_age' => rand(18, 65),
                'content' => 'عادة صحية أو سلوك إيجابي مارسه أحد المستخدمين ويرغب في مشاركتها مع الآخرين. العادة قد تتعلق بالصحة النفسية أو الجسدية أو العلاقات الاجتماعية.',
                'is_approved' => true,
                'approved_at' => now()->subDays(rand(1, 20)),
            ]);
        }

        // Create Future Messages
        for ($i = 1; $i <= 5; $i++) {
            FutureMessage::create([
                'user_id' => $usersArray[array_rand($usersArray)]['id'],
                'content' => 'رسالة مستقبلية رقم ' . $i . ': تذكر دائماً أنك قادر على تحقيق أهدافك. استمر في العمل بجد واجتهاد.',
                'remind_at' => now()->addDays(rand(1, 30)),
                'is_sent' => false,
            ]);
        }

        // Create Contact Messages
        for ($i = 1; $i <= 10; $i++) {
            ContactMessage::create([
                'name' => 'مرسل رسالة ' . $i,
                'email' => 'contact' . $i . '@example.com',
                'phone' => '966500000' . str_pad($i + 100, 3, '0', STR_PAD_LEFT),
                'subject' => 'موضوع استفسار ' . $i,
                'message' => 'هذه رسالة استفسار من أحد زوار الموقع يريد معرفة المزيد عن خدمات المنصة.',
                'is_read' => $i % 2 == 0,
                'replied_at' => $i % 3 == 0 ? now()->subDays(1) : null,
            ]);
        }
    }
}
