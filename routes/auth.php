<?php

use App\Http\Controllers\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('register', [RegisterUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisterUserController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {});
