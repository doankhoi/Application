<?php

namespace App\Http\Requests\Back;

use App\Http\Requests\Request;

class SiteRequest extends Request
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
            'site_name' => 'required|max:50',
            'email' => 'required|email|max:60',
            'skype' => 'required|max:30',
            'facebook' => 'required|max:255',
            'site_des' => 'required|max:60000',
            'admin_des' => 'required|max:60000',
            'image_admin' => 'max:5000|image',
            'logo_site' => 'max:500|image'
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' => 'Trường tên website trống.',
            'site_name.max' => 'Trường tên website vượt quá 50 ký tự.',
            'email.required' => 'Trường email rỗng.',
            'email.email' => 'Trường email không đúng định dạng.',
            'email.max' => 'Trường email vượt quá 60 ký tự.',
            'skype.required' => 'Trường skype rỗng.',
            'skype.max' => 'Trường skype vượt quá 30 ký tự.',
            'facebook.required' => 'Trường facebook rỗng.',
            'facebook.max' => 'Trường facebook vượ quá 255 ký tự.',
            'site_des.required' => 'Trường đặc tả website rỗng.',
            'site_des.max' => 'Trường đặc tả website vượt quá 60000 ký tự.',
            'admin_des.required' => 'Trường thông tin tác giả rỗng.',
            'admin_des.max' => 'Trường thông tin tác giả vượt quá 60000 ký tự.',
            'image_admin.image' => 'Trường ảnh đại diện phải có định dạng jpg, png, gif',
            'image_admin.max' => 'Trường ảnh đại diện vượt quá 5Mb.',
            'logo_site.image' => 'Trường logo website phải có định dạng jpg, png, gif',
            'logo_site.max' => 'Trường logo website vượt quá 500 KB.'
        ];
    }
}
