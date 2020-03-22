<?php

namespace App\Console\Commands;

use App\Package;
use http\Client;
use Illuminate\Console\Command;

class SyncPackageTreeCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $packages = Package::all();

        foreach ($packages as $package) {
            $response = (new \GuzzleHttp\Client())->request('get', 'https://x.api.offset.earth/users/treeware/trees', [
                'query' => [
                    'ref' => md5($package->owner . '/' . $package->package_name),
                ],
            ]);
            $response = json_decode($response->getBody()->getContents(), true);

            $package->tree_total = $response['total'];
            $package->save();

            $this->info($package->owner . '/' . $package->package_name);
            $this->comment($response['total']);
        }
    }
}
