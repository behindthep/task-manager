<div class="bg-gray-700 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex h-14 justify-center hidden sm:-my-px sm:ms-10 sm:flex mt-2 space-x-8">
        <x-footer-link :href="route('docs.api')" target="_blank">
            {{ __('Api') }}
        </x-footer-link>
        <x-footer-link href="https://github.com/behindthep/task-manager" target="_blank">
            {{ __('Github') }}
        </x-footer-link>
    </nav>
</div>
