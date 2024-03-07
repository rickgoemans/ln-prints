<?php

namespace App\Models;

use App\Support\Traits\LogsActivity;
use App\Support\Traits\ModelName;
use Illuminate\Database\Eloquent\Relations\Pivot as EloquentPivot;

abstract class Pivot extends EloquentPivot
{
    use LogsActivity;
    use ModelName;
}
