<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TaskStatusController,
    LabelController,
    TaskController,
};

Route::view('/', 'dashboard')->name('dashboard');

Route::view('/docs', 'scribe.index')->name('docs');

Route::resources([
    'task_statuses' => TaskStatusController::class,
    'labels' => LabelController::class,
    'tasks' => TaskController::class
]);

require __DIR__.'/auth.php';
