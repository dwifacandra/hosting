<?php

use Illuminate\Support\Facades\{Route, Response};
use App\Http\Controllers\ServePrivateStorage;
use App\Screens\Pages\{
    LandingPage,
    Collection
};

Route::middleware('signed')->group(function () {
    Route::get('media/{media}/{filename}', ServePrivateStorage::class)->name('media');
});

// Fallback Resource
Route::get('/svg/{svgname}', function ($svgname) {
    $svgPath = resource_path('svg/' . str_replace('.', '/', $svgname) . '.svg');
    if (!file_exists($svgPath)) {
        abort(404, 'SVG file not found.');
    }
    $svgContent = file_get_contents($svgPath);
    return Response::make($svgContent, 200, [
        'Content-Type' => 'image/svg+xml',
    ]);
})->name('svg');

Route::get('/login', function () {
    return redirect()->route('filament.core.auth.login');
})->name('login');

Route::get('/', LandingPage::class)->name('landing-page');

Route::prefix('collection')->group(function () {
    Route::get('/', function () {
        return redirect()->route('landing-page');
    })->name('collection');
    Route::get('/{scope}/{category}/{slug}', Collection\Detail::class)->name('collection.detail');
});
