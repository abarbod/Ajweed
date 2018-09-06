<?php

namespace App\Http\Middleware;

use App\Models\Contracts\MustVerifyMobile;
use Closure;
use Illuminate\Support\Facades\Redirect;

class EnsureMobileIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle($request, Closure $next)
    {
        if (! $request->user() ||
            ($request->user() instanceof MustVerifyMobile &&
             ! $request->user()->hasVerifiedMobile())) {
            return Redirect::route('verification.notice-mobile');
        }

        return $next($request);
    }
}
