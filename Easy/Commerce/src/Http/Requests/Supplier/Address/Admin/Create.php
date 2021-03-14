<?php


namespace Easy\Commerce\Http\Requests\Supplier\Address\Admin;

use Illuminate\Foundation\Http\FormRequest;

use Easy\Commerce\Rules\Phone;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'building_name'         => 'required|string|max:100',
            'floor'                 => 'required|string|max:100',
            'street'                => 'required|string|max:100',
            'landmark'              => 'required|string|max:100',
            'city'                  => 'required|string|max:100',
            'state'                 => 'required|string|max:100',
            'country'               => 'required|string|max:100',
            'zip'                   => 'required|string|max:20',
            'phone'                 => ['required', new Phone ,'min:10','unique:supplier_addresses,phone']
        ];
    }
}
