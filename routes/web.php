<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TransporterController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Pages principales
Route::get('/', function () {
    return view('index');
})->name('home');
