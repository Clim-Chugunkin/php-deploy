<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [MyController::class, 'index']);

Route::get('/users', [MyController::class, 'getAllUsers']);
