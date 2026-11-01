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

Route::get('cart/count', [MyController::class, 'getCartItems'])->name('api.cart.count');
Route::post('cart/add', [MyController::class, 'addToCurt'])->name('api.cart.add');



// Маршруты для гостей (доступны, если не вошел)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Маршрут для выхода (доступен только вошедшим)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/admin', [CatalogController::class, 'mainAdminPage'])->name('mainAdminPage');

//маршруты только для админа
Route::middleware(['auth','admin'])->prefix('admin')->group(function(){

        //маршрут для админ панели
    

    //добавление товара
    Route::get('/add', [CatalogController::class, 'createForm'])->name('createForm');

    //изменение товара
    Route::get('/change/{watch}', [CatalogController::class, 'change'])->name('watches.change');


    //маршрут для сохранения товара
    Route::post('/', [CatalogController::class, 'addWatch'])->name('addWatch');

    Route::put('/change/{watch}', [CatalogController::class, 'addWatch'])->name('watches.update');

    Route::delete('/destroy/{watch}', [CatalogController::class, 'destroy'])->name('watches.destroy');

    //маршрут список категории
    Route::get('/types',[CatalogController::class, 'getAllTypes'])->name('getAllTypes');

    Route::get('/types/change/{type}', [CatalogController::class, 'changeType'])->name('types.change');

    Route::delete('/types/destroy/{type}', [CatalogController::class, 'destroyType'])->name('types.destroy');

    Route::put('/types/change/{type}', [CatalogController::class, 'addType'])->name('types.update');




    //маршрут для добавления категории
    Route::get('/add_type', [CatalogController::class, 'createFormType'])->name('createFormType');

    Route::post('/add_type', [CatalogController::class, 'addType'])->name('addType');
});

