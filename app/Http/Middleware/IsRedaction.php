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

        $message = "Tài khoản bạn đang dùng không có quyền truy câp. Hãy đăng nhập với tài khoản khác.";
        $alertClass = "alert-danger";
        return redirect('auth/login');
    }
}
