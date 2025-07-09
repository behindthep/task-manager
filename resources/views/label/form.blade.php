@php
    use App\Http\Helpers\FormStyles;
    $inputField = FormStyles::inputField();
@endphp

{{  html()->label(__('label.name'), 'name')->class('form-label') }}
{{  html()->input('text', 'name')->class($inputField) }}

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-rose-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{  html()->label(__('label.description'), 'description')->class('form-label') }}
{{  html()->textarea('description')->class($inputField) }}
