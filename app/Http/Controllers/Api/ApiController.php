<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ApiController extends Controller
{
    private array $filters = [
        'tasks' => ['status_id', 'created_by_id', 'assigned_to_id'],
        'labels' => ['name'],
        'task_statuses' => ['name']
    ];

    protected function getFilteredResponse(Request $request, Builder $query, string $resourceKey): JsonResponse
    {
        $filteredQuery = $this->getFilteredQuery($request, $query, $resourceKey);
        $paginator = $this->makePaginator($request, $filteredQuery);

        return response()->json([
            'total' => $paginator->total(),
            $resourceKey => $paginator->items(),
            'page' => $paginator->currentPage(),
        ]);
    }

    private function getFilteredQuery(Request $request, Builder $query, string $resourceKey): Builder
    {
        foreach ($this->filters[$resourceKey] as $field) {
            if ($request->has($field)) {
                if ($field === 'name') {
                    $query->whereLike($field, "%{$request->query($field)}%");
                } else {
                    $query->where($field, $request->query($field));
                }
            }
        }

        return $query;
    }

    private function makePaginator(Request $request, Builder $query): LengthAwarePaginator
    {
        $page = max(1, (int) $request->query('page', 1));
        $perPage = 10;

        return $query->paginate($perPage, ['*'], 'page', $page);
    }
}
