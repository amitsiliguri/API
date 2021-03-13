<?php

namespace Easy\Commerce\Rules;

use Illuminate\Contracts\Validation\Rule;

class Status implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        switch ($value) {
            case 'Active':
                return true;
                break;
            case 'Inactive':
                return true;
                break;
            case 'Blocked':
                return true;
                break;
            default:
                return false;
                break;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'We don\'t recognize this status. Please insert a valid status.';
    }
}
