<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\DashboardController;

Route::resource('campaigns', CampaignController::class);
Route::resource('email-templates', EmailTemplateController::class);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('campaigns/{campaign}/{template}/send-emails', [CampaignController::class, 'sendEmails'])->name('campaigns.sendEmails');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
