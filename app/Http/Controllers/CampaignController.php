<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use App\Models\EmailTemplate;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;

class CampaignController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampaignRequest $request)
    {
        Campaign::create($request->all());
        return redirect()->route('campaigns.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign 
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCampaignRequest  $request
     * @param  \App\Models\Campaign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());
        return redirect()->route('campaigns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('campaigns.index');
    }
    
    
    /**
     * Send Email for campaigns.
     *
     * @param  $campaignId
     * @return \Illuminate\Http\Response
     */
    public function sendEmails($campaignId, $templateId)
    {
        $emailTemplate = EmailTemplate::find($campaignId); // Select the appropriate template
        $campaign = Campaign::find($templateId); // Select the appropriate template

        $recipients = ['recipient1@example.com', 'recipient2@example.com']; // Get recipients from your logic

        foreach ($recipients as $recipient) {
            SendEmailJob::dispatch($campaign, $emailTemplate, $recipient);
        }

        return redirect()->route('campaigns.index')->with('success', 'Emails are being sent!');
    }
}
