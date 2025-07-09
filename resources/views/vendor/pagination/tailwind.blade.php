@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between">
        <div class="flex-1 flex justify-start">
            <span class="text-sm text-gray-700">
                Показано {{ $paginator->firstItem() }} до {{ $paginator->lastItem() }} из {{ $paginator->total() }} результатов
            </span>
        </div>

        <div class="hidden sm:flex sm:justify-end">
            <ul class="inline-flex -space-x-px">
                {{-- Предыдущая страница --}}
                @if ($paginator->onFirstPage())
                    <li>
                        <span class="cursor-default px-3 py-2 text-gray-500">&laquo;</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-blue-600 hover:bg-blue-100">&laquo;</a>
                    </li>
                @endif

                @foreach ($elements as $element)
                    {{-- "Точки" между страницами --}}
                    @if (is_string($element))
                        <li>
                            <span class="cursor-default px-3 py-2 text-gray-500">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Номера страниц --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span class="z-10 px-3 py-2 text-blue-600 bg-blue-100 border border-blue-300">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="px-3 py-2 text-gray-700">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Следующая страница --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-blue-600 hover:bg-blue-100">&raquo;</a>
                    </li>
                @else
                    <li>
                        <span class="cursor-default px-3 py-2 text-gray-500">&raquo;</span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
