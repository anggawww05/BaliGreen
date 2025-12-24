<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/register', 'indexRegister')->name('register.index');
    // Route::post('/register', 'index')->name('register.index');
    Route::get('/login', 'indexLogin')->name('login.index');
    // Route::post('/register', 'index')->name('register.index');
});

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/', 'indexHome')->name('home.index');
    Route::get('/profile', 'indexProfile')->name('profile.index');
    Route::get('/edit-profile', 'indexEditProfile')->name('edit.profile.index');
    Route::get('/schedule', 'indexSchedule')->name('schedule.index');
    Route::get('/transaction', 'indexTransaction')->name('transaction.index');
});
