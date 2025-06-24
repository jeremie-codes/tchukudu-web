<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TransporterController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Pages principales
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/comment-ca-marche', [HomeController::class, 'howItWorks'])->name('how-it-works');
Route::get('/transporteurs', [TransporterController::class, 'index'])->name('transporters');
Route::get('/expediteurs', [ShipperController::class, 'index'])->name('shippers');
Route::get('/captures-ecran', [HomeController::class, 'screenshots'])->name('screenshots');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Pages légales
Route::get('/mentions-legales', [HomeController::class, 'legalNotice'])->name('legal-notice');
Route::get('/politique-confidentialite', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');

// Administration basique
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::delete('/contacts/{contact}', [AdminController::class, 'destroyContact'])->name('contacts.destroy');
});