<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
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
            'firstName' => 'required|max:25',
            'lastName' => 'required|max:25',
            'email' => 'required|max:125|email|unique:users',
            'phone' => 'required|regex:/(05)[0-9]{8}/|max:10|unique:users',
            'date' => 'required',
            'type' => 'required',
            'communication' => 'required',
            'password' => 'required|min:6|max:25|confirmed',
            'password_confirmation' => 'required_with:password|same:password|min:6|max:25'
            // 'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'firstName.required' => 'حقل الاسم الأول مطلوب إدخالة',
            'lastName.required' => 'حقل الاسم الاخير مطلوب إدخالة',
            'email.required' => 'حقل الايميل مطلوب إدخالة',
            'phone.required' => 'حقل الهاتف مطلوب إدخالة',
            'date.required' => 'حقل التاريخ مطلوب إدخالة',
            'type.required' => 'نوع المستخدم مطلوب اختيارة ',
            'communication.required' => ' طريقة التواصل مطلوب اختيارة ',
            'password.required' => 'حقل كلمة المرو مطلوب إدخالة',
            'password.confirmed' => 'كلمة المرور غير متطابقة ',
            'password.min' => 'كلمة المرور لا يجب أن تكون اقل من ستة ارقام',
            'password.max' => 'كلمة المرور لا يجب أن تكون اكبر من اربعون رقم',
            'firstName.max' => 'حقل الاسم الأول لا يجب ان يكون أكبر من 25 حرف ',
            'firstName.max' => 'حقل الاسم الأخير لا يجب ان يكون أكبر من 25 حرف ',
            'firstName.max' => 'حقل الايميل لا يجب ان يكون أكبر من 25 حرف ',
        ];        
    }
}
