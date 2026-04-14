<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\SendFutureMessageJob;
use App\Jobs\ProcessCampaignReportJob;
use App\Models\Campaign;
use App\Models\FutureMessage;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Log;

// Custom Artisan Commands
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('wa3y:stats', function () {
    $this->info('🌟 منصة وعي - الإحصائيات');
    $this->info('==================');
    $this->info('عدد المستخدمين: ' . User::count());
    $this->info('عدد الزوار اليوم: ' . Visitor::whereDate('date', now()->toDateString())->count());
    $this->info('الرسائل المستقبلية: ' . FutureMessage::count());
    $this->info('الحملات النشطة: ' . Campaign::where('is_active', true)->count());
})->purpose('Display platform statistics');

Artisan::command('wa3y:cleanup', function () {
    $this->info('🧹 تنظيف البيانات القديمة...');
    
    // Clean old visitor records (older than 90 days)
    $deletedVisitors = Visitor::where('date', '<', now()->subDays(90))->delete();
    $this->info("تم حذف {$deletedVisitors} سجل زوار قديم");
    
    // Clean old AI conversations (older than 30 days)
    $deletedConversations = \App\Models\AiConversation::where('created_at', '<', now()->subDays(30))->delete();
    $this->info("تم حذف {$deletedConversations} محادثة قديمة");
    
    $this->info('✅ اكتمل التنظيف');
})->purpose('Clean up old data');

Artisan::command('wa3y:send-future-messages', function () {
    $this->info('📤 إرسال الرسائل المستقبلية...');
    
    $messages = FutureMessage::where('send_date', '<=', now())
        ->where('sent', false)
        ->get();
    
    foreach ($messages as $message) {
        SendFutureMessageJob::dispatch($message);
        $this->info("تم إرسال رسالة للمستخدم: {$message->user->full_name}");
    }
    
    $this->info("تم إرسال {$messages->count()} رسالة");
})->purpose('Send pending future messages');

Artisan::command('wa3y:generate-reports', function () {
    $this->info('📊 إنشاء تقارير الحملات...');
    
    $campaigns = Campaign::where('is_active', true)
        ->where('end_date', '<=', now())
        ->whereDoesntHave('reports')
        ->get();
    
    foreach ($campaigns as $campaign) {
        ProcessCampaignReportJob::dispatch($campaign->reports()->create([
            'campaign_id' => $campaign->id,
            'created_by' => $campaign->manager_id,
            'data' => [],
            'status' => 'pending'
        ]));
        $this->info("تم إنشاء تقرير للحملة: {$campaign->title}");
    }
    
    $this->info("تم إنشاء {$campaigns->count()} تقرير");
})->purpose('Generate campaign reports');

// Scheduled Tasks
Schedule::command('wa3y:cleanup')->dailyAt('02:00');
Schedule::command('wa3y:send-future-messages')->hourly();
Schedule::command('wa3y:generate-reports')->dailyAt('23:59');

// Database Backup
Schedule::command('backup:run --only-db')->dailyAt('01:00');

// Cache Optimization
Schedule::command('cache:clear')->dailyAt('03:00');
Schedule::command('config:clear')->dailyAt('03:05');
Schedule::command('view:clear')->dailyAt('03:10');

// Log Cleanup
Schedule::command('log:clear')->weekly();

// Health Check
Schedule::call(function () {
    try {
        // Check database connection
        \DB::connection()->getPdo();
        
        // Check Redis connection
        \Cache::put('health_check', 'ok', 60);
        
        Log::info('Health check passed');
    } catch (\Exception $e) {
        Log::error('Health check failed: ' . $e->getMessage());
    }
})->everyFiveMinutes();
