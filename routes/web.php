<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AuthController;

Route::get('/', [MyController::class, 'home']);

Route::get('/test', [MyController::class, 'index']);

Route::get('/users', [MyController::class, 'getAllUsers']);

Route::get('/watches/{id}', [MyController::class, 'getWatchById']);

Route::get('/curt', [MyController::class, 'getCurt'])->name('curt');

Route::delete('/curt/remove/{id}', [MyController::class, 'curtRemove'])->name('cart.remove');


// Маршруты для гостей (доступны, если не вошел)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Маршрут для выхода (доступен только вошедшим)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
