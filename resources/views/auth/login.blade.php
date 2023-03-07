@extends('layouts.app')
@push('content')
    <div class="login vh-100 d-flex justify-content-center align-items-center">
        <div class="card text-white">
            <div class="card-body">
                <img class="logo mx-auto d-block rounded shadow"
                     src="{{ Vite::asset('resources/images/logo.png') }}"
                     alt="{{ trans('Recipes logo') }}">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <x-forms.inputs.email
                        name="email"
                        label="{{ trans('auth.login.email.label') }}"
                        value="{{ old('email') }}"
                        placeholder="{{ trans('auth.login.email.placeholder') }}"
                        autocomplete="off"
                        required/>

                    <x-forms.inputs.password
                        name="password"
                        label="{{ trans('auth.login.password.label') }}"
                        required/>
                    <button type="submit" class="btn btn-login w-50">{{ trans('auth.login.title') }}</button>
                </form>
            </div>
        </div>
    </div>
@endpush
