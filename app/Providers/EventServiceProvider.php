<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /** {@inerhitdoc} */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /** {@inerhitdoc} */
    public function boot(): void
    {
        //
    }

    /** {@inerhitdoc} */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}