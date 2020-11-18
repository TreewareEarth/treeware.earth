<?php

namespace App\Console\Commands;

use App\Notifications\Package\NewTreesNotification;
use App\Package;
use GuzzleHttp\Client as Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class SyncPackageTreeCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:ecologi:package-tree-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to sync package tree count from ecologi.com API';

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
            $response = (new Client())->request('get', 'https://api.ecologi.com/users/treeware/trees', [
                'query' => [
                    'ref' => md5(Str::lower($package->owner . '/' . $package->package_name)),
                ],
            ]);
            $response = json_decode($response->getBody()->getContents(), true);

            $this->info($package->owner . '/' . $package->package_name);

            $originalTreeCount = $package->tree_total;
            $this->comment('This package currently has ' . $originalTreeCount . ' trees.');

            $this->comment('Ecologi tree count for this package is ' . $response['total'] . ' trees.');

            $package->tree_total = $response['total'];

            if ($package->isDirty('tree_total') && ($package->tree_total > 0)) {
                $difference = ($response['total'] - $originalTreeCount);
                $this->comment('NEW trees just added ' . $difference);
                if (!app()->environment('local')) {
                    Notification::route('telegram', config('services.telegram-bot-api.channel'))
                        ->notify(new NewTreesNotification($package, $difference));
                }
            }
            $package->save();
        }
    }
}
