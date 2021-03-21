<?php


namespace Easy\Commerce\Http\Requests\Catalog\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

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
        if ($this->id) {
            $rule['title'] = ['required','unique:suppliewarehousesr_contact_people,email,'. $this->id];
        }else {
            $rule['email'] = 'required|unique:warehouses,title';
        }
        return $rule;
    }
}
