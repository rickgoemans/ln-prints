<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** {@inerhitdoc} */
    public function register(): void
    {
        //
    }

    /** {@inerhitdoc} */
    public function boot(): void
    {
        Model::preventLazyLoading(!app()->isProduction());
    }
}
