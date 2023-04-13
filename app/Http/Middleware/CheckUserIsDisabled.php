<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckUserIsDisabled
{
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (auth()->user()->isDisabled()) {
            return redirect()->to('user-is-disabled');
        }

        return $next($request);
    }
}
