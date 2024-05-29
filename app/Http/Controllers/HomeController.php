<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailStatus;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sentCount = EmailStatus::where('status', 'sent')->count();
        $deliveredCount = EmailStatus::where('status', 'delivered')->count();
        $openedCount = EmailStatus::where('status', 'opened')->count();

        return view('home', compact('sentCount', 'deliveredCount', 'openedCount'));
    }
}
