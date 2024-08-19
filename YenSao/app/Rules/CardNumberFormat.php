<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CardNumberFormat implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^\d{4}-\d{4}-\d{4}$/', $value)) {
            // If the value does not match the format, call the $fail closure
            $fail('The ' . $attribute . ' format must be xxxx-xxxx-xxxx.');
        }

    }
}
