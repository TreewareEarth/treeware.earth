<?php


namespace App\Services\Github;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Arr;

class PackageExplorer
{
    public const GITHUB_RAW_DOMAIN = 'https://raw.githubusercontent.com';
    public const GITHUB_API_DOMAIN = 'https://api.github.com';


    public function hasGithubReadmeFile($url): bool
    {
        return ($this->getContent($this->getGithubRawUrlToFile($url, 'README.md')));
    }

    public function findTextInReadme($url, $text = 'treeware'): bool
    {
        $content = $this->getContent($this->getGithubRawUrlToFile($url, 'README.md'));

        return strpos(strtolower($content), $text) !== false;
    }

    public function parseJsonFile($url, $filename = 'composer.json'):? array
    {
        $content = $this->getContent($this->getGithubRawUrlToFile($url, $filename));

        return ($content) ? json_decode($content, true) : null;
    }

    public function getGitHubRepoInfo($url):? array
    {
        $path = ltrim(parse_url($url)['path'], '/');
        $fullUrl = sprintf('%s/repos/%s', self::GITHUB_API_DOMAIN, $path);
        $content = $this->getContent($fullUrl);

        return ($content) ? json_decode($content, true) : null;
    }

    private function getGithubRawUrlToFile($url, $filename): string
    {
        $path = ltrim(parse_url($url)['path'], '/');
        $defaultBranch = Arr::get($this->getGitHubRepoInfo($url), 'default_branch', 'master');

        return sprintf('%s/%s/%s/%s', self::GITHUB_RAW_DOMAIN, $path, $defaultBranch, $filename);
    }

    private function getContent($fullUrl):? string
    {
        try {
            $response = (new Client())->get($fullUrl);
        } catch (\Exception $e) {
            return null;
        }

        if ($response->getStatusCode() >= 400) {
            return null;
        }

        return $response->getBody()->getContents();
    }
}
