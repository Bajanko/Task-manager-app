<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('auth.login');
});
Route::get('/dashboard', function () {
    $tasks = \App\Models\Task::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
    $completedCount = $tasks->where('is_completed', true)->count();
    $pendingCount = $tasks->where('is_completed', false)->count();
    return view('dashboard', compact('tasks', 'completedCount', 'pendingCount'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/tasks', [TaskController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('task-list');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Task Routes
    Route::resource('tasks', TaskController::class);

    // User Routes
    Route::resource('users', UserController::class);
  
});

require __DIR__.'/auth.php';
