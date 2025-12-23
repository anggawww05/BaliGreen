@props(['paginator'])

@if ($paginator->hasPages())
    <div class="m-4 p-2 flex flex-col sm:flex-row items-center justify-between gap-2">
        <div class="text-sm text-gray-600">
            @if ($paginator->total() > 0)
                Menampilkan {{ $paginator->firstItem() }} sampai {{ $paginator->lastItem() }} dari {{ $paginator->total() }} data
            @else
                Menampilkan 0 data
            @endif
        </div>

        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center mt-2 sm:mt-0">
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 mx-1 text-sm text-gray-400 bg-gray-100 rounded">&laquo; Prev</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 mx-1 text-sm text-gray-700 bg-white border rounded hover:bg-gray-50">&laquo; Prev</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-1 mx-1 text-sm text-gray-500">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="px-3 py-1 mx-1 text-sm font-medium text-white bg-[#52a08a] rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-1 mx-1 text-sm text-gray-700 bg-white border rounded hover:bg-gray-50">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 mx-1 text-sm text-gray-700 bg-white border rounded hover:bg-gray-50">Next &raquo;</a>
            @else
                <span class="px-3 py-1 mx-1 text-sm text-gray-400 bg-gray-100 rounded">Next &raquo;</span>
            @endif
        </nav>
    </div>
@endif
