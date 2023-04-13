<x-admin-edit :actions="$actions" :title="$title">
    <form class="card border shadow-xl card-compact" action="{{ $action }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            @include('admin.users.partials.form')

            <button type="submit" class="btn">{{ trans('Update') }}</button>
        </div>
    </form>
</x-admin-edit>

