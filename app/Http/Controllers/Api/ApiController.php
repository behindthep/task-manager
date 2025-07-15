<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ApiController extends Controller
{
    protected function getFilteredResponse(Request $request, Builder $query, string $resourceKey): JsonResponse
    {
        $filteredQuery = $this->getFilteredQuery($request, $query);
        $paginator = $this->makePaginator($request, $filteredQuery);

        return response()->json([
            'total' => $paginator->total(),
            $resourceKey => $paginator->items(),
            'page' => $paginator->currentPage(),
        ]);
    }

    private function getFilteredQuery(Request $request, Builder $query): Builder
    {
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->query('name') . '%');
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
