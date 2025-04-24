<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MooraController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\OptimasiController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\SubkriteriaController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/', [AuthController::class, 'login'])->name('admin.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/home', function () {
        return view('home');
    });
// Middleware Admin
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/generate-bobot', [KriteriaController::class, 'generateBobot'])->name('generate.bobot');

    Route::resource('subkriteria', SubkriteriaController::class);

    Route::resource('kriteria', kriteriaController::class);

    Route::resource('alternatif', AlternatifController::class);

    Route::resource('moora', MooraController::class);

    Route::resource('normalisasi', NormalisasiController::class);

    Route::resource('optimasi', OptimasiController::class);

    Route::resource('ranking', RankingController::class);
    Route::get('/ranking/export/pdf', [RankingController::class, 'exportPdf'])->name('ranking.export.pdf');
    Route::get('/ranking/export/excel', [RankingController::class, 'exportExcel'])->name('ranking.export.excel');

    
    Route::resource('users', UserController::class);

});

    Route::resource('users', UserController::class);
