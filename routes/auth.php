<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(['middleware' => 'guest'], function () {});

Route::group(['middleware' => 'auth'], function () {});
