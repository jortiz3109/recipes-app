<form class="mb-3" action="{{ $action }}" method="GET">
    <div class="form-control">
        <div class="input-group">
            <input type="search" name="search" value="{{ request('search') }}" id="search"
                   placeholder="{{ trans('Search') }}" class="input input-bordered w-full"/>
            <a href="{{ $action }}" class="btn btn-square">
                <em class="fa-solid fa-eraser"></em>
            </a>
            <button class="btn btn-square">
                <em class="fa-solid fa-magnifying-glass"></em>
            </button>
        </div>
    </div>
</form>
