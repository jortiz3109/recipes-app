<div class="md:hidden btn-group">
    {{-- Previous Page Link --}}
    @if($paginator->onFirstPage())
        <button class="btn btn-disabled" aria-disabled="true">
            {!! trans('pagination.previous') !!}
        </button>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="btn" rel="prev">
            {!! trans('pagination.previous') !!}
        </a>
    @endif
    @foreach ($elements as $element)
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="cursor-default btn btn-active" aria-current="page">{{ $page }}</span>
                @endif
            @endforeach
        @endif
    @endforeach
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="btn" rel="next">
            {!! trans('pagination.next') !!}
        </a>
    @else
        <button class="btn btn-disabled" aria-disabled="true">
            {!! trans('pagination.next') !!}
        </button>
    @endif
</div>
