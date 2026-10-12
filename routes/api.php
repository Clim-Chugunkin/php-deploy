<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('cart/count', [MyController::class, 'getCartItems'])->name('api.cart.count');
Route::post('cart/add', [MyController::class, 'addToCurt'])->name('api.cart.add');
