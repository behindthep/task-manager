<?php

namespace App\Http\Controllers;

use App\Models\{
    Task,
    TaskStatus,
    User,
    Label
};
use Illuminate\Http\{
    Request,
    RedirectResponse
};
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Task\{
    StoreTaskRequest,
    UpdateTaskRequest
};
use Spatie\QueryBuilder\{
    QueryBuilder,
    AllowedFilter
};

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class);
    }

    public function index(Request $request): View
    {
        $tasks = QueryBuilder::for(Task::class)
        ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id'),
            ])
            ->with('status', 'assignedTo', 'createdBy')
            ->paginate(10);

        $users = User::pluck('name', 'id');
        $statuses = TaskStatus::pluck('name', 'id');
        $filter = $request->input('filter');

        return view('task.index', compact('tasks', 'users', 'statuses', 'filter'));
    }

    public function create(): View
    {
        return view('task.create', [
            'task' => new Task(),
            'statuses' => TaskStatus::pluck('name', 'id'),
            'assignees' => User::pluck('name', 'id'),
            'labels' => Label::all()
        ]);
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $task = Task::create([
                ...$request->except('labels'),
                'created_by_id' => auth()->id(),
            ]);
            $task->labels()->sync($request->get('labels'));
        });

        flash()->success(__('task.stored'));
        return redirect(route('tasks.index'));
    }

    public function show(Task $task): View
    {
        return view('task.show', ['task' => $task]);
    }

    public function edit(Task $task): View
    {
        return view('task.edit', [
            'task' => $task,
            'statuses' => TaskStatus::pluck('name', 'id'),
            'assignees' => User::pluck('name', 'id'),
            'labels' => Label::all()
        ]);
    }

    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $this->authorize('update', $task);

        DB::transaction(function () use ($request, $task) {
            $task->update($request->except('labels'));
            $task->labels()->sync($request->get('labels'));
        });

        flash()->success(__('task.updated'));
        return redirect(route('tasks.show', ['task' => $task]));
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->authorize('delete', $task);

        $task->labels()->detach();

        $task->delete();
        flash()->success(__('task.deleted'));
        return redirect(route('tasks.index'));
    }
}
