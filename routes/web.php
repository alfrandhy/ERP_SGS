<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customer', \App\Http\Controllers\CustomerController::class);

Route::resource('boq', \App\Http\Controllers\BoqController::class);