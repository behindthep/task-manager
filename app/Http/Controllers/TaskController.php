<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

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

        return view('task.index', compact(
            'tasks',
            'users',
            'statuses',
            'filter'
        ));
    }

    public function create(): View
    {
        return view('task.create', [
            'task' => new Task(),
            'statuses' => TaskStatus::pluck('name', 'id'),
            'assignees' => User::pluck('name', 'id'),
            'labels' => Label::orderBy('name')->pluck('name', 'id'),
            'selectedLabels' => old('labels', []),
        ]);
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $task = Task::create([
                ...$request->except('labels'),
                'created_by_id' => auth()->id(),
            ]);
            $task->labels()->sync($request->get('labels', []));
        });

        flash()->success(__('task.stored'));
        return redirect(route('tasks.index'));
    }

    public function show(Task $task): View
    {
        return view('task.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        return view('task.edit', [
            'task' => $task,
            'statuses' => TaskStatus::pluck('name', 'id'),
            'assignees' => User::pluck('name', 'id'),
            'labels' => Label::orderBy('name')->pluck('name', 'id'),
            'selectedLabels' => old('labels', $task->labels->pluck('id')->toArray()),
        ]);
    }

    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        DB::transaction(function () use ($request, $task) {
            $task->update($request->except('labels'));
            $task->labels()->sync($request->get('labels', []));
        });

        flash()->success(__('task.updated'));
        return redirect(route('tasks.index'));
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->labels()->detach();
        $task->delete();
        flash()->success(__('task.deleted'));
        return redirect(route('tasks.index'));
    }
}
