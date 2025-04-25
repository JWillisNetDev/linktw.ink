<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkTrimController;
use App\Http\Controllers\LinkRedirectController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::prefix('api')->group(function () {
    Route::post('link', LinkTrimController::class)->name('link.trim');
    Route::get('link/{slug}', LinkRedirectController::class)->name('link.redirect');
});
