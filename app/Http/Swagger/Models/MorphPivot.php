<?php

namespace App\Http\Swagger\Models;

use Carbon\Carbon;

/**
 * Class MorphPivot
 *
 * @package App\Http\Swagger\Models
 * @OA\Schema (
 *     description="MorphPivot model",
 *     title="MorphPivot model",
 *     required={},
 *     @OA\Xml(
 *         name="MorphPivot",
 *     )
 * )
 */
abstract class MorphPivot
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
