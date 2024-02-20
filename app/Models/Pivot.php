<?php

namespace App\Models;

use App\Support\Traits\LogsActivity;
use App\Support\Traits\ModelName;
use Illuminate\Database\Eloquent\Relations\Pivot as EloquentPivot;

/**
 * Class Pivot
 *
 * @package App\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
abstract class Pivot extends EloquentPivot
{
    use LogsActivity;
    use ModelName;
}
