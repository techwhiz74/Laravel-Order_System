<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExcludeFileTypes implements Rule
{
    protected $excludedTypes = ['exe', 'bat'];

    public function passes($attribute, $value)
    {
        $extension = strtolower($value->getClientOriginalExtension());
        return !in_array($extension, $this->excludedTypes);
    }

    public function message()
    {
        return 'The :attribute must not be a .exe or .bat file.';
    }
}
