<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /** {@inheritdoc} */
    protected $levels = [
        //
    ];

    /** {@inheritdoc} */
    protected $dontReport = [
        //
    ];

    /** {@inheritdoc} */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /** {@inheritdoc} */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}