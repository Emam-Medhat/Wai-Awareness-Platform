<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Video;
use App\Models\Book;
use App\Models\User;
use App\Models\Story;
use App\Models\Habit;
use App\Models\FutureMessage;
use App\Models\Campaign;
use App\Models\ContactMessage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'articles' => Article::count(),
            'videos' => Video::count(),
            'books' => Book::count(),
            'categories' => Category::count(),
            'stories' => Story::pending()->count(),
            'habits' => Habit::pending()->count(),
            'campaigns' => Campaign::count(),
            'contacts' => ContactMessage::unread()->count(),
        ];

        $recentArticles = Article::latest()->limit(5)->get();
        $recentVideos = Video::latest()->limit(5)->get();
        $recentUsers = User::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentArticles',
            'recentVideos',
            'recentUsers'
        ));
    }

    // Articles Management
    public function articles()
    {
        $articles = Article::with('author')
            ->latest()
            ->paginate(15);

        return view('admin.articles.index', compact('articles'));
    }

    public function createArticle()
    {
        return view('admin.articles.form');
    }

    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'author_id' => 'required|exists:users,id',
            'author_type' => 'required|in:doctor,psychologist,other',
            'size' => 'required|in:small,medium,large',
            'category' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'is_published' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        // Convert tags string to array
        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
            $tags = array_filter($tags, function($tag) {
                return !empty($tag);
            });
            $validated['tags'] = $tags;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('articles', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_featured'] = $request->boolean('is_featured');

        Article::create($validated);

        return redirect()->route('admin.articles')
            ->with('success', 'تم إنشاء المقال بنجاح');
    }

    public function editArticle(Article $article)
    {
        return view('admin.articles.form', compact('article'));
    }

    public function updateArticle(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'author_id' => 'required|exists:users,id',
            'author_type' => 'required|in:doctor,psychologist,other',
            'size' => 'required|in:small,medium,large',
            'category' => 'nullable|string|max:255',
            'tags' => 'nullable|array',
            'is_published' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            
            $image = $request->file('image');
            $imagePath = $image->store('articles', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_featured'] = $request->boolean('is_featured');

        $article->update($validated);

        return back()->with('success', 'تم تحديث المقال بنجاح');
    }

    public function destroyArticle(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        
        $article->delete();

        return back()->with('success', 'تم حذف المقال بنجاح');
    }

    // Videos Management
    public function videos()
    {
        $videos = Video::with('presenter')
            ->latest()
            ->paginate(15);

        return view('admin.videos.index', compact('videos'));
    }

    public function createVideo()
    {
        return view('admin.videos.form');
    }

    public function storeVideo(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'video_url' => 'required|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'duration' => 'required|integer|min:0',
            'category' => 'required|in:psychology,thinking_anxiety,addiction,other',
            'presenter_id' => 'required|exists:users,id',
            'presenter_type' => 'required|in:doctor,psychologist,other',
            'is_published' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->store('videos', 'public');
            $validated['thumbnail'] = $thumbnailPath;
        }

        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_featured'] = $request->boolean('is_featured');

        Video::create($validated);

        return redirect()->route('admin.videos')
            ->with('success', 'تم إنشاء الفيديو بنجاح');
    }

    public function editVideo(Video $video)
    {
        return view('admin.videos.form', compact('video'));
    }

    public function updateVideo(Request $request, Video $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'video_url' => 'required|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'duration' => 'required|integer|min:0',
            'category' => 'required|in:psychology,thinking_anxiety,addiction,other',
            'presenter_id' => 'required|exists:users,id',
            'presenter_type' => 'required|in:doctor,psychologist,other',
            'is_published' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail) {
                Storage::disk('public')->delete($video->thumbnail);
            }
            
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->store('videos', 'public');
            $validated['thumbnail'] = $thumbnailPath;
        }

        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_featured'] = $request->boolean('is_featured');

        $video->update($validated);

        return back()->with('success', 'تم تحديث الفيديو بنجاح');
    }

    public function destroyVideo(Video $video)
    {
        if ($video->thumbnail) {
            Storage::disk('public')->delete($video->thumbnail);
        }
        
        $video->delete();

        return back()->with('success', 'تم حذف الفيديو بنجاح');
    }

    // Books Management
    public function books()
    {
        $books = Book::latest()->paginate(15);
        return view('admin.books.index', compact('books'));
    }

    public function createBook()
    {
        return view('admin.books.form');
    }

    public function storeBook(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'category' => 'nullable|string|max:255',
            'pages' => 'required|integer|min:0',
            'language' => 'required|in:ar,en',
            'publisher' => 'nullable|string|max:255',
            'is_published' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImagePath = $coverImage->store('books', 'public');
            $validated['cover_image'] = $coverImagePath;
        }

        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfFilePath = $pdfFile->store('books', 'public');
            $validated['pdf_file'] = $pdfFilePath;
        }

        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_featured'] = $request->boolean('is_featured');

        Book::create($validated);

        return redirect()->route('admin.books')
            ->with('success', 'تم إنشاء الكتاب بنجاح');
    }

    public function editBook(Book $book)
    {
        return view('admin.books.form', compact('book'));
    }

    public function updateBook(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'category' => 'nullable|string|max:255',
            'pages' => 'required|integer|min:0',
            'language' => 'required|in:ar,en',
            'publisher' => 'nullable|string|max:255',
            'is_published' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            
            $coverImage = $request->file('cover_image');
            $coverImagePath = $coverImage->store('books', 'public');
            $validated['cover_image'] = $coverImagePath;
        }

        if ($request->hasFile('pdf_file')) {
            if ($book->pdf_file) {
                Storage::disk('public')->delete($book->pdf_file);
            }
            
            $pdfFile = $request->file('pdf_file');
            $pdfFilePath = $pdfFile->store('books', 'public');
            $validated['pdf_file'] = $pdfFilePath;
        }

        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_featured'] = $request->boolean('is_featured');

        $book->update($validated);

        return back()->with('success', 'تم تحديث الكتاب بنجاح');
    }

    public function destroyBook(Book $book)
    {
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
        
        if ($book->pdf_file) {
            Storage::disk('public')->delete($book->pdf_file);
        }
        
        $book->delete();

        return back()->with('success', 'تم حذف الكتاب بنجاح');
    }

    // Users Management
    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin,campaign_manager',
            'city' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_active'] = $request->boolean('is_active', true);

        $user = User::create($validated);
        
        // Assign role
        $user->assignRole($validated['role']);

        return redirect()->route('admin.users')
            ->with('success', 'تم إنشاء المستخدم بنجاح');
    }

    public function showUser(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|unique:users,phone,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin,campaign_manager',
            'city' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $user->update($validated);

        return back()->with('success', 'تم تحديث المستخدم بنجاح');
    }

    // Stories Moderation
    public function stories()
    {
        $stories = Story::with('user', 'approvedBy')
            ->latest()
            ->paginate(15);

        return view('admin.stories.index', compact('stories'));
    }

    public function approveStory(Request $request, Story $story)
    {
        $story->approve(Auth::id());

        return back()->with('success', 'تمت الموافقة على القصة');
    }

    public function rejectStory(Request $request, Story $story)
    {
        $validated = $request->validate([
            'admin_note' => 'nullable|string|max:500',
        ]);

        $story->reject($validated['admin_note'] ?? null);

        return back()->with('success', 'تم رفض القصة');
    }

    // Habits Moderation
    public function habits()
    {
        $habits = Habit::with('user', 'approvedBy')
            ->latest()
            ->paginate(15);

        return view('admin.habits.index', compact('habits'));
    }

    public function approveHabit(Request $request, Habit $habit)
    {
        $habit->approve(Auth::id());

        return back()->with('success', 'تمت الموافقة على العادة');
    }

    public function rejectHabit(Request $request, Habit $habit)
    {
        $habit->reject();

        return back()->with('success', 'تم رفض العادة');
    }

    // Future Messages
    public function futureMessages()
    {
        $messages = FutureMessage::with('user')
            ->latest('remind_at')
            ->paginate(15);

        return view('admin.future-messages.index', compact('messages'));
    }

    public function sendFutureMessage(FutureMessage $message)
    {
        // In a real application, send email/SMS here
        $message->markAsSent();

        return back()->with('success', 'تم إرسال الرسالة بنجاح');
    }

    // Campaigns Overview
    public function campaigns()
    {
        $campaigns = Campaign::with(['creator', 'manager'])
            ->latest()
            ->paginate(15);

        return view('admin.campaigns.index', compact('campaigns'));
    }

    // Contact Messages
    public function contacts()
    {
        $contacts = ContactMessage::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function markContactAsRead(ContactMessage $contact)
    {
        $contact->markAsRead();
        return back()->with('success', 'تم تحديد الرسالة كمقروءة');
    }

    public function replyContact(Request $request, ContactMessage $contact)
    {
        $validated = $request->validate([
            'reply' => 'required|string|max:2000',
        ]);

        // In a real application, send email reply here
        $contact->markAsReplied();

        return back()->with('success', 'تم الرد على الرسالة بنجاح');
    }
}
