<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'user.isDisabled'])->group(function () {
    Route::view('home', 'home');
});

Route::view('/user-is-disabled', 'auth.user_is_disabled');

Route::view('/twitch', 'twitch');
