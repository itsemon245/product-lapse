@if ($paginator->hasPages())
    <nav class="navigation pagination text-center mt_60" role="navigation">
        <div class="nav-links">
            @if (!$paginator->onFirstPage())
                <a class="next page-numbers" href="{{ $paginator->previousPageUrl() }}"><i class="ti-arrow-left"></i></a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span class="page-numbers">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="page-numbers current">{{ $page }}</span>
                        @else
                            <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="ti-arrow-right"></i></a>
            @endif
        </div>
    </nav>
@endif
