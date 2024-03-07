<?php

namespace App\Models;

use App\Support\Traits\HasTitles;
use App\Support\Traits\ModelName;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Activitylog\Models\Activity as SpatieActivity;

class Activity extends SpatieActivity
{
    use HasTitles;
    use ModelName;

    protected function subtitle(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes): ?string => $attributes['description'],
        );
    }
}
