@extends('layouts.app')

@section('content')
    {{ html()->modelForm($label, 'PATCH', route('labels.update', $label))->open() }}
        @include('label.form')
        {{ html()->submit('Update')->class('btn btn-primary') }}
    {{ html()->closeModelForm() }}
@endsection
