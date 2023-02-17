@extends('layouts.app')
@push('content')
    <div class="container container-twitch vh-100">
        <div class="alert alert-success">
            {{ trans('Welcome') }} {{ auth()->user()->name }}
        </div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-warning">Logout</button>
        </form>
    </div>
@endpush
