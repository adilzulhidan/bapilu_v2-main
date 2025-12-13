<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\StatistikController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/keanggotaan', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');

