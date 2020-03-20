<?php

namespace App\Notifications\Package;

use App\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class NewPackageNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $package;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class, TwitterChannel::class];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->content('We are pleased to announce that ' . $this->package->owner . '/' . $this->package->package_name . ' has just been updated to #Treeware and added to our website. Check out the package ' . $this->package->package_url);
    }


    public function toTwitter($notifiable)
    {
        return new TwitterStatusUpdate('We are pleased to announce that ' . $this->package->owner . '/' . $this->package->package_name . ' has just been updated to #Treeware and added to our website. Check out the package ' . $this->package->package_url);
    }
}
