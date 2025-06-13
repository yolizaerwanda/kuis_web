<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('profile')->group(function() {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/berita', [BeritaController::class, 'userIndex'])->name('user.index');
        Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('user.show');
    });
    Route::middleware(['auth','admin'])->group(function(){
        Route::resource('/berita', BeritaController::class)->parameters(['berita' => 'berita']);
    });
});

require __DIR__.'/auth.php';
