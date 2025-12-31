<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\PortfolioController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

// Public Portfolio Homepage at Root URL
Route::get('/', [PortfolioController::class, 'show'])->name('public.home');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
    // Protected Admin Routes
    Route::middleware(['App\Http\Middleware\AdminAuth'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // CRUD routes will be added here after controllers are created
    });
});
