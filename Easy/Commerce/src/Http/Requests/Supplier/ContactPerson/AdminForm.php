<?php


namespace Easy\Commerce\Http\Requests\Supplier\ContactPerson;

use Illuminate\Foundation\Http\FormRequest;

use Easy\Commerce\Rules\Phone;

class AdminForm extends FormRequest
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
        $rule = [
            'job_title'      => 'nullable|string|max:20',
            'prefix'         => 'required|string|max:20',
            'first_name'     => 'required|string|max:100',
            'middle_name'    => 'nullable|string|max:100',
            'last_name'      => 'required|string|max:100',
            'gender'         => 'required|string|max:20'
        ];

        if ($this->id) {
            $rule['email'] = ['required','email','unique:supplier_contact_people,email,'. $this->id];
            $rule['phone'] = ['required','min:10','unique:supplier_contact_people,phone,'. $this->id , new Phone];
        }else {
            $rule['email'] = 'required|email|unique:supplier_contact_people,email';
            $rule['phone'] = ['required', new Phone ,'min:10','unique:supplier_contact_people,phone'];
        }

        return $rule;

    }
}
