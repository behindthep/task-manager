@extends('layouts.app')

@section('content')
    <h1>{{ __('label.index') }} </h1>
    <a class="text-decoration-none" href="{{ route('labels.create') }}">{{ __('label.create') }}</a>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <td>{{ __('label.id') }}</td>
                    <td>{{ __('label.name') }}</td>
                    <td>{{ __('label.description') }}</td>
                    <td>{{ __('label.created_at') }}</td>
                    <td>{{ __('label.actions') }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach($labels as $label)
                    <tr>
                        <td>{{$label->id}}</td>
                        <td><a class="text-decoration-none" href="{{route('labels.show', $label->id)}}">{{$label->name}}</a></td>
                        <td>{{$label->description}}</td>
                        <td>{{$label->created_at}}</td>
                        <td>
                            <a class="text-decoration-none" href="{{route('labels.edit', $label->id)}}">{{ __('label.edit') }}</a>
                            <a class="text-decoration-none link-danger" href="{{route('labels.destroy', $label->id)}}" data-confirm="Are you sure?" data-method="delete" rel="nofollow">{{ __('label.destroy') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$labels->links()}}
    <div>
@endsection
