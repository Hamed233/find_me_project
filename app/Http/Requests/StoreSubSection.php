<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubSection extends FormRequest
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
            'section_name_ar' => 'required',
            'section_name_en' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'section_name_ar.required' => trans('sections_trans.required_ar'),
            'section_name_en.required' => trans('sections_trans.required_en'),
            'image.required' => trans('sections_trans.required_image'),
        ];
    }
}
