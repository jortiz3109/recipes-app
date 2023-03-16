<div class="hidden md:flex justify-between">
    <div>
        <p class="small text-muted">
            {{ trans('Showing') }}
            <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
            {{ trans('to') }}
            <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
            {{ trans('of') }}
            <span class="fw-semibold">{{ $paginator->total() }}</span>
            {{ trans('results') }}
        </p>
    </div>
    <div>
        <div class="btn-group">
            {{-- Previous Page Link --}}
            @if($paginator->onFirstPage())
                <button class="btn btn-sm btn-disabled" aria-disabled="true">
                    {!! trans('pagination.previous') !!}
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm" rel="prev">
                    {!! trans('pagination.previous') !!}
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="btn btn-sm disabled" aria-disabled="true">{{ $element }}</button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="btn btn-sm btn-active" aria-current="page">{{ $page }}</button>
                        @else
                            <a class="btn btn-sm" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm" rel="next">
                    {!! trans('pagination.next') !!}
                </a>
            @else
                <button class="btn btn-sm btn-disabled" aria-disabled="true">
                    {!! trans('pagination.next') !!}
                </button>
            @endif
        </div>
    </div>
</div>
