<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SaudiOfficialId implements Rule
{

    /**
     * Determine if the given value is a valid Saudi id.
     *
     * @param  string $attribute
     * @param  mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Bypass the rule in local environment.
        if (app()->environment('local')) {
            return true;
        }

        return in_array($this->verifyOfficialId($value), [1, 2]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('The Saudi Id / Iqama Id is not valid.');
    }

    /**
     * Validate a Saudi / Iqama Id.
     *
     * @link https://github.com/alhazmy13/Saudi-ID-Validator
     *
     * @param integer $id_number to validate
     *
     * @return bool|int|string -1 if not valid, 1 for Saudi, 2 for non-saudis
     */
    protected function verifyOfficialId($id_number)
    {
        $id = trim($id_number);
        if (! is_numeric($id)) {
            return -1;
        }
        if (strlen($id) !== 10) {
            return -1;
        }
        $type = substr($id, 0, 1);
        if ($type != 2 && $type != 1) {
            return -1;
        }
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            if ($i % 2 == 0) {
                $ZFOdd = str_pad((substr($id, $i, 1) * 2), 2, "0", STR_PAD_LEFT);
                $sum   += substr($ZFOdd, 0, 1) + substr($ZFOdd, 1, 1);
            } else {
                $sum += substr($id, $i, 1);
            }
        }

        return $sum % 10 ? -1 : $type;
    }
}
