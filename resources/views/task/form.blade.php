{{  html()->label(__('task.name'), 'name')->class('form-label') }}
{{  html()->input('text', 'name')->class('rounded border-gray-300 w-full mt-1 mb-3') }}

@error('name')
    <div class="text-rose-600">{{ $message }}</div>
@enderror

{{  html()->label(__('task.description'), 'description')->class('form-label') }}
{{  html()->textarea('description')->class('rounded border-gray-300 w-full mt-1 mb-3') }}

{{  html()->label(__('task.status'), 'status_id')->class('form-label') }}
{{  html()->select('status_id', $statuses)->class('rounded border-gray-300 w-full mt-1 mb-3')
    ->placeholder('')
}}

@error('status_id')
    <div class="text-rose-600">{{ $message }}</div>
@enderror

{{  html()->label(__('task.executor'), 'assigned_to_id')->class('form-label') }}
{{  html()->select('assigned_to_id', $assignees)->class('rounded border-gray-300 w-full mt-1 mb-3')
    ->placeholder('')
}}

{{ html()->label(__('task.labels'), 'labels[]')->class('form-label') }}
<input type="hidden" name="labels" value="">
<div class="scrollable-checkbox-list">
    @foreach($labels as $id => $name)
        <div>
            <input type="checkbox" name="labels[]" value="{{ $id }}"
                {{ in_array($id, $selectedLabels) ? 'checked' : '' }} id="label-{{ $id }}">
            <label for="label-{{ $id }}">{{ $name }}</label>
        </div>
    @endforeach
</div>
