@if (session()->has('flash_notification'))
    @foreach (session('flash_notification') as $flash)
        <div class="p-3 mb-4 border border-gray-300 text-gray-700">
            <div class="flex">
                <div class="flex-shrink-0">
                    <!-- Иконка для успеха -->
                    @if ($flash['level'] === 'success')
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20" xmlns="https://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-11.293l-3.293 3.293a1 1 0 001.414 1.414L10 9.414l2.879 2.879a1 1 0 001.414-1.414L10 6.707z" clip-rule="evenodd" />
                        </svg>
                    @elseif ($flash['level'] === 'warning')
                        <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20" xmlns="https://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-11.293l-3.293 3.293a1 1 0 001.414 1.414L10 9.414l2.879 2.879a1 1 0 001.414-1.414L10 6.707z" clip-rule="evenodd" />
                        </svg>
                    @elseif ($flash['level'] === 'error')
                        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20" xmlns="https://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-11.293l-3.293 3.293a1 1 0 001.414 1.414L10 9.414l2.879 2.879a1 1 0 001.414-1.414L10 6.707z" clip-rule="evenodd" />
                        </svg>
                    @endif
                </div>
                <div class="ml-2">
                    <p class="text-base font-normal">
                        {{ $flash['message'] }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endif
