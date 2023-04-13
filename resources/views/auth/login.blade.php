<x-layout>
    <div class="login h-screen w-screen grid place-content-center">
        <div class="card shadow-xl card-compact bg-base-100/50 text-base-content w-fit backdrop-blur-md">
            <img class="logo block mx-auto rounded shadow-xl" src="{{ Vite::asset('resources/images/logo.png') }}"
                 alt="{{ trans('Recipes logo') }}">
            <form class="card-body" action="{{ route('login') }}" method="POST">
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
                <button type="submit" class="btn">{{ trans('auth.login.title') }}</button>
            </form>
        </div>
    </div>
</x-layout>
