@if ($paginator->hasPages())
    <div class="d-flex justify-content-center">
        <nav aria-label="" class="custom-pagination">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item">
                        <a class="page-link" aria-label="{{ __('main.previous') }}"> <i class="far fa-chevron-left"></i></a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                           rel="prev"><i class="fas fa-chevron-left"></i></a>
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
                                <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                            @else
                                <li class="page-item "><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                                class="fas fa-chevron-right"></i></a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link"><i class="fas fa-chevron-right"></i></a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
