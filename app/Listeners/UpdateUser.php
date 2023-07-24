<?php

namespace App\Listeners;

use App\Events\NotifyUser;
use App\Mail\UserNotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NotifyUser $event): void
    {
        Mail::to($event->data['email'])->send(new UserNotificationMail($event->data));
    }
}
