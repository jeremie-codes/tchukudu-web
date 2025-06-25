<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TransporterController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('index');
})->name('home');

// Page À Propos
Route::get('/a-propos', [AboutController::class, 'index'])->name('about');

// Routes pour les propriétaires de véhicules
Route::prefix('proprietaire')->name('owner.')->group(function () {
    Route::get('/inscription', [OwnerController::class, 'showRegistrationForm'])->name('register');
    Route::post('/inscription', [OwnerController::class, 'register']);
});

// Routes pour les transporteurs
Route::prefix('transporteur')->name('transporter.')->group(function () {
    Route::get('/inscription', [TransporterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/inscription', [TransporterController::class, 'register']);
    Route::get('/connexion', [TransporterController::class, 'showLoginForm'])->name('login');
    Route::post('/connexion', [TransporterController::class, 'login']);
    Route::post('/deconnexion', [TransporterController::class, 'logout'])->name('logout');
});

// Routes pour le contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');