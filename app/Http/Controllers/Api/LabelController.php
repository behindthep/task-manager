<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Label;
use Illuminate\Http\JsonResponse;

class LabelController extends Controller
{
    // GET /labels — список с фильтром по имени и пагинацией
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

    // GET /labels/{id} — получить метку по ID
    public function show(int $id): JsonResponse
    {
        $label = Label::find($id);

        if (!$label) {
            return response()->json(['message' => 'Label not found'], 404);
        }

        return response()->json($label);
    }

    // POST /labels — создать метку (auth)
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:50|min:1',
            'description' => 'nullable|string|max:255|min:1',
        ]);

        $data['created_by_id'] = $request->user()->id;

        $label = Label::create($data);

        return response()->json($label, 201);
    }

    // PATCH /labels/{id} — обновить метку (auth)
    public function update(Request $request, int $id): JsonResponse
    {
        $label = Label::find($id);

        if (!$label) {
            return response()->json(['message' => 'Label not found'], 404);
        }

        $data = $request->validate([
            'name' => 'sometimes|string|max:50|min:1',
            'description' => 'sometimes|nullable|string|max:255|min:1',
        ]);

        $label->fill($data);
        $label->save();

        return response()->json($label);
    }

    // DELETE /labels/{id} — удалить метку (auth)
    public function destroy(int $id): JsonResponse
    {
        $label = Label::find($id);

        if (!$label) {
            return response()->json(['message' => 'Label not found'], 404);
        }

        $label->delete();

        return response()->json(null, 204);
    }
}
