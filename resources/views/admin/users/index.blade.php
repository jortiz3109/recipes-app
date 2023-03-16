<x-admin-layout>
    <div class="flex justify-between items-center mb-3">
        <span class="normal-case text-xl">{{ trans('admin.users') }}</span>
        <form action="{{ route('admin.users.index') }}" method="GET">
            <div class="form-control">
                <div class="input-group">
                    <input type="search" name="search" value="{{ request('search') }}" id="search"
                    placeholder="{{ trans('Search') }}" class="input input-bordered"/>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-square">
                        <em class="fa-solid fa-eraser"></em>
                    </a>
                    <button class="btn btn-square">
                        <em class="fa-solid fa-magnifying-glass"></em>
                    </button>
                </div>
            </div>
        </form>

    </div>
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
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
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
    {{ $users->appends(request()->only('search'))->links() }}
</x-admin-layout>
