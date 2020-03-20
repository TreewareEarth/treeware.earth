<?php

namespace App\Http\Requests\Api\Package;

use App\Rules\CheckGithubReadmeFile;
use App\Rules\Treeware;
use Illuminate\Foundation\Http\FormRequest;

class ValidatePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        /*
         * TODO
         * 1. Validate the package is unique and not already added
         * 2. Validate that we can find the README.md file
         * 3. Validate that we can find "treeware" inside the README.md file
         */

        return [
            'package_url' => ['bail', 'required', 'url', 'unique:packages', new CheckGithubReadmeFile, new Treeware],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please write your name.',
            'package_url.required' => 'Please provide package url',
        ];
    }
}
