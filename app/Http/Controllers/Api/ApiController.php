<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ApiController extends Controller
{
    protected function paginateAndFilterByName(Request $request, Builder $query, string $resourceKey): JsonResponse
    {
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->query('name') . '%');
        }

        $page = max(1, (int) $request->query('page', 1));
        $perPage = 10;

        $paginator = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'total' => $paginator->total(),
            $resourceKey => $paginator->items(),
            'page' => $paginator->currentPage(),
        ]);
    }
}
