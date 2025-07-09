@php
    use App\Http\Helpers\FormStyles;
    $inputField = FormStyles::inputField();
@endphp

{{  html()->label(__('task.name'), 'name')->class('form-label') }}
{{  html()->input('text', 'name')->class($inputField) }}

@error('name')
    <div class="text-rose-600">{{ $message }}</div>
@enderror

{{  html()->label(__('task.description'), 'description')->class('form-label') }}
{{  html()->textarea('description')->class($inputField) }}

{{  html()->label(__('task.status'), 'status_id')->class('form-label') }}
{{  html()->select('status_id', $statuses)->class($inputField)
    ->placeholder('')
}}

@error('status_id')
    <div class="text-rose-600">{{ $message }}</div>
@enderror

{{  html()->label(__('task.executor'), 'assigned_to_id')->class('form-label') }}
{{  html()->select('assigned_to_id', $assignees)->class($inputField)
    ->placeholder('')
}}

{{ html()->label(__('task.labels'), 'labels[]')->class('form-label') }}
<div class="scrollable-checkbox-list">
    @foreach($labels as $id => $name)
        <div>
            <input type="checkbox" name="labels[]" value="{{ $id }}"
                {{ in_array($id, $selectedLabels) ? 'checked' : '' }} id="label-{{ $id }}">
            <label for="label-{{ $id }}">{{ $name }}</label>
        </div>
    @endforeach
</div>
