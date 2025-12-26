<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/register', 'indexRegister')->name('register.index');
    // Route::post('/register', 'index')->name('register.index');
    Route::get('/login', 'indexLogin')->name('login.index');
    Route::post('/login', 'validateLogin')->name('validate.login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(\App\Http\Controllers\UserPageController::class)->group(function () {
    Route::get('/', 'indexHome')->name('home.index');
    Route::get('/profile', 'indexProfile')->name('profile.index');
    Route::get('/transaction', 'indexTransaction')->name('transaction.index');
});

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::put('/profile', 'UpdateProfileUser')->name('edit.profile.update');
    // Route::post('/schedule/schedule-form', 'storeFormPickup')->name('schedule.store');

    Route::post('/manage-user/add-user', 'storeAddUser')->name('admin.add-user.store');
    Route::put('/manage-user/edit-user/{id}', 'UpdateUser')->name('admin.edit-user.update');
    Route::delete('/manage-user/delete-user/{id}', 'deleteUser')->name('admin.delete-user.destroy');
});

Route::controller(\App\Http\Controllers\PickupController::class)->group(function () {
    Route::get('/schedule', 'indexSchedule')->name('schedule.index');
    Route::get('/schedule/schedule-form', 'showFormPickup')->name('schedule.form');
    Route::post('/schedule/schedule-form', 'storeFormPickup')->name('schedule.store');
    Route::get('/schedule/schedule-form/edit/{pickupRequest}', 'showUpdateFormPickup')->name('schedule-edit.form');
    Route::put('/schedule/schedule-form/edit/{pickupRequest}', 'updateFormPickup')->name('schedule.update');
    Route::get('/request-pickup', 'indexRequestPickup')->name('admin.request-pickup.index');
    Route::get('/request-pickup/detail-pickup/{id}', 'indexDetailPickup')->name('admin.detail-pickup.index');
    Route::post('/request-pickup/verify-sorted/{pickupRequest}', 'verifySorted')->name('admin.verify-sorted.update');
});

Route::controller(\App\Http\Controllers\TransactionController::class)->group(function () {
    Route::get('/transaction-form', 'showTransaction')->name('transaction.form');
    Route::post('/transaction-form', 'storeTransaction')->name('transaction.store');
});

Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
    Route::get('/edit-profile', 'indexEditProfile')->name('admin.edit-profile.index');
    Route::get('/dashboard', 'indexStatistic')->name('admin.statistic.index');
    Route::get('/manage-user', 'indexManageUser')->name('admin.manage-user.index');
    Route::get('/manage-user/add-user', 'indexAddUser')->name('admin.add-user.index');
    Route::get('/manage-user/edit-user/{id}', 'indexEditUser')->name('admin.edit-user.index');

    Route::get('/transaction', 'indexTransaction')->name('admin.transaction.index');
    Route::get('/transaction/add-transaction', 'indexAddTransaction')->name('admin.add-transaction.index');
});
