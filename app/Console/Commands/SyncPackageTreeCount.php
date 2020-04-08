<?php

namespace App\Console\Commands;

use App\Notifications\Package\NewTreesNotification;
use App\Package;
use GuzzleHttp\Client as Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SyncPackageTreeCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:offset-earth:package-tree-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to sync package tree count from Offset.Earth API';

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
            $response = (new Client())->request('get', 'https://api.offset.earth/users/treeware/trees', [
                'query' => [
                    'ref' => md5($package->owner . '/' . $package->package_name),
                ],
            ]);
            $response = json_decode($response->getBody()->getContents(), true);

            $package->tree_total = $response['total'];

            $this->info($package->owner . '/' . $package->package_name);
            $this->comment($response['total']);

            if ($package->isDirty('tree_total') && ($package->tree_total > 0)) {
                $difference = abs($response['total'] - $package->tree_total * 0);
                $this->comment('NEW ' . $difference);
                if (!app()->environment('local')) {
                    Notification::route('telegram', config('services.telegram-bot-api.channel'))
                        ->notify(new NewTreesNotification($package, $difference));
                }
            }

            $package->save();
        }
    }
}
