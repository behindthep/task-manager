<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskStatus;
use Illuminate\Http\JsonResponse;

class TaskStatusController extends Controller
{
    // GET /task_statuses — список с фильтром по имени и пагинацией
    public function index(Request $request): JsonResponse
    {
        $query = TaskStatus::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->query('name') . '%');
        }

        $page = max(1, (int) $request->query('page', 1));
        $perPage = 10;

        $paginator = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'total' => $paginator->total(),
            'task_statuses' => $paginator->items(),
            'page' => $paginator->currentPage(),
        ]);
    }

    // POST /task_statuses — создать статус (auth)
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:50|min:1',
            // created_by_id игнорируем из тела, берем из auth
        ]);

        $data['created_by_id'] = $request->user()->id;

        $status = TaskStatus::create($data);

        return response()->json($status, 201);
    }

    // PATCH /task_statuses/{id} — обновить статус (auth)
    public function update(Request $request, int $id): JsonResponse
    {
        $status = TaskStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Task status not found'], 404);
        }

        $data = $request->validate([
            'name' => 'sometimes|string|max:50|min:1',
        ]);

        $status->fill($data);
        $status->save();

        return response()->json($status);
    }

    // DELETE /task_statuses/{id} — удалить статус (auth)
    public function destroy(int $id): JsonResponse
    {
        $status = TaskStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Task status not found'], 404);
        }

        $status->delete();

        return response()->json(null, 204);
    }
}
