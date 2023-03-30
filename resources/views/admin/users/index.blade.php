<x-admin-index :actions="$actions" :title="$title" :search="$search">
    <div class="card shadow-lg">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                <tr>
                    <th scope="col">{{ trans('users.name') }}</th>
                    <th scope="col">{{ trans('users.email') }}</th>
                    <th scope="col">{{ trans('users.status') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $user)
                    <tr>
                        <td>{{ $user->name() }}</td>
                        <td>{{ $user->email() }}</td>
                        <td>
                    <span @class([
                        'badge',
                        'rounded',
                        'badge-success' => !$user->isDisabled(),
                        'badge-error' => $user->isDisabled()
                    ])>
                    {{ $user->isDisabled() ? trans('users.disabled') : trans('users.enabled') }}
                    </span>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $entities->appends(request()->only('search'))->links() }}
</x-admin-index>
