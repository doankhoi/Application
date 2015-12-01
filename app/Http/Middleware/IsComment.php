<?php

namespace App\Http\Middleware;

use Closure;

class IsComment
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
        if($user)
        {
            return $next($request);
        }
        else
        {
            $message = "Bạn không có quyền thực hiện thao tác này. Hãy đăng nhập hoặc đăng ký.";
            $alertClass = "alert-danger";
            return redirect('/auth/login')->with(compact('message', 'alertClass'));
        }
    }
}
