<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailCampaignController;

Route::get('/', [EmailCampaignController::class, 'index'])->name('email-campaigns.index');
Route::get('/campaigns/create', [EmailCampaignController::class, 'create'])->name('email-campaigns.create');
Route::post('/campaigns', [EmailCampaignController::class, 'store'])->name('email-campaigns.store');
Route::get('/campaigns/{campaign}', [EmailCampaignController::class, 'show'])->name('email-campaigns.show');
Route::delete('/campaigns/{campaign}', [EmailCampaignController::class, 'destroy'])->name('email-campaigns.destroy');
