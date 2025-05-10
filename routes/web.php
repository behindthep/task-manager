<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TaskController, TaskStatusController, LabelController
};

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'tasks' => TaskController::class,
    'tasks_statuses' => TaskStatusController::class,
    'labels' => LabelController::class,
]);
