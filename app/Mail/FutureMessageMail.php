<?php

namespace App\Mail;

use App\Models\FutureMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FutureMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $user;

    public function __construct(FutureMessage $message)
    {
        $this->message = $message;
        $this->user = $message->user;
    }

    public function build(): self
    {
        return $this->subject('رسالتك المستقبلية من منصة وعي')
            ->view('emails.future-message')
            ->with([
                'user' => $this->user,
                'message' => $this->message,
            ]);
    }
}
