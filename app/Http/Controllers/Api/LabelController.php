<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Label;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Label\StoreLabelRequest;
use App\Http\Requests\Label\UpdateLabelRequest;

class LabelController extends ApiController
{
    public function index(Request $request): JsonResponse
    {
        $query = Label::query();
        return $this->getFilteredResponse($request, $query, 'labels');
    }

    public function store(StoreLabelRequest $request): JsonResponse
    {
        $label = Label::create([
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
