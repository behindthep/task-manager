<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    // GET /tasks — публичный список с фильтрами и пагинацией
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

    // GET /tasks/{id} — получить задачу по ID
    public function show(int $id): JsonResponse
    {
        $task = Task::with('labels')->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    // POST /tasks — создать задачу (требует auth)
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|min:1',
            'description' => 'nullable|string|max:255|min:1',
            'status_id' => 'required|integer|exists:task_statuses,id',
            'assigned_to_id' => 'nullable|integer|exists:users,id',
            // created_by_id игнорируем из тела, берем из аутентификации
            'labels' => 'nullable|array',
            'labels.*' => 'integer|exists:labels,id',
        ]);

        $data['created_by_id'] = $request->user()->id;

        $task = Task::create($data);

        if (!empty($data['labels'])) {
            $task->labels()->sync($data['labels']);
        }

        $task->load('labels');

        return response()->json($task, 201);
    }

    // PATCH /tasks/{id} — обновить задачу (требует auth)
    public function update(Request $request, int $id): JsonResponse
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $data = $request->validate([
            'name' => 'sometimes|string|min:1|max:100',
            'description' => 'sometimes|nullable|string|min:1|max:255',
            'status_id' => 'sometimes|integer|exists:task_statuses,id',
            'assigned_to_id' => 'sometimes|nullable|integer|exists:users,id',
            'labels' => 'sometimes|array',
            'labels.*' => 'integer|exists:labels,id',
        ]);

        $task->fill($data);
        $task->save();

        if (array_key_exists('labels', $data)) {
            $task->labels()->sync($data['labels']);
        }

        $task->load('labels');

        return response()->json($task);
    }

    // DELETE /tasks/{id} — удалить задачу (требует auth)
    public function destroy(int $id): JsonResponse
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(null, 204);
    }
}
