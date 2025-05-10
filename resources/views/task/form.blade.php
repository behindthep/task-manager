@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mb-3">
    {{  html()->label('Status', 'status')->class('form-label') }}
    {{  html()->input('text', 'status')->class('form-control') }}
</div>
<div class="mb-3">
    {{  html()->label('Name', 'name')->class('form-label') }}
    {{  html()->input('text', 'name')->class('form-control') }}
</div>
<div class="mb-3">
    {{  html()->label('Author', 'author')->class('form-label') }}
    {{  html()->input('text', 'author')->class('form-control') }}
</div>
<div class="mb-3">
    {{  html()->label('Executor', 'executor')->class('form-label') }}
    {{  html()->input('text', 'executor')->class('form-control') }}
</div>
