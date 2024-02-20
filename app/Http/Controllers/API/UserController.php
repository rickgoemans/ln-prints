<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateUserRequest;
use App\Http\Requests\API\DeleteUserRequest;
use App\Http\Requests\API\UpdateUserRequest;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\API
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
class UserController extends Controller
{
    /**
     * @OA\GET(
     *     path="/api/users",
     *     tags={"users"},
     *     summary="Returns a paginated response of all users",
     *     description="Returns a paginated response of all users",
     *     operationId="getUsers",
     *     @OA\Parameter(
     *         name="page",
     *         description="Page number",
     *         required=false,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Users successfully retrieved",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 description="The data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/User"),
     *             ),
     *             @OA\Property(
     *                 property="links",
     *                 type="object",
     *                 ref="#/components/schemas/PaginationLinks",
     *             ),
     *             @OA\Property(
     *                 property="meta",
     *                 type="object",
     *                 ref="#/components/schemas/PaginationMeta",
     *             ),
     *         ),
     *     ),
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $users = User::paginate(20);

        return (new UserCollection($users))
            ->response();
    }

    /**
     * @OA\POST(
     *     path="/api/users",
     *     tags={"users"},
     *     summary="Create a user",
     *     description="Create a user",
     *     operationId="createUser",
     *     requestBody={"$ref": "#/components/requestBodies/User"},
     *     @OA\Response(
     *         response="201",
     *         description="User created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 description="The data",
     *                 ref="#/components/schemas/User",
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="Unauthorized or errors",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 description="The message",
     *                 type="string",
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 description="The object containing all errors",
     *                 type="object",
     *             ),
     *         ),
     *     ),
     * )
     *
     * @param CreateUserRequest $request
     * @return JsonResponse
     */
    public function store(CreateUserRequest $request): JsonResponse
    {
        /** @var User|null $user */
        $user = User::create($request->validated());

        if (!$user) {
            return response()->json([
                'error' => __('Failed to create user.'),
            ], 400);
        }

        return (new UserResource($user))
            ->response();
    }

    /**
     * @OA\GET(
     *     path="/api/users/{userId}",
     *     tags={"users"},
     *     summary="Get a user",
     *     description="Get a user",
     *     operationId="getUser",
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         description="ID of user to show",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="User retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 description="The data",
     *                 ref="#/components/schemas/User",
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="User not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 description="The message",
     *                 type="string",
     *                 default="No query results for [App\Models\User] ID",
     *             ),
     *         ),
     *     ),
     * )
     *
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function show(Request $request, User $user): JsonResponse
    {
        return (new UserResource($user))
            ->response();
    }

    /**
     * @OA\PUT(
     *     path="/api/users/{userId}",
     *     tags={"users"},
     *     summary="Update a user",
     *     description="Update a user",
     *     operationId="updateUser",
     *     requestBody={"$ref": "#/components/requestBodies/User"},
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         description="ID of user to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="User updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 description="The data",
     *                 ref="#/components/schemas/User",
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="Unauthorized or errors",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 description="The message",
     *                 type="string",
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 description="The object containing all errors",
     *                 type="object",
     *             ),
     *         ),
     *     ),
     * )
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $updated = $user->update($request->validated());

        if (!$updated) {
            return response()->json([
                'message' => __('Failed to update user.'),
            ], 400);
        }

        return (new UserResource($user))
            ->response();
    }

    /**
     * @OA\DELETE(
     *     path="/api/users/{userId}",
     *     tags={"users"},
     *     summary="Delete a user",
     *     description="Delete a user",
     *     operationId="deleteUser",
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         description="ID of user to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="User deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 description="The message",
     *                 type="string",
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="Unauthorized or errors",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 description="The message",
     *                 type="string",
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 description="The object containing all errors",
     *                 type="object",
     *             ),
     *         ),
     *     ),
     * )
     *
     * @param DeleteUserRequest $request
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(DeleteUserRequest $request, User $user): JsonResponse
    {
        $user->delete();

        return response()->json([
            'message' => __('User deleted successfully.'),
        ]);
    }
}
