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
            'type_name' => 'required|min:2|max:150',
            'category_id' => 'required|exists:categories'
        ];
    }

    public function messages()
    {
        return [
            'type_name.required' => 'Tên loại không được để trống',
            'type_name.min' => 'Tên loại qua ít ký tự',
            'type_name.max' => 'Tên loại quá nhiều ký tự',
            'category_id.required' => 'Tên danh mục không hợp lệ',
            'Category_id.exists' => 'Tên danh mục không tồn tại'
        ];
    }
}
