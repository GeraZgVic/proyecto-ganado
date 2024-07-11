<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\RazasController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para usuarios autenticados
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Propietarios
    Route::get('/propietarios', [PropietarioController::class, 'index'])->name('propietarios.index');
    Route::get('/upp', [PropietarioController::class, 'indexUpp'])->name('upp.index');
    Route::delete('/propietario/delete/{propietario}', [PropietarioController::class, 'destroy']);
    // Razas   
    Route::get('/razas', [RazasController::class, 'index'])->name('razas.index');
    Route::delete('/raza/delete/{raza}', [RazasController::class, 'destroy']);
    
    
});