<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductTypeRequest extends FormRequest
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
            'type_id' => 'required|exists:categories'
        ];
    }

    public function messages()
    {
        return [
            'type_id.required' => 'Tên loại không hợp lệ',
            'type_id.exists' => 'Tên loại không tồn tại'
        ];
    }
}
