<?php


namespace App\Actions\Package;

use App\Events\Package\NewPackageCreated;
use App\Package;
use App\Services\Github\PackageExplorer;
use Illuminate\Support\Facades\Log;

class CreatePackageAction
{
    public function execute($package_url): Package
    {
        Log::info('Creating a package inside CreatePackageAction');

        $github_info = (new PackageExplorer())->getGitHubRepoInfo($package_url);

        if ($content = (new PackageExplorer())->getJsonFileContent($package_url, 'composer')) {
            $description = $content['description'];
        } elseif ($content = (new PackageExplorer())->getJsonFileContent($package_url, 'package')) {
            $description = $content['description'];
        } else {
            $description = $github_info['description'];
        }

        $package = Package::create([
            'owner' => $github_info['owner']['login'],
            'package_name' => $github_info['name'],
            'owner_avatar_url' => $github_info['owner']['avatar_url'],
            'description' => $description,
            'package_url' => $package_url,
        ]);

        event(new NewPackageCreated($package));

        return $package;
    }
}
