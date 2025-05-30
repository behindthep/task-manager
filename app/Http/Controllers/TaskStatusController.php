<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TaskStatus\StoreTaskStatusRequest;
use App\Http\Requests\TaskStatus\UpdateTaskStatusRequest;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TaskStatus::class);
    }

    public function index(): View
    {
        $statuses = TaskStatus::paginate(10);
        return view('task_status.index', compact('statuses'));
    }

    public function create(): View
    {
        $status = new TaskStatus();
        return view('task_status.create', compact('status'));
    }

    public function store(StoreTaskStatusRequest $request): RedirectResponse
    {
        TaskStatus::create([
            $request->validated(),
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
        $this->authorize('update', $taskStatus);

        $taskStatus->update($request->validated());
        flash()->success(__('task_status.updated'));
        return redirect(route('task_statuses.index'));
    }

    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        $this->authorize('update', $taskStatus);

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
