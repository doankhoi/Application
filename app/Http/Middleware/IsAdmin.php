<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class IsAdmin
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
        if($user && $user->isAdmin())
        {
            return $next($request);
        }

        $message = "Tài khoản của bạn không có quyền truy cập. Hãy đăng nhập với tài khoản khác.";
        $alertClass = "alert-danger";
        return redirect('auth/login')->with(compact('message', 'alertClass'));
    }
}
