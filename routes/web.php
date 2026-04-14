<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\FutureMessageController;
use App\Http\Controllers\CommunityController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CampaignManagerMiddleware;
use App\Http\Middleware\TrackVisitorMiddleware;

// Apply visitor tracking middleware to all web routes
Route::middleware(TrackVisitorMiddleware::class)->group(function () {

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/guide', [HomeController::class, 'guide'])->name('guide');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/sections', [HomeController::class, 'sections'])->name('sections');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');

// Books Public Routes
Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/books/category/{categorySlug}', [BookController::class, 'byCategory'])->name('books.category');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{book}/download', [BookController::class, 'download'])->name('books.download');

// Categories Public Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/api', [CategoryController::class, 'apiIndex'])->name('categories.api');
Route::get('/categories/{categorySlug}', [CategoryController::class, 'show'])->name('categories.show');

// Content Routes (Public)
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/articles/{slug}/comment', [ArticleController::class, 'storeComment'])->name('articles.comment.store');
Route::get('/articles/category/{category}', [ArticleController::class, 'byCategory'])->name('articles.category');

Route::get('/videos', [VideoController::class, 'index'])->name('videos');
Route::get('/videos/{slug}', [VideoController::class, 'show'])->name('videos.show');
Route::get('/videos/category/{category}', [VideoController::class, 'byCategory'])->name('videos.category');

Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/{story}', [StoryController::class, 'show'])->name('stories.show');
Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');

Route::get('/habits', [HabitController::class, 'index'])->name('habits.index');
Route::get('/habits/{habit}', [HabitController::class, 'show'])->name('habits.show');
Route::post('/habits', [HabitController::class, 'store'])->name('habits.store');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password/{token}', [AuthController::class, 'updatePassword'])->name('password.update');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Profile Management
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.show');
    Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [AuthController::class, 'changePassword'])->name('profile.password');
    Route::post('/profile/avatar', [AuthController::class, 'updateAvatar'])->name('profile.avatar');
    Route::delete('/profile/avatar', [AuthController::class, 'deleteAvatar'])->name('profile.avatar.delete');
    
    // User Content Management
    Route::get('/my-stories', [StoryController::class, 'myStories'])->name('stories.my');
    Route::get('/my-stories/{story}/edit', [StoryController::class, 'edit'])->name('stories.edit');
    Route::put('/my-stories/{story}', [StoryController::class, 'update'])->name('stories.update');
    Route::delete('/my-stories/{story}', [StoryController::class, 'destroy'])->name('stories.destroy');
    
    Route::get('/my-habits', [HabitController::class, 'myHabits'])->name('habits.my');
    Route::get('/my-habits/{habit}/edit', [HabitController::class, 'edit'])->name('habits.edit');
    Route::put('/my-habits/{habit}', [HabitController::class, 'update'])->name('habits.update');
    Route::delete('/my-habits/{habit}', [HabitController::class, 'destroy'])->name('habits.destroy');
    
    // Feature Pages (Require Authentication)
    Route::get('/future-message', [FutureMessageController::class, 'index'])->name('future-message.index');
    Route::post('/future-message', [FutureMessageController::class, 'store'])->name('future-message.store');
    Route::delete('/future-message/{futureMessage}', [FutureMessageController::class, 'destroy'])->name('future-message.destroy');
    
    Route::get('/addiction', [HomeController::class, 'addiction'])->name('addiction');
    Route::get('/ai-assistant', [HomeController::class, 'aiAssistant'])->name('ai-assistant');
    Route::post('/ai-assistant/chat', [HomeController::class, 'aiChat'])->name('ai-assistant.chat');
    Route::get('/journey', [HomeController::class, 'journey'])->name('journey');
    
    // Notifications
    Route::get('/notifications', [AuthController::class, 'notifications'])->name('notifications');
    Route::post('/notifications/read', [AuthController::class, 'markNotificationsAsRead'])->name('notifications.read');
});

// Admin Routes (RBAC Protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/analytics', [AdminController::class, 'analytics'])->name('analytics');
    
    // Books Management (Resource)
    Route::resource('books', AdminBookController::class);
    Route::post('/books/{book}/toggle-featured', [AdminBookController::class, 'toggleFeatured'])->name('books.toggle-featured');
    Route::post('/books/{book}/toggle-published', [AdminBookController::class, 'togglePublished'])->name('books.toggle-published');
    
    // Categories Management (Resource)
    Route::resource('categories', AdminCategoryController::class);
    Route::post('/categories/{category}/toggle-active', [AdminCategoryController::class, 'toggleActive'])->name('categories.toggle-active');
    
    // Users Management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('users.show');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::post('/users/{user}/toggle-active', [AdminController::class, 'toggleUserActive'])->name('users.toggle-active');
    
    // Articles Management
    Route::get('/articles', [AdminController::class, 'articles'])->name('articles');
    Route::get('/articles/create', [AdminController::class, 'createArticle'])->name('articles.create');
    Route::post('/articles', [AdminController::class, 'storeArticle'])->name('articles.store');
    Route::get('/articles/{article}', [AdminController::class, 'showArticle'])->name('articles.show');
    Route::get('/articles/{article}/edit', [AdminController::class, 'editArticle'])->name('articles.edit');
    Route::put('/articles/{article}', [AdminController::class, 'updateArticle'])->name('articles.update');
    Route::delete('/articles/{article}', [AdminController::class, 'destroyArticle'])->name('articles.destroy');
    Route::post('/articles/{article}/toggle-featured', [AdminController::class, 'toggleArticleFeatured'])->name('articles.toggle-featured');
    
    // Videos Management
    Route::get('/videos', [AdminController::class, 'videos'])->name('videos');
    Route::get('/videos/create', [AdminController::class, 'createVideo'])->name('videos.create');
    Route::post('/videos', [AdminController::class, 'storeVideo'])->name('videos.store');
    Route::get('/videos/{video}', [AdminController::class, 'showVideo'])->name('videos.show');
    Route::get('/videos/{video}/edit', [AdminController::class, 'editVideo'])->name('videos.edit');
    Route::put('/videos/{video}', [AdminController::class, 'updateVideo'])->name('videos.update');
    Route::delete('/videos/{video}', [AdminController::class, 'destroyVideo'])->name('videos.destroy');
    Route::post('/videos/{video}/toggle-featured', [AdminController::class, 'toggleVideoFeatured'])->name('videos.toggle-featured');
    
    // Stories Moderation
    Route::get('/stories', [AdminController::class, 'stories'])->name('stories');
    Route::get('/stories/{story}', [AdminController::class, 'showStory'])->name('stories.show');
    Route::post('/stories/{story}/approve', [AdminController::class, 'approveStory'])->name('stories.approve');
    Route::post('/stories/{story}/reject', [AdminController::class, 'rejectStory'])->name('stories.reject');
    Route::delete('/stories/{story}', [AdminController::class, 'destroyStory'])->name('stories.destroy');
    
    // Habits Moderation
    Route::get('/habits', [AdminController::class, 'habits'])->name('habits');
    Route::get('/habits/{habit}', [AdminController::class, 'showHabit'])->name('habits.show');
    Route::post('/habits/{habit}/approve', [AdminController::class, 'approveHabit'])->name('habits.approve');
    Route::post('/habits/{habit}/reject', [AdminController::class, 'rejectHabit'])->name('habits.reject');
    Route::delete('/habits/{habit}', [AdminController::class, 'destroyHabit'])->name('habits.destroy');
    
    // Future Messages Management
    Route::get('/future-messages', [AdminController::class, 'futureMessages'])->name('future-messages');
    Route::get('/future-messages/{message}', [AdminController::class, 'showFutureMessage'])->name('future-messages.show');
    Route::post('/future-messages/{message}/send', [AdminController::class, 'sendFutureMessage'])->name('future-messages.send');
    Route::delete('/future-messages/{message}', [AdminController::class, 'destroyFutureMessage'])->name('future-messages.destroy');
    
    // Campaigns Management
    Route::get('/campaigns', [AdminController::class, 'campaigns'])->name('campaigns');
    Route::get('/campaigns/{campaign}', [AdminController::class, 'showCampaign'])->name('campaigns.show');
    Route::post('/campaigns/{campaign}/toggle-active', [AdminController::class, 'toggleCampaignActive'])->name('campaigns.toggle-active');
    
    // Contact Messages Management
    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::get('/contacts/{contact}', [AdminController::class, 'showContact'])->name('contacts.show');
    Route::post('/contacts/{contact}/read', [AdminController::class, 'markContactAsRead'])->name('contacts.read');
    Route::post('/contacts/{contact}/reply', [AdminController::class, 'replyContact'])->name('contacts.reply');
    Route::delete('/contacts/{contact}', [AdminController::class, 'destroyContact'])->name('contacts.destroy');
    
    // System Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
    
    // System Logs
    Route::get('/logs', [AdminController::class, 'logs'])->name('logs');
    Route::get('/logs/download', [AdminController::class, 'downloadLogs'])->name('logs.download');
    
    // Backup Management
    Route::get('/backup', [AdminController::class, 'backup'])->name('backup');
    Route::post('/backup/create', [AdminController::class, 'createBackup'])->name('backup.create');
    Route::post('/backup/restore', [AdminController::class, 'restoreBackup'])->name('backup.restore');
    Route::get('/backup/download', [AdminController::class, 'downloadBackup'])->name('backup.download');
});

// Campaign Manager Routes
Route::middleware(['auth', CampaignManagerMiddleware::class])->prefix('community')->name('community.')->group(function () {
    Route::get('/', [CommunityController::class, 'index'])->name('index');
    Route::get('/dashboard', [CommunityController::class, 'dashboard'])->name('dashboard');
    
    // Content Library
    Route::get('/content-library', [CommunityController::class, 'contentLibrary'])->name('content-library');
    Route::get('/content-library/upload', [CommunityController::class, 'showUploadContent'])->name('content-library.upload.show');
    Route::post('/content-library/upload', [CommunityController::class, 'uploadContent'])->name('content-library.upload');
    Route::get('/content-library/{content}', [CommunityController::class, 'showContent'])->name('content-library.show');
    Route::put('/content-library/{content}', [CommunityController::class, 'updateContent'])->name('content-library.update');
    Route::delete('/content-library/{content}', [CommunityController::class, 'deleteContent'])->name('content-library.delete');
    
    // Campaigns Management
    Route::get('/campaigns', [CommunityController::class, 'campaigns'])->name('campaigns');
    Route::get('/campaigns/create', [CommunityController::class, 'createCampaign'])->name('campaigns.create');
    Route::post('/campaigns', [CommunityController::class, 'storeCampaign'])->name('campaigns.store');
    Route::get('/campaigns/{campaign}', [CommunityController::class, 'showCampaign'])->name('campaigns.show');
    Route::get('/campaigns/{campaign}/edit', [CommunityController::class, 'editCampaign'])->name('campaigns.edit');
    Route::put('/campaigns/{campaign}', [CommunityController::class, 'updateCampaign'])->name('campaigns.update');
    Route::delete('/campaigns/{campaign}', [CommunityController::class, 'destroyCampaign'])->name('campaigns.destroy');
    
    // Campaign Content
    Route::get('/campaigns/{campaign}/content', [CommunityController::class, 'campaignContent'])->name('campaigns.content');
    Route::post('/campaigns/{campaign}/content', [CommunityController::class, 'addCampaignContent'])->name('campaigns.content.add');
    Route::put('/campaigns/{campaign}/content/{content}', [CommunityController::class, 'updateCampaignContent'])->name('campaigns.content.update');
    Route::delete('/campaigns/{campaign}/content/{content}', [CommunityController::class, 'deleteCampaignContent'])->name('campaigns.content.delete');
    
    // Reports and Analytics
    Route::get('/reports', [CommunityController::class, 'reports'])->name('reports');
    Route::post('/reports/generate', [CommunityController::class, 'generateReport'])->name('reports.generate');
    Route::get('/reports/{report}', [CommunityController::class, 'showReport'])->name('reports.show');
    Route::get('/reports/{report}/export', [CommunityController::class, 'exportReport'])->name('reports.export');
    
    // Content Moderation
    Route::get('/moderation/stories', [CommunityController::class, 'moderateStories'])->name('moderation.stories');
    Route::post('/moderation/stories/{story}/approve', [CommunityController::class, 'approveStory'])->name('moderation.stories.approve');
    Route::post('/moderation/stories/{story}/reject', [CommunityController::class, 'rejectStory'])->name('moderation.stories.reject');
    
    Route::get('/moderation/habits', [CommunityController::class, 'moderateHabits'])->name('moderation.habits');
    Route::post('/moderation/habits/{habit}/approve', [CommunityController::class, 'approveHabit'])->name('moderation.habits.approve');
    Route::post('/moderation/habits/{habit}/reject', [CommunityController::class, 'rejectHabit'])->name('moderation.habits.reject');
});

});

// }); // End of visitor tracking middleware group (disabled)

// Fallback route for 404
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
