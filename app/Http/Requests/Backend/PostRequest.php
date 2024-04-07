<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            'title' => ['required', Rule::unique('posts', 'title')->ignore($this->post)],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($this->post)],
            'content' => ['required'],
            'description' => ['required', 'string', 'max:255'],
            'image' => ['required'],
            'image_caption' => ['required'],
            'thumbnail' => ['required'],
            'category_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề bài viết',
            'slug' => 'Đường dẫn bài viết',
            'content' => 'Nội dung bài viết',
            'image' => 'Hình ảnh bài viết',
            'category_id' => 'Danh mục bài viết',
            'description' => 'Mô tả ngắn',
            'image_caption' => 'Tiêu đề ảnh',
            'thumbnail' => 'Hình ảnh thu nhỏ',
        ];

    }
}
