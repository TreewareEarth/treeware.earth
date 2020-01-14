<?php

namespace App\Http\Controllers\Api;

use App\Events\Package\NewPackageCreated;
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

        $github_info = (new PackageExplorer())->getGitHubRepoInfo($request->get('package_url'));

        if ($content = (new PackageExplorer())->getJsonFileContent($request->get('package_url'))) {
            $description = $content['description'];
        } elseif ($description = (new PackageExplorer())->getJsonFileContent($request->get('package_url'), 'package')) {
            $description = $content['description'];
        } else {
            $description = $github_info['description'];
        }

        $package = Package::create([
            'owner' => $github_info['owner']['login'],
            'package_name' => $github_info['name'],
            'owner_avatar_url' => $github_info['owner']['avatar_url'],
            'description' => $description,
            'package_url' => $request->get('package_url')
        ]);

        event(new NewPackageCreated($package));

        return $package;
    }
}
