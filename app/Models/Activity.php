<?php

namespace App\Models;

use App\Support\Traits\HasTitles;
use App\Support\Traits\ModelName;
use Spatie\Activitylog\Models\Activity as SpatieActivity;

/**
 * Class Activity
 *
 * @package App\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class Activity extends SpatieActivity
{
    use HasTitles;
    use ModelName;

    /* ACCESSORS & MUTATORS */
    public function getSubtitleAttribute(): ?string
    {
        return $this->description;
    }
}
