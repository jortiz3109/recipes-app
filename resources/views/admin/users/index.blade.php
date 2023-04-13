<x-admin-index :actions="$actions" :title="$title" :search="$search">
    <div class="card shadow-lg">
        <div class="overflow-x-auto">
            <table class="table w-full" aria-label="{{ $title }}">
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
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id()) }}">{{ trans('Edit') }}</a>
                            <form action="{{ route('admin.users.destroy', $user->id()) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">{{ trans('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $entities->appends(request()->only('search', 'perPage'))->links() }}
</x-admin-index>
