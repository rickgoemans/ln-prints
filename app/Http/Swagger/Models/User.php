<?php

namespace App\Http\Swagger\Models;

use Carbon\Carbon;

/**
 * Class User
 *
 * @package App\Http\Swagger\Models
 * @OA\Schema (
 *     description="User model",
 *     title="User model",
 *     required={"name", "email", "password",},
 *     @OA\Xml(
 *         name="User",
 *     )
 * )
 */
class User extends Model
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
     *     format="email",
     *     title="Email",
     *     description="Email"
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     format="password",
     *     title="Password",
     *     description="Password",
     *     readOnly=true,
     * )
     *
     * @var string
     */
    private $password;

    /**
     * @OA\Property(
     *     format="date-time",
     *     description="Email verified at",
     *     title="Email verified at",
     *     type="string",
     *     readOnly=true,
     * )
     *
     * @var Carbon
     */
    private $email_verified_at;
}
