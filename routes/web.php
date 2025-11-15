<?php

use Illuminate\Support\Facades\Route;
# 1. Import the controllers that will be used
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);
