<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\EntityServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\IndexRequest;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(EntityServiceContract $userService, IndexRequest $request ): View
    {
        return view('admin.users.index', [
            'users' => $userService->index($request->input('search'))
        ]);
    }
}
