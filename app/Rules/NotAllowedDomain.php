<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotAllowedDomain implements Rule
{

    protected $bannedDomains = [
        'gmail.com',
        'yahoo.com',
        'hotmail.com',
        'outlook.com',
        'live.com',
        'aol.com',

    ];


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
        //
        $domain = substr(strrchr($value, "@"), 1);
        

        if (in_array($domain, $this->bannedDomains)) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Registering from given domain is prohibited. Please use your company or personal email address.';
    }
}
