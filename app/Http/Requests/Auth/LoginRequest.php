<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class LoginRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'log' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * Messages for validate
     * @return array
     */
    public function messages()
    {
        return [
            'log.required' => 'Tên đăng nhập không được rỗng.',
            'password.required' => 'Mật khẩu không được rỗng.'
        ];
    }
}
