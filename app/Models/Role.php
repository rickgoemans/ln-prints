<?php

namespace App\Models;

use App\Support\Traits\HasTitles;
use App\Support\Traits\LogsActivity;
use App\Support\Traits\ModelName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 *
 * @package App
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class Role extends SpatieRole
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
