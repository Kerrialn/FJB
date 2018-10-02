@if ($paginator->hasPages())
    <ul class="pagination center-align" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        @else
            <li class="waves-effect">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="material-icons">chevron_left</i></a>                
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="waves-effect" aria-disabled="true"><a href="#!">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><a href="#!">{{ $page }}</a></li>
                    @else
                        <li class="waves-effect"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="material-icons">chevron_right</i></a>
            </li>
        @else
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
@endif
