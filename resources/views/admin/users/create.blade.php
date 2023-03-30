<x-admin-create :actions="$actions" :title="$title">
    <form class="card border shadow-xl card-compact" action="{{ $action }}" method="POST">
        @csrf
        <div class="card-body">
            <x-forms.inputs.text
                name="name"
                label="{{ trans('admin.users.name.label') }}"
                value="{{ old('name') }}"
                placeholder="{{ trans('admin.users.name.placeholder') }}"
                autocomplete="off"
                required/>

            <x-forms.inputs.email
                name="email"
                label="{{ trans('admin.users.email.label') }}"
                value="{{ old('email') }}"
                placeholder="{{ trans('admin.users.email.placeholder') }}"
                autocomplete="off"
                required/>

            <x-forms.inputs.password
                name="password"
                label="{{ trans('admin.users.password.label') }}"
                required/>
            <button type="submit" class="btn">{{ trans('Create') }}</button>
        </div>
    </form>
</x-admin-create>
