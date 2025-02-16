<?php

use App\Livewire\Pages\LandingPage;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');
Route::get('/', LandingPage::class)->name('landing-page');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
