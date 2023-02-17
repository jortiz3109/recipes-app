@extends('layouts.app')
@push('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="card w-25">
            <div class="card-header">
                <h5 class="card-title">{{ trans('auth.login.title') }}</h5>
            </div>
            <div class="card-body">
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
                    <button type="submit" class="btn btn-success">{{ trans('auth.login.title') }}</button>
                </form>
            </div>
        </div>
    </div>
@endpush
