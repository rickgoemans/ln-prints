<?php

namespace App\Models;

use App\Support\Traits\HasTitles;
use App\Support\Traits\LogsActivity;
use App\Support\Traits\ModelName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission
 *
 * @package App\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class Permission extends SpatiePermission
{
    use HasFactory;
    use HasTitles;
    use LogsActivity;
    use ModelName;

    /* ACCESSORS & MUTATORS */
    public function getTitleAttribute(): ?string
    {
        return $this->name;
    }
}
