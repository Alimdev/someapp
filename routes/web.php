<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');