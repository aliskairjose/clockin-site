<?php

namespace App\Listeners;

use App\Events\EmailChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailChangeNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EmailChanged  $event
     * @return void
     */
    public function handle(EmailChanged $event)
    {
        $event->user->sendEmailVerificationNotification();

    }
}
