<x-app-layout >
    <x-slot:title>{{ __('Task manager')}}</x-slot:title>

    <div class="mr-auto place-self-center lg:col-span-7">
        <div class="grid col-span-full">
            <div>
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-4xl">
                    {{ __('task_status.index') }}
                </h1>
                @can('create', App\Models\TaskStatus::class)
                    {{ html()->a(route('task_statuses.create'), __('task_status.create'))->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow') }}
                @endcan
            </div>

            <table class="table mt-5">
                <thead class="border-b-2 border-solid border-black text-left">
                    <tr>
                        <th scope="col" class="py-2">{{ __('task_status.id') }}</th>
                        <th scope="col" class="py-2">{{ __('task_status.name') }}</th>
                        <th scope="col" class="py-2">{{ __('task_status.created_by_id') }}</th>
                        <th scope="col" class="py-2">{{ __('task_status.created_at') }}</th>
                        @auth
                            <th scope="col" class="py-2">{{ __('task_status.actions') }}</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($statuses as $status)
                        <tr class="border-b border-black text-left">
                            <td class="py-2">{{ $status->id }}</td>
                            <td class="py-2">{{ $status->name }}</td>
                            <td class="py-2">{{ $status->createdBy->name }}</td>
                            <td class="py-2">{{ $status->created_at->format('d.m.Y') }}</td>
                            <td class="py-2">
                                @can('delete', $status)
                                    {{ html()->a(route('task_statuses.destroy', $status), __('task_status.destroy'))
                                        ->class('btn btn-sm btn-danger text-red-600 hover:text-red-900')
                                        ->attributes([
                                            'data-method' => 'delete',
                                            'data-confirm' => __('Are you sure?'),
                                            'rel' => 'nofollow'
                                        ]) }}
                                @endcan
                                @can('update', $status)
                                    {{ html()->a(route('task_statuses.edit', $status), __('task_status.edit'))->class('btn btn-sm btn-outline-primary text-blue-600 hover:text-blue-900') }}
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{ $statuses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
