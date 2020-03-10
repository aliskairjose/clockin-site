<?php

namespace App\Listeners;

use App\Events\NewEmployee;
use App\Events\NewEmployeeEvent;
use App\Mail\WelcomeEmployee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewEmpoyeeNotification
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
     * @param  NewEmployee  $event
     * @return void
     */
    public function handle(NewEmployeeEvent $event)
    {
        $email = $event->user->email;
        $company_name = Auth::user()->companies[0]->name;

        Mail::to($email)->queue(new WelcomeEmployee($company_name)); // Correo de verificación de cuenta

    }
}
