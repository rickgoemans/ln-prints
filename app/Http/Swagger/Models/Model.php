<?php

namespace App\Http\Swagger\Models;

use Carbon\Carbon;

/**
 * Class Model
 *
 * @package App\Http\Swagger\Models
 */
abstract class Model
{
    /**
     * @OA\Property(
     *     format="int64",
     *     description="ID",
     *     title="ID",
     *     readOnly=true,
     * )
     *
     * @var int
     */
    private int $id;

    /**
     * @OA\Property(
     *     title="Title",
     *     description="Title",
     *     readOnly=true,
     * )
     *
     * @var string|int|null
     */
    private $_title;

    /**
     * @OA\Property(
     *     title="Subtitle",
     *     description="Subtitle",
     *     readOnly=true,
     * )
     *
     * @var string|int|null
     */
    private $_subtitle;

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

    /**
     * @OA\Property(
     *     description="Activities",
     *     title="Activities",
     *     readOnly=true,
     *     @OA\Xml(
     *         name="Activity",
     *         wrapped=true,
     *     ),
     * )
     *
     * @var Activity[]
     */
    private array $activities;
}
