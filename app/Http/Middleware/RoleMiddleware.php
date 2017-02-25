<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param                           $role
     * @param                           $permission
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission)
    {
        if (Auth::guest()) {
            return redirect($urlOfYourLoginPage);
        }

        if (! $request->user()->hasRole($role)) {
            abort(403);
        }

        if (! $request->user()->can($permission)) {
            abort(403);
        }

        return $next($request);
    }
}