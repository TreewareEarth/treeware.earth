<?php


namespace App\Actions\Package;

use App\Events\Package\NewPackageCreated;
use App\Package;
use App\Services\Github\PackageExplorer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class CreatePackageAction
{
    public function execute($package_url): Package
    {
        Log::info('Creating a package inside CreatePackageAction');

        $description = null;

        $github_info = (new PackageExplorer())->getGitHubRepoInfo($package_url);

        if ($content = (new PackageExplorer())->getJsonFileContent($package_url, 'composer')) {
            $description = Arr::get($content, 'description', null);
        } elseif ($content = (new PackageExplorer())->getJsonFileContent($package_url, 'package')) {
            $description = Arr::get($content, 'description', null);
        } else {
            $description = Arr::get($github_info, 'description', null);
        }

        if (empty($description)) {
            $description = 'No description, website, or topics provided.';
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
