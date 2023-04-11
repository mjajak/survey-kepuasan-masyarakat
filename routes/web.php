<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuesionerController;

Route::get('/login', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);
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

Route::prefix('isi-survey')->group(function () {
    Route::get('/ptsp', [KuesionerController::class, 'ptsp']);
    Route::get('/plhut', [KuesionerController::class, 'plhut']);
    Route::get('/mpp', [KuesionerController::class, 'mpp']);
    Route::get('/wa-center', [KuesionerController::class, 'onlineWaCenter']);
    Route::get('/haji-online', [KuesionerController::class, 'onlinePlhut']);
    Route::post('/add-kuesioner', [KuesionerController::class, 'store']);
});
