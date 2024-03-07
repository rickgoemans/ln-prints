<?php

namespace App\Models;

use App\Support\Traits\HasTitles;
use App\Support\Traits\LogsActivity;
use App\Support\Traits\ModelName;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;
    use HasTitles;
    use LogsActivity;
    use ModelName;

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes): ?string => $attributes['name'],
        );
    }
}
