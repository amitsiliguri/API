<?php

namespace Easy\CatalogCategory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreate extends FormRequest
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
            'status'  => ['required'],
            'title'   => ['required','max:100'],
            'slug'    => ['required', 'string', 'max:100'],
            'banner'  => ['nullable','image ', 'mimes:jpeg,jpg,png','max:512'],
            'description' => ['nullable'],
            'meta_title' => ['nullable','string', 'max:100' ],
            'meta_description' => ['nullable','string', 'max:170' ],
            'meta_image'  => ['nullable','image ', 'mimes:jpeg,jpg,png','max:512'],
        ];
    }
}
