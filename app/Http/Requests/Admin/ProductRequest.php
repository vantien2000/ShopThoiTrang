<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|max:255',
            'image_upload' => 'image|mimes:jpg,png,webp,jpeg,gif,svg',
            'image' => 'required|string',
            'price' => 'required|numeric|min:10000',
            'sale'  => 'regex:/^\d+(\.\d{1,2})?$/|max:90',
            'quantity' => 'required|integer|max:50',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.max' => 'Tên sản phẩm quá dài',
            'image_upload.image' => 'Ảnh không phù hợp',
            'image_upload.max' => "Ảnh không quá 2Mb",
            'image_upload.dimensions' => 'Ảnh không đúng kích thước cho phép',
            'image.required' => 'Tên hình ảnh không được bỏ trống',
            'image.string' => 'Tên hình ảnh không đúng định dạng',
            'price.required' => 'Giá sản phẩm không để trống',
            'price.numeric' => 'Giá sản phẩm không đúng định dạng',
            'price.min' => 'Giá sản phẩm quá nhỏ',
            'sale.regex' => 'Giảm giá không đúng định dạng',
            'quantity.required' => 'Số lượng sản phẩm không được để trống',
            'quantity.integer' => 'Số lượng không đúng định dạng',
            'quantity.max' => 'Số lượng quá mức cho phép',
        ];
    }
}
