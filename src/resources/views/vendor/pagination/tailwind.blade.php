@if ($paginator->hasPages())
    <nav class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="page disabled">&lt;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page">&lt;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span>{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="page">&gt;</a>
        @else
            <span class="page disabled">&gt;</span>
        @endif
    </nav>
@endif