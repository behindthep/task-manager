@extends('layouts.app')

@section('content')
    {{ html()->modelForm($taskStatus, 'POST', route('task_statuses.store'))->open() }}
        @include('task_status.form')
        {{ html()->submit('Save')->class('btn btn-primary') }}
    {{ html()->closeModelForm() }}
@endsection
