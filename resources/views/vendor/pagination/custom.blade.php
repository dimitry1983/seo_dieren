@if ($paginator->hasPages())
    <div class="pagination flex flex-wrap justify-center gap-2 gap-y-3 mt-6">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-gray-400 bg-white cursor-not-allowed" disabled>
                <i class="fa-solid fa-arrow-left-long"></i>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black bg-white hover:bg-primary hover:text-white transition duration-300 ease-out">
                <i class="fa-solid fa-arrow-left-long"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Dots (e.g. ...) --}}
            @if (is_string($element))
                <span class="w-10 h-10 flex items-center justify-center text-gray-400">...</span>
            @endif

            {{-- Page Numbers --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold bg-primary text-white">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black bg-white hover:bg-primary hover:text-white transition duration-300 ease-out">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-black bg-white hover:bg-primary hover:text-white transition duration-300 ease-out">
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        @else
            <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-lg font-semibold text-gray-400 bg-white cursor-not-allowed" disabled>
                <i class="fa-solid fa-arrow-right-long"></i>
            </button>
        @endif
    </div>
@endif