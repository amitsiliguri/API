<?php

namespace Easy\Commerce\Http\Requests\Supplier\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            'status'                        => 'required',
            'legal_name'                    => 'required|string|max:100',
            'register_number'               => 'required|string|unique:suppliers',
            'email'                         => 'required|string|unique:suppliers',
            'phone'                         => 'required|string|unique:suppliers',

            'address.building_name'         => 'required|string|max:100',
            'address.floor'                 => 'required|string|max:100',
            'address.street'                => 'required|string|max:100',
            'address.landmark'              => 'required|string|max:100',
            'address.city'                  => 'required|string|max:100',
            'address.state'                 => 'required|string|max:100',
            'address.country'               => 'required|string|max:100',
            'address.zip'                   => 'required|string|max:100',
            'address.phone'                 => 'required|string|unique:supplier_addresses',

            'contact_person.job_title'      => 'required|string|max:100',
            'contact_person.prefix'         => 'nullable|string|max:100',
            'contact_person.first_name'     => 'required|string|max:100',
            'contact_person.middle_name'    => 'nullable|string|max:100',
            'contact_person.last_name'      => 'required|string|max:100',
            'contact_person.email'          => 'required|string|unique:supplier_contact_people',
            'contact_person.phone'          => 'required|string|unique:supplier_contact_people',
            'contact_person.gender'         => 'required|string|max:100'
        ];
    }
}
