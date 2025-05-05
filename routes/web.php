<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('/dashboard');
Route::get('/', [WelcomeController::class, 'index']);

// routes/web.php
Route::get('/checkout/{id}', [PesananController::class, 'create'])->name('checkout.create');
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('foods', FoodController::class);

    Route::resource('pesanan', PesananController::class);



});

require __DIR__.'/auth.php';
