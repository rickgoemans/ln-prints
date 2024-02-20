<?php

namespace App\Models;

use App\Support\Traits\HasTitles;
use App\Support\Traits\LogsActivity;
use App\Support\Traits\ModelName;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Model
 *
 * @package App\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
abstract class Model extends Eloquent
{
    use HasTitles;
    use LogsActivity;
    use ModelName;
}
