@php
    use App\Http\Helpers\FormStyles;
    $commonClasses = FormStyles::commonClasses();
@endphp

{{ html()->label(__('task.name'), 'name') }}
{{ html()->input('text', 'name')->class($commonClasses) }}

@error('name')
    <div class="text-rose-600">{{ $message }}</div>
@enderror

{{ html()->label(__('task.description'), 'description') }}
{{ html()->textarea('description')->class($commonClasses) }}

{{ html()->label(__('task.status'), 'status_id') }}
{{ html()->select('status_id',
    $statuses)
    ->class($commonClasses)
    ->placeholder('')
}}

@error('status_id')
    <div class="text-rose-600">{{ $message }}</div>
@enderror

{{ html()->label(__('task.executor'), 'assigned_to_id') }}
{{ html()->select('assigned_to_id',
    $assignees)
    ->class($commonClasses)
    ->placeholder('')
}}

{{ html()->label(__('task.labels'), 'labels[]') }}
{{ html()->select('labels[]', $labels->pluck('name', 'id')->toArray())
    ->class($commonClasses)
    ->attributes(['size' => 5])
    ->multiple()
}}
