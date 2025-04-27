<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\JadwalMaskapaiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterKotaController;
use App\Http\Controllers\MaskapaiController;
use App\Http\Controllers\OrderTiketController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\VerifikasiTiket;
use App\Models\OrderTiket;
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

Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function () {
    // Penumpang
    Route::get('/data-pengguna', [UserController::class, 'index'])->name('data-pengguna');
    Route::delete('/data-pengguna/{id}', [UserController::class, 'destroy'])->name('data-pengguna.destroy');

    // Petugas
    Route::get('/data-petugas', [PetugasController::class, 'index'])->name('data-petugas');
    Route::get('/data-petugas/create', [PetugasController::class, 'create'])->name('data-petugas.create');
    Route::post('/data-petugas', [PetugasController::class, 'store'])->name('data-petugas.store');
    Route::get('/data-petugas/{id}/edit', [PetugasController::class, 'edit'])->name('data-petugas.edit');
    Route::put('/data-petugas/{id}', [PetugasController::class, 'update'])->name('data-petugas.update');
    Route::delete('/data-petugas/{id}', [PetugasController::class, 'destroy'])->name('data-petugas.destroy');

    // Maskapai 
    Route::get('/maskapai', [MaskapaiController::class, 'index'])->name('maskapai');
    Route::get('/maskapai/create', [MaskapaiController::class, 'create'])->name('maskapai.create');
    Route::post('/maskapai', [MaskapaiController::class, 'store'])->name('maskapai.store');
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

    // Rute
    Route::get('/rute', [RuteController::class, 'index'])->name('rute');
    Route::get('/rute/create', [RuteController::class, 'create'])->name('rute.create');
    Route::post('/rute', [RuteController::class, 'store'])->name('rute.store');
    Route::get('/rute/edit/{id}', [RuteController::class, 'edit'])->name('rute.edit');
    Route::put('/rute/update/{id}', [RuteController::class, 'update'])->name('rute.update');
    Route::delete('/rute/delete/{id}', [RuteController::class, 'destroy'])->name('rute.destroy');

    // Jadwal Penerbangan
    Route::get('/jadwal-maskapai', [JadwalMaskapaiController::class, 'index'])->name('jadwal-maskapai');
    Route::get('/jadwal-maskapai/create', [JadwalMaskapaiController::class, 'create'])->name('jadwal-maskapai.create');
    Route::post('/jadwal-maskapai', [JadwalMaskapaiController::class, 'store'])->name('jadwal-maskapai.store');
    Route::get('/jadwal-maskapai/{id}/edit', [JadwalMaskapaiController::class, 'edit'])->name('jadwal-maskapai.edit');
    Route::put('/jadwal-maskapai/{id}', [JadwalMaskapaiController::class, 'update'])->name('jadwal-maskapai.update');
    Route::delete('/jadwal-maskapai/{id}', [JadwalMaskapaiController::class, 'destroy'])->name('jadwal-maskapai.destroy');

    // Verifikasi Tiket
    Route::get('/verifikasi', [VerifikasiTiket::class, 'index'])->name('verifikasi');
    Route::put('/verifikasi/approve/{id}', [VerifikasiTiket::class, 'approve'])->name('verifikasi.approve');
    Route::put('/verifikasi/reject/{id}', [VerifikasiTiket::class, 'reject'])->name('verifikasi.reject');
});

Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->as('petugas.')->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Maskapai
    Route::get('/maskapai', [MaskapaiController::class, 'index'])->name('maskapai');
    Route::get('/maskapai/create', [MaskapaiController::class, 'create'])->name('maskapai.create');
    Route::post('/maskapai', [MaskapaiController::class, 'store'])->name('maskapai.store');
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

    // Rute
    Route::get('/rute', [RuteController::class, 'index'])->name('rute');
    Route::get('/rute/create', [RuteController::class, 'create'])->name('rute.create');
    Route::post('/rute', [RuteController::class, 'store'])->name('rute.store');
    Route::get('/rute/edit/{id}', [RuteController::class, 'edit'])->name('rute.edit');
    Route::put('/rute/update/{id}', [RuteController::class, 'update'])->name('rute.update');
    Route::delete('/rute/delete/{id}', [RuteController::class, 'destroy'])->name('rute.destroy');

    // Jadwal Penerbangan
    Route::get('/jadwal-maskapai', [JadwalMaskapaiController::class, 'index'])->name('jadwal-maskapai');
    Route::get('/jadwal-maskapai/create', [JadwalMaskapaiController::class, 'create'])->name('jadwal-maskapai.create');
    Route::post('/jadwal-maskapai', [JadwalMaskapaiController::class, 'store'])->name('jadwal-maskapai.store');
    Route::get('/jadwal-maskapai/{id}/edit', [JadwalMaskapaiController::class, 'edit'])->name('jadwal-maskapai.edit');
    Route::put('/jadwal-maskapai/{id}', [JadwalMaskapaiController::class, 'update'])->name('jadwal-maskapai.update');
    Route::delete('/jadwal-maskapai/{id}', [JadwalMaskapaiController::class, 'destroy'])->name('jadwal-maskapai.destroy');
});

Route::middleware(['auth', 'role:penumpang'])->group(function () {
    Route::get('/travel', [TravelController::class, 'index'])->name('travel');

    Route::get('/detail/{id}', [DetailController::class, 'show'])->name('detail');
    Route::post('/order/store', [OrderTiketController::class, 'store'])->name('order.store');

    Route::get('/myticket', [OrderTiketController::class, 'myTicket'])->name('myticket');
});


Route::get('/logout', function () {
    Auth::logout(); // or auth()->guard()->logout();
    return redirect('/');
});
