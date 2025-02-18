<?php

use App\Livewire\Pages\LandingPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServePrivateStorage;

Route::middleware('signed')->group(function () {
    Route::get('media/{media}/{filename}', ServePrivateStorage::class)->name('media');
});
