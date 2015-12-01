<?php

namespace App\Http\Requests\Front;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'name' => 'required|max:30',
            'email' => 'required|email|max:40',
            'text' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường tên rỗng.',
            'name.max' => 'Trường tên vượt quá 30 ký tự.',
            'email.required' => 'Trường email rỗng.',
            'email.email' => 'Trường email không đúng định dạng.',
            'email.max' => 'Trường email vượt quá 40 ký tự.',
            'text.required' => 'Trường tin nhắn rỗng.',
            'text.max' => 'Trường tin nhắn vượt quá 255 ký tự.'
        ];
    }
}
