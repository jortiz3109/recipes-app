<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::name('users.index')->get('users', [UserController::class, 'index']);
