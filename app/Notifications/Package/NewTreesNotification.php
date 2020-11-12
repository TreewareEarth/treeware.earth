<?php

namespace App\Notifications\Package;

use App\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class NewTreesNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $package;
    protected $difference;

    public function __construct(Package $package, $difference)
    {
        $this->package = $package;
        $this->difference = $difference;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->content('We are pleased to announce that someone has just added ' . $this->difference . ' trees to the Treeware forest for the package ' . $this->package->owner . '/' . $this->package->package_name . '. This package has now contributed a total of ' . $this->package->tree_total . ' trees.');
    }
}
