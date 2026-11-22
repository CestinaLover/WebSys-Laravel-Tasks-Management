<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskManagementController;

// Public pages - accessible without login
Route::get('/', [TaskController::class, 'welcome'])->name('home');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');

Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::get('/about', [PageController::class, 'about'])->name('about');

// Protected dashboard
Route::get('/dashboard', function () {
    return redirect()->route('tasks');
})->middleware('auth')->name('dashboard');

// Protected task management
Route::middleware('auth')->group(function () {

    Route::get('/tasks/new', [TaskManagementController::class, 'create'])
        ->name('tasks.create');

    Route::post('/tasks', [TaskManagementController::class, 'store'])
        ->name('tasks.store');

    Route::get('/tasks/{task}/edit', [TaskManagementController::class, 'edit'])
        ->name('tasks.edit');

    Route::patch('/tasks/{task}', [TaskManagementController::class, 'update'])
        ->name('tasks.update');

    Route::delete('/tasks/{task}', [TaskManagementController::class, 'destroy'])
        ->name('tasks.destroy');

    // Breeze account management
    Route::get('/account', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/account', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/account', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Breeze authentication routes
require __DIR__.'/auth.php';
