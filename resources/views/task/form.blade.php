{{ html()->label(__('task.name'), 'name') }}
{{ html()->input('text', 'name')->class('rounded border-gray-300 w-1/3 mt-1 mb-3') }}

@error('name')
    <div class="text-rose-600">{{ $message }}</div>
@enderror

{{ html()->label(__('task.description'), 'description') }}
{{ html()->textarea('description')->class('rounded border-gray-300 w-1/3 mt-1 mb-3') }}

{{ html()->label(__('task.status'), 'status_id') }}
{{ html()->select('status_id',
    $statuses)
    ->class('rounded border-gray-300 w-1/3 mt-1 mb-3')
    ->placeholder('') 
}}

@error('status_id')
    <div class="text-rose-600">{{ $message }}</div>
@enderror

{{ html()->label(__('task.executor'), 'assigned_to_id') }}
{{ html()->select('assigned_to_id', 
    $assignees)
    ->class('rounded border-gray-300 w-1/3 mt-1 mb-3')
    ->placeholder('')
}}

{{ html()->label(__('task.labels'), 'labels[]') }}
{{ html()->select('labels[]', $labels->pluck('name', 'id')->toArray())
    ->class('rounded border-gray-300 w-1/3 mt-1 mb-3')
    ->multiple() }}
