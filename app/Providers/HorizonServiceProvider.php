<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /** {@inerhitdoc} */
    public function boot(): void
    {
        parent::boot();

        // Horizon::routeSmsNotificationsTo('15556667777');
        // Horizon::routeMailNotificationsTo('example@example.com');
        // Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');

        // Horizon::night();
    }

    /** {@inerhitdoc} */
    protected function gate(): void
    {
        Gate::define('viewHorizon', function (?User $user) {
            return $user && $user->can(config('ln-prints.permissions.packages.horizon'));
        });
    }
}
