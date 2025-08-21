<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\LoginLogController;
//use App\Http\Controllers\Auth\PlainLoginController; 
use App\Http\Controllers\PlainLoginController;// login básico (sin cifrado)


Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Login Básico (Texto plano)
|--------------------------------------------------------------------------
*/
Route::get('/login-plain', [PlainLoginController::class, 'showLoginForm'])
    ->name('login.plain.form');

Route::post('/login-plain', [PlainLoginController::class, 'login'])
    ->name('login.plain');

/*
|--------------------------------------------------------------------------
| Logout Unificado
|--------------------------------------------------------------------------
| Ahora todos los logouts apuntan a un solo método
*/
Route::post('/logout', [PlainLoginController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Login con Google
|--------------------------------------------------------------------------
*/
Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

/*
|--------------------------------------------------------------------------
| Rutas protegidas por auth + verified
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Perfil usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Vehículos
    Route::get('/vehiculos/crear', [VehiculoController::class, 'create'])->name('vehiculos.create');
    Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('vehiculos.store');
    Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');

    // Login logs
    Route::get('/login-logs', [LoginLogController::class, 'index'])->name('login-logs');

});

// Mantén las rutas de auth.php (login de Laravel normal)
require __DIR__.'/auth.php';
