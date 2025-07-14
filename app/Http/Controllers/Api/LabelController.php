<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Label;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Label\StoreLabelRequest;
use App\Http\Requests\Label\UpdateLabelRequest;

class LabelController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Label::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->query('name') . '%');
        }

        $page = max(1, (int) $request->query('page', 1));
        $perPage = 10;

        $paginator = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'total' => $paginator->total(),
            'labels' => $paginator->items(),
            'page' => $paginator->currentPage(),
        ]);
    }

    public function store(StoreLabelRequest $request): JsonResponse
    {
        $label =  Label::create([
            ...$request->validated(),
            'created_by_id' => $request->user()->id,
        ]);

        return response()->json($label, 201);
    }

    public function update(UpdateLabelRequest $request, int $id): JsonResponse
    {
        $label = Label::find($id);

        if (!$label) {
            return response()->json(['message' => __('label.api.not_found')], 404);
        }

        $label->update($request->validated());

        return response()->json($label);
    }

    public function destroy(int $id): JsonResponse
    {
        $label = Label::find($id);

        if (!$label) {
            return response()->json(['message' => __('label.api.not_found')], 404);
        }

        $label->delete();

        return response()->json(null, 204);
    }
}
