<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required','exists:user_data','email',
            'regex:/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'password' => ['required', 'min:6']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.exists' => 'Email không tồn tại',
            'email.regex' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password quá ít ký tự cho phép'
        ];
    }
}
