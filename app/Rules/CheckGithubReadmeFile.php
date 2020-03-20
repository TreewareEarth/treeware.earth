<?php

namespace App\Rules;

use App\Services\Github\PackageExplorer;
use Illuminate\Contracts\Validation\Rule;

class CheckGithubReadmeFile implements Rule
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
        return (new PackageExplorer())->hasGithubReadmeFile($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Github Readme file does not exist !';
    }
}
