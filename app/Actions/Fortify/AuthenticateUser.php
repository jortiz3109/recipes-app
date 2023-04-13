<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthenticateUser
{
    /**
     * @throws ValidationException
     */
    public function __invoke(LoginRequest $request): null|User
    {
        $user = User::where(Fortify::username(), $request->input('email'))->first();
        if ($user instanceof User) {
            $this->validateIfUserIsDisabled($user);

            if (Hash::check($request->input('password'), $user->password)) {
                return $user;
            }
        }

        return null;
    }

    /**
     * @throws ValidationException
     */
    private function validateIfUserIsDisabled(User $user): void
    {
        if ($user->isDisabled()) {
            $this->throwValidationException();
        }
    }

    /**
     * @throws ValidationException
     */
    private function throwValidationException(): void
    {
        throw ValidationException::withMessages([
            Fortify::username() => [trans('auth.disabled')],
        ]);
    }
}
