<?php

namespace App\Http\Swagger\Models;

use Carbon\Carbon;

trait HasSoftDelete
{
    /**
     * @OA\Property(
     *     format="date-time",
     *     description="Deleted at",
     *     title="Deleted at",
     *     type="string",
     *     readOnly=true,
     * )
     *
     * @var Carbon|null
     */
    private ?Carbon $deleted_at;
}