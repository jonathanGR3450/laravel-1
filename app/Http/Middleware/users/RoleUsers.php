<?php

namespace App\Http\Middleware\users;

use Closure;
use Illuminate\Http\Request;

class RoleUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $roles = array_slice(func_get_args(), 2);
        if (auth()->user()->hasRole($roles)) {
            return $next($request);
        }

        return redirect('/');
    }
}
