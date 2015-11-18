<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postLogin(LoginRequest $request, Guard $auth)
    {
        $logValue = $request->input('log');
        $logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $throttles = in_array(ThrottlesLogins::class, class_uses_recursive(get_class($this)));

        if($throttles && $this->hasTooManyLoginAttempts($request))
        {
            return redirect('/auth/login')->with('error', trans('front/login.maxattempt'))->withInput($request->only('log'));
        }

        $credentials = [
            $logAccess => $logValue,
            'password' => $request->input('password')
        ];

        if (!$auth->validate($credentials))
        {
            if ($throttles) 
            {
                $this->incrementLoginAttempts($request);
            }

            return redirect('auth/login')->with('error', trans('front/login.maxattempt'))->withInput($request->only('log'));
        }

        $user = $auth->getLastAttempted();

        if ($user->confirmed)
        {
            if ($throttles) 
            {
                $this->clearLoginAttempts($request);
            }

            $auth->login($user, $request->has('memory'));

            if ($request->session()->has('user_id'))
            {
                $request->session()->forget('user_id');
            }

            return redirect('/');
        }

        $request->session()->put('user_id', $user->id);

        return redirect('/auth/login')->with('error', trans('front/verify.again'))->withInput($request->only('log'));
    }

    public function postRegister(RegisterRequest $request, UserRepository $user_gestion)
    {
        
    }
}
