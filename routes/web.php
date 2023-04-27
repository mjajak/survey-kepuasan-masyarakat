<?php

use App\Contracts\KuesionerContract;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuesionerController;

Route::get('/l091n', [AuthController::class, 'index']);
Route::post('/auth/l091n', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

// Route::get('/', function () {
//     return view('dashboard', ['show_logo' => 'show']);
// });

Route::get('/', [DashboardController::class, 'index']);
Route::get('/data-grafik-bar', [DashboardController::class, 'dataGrafikBar']);
Route::get('/dashboard-filter-layanan/{id_layanan}', [DashboardController::class, 'filterByLayanan']);
// Route::get('/kuesioner/ptsp', [KuesionerController::class, 'ptsp']);
// Route::get('/kuesioner/plhut', [KuesionerController::class, 'plhut']);
// Route::get('/kuesioner/mpp', [KuesionerController::class, 'mpp']);
// Route::get('/kuesioner/wa-center', [KuesionerController::class, 'onlineWaCenter']);
// Route::get('/kuesioner/haji-online', [KuesionerController::class, 'onlinePlhut']);
// Route::post('/kuesioner/add-kuesioner', [KuesionerController::class, 'store']);

// Route::prefix('isi-survey')->group(function () {
//     Route::get('/ptsp', [KuesionerController::class, 'ptsp']);
//     Route::get('/plhut', [KuesionerController::class, 'plhut']);
//     Route::get('/mpp', [KuesionerController::class, 'mpp']);
//     Route::get('/wa-center', [KuesionerController::class, 'onlineWaCenter']);
//     Route::get('/haji-online', [KuesionerController::class, 'onlinePlhut']);
//     Route::post('/add-kuesioner', [KuesionerController::class, 'store']);
// });

// Route::post('/get-skm/{year}', [KuesionerContract::class, 'getHasilSurveyTahun'])->name('skm.post');

Route::prefix('isi-survey')->group(function () {
    Route::get('/{namalayanan}', [KuesionerController::class, 'index'])->name('kuesioner.index');
    Route::post('/add-kuesioner', [KuesionerController::class, 'store']);
});

Route::get('/get-skm/{year}', [KuesionerContract::class, 'getHasilSurveyTahun'])->name('skm.get');
