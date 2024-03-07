<?php

namespace App\Nova\Fields;

use Laravel\Nova\Fields\Date as NovaDate;

class Date extends NovaDate
{
    /** {@inerhitdoc} */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->firstDayOfWeek(1)
            ->format('D-M-YYYY')
            ->pickerDisplayFormat('d-m-Y');
    }
}