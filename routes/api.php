<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TaskStatusController;
use App\Http\Controllers\Api\LabelController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/task_statuses', [TaskStatusController::class, 'index']);
Route::get('/labels', [LabelController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::patch('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

    Route::post('/task_statuses', [TaskStatusController::class, 'store']);
    Route::patch('/task_statuses/{id}', [TaskStatusController::class, 'update']);
    Route::delete('/task_statuses/{id}', [TaskStatusController::class, 'destroy']);

    Route::post('/labels', [LabelController::class, 'store']);
    Route::patch('/labels/{id}', [LabelController::class, 'update']);
    Route::delete('/labels/{id}', [LabelController::class, 'destroy']);
});

