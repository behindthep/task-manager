@extends('layouts.app')

@section('content')
    {{ html()->modelForm($task, 'PATCH', route('tasks.update', $task))->open() }}
        @include('task.form')
        {{ html()->submit('Update')->class('btn btn-primary') }}
    {{ html()->closeModelForm() }}
@endsection
