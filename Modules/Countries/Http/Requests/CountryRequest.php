<?php

namespace Modules\Countries\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return $this->createRules();
        } else {
            return $this->updateRules();
        }
    }

    /**
     * Get the create validation rules that apply to the request.
     *
     * @return array
     */
    public function createRules()
    {
        return RuleFactory::make([
            'name' => ['required', 'string', 'max:255'],
            // 'name:ar' => ['required', 'string', 'max:255'],
            // 'name:en' => ['nullable', 'string', 'max:255'],
            // 'code' => ['required', 'string', 'unique:countries', 'max:255'],
            // 'key' => ['required', 'string', 'unique:countries', 'max:255'],
            'flag' => 'nullable', 'mimes:jpeg,jpg,png', 'max:1000',
        ]);
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return RuleFactory::make([
            'name' => ['required', 'string', 'max:255'],
            // 'name:ar' => ['required', 'string', 'max:255'],
            // 'name:en' => ['nullable', 'string', 'max:255'],
            // 'code' => ['required', 'string', 'unique:countries', 'max:255'],
            // 'key' => ['required', 'string', 'unique:countries', 'max:255'],
            'flag' => 'nullable', 'mimes:jpeg,jpg,png', 'max:1000',
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('countries::countries.attributes'));
    }
}
