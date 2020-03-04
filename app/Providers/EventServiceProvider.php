<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

// events
use App\Events\EmailChanged;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\Registered;

// listeners
use App\Listeners\SuccessfulLogin;
use App\Listeners\LogVerifiedUser;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\EmailChangeNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [ // event
            SendEmailVerificationNotification::class, // listener
        ],
        Login::class => [
           SuccessfulLogin::class,
        ],
        Verified::class => [
            LogVerifiedUser::class,
        ],
        EmailChanged::class => [
            EmailChangeNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
