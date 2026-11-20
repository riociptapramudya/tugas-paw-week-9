<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\VarianController;

Route::get('/', function () {
    return redirect('/merek');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Bisa diakses Admin dan Petugas (lihat, tambah, ubah)
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::resource('merek', MerekController::class)->except(['destroy']);
    Route::resource('produk', ProdukController::class)->except(['destroy']);
    Route::resource('varian', VarianController::class)->except(['destroy']);
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('merek/{merek}', [MerekController::class, 'destroy'])->name('merek.destroy');
    Route::delete('produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::delete('varian/{varian}', [VarianController::class, 'destroy'])->name('varian.destroy');
});