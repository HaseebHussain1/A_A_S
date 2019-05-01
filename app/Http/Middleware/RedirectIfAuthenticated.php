<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->first()->role=='admin'){

        return redirect('admin/Animals');

	}elseif(Auth::user()->first()->role=='user'){

		return redirect('staff/Animals');
	}elseif(Auth::user()->first()->role=='staff'){

		return redirect('admin/Animals');
	}
        }

        return $next($request);
    }
}
