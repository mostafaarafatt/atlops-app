<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|exists:users',
            'password' => 'required|min:6|max:40',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'حقل الايميل مطلوب إدخالة',
            'email.!exits' => 'حقل الايميل غير موجود ',
            'password.required' => 'حقل كلمة المرور مطلوب إدخالة',
            'password.min' => 'كلمة المرور لا يجب أن تكون اقل من ستة ارقام',
            'password.max' => 'كلمة المرور لا يجب أن تكون اكبر من اربعون رقم',
        ];
    }
}
