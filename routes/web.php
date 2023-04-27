<?php

use App\Contracts\KuesionerContract;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuesionerController;

// Otentifikasi
Route::get('/l091n', [AuthController::class, 'index']);
Route::post('/auth/l091n', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

// Halaman Publik
Route::get('/', [DashboardController::class, 'index']);
Route::get('/data-grafik-bar', [DashboardController::class, 'dataGrafikBar']);
Route::get('/dashboard-filter-layanan/{id_layanan}', [DashboardController::class, 'filterByLayanan']);

Route::prefix('isi-survey')->group(function () {
    Route::get('/{namalayanan}', [KuesionerController::class, 'index'])->name('kuesioner.index');
    Route::post('/add-kuesioner', [KuesionerController::class, 'store']);
});

// API SKM
Route::get('/get-skm/{year}', [KuesionerContract::class, 'getHasilSurveyTahun'])->name('skm.get');
