@extends('layouts.app')

@section('content')
    <h1>{{ __('task_status.index') }} </h1>
    <a class="text-decoration-none" href="{{ route('task_statuses.create') }}">{{ __('task_status.create') }}</a>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <td>{{ __('task_status.id') }}</td>
                    <td>{{ __('task_status.name') }}</td>
                    <td>{{ __('task_status.created_at') }}</td>
                    <td>{{ __('task_status.actions') }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach($taskStatuses as $taskStatus)
                    <tr>
                        <td>{{$taskStatus->id}}</td>
                        <td><a class="text-decoration-none" href="{{route('task_statuses.show', $taskStatus->id)}}">{{$taskStatus->name}}</a></td>
                        <td>{{$taskStatus->created_at}}</td>
                        <td>
                            <a class="text-decoration-none" href="{{route('task_statuses.edit', $taskStatus->id)}}">{{ __('task_status.edit') }}</a>
                            <a class="text-decoration-none link-danger" href="{{route('task_statuses.destroy', $taskStatus->id)}}" data-confirm="Are you sure?" data-method="delete" rel="nofollow">{{ __('task_status.destroy') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$taskStatuses->links()}}
    <div>
@endsection
