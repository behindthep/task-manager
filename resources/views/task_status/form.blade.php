{{  html()->label(__('task_status.name'), 'name')->class('form-label') }}
{{  html()->input('text', 'name')->class('rounded border-gray-300 w-full mt-1 mb-3') }}

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-rose-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
