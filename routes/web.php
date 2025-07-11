<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'homepage'])->name('home');
Route::get('/All Todos', [TodoController::class, 'allTodos'])->name('todos');
Route::post('/store', [TodoController::class, 'storeTodo'])->name('store');