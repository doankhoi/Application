<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    /** Trait for user register  and user validate
    */
    use AuthenticatesAndRegistersUsers;

    public function __construct() {
        $this->user = 'admin';
    }

    public function getLogin() {
        return view('admin.layouts.login');
    }

    public function postLogin(LoginRequest $request) {

    }
}
