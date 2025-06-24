<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// categories
Route::get('categories', [CategoryController::class, 'index']);
Route::resource('categories', CategoryController::class);
Route::get('categories.records', [CategoryController::class, 'records'])->name('categories.records');


// tasks
Route::get('tasks', [TaskController::class, 'index']);
Route::resource('tasks', TaskController::class);
Route::get('tasks.records', [TaskController::class, 'records'])->name('tasks.records');