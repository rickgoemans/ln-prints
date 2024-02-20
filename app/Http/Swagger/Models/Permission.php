<?php

namespace App\Http\Swagger\Models;

/**
 * Class Permission
 *
 * @package App\Model\ApiProperties
 * @author Rick Goemans <rickgoemans@gmail.com>
 * @OA\Schema (
 *     description="Permission model",
 *     title="Permission model",
 *     required={"name", "guard_name",},
 *     @OA\Xml(
 *         name="Permission",
 *     )
 * )
 */
class Permission extends Model
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
     *     title="Guard name",
     *     description="Guard name",
     *     enum={"web", "api",},
     * )
     *
     * @var string
     */
    private $guard_name;
}
