<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('user.login');
        }
    }

    public function handle($request, Closure $next) {
		$user = Auth::user();
        
		if ($user) {
			return $next($request);
		} else {
			return redirect()->route('user.logout');
		}
	}
}
