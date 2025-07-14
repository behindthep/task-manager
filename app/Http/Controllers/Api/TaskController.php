<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class TaskController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Task::with('labels');

        if ($request->has('status_id')) {
            $query->where('status_id', $request->query('status_id'));
        }
        if ($request->has('created_by_id')) {
            $query->where('created_by_id', $request->query('created_by_id'));
        }
        if ($request->has('assigned_to_id')) {
            $query->where('assigned_to_id', $request->query('assigned_to_id'));
        }

        $page = max(1, (int) $request->query('page', 1));
        $perPage = 10;

        $paginator = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'total' => $paginator->total(),
            'tasks' => $paginator->items(),
            'page' => $paginator->currentPage(),
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $task = Task::with('labels')->find($id);

        if (!$task) {
            return response()->json(['message' => __('task.api.not_found')], 404);
        }

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

    public function update(UpdateTaskRequest $request, int $id): JsonResponse
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => __('task.api.not_found')], 404);
        }

        DB::transaction(function () use ($request, $task) {
            $data = Arr::except($request->validated(), ['labels']);
            $task->update($data);
            $task->labels()->sync($request->get('labels', []));
        });

        $task->load('labels');
        return response()->json($task);
    }

    public function destroy(int $id): JsonResponse
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => __('task.api.not_found')], 404);
        }

        $task->delete();

        return response()->json(null, 204);
    }
}
