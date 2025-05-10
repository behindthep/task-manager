@extends('layouts.app')

@section('content')
    <h1>{{ __('task.index') }} </h1>
    <a class="text-decoration-none" href="{{ route('tasks.create') }}">{{ __('task.create') }}</a>
    <div class="my-2">
        {{  html()->form('GET', route('tasks.index'))->open() }}
                {{  html()->input('text', 'name', $inputName) }}
                {{  html()->submit('Search') }}
        {{ html()->form()->close() }}
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <td>{{ __('task.id') }}</td>
                    <td>{{ __('task.status') }}</td>
                    <td>{{ __('task.name') }}</td>
                    <td>{{ __('task.created_by_id') }}</td>
                    <td>{{ __('task.assigned_to_id') }}</td>
                    <td>{{ __('task.created_at') }}</td>
                    <td>{{ __('task.actions') }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->status}}</td>
                        <td><a class="text-decoration-none" href="{{route('tasks.show', $task->id)}}">{{$task->name}}</a></td>
                        <td>{{$task->author}}</td>
                        <td>{{$task->executor}}</td>
                        <td>{{$task->created_at}}</td>
                        <td>
                            <a class="text-decoration-none" href="{{route('tasks.edit', $task->id)}}">{{ __('task.edit') }}</a>
                            <a class="text-decoration-none link-danger" href="{{route('tasks.destroy', $task->id)}}" data-confirm="Are you sure?" data-method="delete" rel="nofollow">{{ __('task.destroy') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$tasks->links()}}
    <div>
@endsection
