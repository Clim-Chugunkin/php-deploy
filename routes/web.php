<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/', [MyController::class, 'home']);

Route::get('/test', [MyController::class, 'index']);

Route::get('/users', [MyController::class, 'getAllUsers']);


