<?php

namespace App\Mail;

use App\Models\Campaign;
use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CampaignMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $campaign;
    protected $emailTemplate;

    /**
     * Create a new message instance.
     *
     * @param Campaign $campaign
     * @param EmailTemplate $emailTemplate
     */
    public function __construct(Campaign $campaign, EmailTemplate $emailTemplate)
    {
        $this->campaign = $campaign;
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.campaign')
            ->with('campaign', $this->campaign)
            ->with('emailTemplate', $this->emailTemplate);
    }
}
