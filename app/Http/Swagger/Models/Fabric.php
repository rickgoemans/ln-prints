<?php

namespace App\Http\Swagger\Models;

/**
 * Class Fabric
 *
 * @package App\Http\Swagger\Models
 * @OA\Schema (
 *     description="Fabric model",
 *     title="Fabric model",
 *     required={"'article_number', "name", "composition", "usable_width", "weight", "nl_description", "en_description", "two_way_stretch", "pilling_resistant", "wrinkle_free_and_easy_care", "quick_dry", "breathable", "moisture_management", "muscle_control", "uv_protection", "recycled_yarn",},
 *     @OA\Xml(
 *         name="Fabric",
 *     )
 * )
 */
class Fabric extends Model
{
    /**
     * @OA\Property(
     *     title="Name",
     *     description="Name"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Composition",
     *     description="Composition"
     * )
     *
     * @var string
     */
    private $composition;

    /**
     * @OA\Property(
     *     title="Usable with",
     *     description="Usable with"
     * )
     *
     * @var int
     */
    private $usable_with;

    /**
     * @OA\Property(
     *     title="Weight",
     *     description="Weight"
     * )
     *
     * @var int
     */
    private $weight;

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

    /**
     * @OA\Property(
     *     title="Two way stretch",
     *     description="Two way stretch"
     * )
     *
     * @var bool
     */
    private $two_way_stretch;

    /**
     * @OA\Property(
     *     title="Pilling resistant",
     *     description="Pilling resistant"
     * )
     *
     * @var bool
     */
    private $pilling_resistant;

    /**
     * @OA\Property(
     *     title="Wrinkle free and easy case",
     *     description="Wrinkle free and easy case"
     * )
     *
     * @var bool
     */
    private $wrinkle_free_and_easy_care;

    /**
     * @OA\Property(
     *     title="Quick dry",
     *     description="Quick dry"
     * )
     *
     * @var bool
     */
    private $quick_dry;

    /**
     * @OA\Property(
     *     title="Breathable",
     *     description="Breathable"
     * )
     *
     * @var bool
     */
    private $breathable;

    /**
     * @OA\Property(
     *     title="Moisture management",
     *     description="Moisture management"
     * )
     *
     * @var bool
     */
    private $moisture_management;

    /**
     * @OA\Property(
     *     title="Muscle control",
     *     description="Muscle control"
     * )
     *
     * @var bool
     */
    private $muscle_control;

    /**
     * @OA\Property(
     *     title="UV Protection",
     *     description="UV Protection"
     * )
     *
     * @var bool
     */
    private $uv_protection;

    /**
     * @OA\Property(
     *     title="Recycled yarn",
     *     description="Recycled yarn"
     * )
     *
     * @var bool
     */
    private $recycled_yarn;
}
