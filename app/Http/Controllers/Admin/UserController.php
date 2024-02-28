<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\EntityServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\IndexRequest;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\ViewModels\Admin\UsersCreateViewModel;
use App\ViewModels\Admin\UsersEditViewModel;
use App\ViewModels\Admin\UsersIndexViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private readonly EntityServiceContract $userService)
    {
    }

    public function index(IndexRequest $request, UsersIndexViewModel $viewModel): View
    {
        $viewModel->setEntities($this->userService->index($request->input('search')));

        return view('admin.users.index', $viewModel->toArray());
    }

    public function create(UsersCreateViewModel $viewModel): View
    {
        return view('admin.users.create', $viewModel->toArray());
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $this->userService->store($request->validated());

        return response()->redirectToRoute('admin.users.index');
    }

    public function edit(int $id, UsersEditViewModel $viewModel): View
    {
        $user = $this->userService->find($id);

        return view('admin.users.edit', $viewModel->for($user)->toArray());
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $this->userService->update($id, $request->validated());

        return response()->redirectToRoute('admin.users.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->userService->delete($id);

        return response()->redirectToRoute('admin.users.index');
    }

    public function test()
    {
        return md5('password: Foo');
    }
}
