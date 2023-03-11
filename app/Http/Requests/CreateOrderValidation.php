<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderValidation extends FormRequest
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
            'photo' => 'required',
            'orderName' => 'required',
            'orderDescription' => 'required',
            'startPrice' => 'required|lt:endPrice',
            'endPrice' => 'required|gt:startPrice',
            'Section' => 'required',
            'product' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'photo.required'=> 'حقل الصورة مطلوب',
            'orderName.required'=> 'اسم الطلب مطلوب',
            'orderDescription.required'=> 'وصف الطلب',
            'startPrice.required'=> 'السعر المبدأى مطلوب',
            'endPrice.required'=> 'السعر النهائى مطلوب',
            'startPrice.lt'=> 'السعر المبدأى يجب أن يكون اصغر من السعر النهائى',
            'endPrice.gt'=> 'السعر النهائى يجب أن يكون اكبر من السعر المبدأى',
            'Section.required'=> 'يجب اختيار الدولة',
            'product.required'=> 'يجب اختيار المدينة',
        ];
    }
}
