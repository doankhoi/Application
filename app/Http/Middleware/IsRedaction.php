<?php

namespace App\Http\Middleware;

use Closure;

class IsRedaction
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
        $user = $request->user();
        if($user && $user->isNotUser())
        {
            return $next($request);
        }

        return redirect('auth/login');
    }
}
