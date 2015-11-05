<?php

namespace App\Http\Middleware;

use Closure;
use AdminAuth;

class AdminGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(AdminAuth::check()) {
            return redirect()->route('admin.top');
        }

        return $next($request);
    }
}
