<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExampleController;

// Resource routes for Obat and Transaksi
Route::resource('obat', ObatController::class);
Route::resource('transaksi', TransaksiController::class);
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('obat/{obat}/edit', [ObatController::class, 'edit'])->name('obat.edit');
Route::get('/transaksi/{id}/invoice', [TransaksiController::class, 'generateInvoice'])->name('transaksi.invoice');

// Route untuk menampilkan form create transaksi
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');

// Route untuk menyimpan transaksi
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

// Routes for Pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/{pasien}', [PasienController::class, 'show'])->name('pasien.show');
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Example Route
Route::get('/example', [ExampleController::class, 'index'])->name('example');
