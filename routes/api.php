<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemiluController;

Route::get('/pemilu', [PemiluController::class, 'index']); // Ambil semua data nested
Route::get('/pemilu/dapil/{id}', [PemiluController::class, 'byDapil']); // Ambil data berdasarkan Dapil
Route::get('/pemilu/kecamatan/{nama}', [PemiluController::class, 'searchKecamatanByName']); // Ambil data berdasarkan nama Kecamatan
Route::get('/pemilu/desa/{nama}', [PemiluController::class, 'searchDesaByName']); // Ambil data berdasarkan nama Desa




