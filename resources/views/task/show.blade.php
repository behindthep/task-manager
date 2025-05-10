@extends('layouts.app')

@section('content')
    {{$task->status}}
    {{$task->name}}
    {{$task->author}}
    {{$task->executor}}
@endsection
