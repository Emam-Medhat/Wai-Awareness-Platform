<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\CampaignReport;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CampaignReportProcessed;

class ProcessCampaignReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $backoff = [60, 300, 900];

    protected $campaignReport;

    /**
     * Create a new job instance.
     */
    public function __construct(CampaignReport $campaignReport)
    {
        $this->campaignReport = $campaignReport;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Process the campaign report
            $this->campaignReport->update([
                'processed_at' => now(),
                'status' => 'processed'
            ]);

            // Send notification to campaign manager
            if ($this->campaignReport->campaign && $this->campaignReport->campaign->manager) {
                Mail::to($this->campaignReport->campaign->manager->email)
                    ->send(new CampaignReportProcessed($this->campaignReport));
            }

            // Log successful processing
            \Log::info('Campaign report processed successfully', [
                'report_id' => $this->campaignReport->id,
                'campaign_id' => $this->campaignReport->campaign_id
            ]);

        } catch (\Exception $e) {
            \Log::error('Failed to process campaign report', [
                'report_id' => $this->campaignReport->id,
                'error' => $e->getMessage()
            ]);

            // Mark as failed
            $this->campaignReport->update([
                'status' => 'failed',
                'error_message' => $e->getMessage()
            ]);

            throw $e;
        }
    }
}
