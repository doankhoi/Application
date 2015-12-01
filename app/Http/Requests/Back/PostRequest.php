<?php

namespace App\Http\Requests\Back;

use App\Http\Requests\Request;

class PostRequest extends Request
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
        if ($this->isMethod('patch') || $this->isMethod('put')) 
        {
            $id = ",".$this->id;
        }
        
        $ruleImage = "";
        if(strlen($id) == 0) 
        {
            $ruleImage = 'required|image|max:5000';
        }
        else 
        {
            $ruleImage = 'image|max:5000';
        }

        return [
            'title' => 'required|max:255',
            'summary' => 'required|max:60000',
            'content' => 'required|max:60000',
            'slug' => 'required|unique:posts,slug'.$id,
            'tags' => 'tags',
            'category_id' => 'required|integer',
            'type' => 'required|integer',
            'images' => $ruleImage
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Trường tiêu đề rỗng.',
            'title.max' => 'Trường tiêu đề vượt quá 255 kí tự.',
            'summary.required' => 'Trường nội dung tóm tắt rỗng.',
            'summary.max' => 'Trường nội dung tóm tắt vượt quá 60000 ký tự.',
            'content.required' => 'Trường nội dung bài viết rỗng.',
            'content.max' => 'Trường nội dung bài viết vượt quá 60000 ký tự.',
            'slug.required' => 'Trường link rỗng.',
            'slug.unique' => 'Trường link đã tồn tại.',
            'tags.tags' => 'Trường tags không chứa các ký tự trắng, các tags cách nhau bởi dấu phẩy.',
            'category_id.required' => 'Trường nhóm bài viết rỗng.',
            'category_id.integer' => 'Trường nhóm bài viết giá trị không hợp lệ.',
            'type.required' => 'Trường loại bài viết rỗng.',
            'type.integer' => 'Trường loại bài viết giá trị không hợp lệ.',
            'images.required' => 'Trường ảnh đại diện rỗng.',
            'images.image' => 'Trường ảnh đại diện chỉ hỗ trợ định đạng jpg, png, gif',
            'images.max'   => 'Trường ảnh đại diện vượt quá kích thước 5 MB.'
        ];
    }
}
