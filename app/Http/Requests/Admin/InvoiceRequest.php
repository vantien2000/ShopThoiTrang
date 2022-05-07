<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'required_date' => 'required',
            'shipper_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required_date.required' => 'Ngày nhận hàng không được để trống',
            'shipper_date.required' => 'Ngày giao hàng không được để trống'
        ];
    }
}
