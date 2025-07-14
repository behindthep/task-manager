<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TaskStatus\StoreTaskStatusRequest;
use App\Http\Requests\TaskStatus\UpdateTaskStatusRequest;

class TaskStatusController extends Controller
{
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

    public function store(StoreTaskStatusRequest $request): JsonResponse
    {
        $status = TaskStatus::create([
            ...$request->validated(),
            'created_by_id' => $request->user()->id,
        ]);

        return response()->json($status, 201);
    }

    public function update(UpdateTaskStatusRequest $request, int $id): JsonResponse
    {
        $status = TaskStatus::find($id);

        if (!$status) {
            return response()->json(['message' => __('task_status.api.not_found')], 404);
        }

        $status->update($request->validated());

        return response()->json($status);
    }

    public function destroy(int $id): JsonResponse
    {
        $status = TaskStatus::find($id);

        if (!$status) {
            return response()->json(['message' => __('task_status.api.not_found')], 404);
        }

        $status->delete();

        return response()->json(null, 204);
    }
}
