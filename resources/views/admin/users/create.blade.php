<x-admin-create :actions="$actions" :title="$title">
    <form class="card border shadow-xl card-compact" action="{{ $action }}" method="POST">
        @csrf
        <div class="card-body">
            @include('admin.users.partials.form')

            <x-forms.inputs.password
                name="password"
                label="{{ trans('admin.users.password.label') }}"
                required/>
            <button type="submit" class="btn">{{ trans('Create') }}</button>
        </div>
    </form>
</x-admin-create>
