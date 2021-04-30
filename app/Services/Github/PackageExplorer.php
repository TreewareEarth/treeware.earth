<?php


namespace App\Services\Github;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Arr;

class PackageExplorer
{
    public function findTextInReadme($url, $text = 'treeware')
    {
        $response = (new Client())->request(
            'GET',
            'https://raw.githubusercontent.com' . (parse_url($url)['path']) . '/' . $this->getDefaultBranch($url) . '/README.md'
        );

        return strpos(strtolower(($response->getBody())->getContents()), $text) == true;
    }

    public function getJsonFileContent($url, $filename = 'composer.json')
    {
        try {
            $response = (new Client())->request(
                'GET',
                'https://raw.githubusercontent.com' . (parse_url($url)['path']) . '/' . $this->getDefaultBranch($url) . '/' . $filename,
                [
                    'stream' => true,
                ]
            );
        } catch (ClientException $e) {
            return null;
        }


        return json_decode($response->getBody()->getContents(), true);
    }

    public function getGitHubRepoInfo($url)
    {
        $response = (new Client())->request(
            'GET',
            'https://api.github.com/repos' . (parse_url($url)['path']),
            [
                'stream' => true,
            ]
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    public function hasGithubReadmeFile($url)
    {
        try {
            return (new Client())->request(
                'GET',
                'https://raw.githubusercontent.com' . (parse_url($url)['path']) . '/master/README.md',
                [
                    'stream' => true,
                ]
            );
        } catch (ClientException $e) {
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getDefaultBranch($url)
    {
        $reportData = $this->getGitHubRepoInfo($url);

        return Arr::get($reportData, 'default_branch', 'master');
    }
}
