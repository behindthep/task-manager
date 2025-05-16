<?php

namespace App\Http\Controllers;

use App\Http\Requests\Label\StoreLabelRequest;
use App\Http\Requests\Label\UpdateLabelRequest;
use App\Models\Label;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Label::class);
    }

    public function index(): View
    {
        $labels = Label::paginate();
        return view('label.index', compact('labels'));
    }

    public function create(): View
    {
        $label = new Label();
        return view('label.create', compact('label'));
    }

    public function store(StoreLabelRequest $request): RedirectResponse
    {
        Label::create($request->validated());
        flash()->success(__('label.stored'));
        return redirect(route('labels.index'));
    }

    public function edit(Label $label): View
    {
        return view('label.edit', ['label' => $label,]);
    }

    public function update(UpdateLabelRequest $request, Label $label): RedirectResponse
    {
        $label->update($request->validated());
        flash()->success(__('label.updated'));
        return redirect(route('labels.index'));
    }

    public function destroy(Label $label): RedirectResponse
    {
        if ($label->tasks()->exists()) {
            flash()->error(__('label.has_tasks'));
            return back()->withErrors([
                'message' => __('label.has_tasks'),
            ]);
        }

        $label->delete();
        flash()->success(__('label.deleted'));
        return redirect(route('labels.index'));
    }
}
