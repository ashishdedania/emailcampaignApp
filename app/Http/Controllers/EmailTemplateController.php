<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmailTemplateRequest;
use App\Http\Requests\UpdateEmailTemplateRequest;

class EmailTemplateController extends Controller
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
    
    public function index()
    {
        $emailTemplates = EmailTemplate::all();
        return view('email_templates.index', compact('emailTemplates'));
    }

    public function create()
    {
        return view('email_templates.create');
    }

    public function store(StoreEmailTemplateRequest $request)
    {
        /*$request->validate([
            'name' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);*/

        EmailTemplate::create($request->all());
        return redirect()->route('email-templates.index')->with('success', 'Email template created successfully.');
    }

    public function show(EmailTemplate $emailTemplate)
    {
        return view('email_templates.show', compact('emailTemplate'));
    }

    public function edit(EmailTemplate $emailTemplate)
    {
        return view('email_templates.edit', compact('emailTemplate'));
    }

    public function update(UpdateEmailTemplateRequest $request, EmailTemplate $emailTemplate)
    {
        /*$request->validate([
            'name' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);*/

        $emailTemplate->update($request->all());
        return redirect()->route('email-templates.index')->with('success', 'Email template updated successfully.');
    }

    public function destroy(EmailTemplate $emailTemplate)
    {
        $emailTemplate->delete();
        return redirect()->route('email-templates.index')->with('success', 'Email template deleted successfully.');
    }
}
