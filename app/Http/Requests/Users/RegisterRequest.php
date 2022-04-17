<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'user_name' => 'required',
            'address' => 'required',
            'age' => 'required|integer|min:12|max:100',
            'phone_number' => ['required','unique:user_data','regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'email' => ['required','unique:user_data','email',
            'regex:/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'password' => 'required|min:6',
            'confirm' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'User name không được để trống',
            'address.required' => 'Address không được để trống',
            'age.required' => 'Tuổi không được để trống',
            'age.integer' => 'Tuổi không đúng định dạng',
            'age.min' => 'Tuổi quá nhỏ',
            'age.max' => 'Tuổi quá lớn',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'email.required' => 'email không được để trống',
            'email.unique' => 'email đã tồn tại',
            'email.regex' => 'Email không đúng định dạng',
            'phone_number.unique' => 'Số điện thoại không hợp lệ',
            'phone_number.regex' => 'Số điện thoại không hợp lệ',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu quá ít ký tự',
            'confirm.required' => 'Xác nhận mật khẩu không được để trống',
            'confirm.min' => 'Mật khẩu quá ít ký tự'
        ];
    }
}
