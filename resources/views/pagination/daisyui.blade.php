@if ($paginator->hasPages())
    <div class="my-3 text-center">
        @include('pagination.partials.daysiui-desktop')
        @include('pagination.partials.daysiui-mobile')
    </div>
@endif
