<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class TaskController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->authorizeResource(Task::class, 'task');
    }

    public function index(Request $request): JsonResponse
    {
        $query = Task::with('labels');
        return $this->getFilteredResponse($request, $query, 'tasks');
    }

    public function show(Task $task): JsonResponse
    {
        return response()->json($task);
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = DB::transaction(function () use ($request) {
            $data = Arr::except($request->validated(), ['labels']);
            $data['created_by_id'] = $request->user()->id;

            $task = Task::create($data);
            $task->labels()->sync($request->get('labels', []));

            return $task;
        });

        $task->load('labels');
        return response()->json($task, 201);
    }

    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        DB::transaction(function () use ($request, $task) {
            $data = Arr::except($request->validated(), ['labels']);
            $task->update($data);
            $task->labels()->sync($request->get('labels', []));
        });

        $task->load('labels');
        return response()->json($task);
    }

    public function destroy(Task $task): JsonResponse
    {
        $task->labels()->detach();
        $task->delete();
        return response()->json(null, 204);
    }
}
