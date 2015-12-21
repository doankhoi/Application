<?php

namespace App\Http\Requests\Back;

use App\Http\Requests\Request;

class CatetogoryRequest extends Request
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
            'name' => 'required|max:100'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Trường tiêu đề rỗng.',
            'name.max' => 'Trường tiêu đề vượt quá 100 kí tự.'
        ];
    }
}
