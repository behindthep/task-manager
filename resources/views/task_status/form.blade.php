@php
    use App\Http\Helpers\FormStyles;
    $commonClasses = FormStyles::commonClasses();
@endphp

{{  html()->label(__('task_status.name'), 'name') }}
{{  html()->input('text', 'name')->class($commonClasses) }}

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-rose-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
