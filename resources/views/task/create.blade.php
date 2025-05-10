@extends('layouts.app')

@section('content')
    {{ html()->modelForm($task, 'POST', route('tasks.store'))->open() }}
        @include('task.form')
        {{ html()->submit('Save')->class('btn btn-primary') }}
    {{ html()->closeModelForm() }}
@endsection
