<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules\Password;

class StrongPassword implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $rule = Password::min(8);

        if (!$rule->symbols()) {
            /**
             * :attribute will be replaced with the $attribute name
             * if $attribute has the value "Nickname" the $fail error
             * will return "The nickname must contain symbols."
             */
            $fail('The :attribute must contain symbols.');
        }
    }
}
