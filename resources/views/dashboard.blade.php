<x-app-layout>
    <x-slot:title>{{ __('Task manager')}}</x-slot:title>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mr-auto place-self-center lg:col-span-7">
                        <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl">
                            {{ __('Hello!') }}       
                        </h1>
                        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
                            {{ __('It is simple task manager!') }}        
                        </p>
                        <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                            <a href="/tasks" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow" target="_self">
                                {{ __('Tasks') }}
                            </a>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
