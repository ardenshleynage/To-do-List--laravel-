<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', [TodoController::class, 'homepage'])->name('homepage');
Route::get('/menu', [TodoController::class, 'menu'])->name('menu');
Route::get('/all', [TodoController::class, 'allTasks'])->name('allTasks');
Route::get('/low', [TodoController::class, 'lowTasks'])->name('lowTasks');
Route::get('/mid', [TodoController::class, 'midTasks'])->name('midTasks');
Route::get('/high', [TodoController::class, 'highTasks'])->name('highTasks');
Route::get('/add', [TodoController::class, 'add'])->name('add');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('tasks.edit');
Route::get('/alert/{id}', [TodoController::class, 'alertmessage'])->name('alert');
Route::put('/tasks/{id}', [TodoController::class, 'update'])->name('tasks.update');
Route::post('/tasks/store', [TodoController::class, 'store'])->name('tasks.store');
Route::get('/current-time', [TodoController::class, 'getCurrentTime']);
Route::delete('/tasks/{id}', [TodoController::class, 'destroy'])->name('tasks.destroy');
