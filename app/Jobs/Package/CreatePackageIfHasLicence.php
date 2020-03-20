<?php

namespace App\Jobs\Package;

use App\Actions\Package\CreatePackageAction;
use App\Rules\CheckGithubReadmeFile;
use App\Rules\Treeware;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CreatePackageIfHasLicence implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $package_url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($package_url)
    {
        $this->package_url = $package_url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('Inside the job to check a package to see if it has Treeware.');

        $validator = Validator::make([
            'package_url' => $this->package_url,
        ], [
            'package_url' => ['bail', 'required', 'url', 'unique:packages', new CheckGithubReadmeFile, new Treeware],
        ]);

        if ($validator->fails()) {
            Log::info('Validation failed, moving on...');

            return null;
        }

        $package = (new CreatePackageAction())->execute($this->package_url);
    }
}
