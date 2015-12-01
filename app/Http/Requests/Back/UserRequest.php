<?php

namespace App\Http\Requests\Back;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $id = "";
        $rulePass = "";

        if ($this->isMethod('patch') || $this->isMethod('put')) 
        {
            $id = ",".$this->id;
        }

        if(strlen($rulePass) != 0)
        {
            $rulePass = 'required|confirmed|min:8';
        }else {
            $rulePass = 'min:8';
        }

        return [
            'username' => 'required|max:30|unique:users,username'.$id,
            'email' => 'required|email|max:60|unique:users,email'.$id,
            'password' => $rulePass,
            'role_id' => 'required:integer'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Trường username rỗng.',
            'username.max' => 'Trường username vượt quá 30 ký tự.',
            'username.unique' => 'Trường username đã được sử dụng.',
            'email.required' => 'Trường email rỗng.',
            'email.email' => 'Trường email không đúng định dạng.',
            'email.unique' => 'Trường email đã được sử dụng.',
            'password.required' => 'Trường password rỗng.',
            'password.confirmed' => 'Mật khẩu không khớp',
            'password.min' => 'Trường password tối thiểu 8 kí tự.',
            'role_id.required' => 'Trường quyền người dùng rỗng.',
            'role_id.integer' => 'Trường quyền người dùng không đúng định dạng.'
        ];
    }
}
