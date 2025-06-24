<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;


Route::post('login', [UserController::class, 'login']);

Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::resource('user', UserController::class);

    Route::resource('category', CategoryController::class);

    Route::resource('task', TaskController::class);

    Route::get('profile', [UserController::class, 'profile']);
});
