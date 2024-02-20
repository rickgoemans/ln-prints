<?php

namespace App\Http\Swagger\Models;

/**
 * Class Role
 *
 * @package App\Model\ApiProperties
 * @author Rick Goemans <rickgoemans@gmail.com>
 * @OA\Schema (
 *     description="Role model",
 *     title="Role model",
 *     required={"name", "guard_name",},
 *     @OA\Xml(
 *         name="Role",
 *     )
 * )
 */
class Role extends Model
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
