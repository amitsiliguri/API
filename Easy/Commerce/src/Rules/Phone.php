<?php

namespace Easy\Commerce\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Phone
 * @package Easy\Commerce\Rules
 */
class Phone implements Rule
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (preg_match("/^([0-9\s\-\+\(\)]*)$/",$value)) {
            return true;
        }else { 
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The phone number format is wrong.';
    }
}
