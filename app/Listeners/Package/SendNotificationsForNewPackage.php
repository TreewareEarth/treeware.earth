<?php

namespace App\Listeners\Package;

use App\Events\Package\NewPackageCreated;
use App\Notifications\Package\NewPackageNotification;
use App\Package;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNotificationsForNewPackage implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param Package $event
     * @return void
     */
    public function handle(NewPackageCreated $event)
    {
        if (!app()->environment('local')) {
            Notification::route('telegram', config('services.telegram-bot-api.channel'))
                ->notify(new NewPackageNotification($event->package));
        }
    }
}
