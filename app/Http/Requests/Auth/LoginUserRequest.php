<?php

namespace App\Http\Requests\Auth;
// use Anhskohbo\NoCaptcha\Rules\Captcha;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:20',
            // 'g-recaptcha-response' => 'required'
        ];
    }


    public function attributes()
    {
        return [
            'email' => 'Email',
            'password' => 'Mật khẩu',
            // 'g-recaptcha-response' => 'reCaptcha',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.exists' => 'Email không tồn tại trong hệ thống.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá :max ký tự.',
            
        ];
    }


    // public function failedValidation($validator)
    // {

    //     throw new HttpResponseException(response()->json([
    //         'status' => false,
    //         'errors' => $validator->errors()
    //     ]));
    // }
}
