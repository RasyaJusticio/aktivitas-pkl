<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    });
});

require __DIR__ . '/auth.php';
