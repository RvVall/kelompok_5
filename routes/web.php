<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dosen', [App\Http\Controllers\DosenController::class, 'index'])->name('dosen.index');
Route::get('/dosen/create', [App\Http\Controllers\DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen/store', [App\Http\Controllers\DosenController::class, 'store'])->name('dosen.store');
Route::get('/dosen/{dosen}', [App\Http\Controllers\DosenController::class, 'show'])->name('dosen.show');
route::get('/dosen/edit/{id}', [App\Http\Controllers\DosenController::class, 'edit'])->name('dosen.edit');
route::put('/dosen/{id}', [App\Http\Controllers\DosenController::class, 'update'])->name('dosen.update');
route::delete('/dosen/{id}', [App\Http\Controllers\DosenController::class, 'destroy'])->name('dosen.destroy');

Route::get('/example', [App\Http\Controllers\ExampleController::class, 'index'])->name('example');
