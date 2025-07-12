<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    TaskStatusController,
    LabelController,
    TaskController,
    PageController,
};

Route::view('/', 'dashboard')->name('dashboard');

Route::resources([
    'task_statuses' => TaskStatusController::class,
    'labels' => LabelController::class,
    'tasks' => TaskController::class
]);

Route::fallback([PageController::class, 'notFound'])->middleware('web');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
