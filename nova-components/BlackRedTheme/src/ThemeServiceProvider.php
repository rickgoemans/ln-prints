<?php

namespace Lnprints\BlackRedTheme;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ThemeServiceProvider extends ServiceProvider
{
    /** {@inerhitdoc} */
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::theme(asset('/lnprints/black-red-theme/theme.css'));
        });

        $this->publishes([
            __DIR__ . '/../resources/css' => public_path('lnprints/black-red-theme'),
        ], 'public');
    }

    /** {@inerhitdoc} */
    public function register(): void
    {
        //
    }
}
