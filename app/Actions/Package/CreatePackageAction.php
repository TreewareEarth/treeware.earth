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

        $package = new PackageExplorer();
        $githubInfo = $package->getGitHubRepoInfo($package_url);

        if ($content = $package->parseJsonFile($package_url, 'composer.json')) {
            $description = Arr::get($content, 'description');
        } elseif ($content = $package->parseJsonFile($package_url, 'package.json')) {
            $description = Arr::get($content, 'description');
        }

        if (is_null($description) || empty($description)) {
            $description = Arr::get($githubInfo, 'description')
                ? Arr::get($githubInfo, 'description')
                : 'No description, website, or topics provided.';
        }

        $package = Package::create([
            'owner' => $githubInfo['owner']['login'],
            'package_name' => $githubInfo['name'],
            'owner_avatar_url' => $githubInfo['owner']['avatar_url'],
            'description' => $description,
            'package_url' => $package_url,
        ]);

        event(new NewPackageCreated($package));

        return $package;
    }
}
