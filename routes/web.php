<?php

use Illuminate\Support\Facades\{Route, Response};
use App\Http\Controllers\ServePrivateStorage;
use App\Screens\Pages\{
    LandingPage,
    Collection,
    About,
};

Route::middleware('signed')->group(function () {
    Route::get('media/{media}/{filename}', ServePrivateStorage::class)->name('media');
});

// Get SVG
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

// Login Route
Route::get('/login', function () {
    return redirect()->route('filament.core.auth.login');
})->name('login');
Route::get('/public', function () {
    return redirect()->route('landing-page');
});

// Landing Page
Route::get('/', LandingPage::class)->name('landing-page');

// About
Route::prefix('about')->group(function () {
    Route::get('/', function () {
        return redirect()->route('about.whoami');
    })->name('about');
    Route::get('/whoami', About\WhoAmI::class)->name('about.whoami');
});

// Blog
// Route::prefix('blog')->group(function () {
//     Route::get('/', Collection\ListCollection::class)->name('collection');
//     Route::get('/{scope}', Collection\ListCollection::class)->name('collection.scope');
//     Route::get('/tag/{tag}', Collection\ListCollection::class)->name('collection.tag');
//     Route::get('/{scope}/{category}', Collection\ListCollection::class)->name('collection.category');
//     Route::get('/{scope}/{category}/{slug}', Collection\Detail::class)->name('collection.detail');
// });

// Collection
Route::prefix('collection')->group(function () {
    Route::get('/', Collection\ListCollection::class)->name('collection');
    Route::get('/{scope}', Collection\ListCollection::class)->name('collection.scope');
    Route::get('/tag/{tag}', Collection\ListCollection::class)->name('collection.tag');
    Route::get('/{scope}/{category}', Collection\ListCollection::class)->name('collection.category');
    Route::get('/{scope}/{category}/{slug}', Collection\Detail::class)->name('collection.detail');
});
