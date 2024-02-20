<?php

namespace App\Http\Swagger\Models;

/**
 * Class PaginationLinks
 *
 * @package App\Http\Swagger\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 * @OA\Schema(
 *     description="Pagination links model",
 *     title="Pagination links model",
 *     required={"first", "last"},
 *     @OA\Xml(
 *         name="PaginationLinks"
 *     )
 * )
 */
class PaginationLinks
{
    /**
     * @OA\Property(
     *     title="First page link",
     *     description="First page link"
     * )
     *
     * @var string
     */
    private $first;

    /**
     * @OA\Property(
     *     title="Last page link",
     *     description="Last page link"
     * )
     *
     * @var string
     */
    private $last;

    /**
     * @OA\Property(
     *     title="Previous page link",
     *     description="Previous page link"
     * )
     *
     * @var string
     */
    private $prev;

    /**
     * @OA\Property(
     *     title="Next page link",
     *     description="Next page link"
     * )
     *
     * @var string
     */
    private $next;
}
