<?php

namespace App\Nova\Fields;

use Laravel\Nova\Fields\Currency as NovaCurrency;

class Currency extends NovaCurrency
{
    /** {@inerhitdoc} */
    public function __construct($name, $attribute = null, $resolveCallback = null, string $currency = 'EUR')
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->currency($currency);
    }
}