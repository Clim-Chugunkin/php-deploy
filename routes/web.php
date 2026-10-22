<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;

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

//маршрут для админ панели
Route::get('/admin', [CatalogController::class, 'mainAdminPage'])->name('mainAdminPage');

//добавление товара
Route::get('/admin/add', [CatalogController::class, 'createForm'])->name('createForm');

//изменение товара
Route::get('/admin/change/{watch}', [CatalogController::class, 'change'])->name('watches.change');


//маршрут для сохранения товара
Route::post('/admin', [CatalogController::class, 'addWatch'])->name('addWatch');

Route::put('/admin/change/{watch}', [CatalogController::class, 'addWatch'])->name('watches.update');

Route::delete('/admin/destroy/{watch}', [CatalogController::class, 'destroy'])->name('watches.destroy');
