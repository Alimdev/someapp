<?php

use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('currency', [CurrencyController::class, 'index']);
Route::get('history', [CurrencyController::class, 'history']);
Route::get('verify', [RegisterController::class, 'verify']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::delete('logout', [LoginController::class, 'logout']);