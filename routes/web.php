<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/register', 'indexRegister')->name('register.index');
    // Route::post('/register', 'index')->name('register.index');
    Route::get('/login', 'indexLogin')->name('login.index');
    // Route::post('/register', 'index')->name('register.index');
});
