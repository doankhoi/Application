<?php

namespace App\Http\Requests\Front;

use App\Http\Requests\Request;

class SearchRequest extends Request
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
            'search' => 'required|max:20'
        ];
    }

    public function messages()
    {
        return [
            'search.required' => 'Trường từ khóa rỗng.',
            'search.max' => 'Trường từ khóa vượt quá 20 ký tự.'
        ];
    }
}
