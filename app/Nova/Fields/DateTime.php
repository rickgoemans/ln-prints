<?php

namespace App\Nova\Fields;

use Laravel\Nova\Fields\DateTime as NovaDateTime;

class DateTime extends NovaDateTime
{
    /** {@inerhitdoc} */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->firstDayOfWeek(1)
            ->format('D-M-YYYY HH:mm')
            ->pickerDisplayFormat('d-m-Y H:i');
    }
}