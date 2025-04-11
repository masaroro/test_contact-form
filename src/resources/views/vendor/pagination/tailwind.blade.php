@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination-container">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item disabled"><span aria-disabled="true">&lt;</span></li>
            @else
                <li class="pagination-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-item disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-item active"><span aria-current="page">{{ $page }}</span></li>
                        @else
                            <li class="pagination-item"><a href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a></li>
            @else
                <li class="pagination-item disabled"><span aria-disabled="true">&gt;</span></li>
            @endif
        </ul>
    </nav>
@endif