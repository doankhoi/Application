<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'photo' => 'image|max:500',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username|min:3',
            'password' => 'required|min:8',
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20',
            'gender' => 'required|in:1,2,3',
            'tel' => 'regex:/[0-9]+/',
            'city' => 'max:30',
            'address' => 'max:60'
        ];
    }

    public function messages() 
    {
        return [
            'photo.image' => 'Ảnh phải có định dạng jpg, png, gif.',
            'photo.max' => 'Bức ảnh vượt quá 500Kb.',
            'email.required' => 'Trường email rỗng.',
            'email.email' => 'Trường email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
            'username.required' => 'Tên đăng nhập rỗng.',
            'username.unique' => 'Tên đăng nhập đã được sử dụng.',
            'username.min' => 'Tên đăng nhập tối thiểu 3 ký tự.',
            'password.required' => 'Trường password rỗng.',
            'password.min' => 'Password phải tối thiểu 8 kí tự.',
            'firstname.required' => 'Trường họ rỗng.',
            'firstname.max' => 'Trường họ vượt quá 20 ký tự.',
            'lastname.required' => 'Trường tên rỗng',
            'lastname.max' => 'Trường tên vượt quá 20 ký tự.',
            'gender.required' => 'Trường giới tính rỗng',
            'gender.in' => 'Giá trị giới tính không hợp lệ.',
            'tel.regex' => 'Trường số điện thoại không đúng định dạng.',
            'city.max' => 'Trường thành phố vượt quá 30 ký tự.',
            'address.max' => 'Trường địa chỉ vượt quá 60 ký tự.'
        ];
    }
}
