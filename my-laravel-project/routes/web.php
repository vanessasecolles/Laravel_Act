<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\TaskController;

// Default route
Route::get('/', function () {
    return view('welcome');
});

// New route for greeting
Route::get('/greet', [GreetController::class, 'index']);

// Resource route for tasks
Route::resource('tasks', TaskController::class);
