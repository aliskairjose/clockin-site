<?php

namespace App\Listeners;

use App\Mail\VerifiedEmail;
use App\Mail\Welcome;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class LogVerifiedUser
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
     * @param  Verified  $event
     * @return void
     */
    public function handle(Verified $event)
    {
        $email = $event->user->email;
        Mail::to($email)->queue(new VerifiedEmail()); // Correo de verificación de cuenta
        Mail::to($email)->queue(new Welcome()); // Correo de bienvenida e invitacion a descargar la app
    }
}
