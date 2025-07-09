<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Http\Requests\TaskStatus\StoreTaskStatusRequest;
use App\Http\Requests\TaskStatus\UpdateTaskStatusRequest;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TaskStatus::class);
    }

    public function index(Request $request): View
    {
        $statuses = $request->get('name')
            ? TaskStatus::where('name', 'like', "%{$request->get('name')}%")->paginate(10)
            : TaskStatus::paginate(10);
        $inputName = $request->input('name');

        return view('task_status.index', compact('statuses', 'inputName'));
    }

    public function create(): View
    {
        $status = new TaskStatus();
        return view('task_status.create', compact('status'));
    }

    public function store(StoreTaskStatusRequest $request): RedirectResponse
    {
        TaskStatus::create([
            ...$request->validated(),
            'created_by_id' => auth()->id(),
        ]);

        flash()->success(__('task_status.stored'));
        return redirect(route('task_statuses.index'));
    }

    public function edit(TaskStatus $taskStatus): View
    {
        return view('task_status.edit', ['status' => $taskStatus]);
    }

    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->update($request->validated());

        flash()->success(__('task_status.updated'));
        return redirect(route('task_statuses.index'));
    }

    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        if ($taskStatus->tasks()->exists()) {
            flash()->error(__('task_status.has_tasks'));
            return back()->withErrors([
                'message' => __('task_status.has_tasks'),
            ]);
        }

        $taskStatus->delete();
        flash()->success(__('task_status.deleted'));
        return redirect(route('task_statuses.index'));
    }
}
