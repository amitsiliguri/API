<?php


namespace Easy\Commerce\Http\Requests\Supplier\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Easy\Commerce\Rules\Status;
use Easy\Commerce\Rules\Phone;
class Update extends FormRequest
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
            'status'                        => ['required',new Status],
            'legal_name'                    => 'required|string|max:100',
            'register_number'               => 'required|max:100',
            'email'                         => 'required|email|unique:suppliers,email,'. $this->id,
            'phone'                         => ['required','min:10','unique:suppliers,phone,'. $this->id , new Phone],
            'address.building_name'         => 'required|string|max:100',
            'address.floor'                 => 'required|string|max:100',
            'address.street'                => 'required|string|max:100',
            'address.landmark'              => 'required|string|max:100',
            'address.city'                  => 'required|string|max:100',
            'address.state'                 => 'required|string|max:100',
            'address.country'               => 'required|string|max:100',
            'address.zip'                   => 'required|string|max:20',
            'address.phone'                 => ['required','min:10','unique:supplier_addresses,phone,'. $this->address['id'] , new Phone],
            'contact_person.job_title'      => 'nullable|string|max:20',
            'contact_person.prefix'         => 'required|string|max:20',
            'contact_person.first_name'     => 'required|string|max:100',
            'contact_person.middle_name'    => 'nullable|string|max:100',
            'contact_person.last_name'      => 'required|string|max:100',
            'contact_person.email'          => ['required','email','unique:supplier_contact_people,email,'. $this->contact_person['id']],
            'contact_person.phone'          => ['required','min:10','unique:supplier_contact_people,phone,'. $this->contact_person['id'] , new Phone],
            'contact_person.gender'         => 'required|string|max:20'
        ];
    }
}
