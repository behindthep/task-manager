@extends('layouts.app')

@section('content')
    {{ html()->modelForm($task, 'PATCH', route('task_statuses.update', $taskStatus))->open() }}
        @include('task_status.form')
        {{ html()->submit('Update')->class('btn btn-primary') }}
    {{ html()->closeModelForm() }}
@endsection
