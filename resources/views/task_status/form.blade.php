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
    {{  html()->label('Name', 'Name')->class('form-label') }}
    {{  html()->input('text', 'Name')->class('form-control') }}
</div>
