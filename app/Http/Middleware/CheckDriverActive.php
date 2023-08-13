<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use TymonJWTAuthExceptionsJWTException;

class CheckDriverActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('providers')->check()) {
            $user = auth('providers')->user();
            if ($user->accept == 0) {
                return response()->json(msg( failed(), trans('lang.wait_admin_accept')));
            }
            if ($user->active == 0) {
                return response()->json(msg( failed(), trans('lang.not_active')));
            }
            if ($user->suspend == 1) {
                return response()->json(msg( failed(), trans('lang.suspended')));
            }
        }
        return $next($request);
    }
}
