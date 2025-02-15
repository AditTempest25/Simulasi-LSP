<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterKotaController;
use App\Http\Controllers\MaskapaiController;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['as' => 'admin.'], function () {
    // Pengguna / Penumpang
    Route::get('/data-pengguna', [UserController::class, 'index'])->name('data-pengguna');
    Route::delete('/data-pengguna/{id}', [UserController::class, 'destroy'])->name('data-pengguna.destroy');

    // Petugas
    Route::get('/data-petugas', [PetugasController::class, 'index'])->name('data-petugas');
    Route::get('/data-petugas/create', [PetugasController::class, 'create'])->name('data-petugas.create');
    Route::post('/data-petugas', [PetugasController::class, 'store'])->name('data-petugas.store');
    Route::get('/data-petugas/{id}/edit', [PetugasController::class, 'edit'])->name('data-petugas.edit');
    Route::put('/data-petugas/{id}', [PetugasController::class, 'update'])->name('data-petugas.update');
    Route::delete('/data-petugas/{id}', [PetugasController::class, 'destroy'])->name('data-petugas.destroy');

    // ✅ Maskapai (Menggunakan Controller)
    Route::get('/maskapai', [MaskapaiController::class, 'index'])->name('maskapai');
    Route::get('/maskapai/create', [MaskapaiController::class, 'create'])->name('maskapai.create');
    Route::post('/maskapai', [MaskapaiController::class,'store'])->name('maskapai.store');
    Route::get('/maskapai/{id}/edit', [MaskapaiController::class, 'edit'])->name('maskapai.edit');
    Route::put('/maskapai/{id}', [MaskapaiController::class, 'update'])->name('maskapai.update');
    Route::delete('/maskapai/{id}', [MaskapaiController::class, 'destroy'])->name('maskapai.destroy');

    // Master Kota
    Route::get('/master-kota', [MasterKotaController::class, 'index'])->name('master-kota');
    Route::get('/master-kota/create', [MasterKotaController::class, 'create'])->name('master-kota.create');
    Route::post('/master-kota', [MasterKotaController::class, 'store'])->name('master-kota.store');
    Route::get('/master-kota/{id}/edit', [MasterKotaController::class, 'edit'])->name('master-kota.edit');
    Route::put('/master-kota/{id}', [MasterKotaController::class, 'update'])->name('master-kota.update');
    Route::delete('/master-kota/{id}', [MasterKotaController::class, 'destroy'])->name('master-kota.destroy');
});

Route::get('/logout', function () {
    Auth::logout(); // or auth()->guard()->logout();
    return redirect('/');
});
