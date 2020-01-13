<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Package\ValidatePackageRequest;
use App\Package;
use App\Services\Github\PackageExplorer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function store(ValidatePackageRequest $request)
    {


            /*
             * TODO
             * Get the package information/description to save in the DB
             * 1. Look to see if we can find a composer.json file
             * 2. Look to see if we can find a packages.json file
             * 3. Fallback to use the GitHub info for description
             *
             * 4. Always load the GitHUb information to get further info we need below
             */

        $github_info = (new PackageExplorer())->getGitHubRepoInfo($request->get('package_url'));

//        dd($github_info);

        if ($content = (new PackageExplorer())->getJsonFileContent($request->get('package_url'))) {
            $description = $content['description'];
        } elseif ($description = (new PackageExplorer())->getJsonFileContent($request->get('package_url'), 'package')) {
            $description = $content['description'];
        } else {
            $description = $github_info['description'];
        }


            return Package::create([
                'owner' => $github_info['owner']['login'],
                'package_name' => $github_info['name'],
                'owner_avatar_url' => $github_info['owner']['avatar_url'],
                'description' => $description,
                'package_url' => $request->get('package_url')
            ]);
    }
}
