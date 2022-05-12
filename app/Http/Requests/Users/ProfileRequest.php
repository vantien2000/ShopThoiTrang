<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'username' => 'required',
            'address' => 'required',
            'avatar' => 'image|mimes:jpg,png,webp,jpeg,gif,svg|max:2048|dimensions:min_width=10,min_height=10,max_width=1000,max_height=1000',
            'phone_number' => ['required','regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'email' => ['required','exists:user_data','email',
            'regex:/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'password' => 'required|min:6',
            'confirm' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'User name không được để trống',
            'address.required' => 'Address không được để trống',
            'phone_number.required' => 'Phone number không được để trống',
            'email.required' => 'email không được để trống',
            'email.exists' => 'Email không tồn tại',
            'email.regex' => 'Email không đúng định dạng',
            'phone_number.regex' => 'Phone number không hợp lệ',
            'avatar.image' => 'File không phù hợp',
            'avatar.max' => "File không quá 2Mb",
            'avatar.dimensions' => 'File không đúng kích thước cho phép',
            'password.required' => "Password không được để trống",
            'password.min' => 'Password không ít hơn 6 ký tự',
            'confirm.required' => "Confirm password không được để trống",
            'confirm.min' => 'Confirm password không ít hơn 6 ký tự',
            'g-recaptcha-response.required' => 'Captcha chưa được chọn',
            'g-recaptcha-response.captcha' => 'Captcha chưa được chọn'
        ];
    }
}
