<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

// Welcome Page - Index saja
Route::get('/', [WelcomeController::class, 'index'])->name('home');
