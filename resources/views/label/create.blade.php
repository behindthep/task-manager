@extends('layouts.app')

@section('content')
    {{ html()->modelForm($label, 'POST', route('labels.store'))->open() }}
        @include('label.form')
        {{ html()->submit('Save')->class('btn btn-primary') }}
    {{ html()->closeModelForm() }}
@endsection
