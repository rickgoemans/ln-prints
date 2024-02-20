<?php

namespace App\Http\Swagger\Models;

use Carbon\Carbon;

/**
 * Class Activity
 *
 * @package App\Http\Swagger\Models
 * @OA\Schema (
 *     description="Activity model",
 *     title="Activity model",
 *     required={"log_name", "desccription", "subject_id", "subject_type", "causer_id", "causer_type", "properties",},
 *     @OA\Xml(
 *         name="Activity",
 *     )
 * )
 */
class Activity
{
    /**
     * @OA\Property(
     *     format="int64",
     *     description="ID",
     *     title="ID",
     *     readOnly=true,
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     title="Log name",
     *     description="Log name"
     * )
     *
     * @var string
     */
    private $log_name;

    /**
     * @OA\Property(
     *     title="Description",
     *     description="Description"
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     format="int64",
     *     description="Subject ID",
     *     title="Subject ID",
     *     readOnly=true,
     * )
     *
     * @var integer
     */
    private $subject_id;

    /**
     * @OA\Property(
     *     title="Subject type",
     *     description="Subject type",
     *     readOnly=true,
     * )
     *
     * @var string
     */
    private $subject_type;

    /**
     * @OA\Property(
     *     format="int64",
     *     description="Causer ID",
     *     title="Causer ID",
     *     readOnly=true,
     * )
     *
     * @var integer
     */
    private $causer_id;

    /**
     * @OA\Property(
     *     title="Causer type",
     *     description="Causer type",
     *     readOnly=true,
     * )
     *
     * @var string
     */
    private $causer_type;

    /**
     * @OA\Property(
     *     description="Properties",
     *     title="Properties",
     *     readOnly=true,
     *     @OA\Xml(
     *         name="Property",
     *         wrapped=true,
     *     ),
     *     @OA\Items(
     *         type="string",
     *     )
     * )
     *
     * @var array
     */
    private $properties;

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
    private $created_at;

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
    private $updated_at;
}
