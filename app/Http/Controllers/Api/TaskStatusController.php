<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\TaskStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TaskStatus\StoreTaskStatusRequest;
use App\Http\Requests\TaskStatus\UpdateTaskStatusRequest;

class TaskStatusController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index']);
        $this->authorizeResource(TaskStatus::class, 'task_status');
    }

    public function index(Request $request): JsonResponse
    {
        $query = TaskStatus::query();
        return $this->getFilteredResponse($request, $query, 'task_statuses');
    }

    public function store(StoreTaskStatusRequest $request): JsonResponse
    {
        $status = TaskStatus::create([
            ...$request->validated(),
            'created_by_id' => $request->user()->id,
        ]);

        return response()->json($status, 201);
    }

    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus): JsonResponse
    {
        $taskStatus->update($request->validated());

        return response()->json($taskStatus);
    }

    public function destroy(TaskStatus $taskStatus): JsonResponse
    {
        if ($taskStatus->tasks()->exists()) {
            return response()->json([
                'message' => __('task_status.has_tasks'),
            ], 409);
        }

        $taskStatus->delete();

        return response()->json(null, 204);
    }
}
