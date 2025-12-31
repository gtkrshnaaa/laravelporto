<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\PortfolioController;

// Public Portfolio Homepage at Root URL
Route::get('/', [PortfolioController::class, 'show'])->name('public.home');
