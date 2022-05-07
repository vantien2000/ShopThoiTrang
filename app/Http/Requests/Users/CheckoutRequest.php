<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'phone_number' => ['required','exists:user_data','regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'email' => ['required','exists:user_data',
            'regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'],
            'provinces' => 'required',
            'districts' => 'required',
            'wards' => 'required',
            'home_number' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'email.exists' => 'Email không tồn tại trong hệ thống',
            'email.regex' => 'Email không đúng định dạng',
            'phone_number.exists' => 'Số điện thoại không tồn tại trong hệ thống',
            'phone_number.regex' => 'Số điện thoại không hợp lệ',
            'provinces.required' => 'Tỉnh thành không được để trống',
            'districts.required' => 'Quận huyện không được để trống',
            'wards.required' => 'Xã phường không được để trống',
        ];
    }
}
