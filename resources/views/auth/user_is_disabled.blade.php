@extends('layouts.app')
@push('content')
    <div class="container container-twitch vh-100">
        <div class="alert alert-danger">
            {{ auth()->user()->name }}

            {{ trans('auth.disabled') }}
        </div>
    </div>
@endpush
