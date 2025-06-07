<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\TokenController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function() {
    return view('auths.login');
})->name('admin.home');

Route::post('/login', [DashboardController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    // Dashboard

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Merchants
    Route::resource('merchants', MerchantController::class);
    Route::patch('merchants/{merchant}/status', [MerchantController::class, 'toggleStatus'])->name('merchants.status');

    // Messages
    Route::resource('messages', MessageController::class)->only(['index', 'show']);
    Route::post('messages/{message}/retry', [MessageController::class, 'retry'])->name('messages.retry');

    // Configurations
    Route::get('configurations', [ConfigurationController::class, 'index'])->name('configurations.index');
    Route::post('configurations', [ConfigurationController::class, 'update'])->name('configurations.update');

    // API Tokens
    Route::resource('tokens', TokenController::class)->except(['edit', 'update']);
    Route::post('tokens/{token}/regenerate', [TokenController::class, 'regenerate'])->name('tokens.regenerate');
    Route::post('tokens/{token}/toggle', [TokenController::class, 'toggle'])->name('tokens.toggle');

    // Authentication
    Route::post('/logout', function() {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('admin.home');
    })->name('logout');

});
