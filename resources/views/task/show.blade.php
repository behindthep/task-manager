@extends('layouts.app')

@section('title', __('task.task_view'))

@section('content')
    <div class="place-self-center lg:col-span-7">
        <div class="grid col-span-full mb-4">
            <div>
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-4xl xl:text-4xl">
                    {{ $task->name }}
                    @can('update', $task)
                        <a href="{{ route('tasks.edit', $task) }}">&#9881;</a>
                    @endcan
                </h1>
                <p class="my-1">{{ __('task.name') }}: {{ $task->name }}</p>
                <p class="my-1">{{ __('task.status') }}: {{ $task->status->name }}</p>
                <p class="my-1">{{ __('task.description') }}: {{ $task->description }}</p>
            </div>
            @if ($task->labels->isNotEmpty())
            <div class="flex my-1">
                    <p class="mr-1">{{ __('task.labels') }}:</p>
                    @foreach($task->labels as $label)
                        <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full me-1">
                            <svg xmlns="https://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            {{ $label->name }}
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="place-self-center mt-7">
            <a href="{{ route('tasks.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-5 border border-gray-400 rounded shadow" target="_self">
                {{ __('To tasks') }}
            </a>
        </div>
    </div>
@endsection
