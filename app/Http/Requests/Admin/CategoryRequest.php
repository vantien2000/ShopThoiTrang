<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            'category_name' => 'required|unique:categories|min:2|max:150'
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Tên danh mục không được để trống',
            'category_name.unique' => 'Tên danh mục đã tồn tại',
            'category_name.min' => 'Tên danh mục qua ít ký tự',
            'category_name.max' => 'Tên danh mục quá nhiều ký tự'
        ];
    }
}
