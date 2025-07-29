<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'homepage'])->name('home');
Route::get('/All Todos', [TodoController::class, 'allTodos'])->name('todos');
Route::post('/store', [TodoController::class, 'storeTodo'])->name('store');
Route::get('/delete/{id}', [TodoController::class, 'deleteTodo'])->name('delete');
Route::get('/edit/{id}', [TodoController::class, 'editTodo'])->name('edit');
Route::post('/update/{id}', [TodoController::class, 'updateTodo'])->name('update');
Route::get('/complete/{id}', [TodoController::class, 'markComplete'])->name('complete');
