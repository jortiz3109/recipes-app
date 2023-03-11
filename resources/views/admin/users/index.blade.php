<x-admin-layout>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{ trans('users.name') }}</th>
            <th scope="col">{{ trans('users.email') }}</th>
            <th scope="col">{{ trans('users.status') }}</th>
            <th scope="col">...</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span @class(['badge',
                                    'text-bg-success' => !$user->isDisabled(),
                                    'text-bg-danger' => $user->isDisabled()
                                    ])>
                    {{ $user->isDisabled() ? trans('users.disabled') : trans('users.enabled') }}
                    </span>
                </td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</x-admin-layout>
