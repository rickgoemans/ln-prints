<?php

namespace App\Models;

use App\Support\Traits\LogsActivity;
use App\Support\Traits\ModelName;
use Illuminate\Database\Eloquent\Relations\MorphPivot as EloquentMorphPivot;

/**
 * Class MorphPivot
 *
 * @package App\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
abstract class MorphPivot extends EloquentMorphPivot
{
    use LogsActivity;
    use ModelName;
}
