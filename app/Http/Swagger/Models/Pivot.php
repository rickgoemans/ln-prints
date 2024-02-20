<?php

namespace App\Http\Swagger\Models;

use Carbon\Carbon;

/**
 * Class Pivot
 *
 * @package App\Http\Swagger\Models
 */
abstract class Pivot
{
    /**
     * @OA\Property(
     *     format="date-time",
     *     description="Created at",
     *     title="Created at",
     *     type="string",
     *     readOnly=true,
     * )
     *
     * @var Carbon
     */
    private Carbon $created_at;

    /**
     * @OA\Property(
     *     format="date-time",
     *     description="Updated at",
     *     title="Updated at",
     *     type="string",
     *     readOnly=true,
     * )
     *
     * @var Carbon
     */
    private Carbon $updated_at;
}
