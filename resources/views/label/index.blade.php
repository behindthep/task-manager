@extends('layouts.app')

@section('content')
    <div class="mr-auto place-self-center lg:col-span-7">
        <div class="grid col-span-full">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-4xl xl:text-4xl">
                {{ __('label.index') }}
            </h1>
            <div class="mb-2 mt-1">
                @can('create', App\Models\Label::class)
                    {{ html()->a(route('labels.create'), __('label.create'))
                        ->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow') }}
                @endcan
            </div>

            <div>
                {{  html()->form('GET', route('labels.index'))->open() }}
                    {{  html()->input('text', 'name', $inputName)
                        ->class('rounded border-gray-300 my-3')
                        ->placeholder(__('label.name'))
                    }}
                    {{ html()->submit(__('label.accept_filter'))
                        ->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow my-3') }}
                {{ html()->form()->close() }}
            </div>

            <table class="table my-2">
                <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th scope="col" class="py-2 px-1">{{ __('label.id') }}</th>
                        <th scope="col" class="py-2 px-1">{{ __('label.name') }}</th>
                        <th scope="col" class="py-2 px-1">{{ __('label.description') }}</th>
                        <th scope="col" class="py-2 px-1">{{ __('label.created_by_id') }}</th>
                        <th scope="col" class="py-2 px-1">{{ __('label.created_at') }}</th>
                        @auth
                            <th scope="col" class="py-2 px-1">{{ __('label.actions') }}</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($labels as $label)
                        <tr class="border-b border-black text-left">
                            <td class="py-2 px-1">{{ $label->id }}</td>
                            <td class="py-2 px-1">{{ $label->name }}</td>
                            <td class="py-2 px-1">{{ $label->description }}</td>
                            <td class="py-2 px-1">{{ $label->createdBy->name }}</td>
                            <td class="py-2 px-1">{{ $label->created_at->format('d.m.Y') }}</td>
                            <td class="py-2 px-1">
                                @can('update', $label)
                                    {{ html()->a(route('labels.edit', $label), __('label.edit'))
                                        ->class('btn btn-sm btn-outline-primary text-blue-600 hover:text-blue-800 pr-1') }}
                                @endcan
                                @can('delete', $label)
                                    {{ html()->a(route('labels.destroy', $label), __('label.destroy'))
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

            {{ $labels->links() }}
        </div>
    </div>
@endsection
