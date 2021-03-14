<?php

namespace Easy\Commerce\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class Status
 * @package Easy\Commerce\Rules
 */
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes(string $attribute, $value): bool
    {
        switch ($value) {
            case 'Inactive':
            case 'Blocked':
            case 'Active':
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
    public function message(): string
    {
        return 'We don\'t recognize this status. Please insert a valid status.';
    }
}
