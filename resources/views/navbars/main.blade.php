<div class="bg-neutral text-neutral-content mb-3">
    <nav class="container mx-auto navbar">
        <div class="navbar-start">
            <div class="w-10 rounded">
                <i class="fa-solid fa-bowl-food fa-2xl"></i>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost normal-case text-xl">Recipes</a>
        </div>
        <div class="navbar-end">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost rounded-btn gap-2">
                    <em class="fa-solid fa-shield-halved"></em>{{ trans('admin.title') }}
                </label>
                <ul tabindex="0" class="menu dropdown-content p-2 shadow bg-base-100 rounded-box w-72 mt-4 text-neutral">
                    <li>
                        <a class="gap-2" href="{{ route('admin.users.index') }}">
                            <em class="fa-solid fa-users"></em> {{ trans('admin.users.title') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
