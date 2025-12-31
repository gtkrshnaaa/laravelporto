<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\PortfolioController;

// Public Portfolio Routes
Route::prefix('portfolio')->name('public.')->group(function () {
    Route::get('/', [PortfolioController::class, 'show'])->name('home');
});

// Redirect root to portfolio
Route::get('/', function () {
    return redirect()->route('public.home');
});
