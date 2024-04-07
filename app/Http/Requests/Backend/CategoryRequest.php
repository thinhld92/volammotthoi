<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'name' => ['required', Rule::unique('categories', 'name')->ignore($this->category)],
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($this->category)],
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
            'name' => 'Tên danh mục',
            'parent_id' => 'Danh mục cha',
        ];

    }
}
