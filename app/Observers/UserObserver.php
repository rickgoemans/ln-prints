<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

class UserObserver
{
    public function saved(User $user): void
    {
        if ($user->wasRecentlyCreated || $user->wasChanged('email')) {
            $user->email_verified_at = null;
            $user->saveQuietly();

            event(new Registered($user));
        }
    }
}
