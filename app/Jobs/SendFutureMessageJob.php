<?php

namespace App\Jobs;

use App\Models\FutureMessage;
use App\Mail\FutureMessageMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendFutureMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $messages = FutureMessage::today()
            ->pending()
            ->with('user')
            ->get();

        foreach ($messages as $message) {
            try {
                // Send email
                Mail::to($message->user->email)->send(new FutureMessageMail($message));
                
                // Mark as sent
                $message->markAsSent();
                
                \Log::info('Future message sent successfully', [
                    'message_id' => $message->id,
                    'user_id' => $message->user_id,
                    'email' => $message->user->email,
                ]);
            } catch (\Exception $e) {
                \Log::error('Failed to send future message', [
                    'message_id' => $message->id,
                    'user_id' => $message->user_id,
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }
}
