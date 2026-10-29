<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\HousekeeperController;
use App\Http\Controllers\InventarisController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// CRUD Modul
Route::resource('kamar', KamarController::class);
Route::resource('penghuni', PenghuniController::class);
Route::resource('housekeeper', HousekeeperController::class);
Route::resource('inventaris', InventarisController::class);