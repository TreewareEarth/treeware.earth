<?php

namespace App\Rules;

use App\Services\Github\PackageExplorer;
use Illuminate\Contracts\Validation\Rule;

class Treeware implements Rule
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
        return (new PackageExplorer())->findTextInReadme($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'We cannot find the Treeware terms of use in your README.md file.';
    }
}
