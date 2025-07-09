@extends('layouts.app')

@section('content')
    <div class="mr-auto place-self-center lg:col-span-7">
        <div class="grid col-span-full">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-4xl xl:text-4xl">
                {{ __('task_status.index') }}
            </h1>
            <div class="mb-2 mt-1">
                @can('create', App\Models\TaskStatus::class)
                    {{ html()->a(route('task_statuses.create'), __('task_status.create'))
                        ->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow') }}
                @endcan
            </div>

            <div>
                {{  html()->form('GET', route('task_statuses.index'))->open() }}
                    {{  html()->input('text', 'name', $inputName)
                        ->class('rounded border-gray-300 my-3')
                        ->placeholder(__('task_status.name'))
                        }}
                    {{ html()->submit(__('task_status.accept_filter'))
                        ->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow my-3') }}
                {{ html()->form()->close() }}
            </div>

            <table class="table my-2">
                <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th scope="col" class="py-2 px-1">{{ __('task_status.id') }}</th>
                        <th scope="col" class="py-2 px-1">{{ __('task_status.name') }}</th>
                        <th scope="col" class="py-2 px-1">{{ __('task_status.created_by_id') }}</th>
                        <th scope="col" class="py-2 px-1">{{ __('task_status.created_at') }}</th>
                        @auth
                            <th scope="col" class="py-2 px-1">{{ __('task_status.actions') }}</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($statuses as $status)
                        <tr class="border-b border-black text-left">
                            <td class="py-2 px-1">{{ $status->id }}</td>
                            <td class="py-2 px-1">{{ $status->name }}</td>
                            <td class="py-2 px-1">{{ $status->createdBy->name }}</td>
                            <td class="py-2 px-1">{{ $status->created_at->format('d.m.Y') }}</td>
                            <td class="py-2 px-1">
                                @can('update', $status)
                                    {{ html()->a(route('task_statuses.edit', $status), __('task_status.edit'))
                                        ->class('btn btn-sm btn-outline-primary text-blue-600 hover:text-blue-800 pr-1') }}
                                @endcan
                                @can('delete', $status)
                                    {{ html()->a(route('task_statuses.destroy', $status), __('task_status.destroy'))
                                        ->class('btn btn-sm btn-danger text-red-500 hover:text-red-600')
                                        ->attributes([
                                            'data-method' => 'delete',
                                            'data-confirm' => __('Are you sure?'),
                                            'rel' => 'nofollow'
                                        ]) }}
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $statuses->links() }}
        </div>
    </div>
@endsection
