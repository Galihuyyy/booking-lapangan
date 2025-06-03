<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\controllerForUser;
use App\Http\Controllers\lapanganController;
use App\Http\Controllers\penyewaanController;
use Illuminate\Support\Facades\Route;




Route::middleware('guest')->group(function () {
    Route::get('/login', [authController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [authController::class, 'login'])->name('login.process');
});

Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
    
    Route::prefix('user')->middleware('role:user')->group(function () {
        Route::resource('/home', controllerForUser::class);

        Route::get('/riwayat-pemesanan', function () {
            return view('users.riwayat_pemesanan');
        });
    });
    
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::resource('/admin', adminController::class);
        
        Route::resource('/penyewaan', penyewaanController::class);
        Route::put('/penyewaan/{id}/tolak', [penyewaanController::class, 'tolak'])->name('penyewaan.tolak');
        Route::resource('/lapangan', lapanganController::class);
        
    });

});
