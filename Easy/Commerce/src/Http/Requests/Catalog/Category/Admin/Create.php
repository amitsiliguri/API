<?php

namespace Easy\Commerce\Http\Requests\Catalog\Category\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
            'status'            => 'required',
            'title'             => 'required|max:100',
            'slug'              => 'required|string|unique:categories',
            'banner'            => 'nullable|image|mimes:jpeg,jpg,png|max:512',
            'description'       => 'nullable',
            'meta_title'        => 'nullable|string|max:100' ,
            'meta_description'  => 'nullable|string|max:170',
            'meta_image'        => 'nullable|image|mimes:jpeg,jpg,png|max:512',
        ];
    }
}
