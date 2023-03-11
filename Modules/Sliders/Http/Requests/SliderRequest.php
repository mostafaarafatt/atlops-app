<?php

namespace Modules\Sliders\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        // dd(request()->all());
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
            // '%title%' => ['required', 'string', 'max:255'],
            // '%sub_title%' => ['nullable', 'string', 'max:255'],
            'media' => 'required', 'mimes:jpeg,jpg,png', 'max:1000',
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
            // '%title%' => ['required', 'string', 'max:255'],
            // '%sub_title%' => ['nullable', 'string', 'max:255'],
            'media' => 'required', 'mimes:jpeg,jpg,png', 'max:1000',
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('sliders::sliders.attributes'));
    }
}
