<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PasienController;


Route::resource('kamars', KamarController::class);
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/kamars', [KamarController::class, 'index'])->name('kamars.index');

Route::get('/pasiens', [PasienController::class, 'index'])->name('pasiens.index');
Route::get('/pasiens/create', [PasienController::class, 'create'])->name('pasiens.create');
Route::post('/pasiens', [PasienController::class, 'store'])->name('pasiens.store');
Route::delete('/pasiens/{id}', [PasienController::class, 'keluar'])->name('pasiens.keluar');
Route::get('kamars/{id}', [KamarController::class, 'show']);