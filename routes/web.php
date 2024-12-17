<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('tasks', [TaskController::class, 'index'])->name('tasks');
    Route::post('task', [TaskController::class, 'store'])->name('task.store');
    Route::put('task/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::patch('task/{id}', [TaskController::class, 'toggleStatus'])->name('task.toggleStatus');
    Route::delete('task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
    Route::put('tasks/bulk-action', [TaskController::class, 'bulkAction'])->name('tasks.bulkAction');
});
