@extends('layouts.app')

@section('title', 'Страница не найдена')

@section('content')
    <div class="py-11 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 text-gray-900 bg-white overflow-hidden shadow-sm sm:rounded-lg flex">
            <div class="mr-auto place-self-center lg:col-span-7 p-4">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-4xl xl:text-5xl">
                    {{ __('errors.404.name') }}
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl whitespace-nowrap">
                    {{ __('errors.404.info') }}
                </p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4 justify-center">
                    <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow" target="_self">
                        {{ __('Home') }}
                    </a>
                </div>
            </div>
            <div class="w-1/3 p-4">
                <img src="{{ asset('images/errors/404.png') }}" alt="{{ __('errors.404.name') }}" class="w-full h-auto" />
            </div>
        </div>
    </div>
@endsection
