<?php
namespace App\Jobs;

use App\Models\Campaign;
use App\Models\EmailTemplate;
use App\Models\EmailStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $campaign;
    protected $recipient;
    protected $emailTemplate;

    public function __construct(Campaign $campaign, EmailTemplate $emailTemplate, $recipient)
    {
        $this->campaign = $campaign;
        $this->recipient = $recipient;
        $this->emailTemplate = $emailTemplate;
    }

    public function handle()
    {
        try {
            // Send email using the email template
            Mail::to($this->recipient)
                ->send(new \App\Mail\CampaignMail($this->campaign, $this->emailTemplate));

            // Store email status as 'sent'
            $this->storeEmailStatus('sent');
        } catch (\Exception $e) {
            // If sending email fails, store status as 'failed'
            $this->storeEmailStatus('opened');
        }
    }

    /**
     * Store email status in the database.
     *
     * @param string $status
     * @return void
     */
    protected function storeEmailStatus($status)
    {
        EmailStatus::create([
            'campaign_id' => $this->campaign->id,
            'recipient' => $this->recipient,
            'status' => $status,
        ]);
    }
}
