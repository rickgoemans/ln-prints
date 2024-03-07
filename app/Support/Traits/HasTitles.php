<?php

namespace App\Support\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasTitles
{
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn(): string => "#{$this->getKey()}",
        );
    }

    protected function subtitle(): Attribute
    {
        return Attribute::make(
            get: fn(): string => "#{$this->getKey()}",
        );
    }
}
