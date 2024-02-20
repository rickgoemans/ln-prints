<?php

namespace App\Http\Swagger\Models;

/**
 * Class Project
 *
 * @package App\Http\Swagger\Models
 * @OA\Schema (
 *     description="Project model",
 *     title="Project model",
 *     required={"nl_name", "en_name", "nl_description", en_description",},
 *     @OA\Xml(
 *         name="Project",
 *     )
 * )
 */
class Project extends Model
{
    /**
     * @OA\Property(
     *     title="NL name",
     *     description="NL name"
     * )
     *
     * @var string
     */
    private $nl_name;

    /**
     * @OA\Property(
     *     title="EN name",
     *     description="EN name"
     * )
     *
     * @var string
     */
    private $en_name;

    /**
     * @OA\Property(
     *     title="NL description",
     *     description="NL description"
     * )
     *
     * @var string
     */
    private $nl_description;

    /**
     * @OA\Property(
     *     title="EN description",
     *     description="EN description"
     * )
     *
     * @var string
     */
    private $en_description;
}
