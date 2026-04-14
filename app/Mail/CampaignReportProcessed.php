<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\CampaignReport;

class CampaignReportProcessed extends Mailable
{
    use Queueable, SerializesModels;

    public $campaignReport;

    /**
     * Create a new message instance.
     */
    public function __construct(CampaignReport $campaignReport)
    {
        $this->campaignReport = $campaignReport;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'تم معالجة تقرير الحملة - منصة وعي',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.campaigns.report-processed',
            with: [
                'campaignReport' => $this->campaignReport,
                'campaign' => $this->campaignReport->campaign,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
