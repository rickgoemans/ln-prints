<?php

namespace App\Http\Swagger\Models;

/**
 * Class PaginationMeta
 *
 * @package App\Http\Swagger\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 * @OA\Schema(
 *     description="Pagination meta model",
 *     title="Pagination meta model",
 *     required={"first", "last"},
 *     @OA\Xml(
 *         name="PaginationMeta"
 *     )
 * )
 */
class PaginationMeta
{
    /**
     * @OA\Property(
     *     format="int32",
     *     description="Current page",
     *     title="Current page",
     * )
     *
     * @var integer
     */
    private $current_page;

    /**
     * @OA\Property(
     *     format="int32",
     *     description="From number",
     *     title="From number",
     * )
     *
     * @var integer
     */
    private $from;

    /**
     * @OA\Property(
     *     format="int32",
     *     description="Last page",
     *     title="Last page",
     * )
     *
     * @var integer
     */
    private $last_page;

    /**
     * @OA\Property(
     *     title="Path",
     *     description="Base path"
     * )
     *
     * @var string
     */
    private $path;

    /**
     * @OA\Property(
     *     format="int32",
     *     description="Per page",
     *     title="Per page",
     * )
     *
     * @var integer
     */
    private $per_page;

    /**
     * @OA\Property(
     *     format="int32",
     *     description="To number",
     *     title="To number",
     * )
     *
     * @var integer
     */
    private $to;

    /**
     * @OA\Property(
     *     format="int32",
     *     description="Total",
     *     title="Total",
     * )
     *
     * @var integer
     */
    private $total;
}
