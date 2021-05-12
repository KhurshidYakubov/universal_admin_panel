@if ($paginator->hasPages())
    <nav aria-label="" class="pagination-nav">
        <ul class="pagination">

            @if ($paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link">{{ __('main.previous') }}</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                       rel="prev">{{ __('main.previous') }}</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item"><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" >{{ $page }}</a></li>
                        @else
                            <li class="page-item "><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">{{ __('main.next') }}</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link">{{ __('main.next') }}</a>
                </li>
            @endif
        </ul>
    </nav>
@endif


