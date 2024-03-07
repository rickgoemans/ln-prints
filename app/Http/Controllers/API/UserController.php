<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateUserRequest;
use App\Http\Requests\API\DeleteUserRequest;
use App\Http\Requests\API\UpdateUserRequest;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $users = User::paginate(20);

        return UserCollection::make($users)
            ->response();
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        /** @var User|null $user */
        $user = User::create($request->validated());

        if (!$user) {
            return response()->json([
                'error' => __('Failed to create user.'),
            ], 400);
        }

        return UserResource::make($user)
            ->response();
    }

    public function show(Request $request, User $user): JsonResponse
    {
        return UserResource::make($user)
            ->response();
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $updated = $user->update($request->validated());

        if (!$updated) {
            return response()->json([
                'message' => __('Failed to update user.'),
            ], 400);
        }

        return UserResource::make($user)
            ->response();
    }

    public function destroy(DeleteUserRequest $request, User $user): JsonResponse
    {
        $user->delete();

        return response()
            ->json([
                'message' => __('User deleted successfully.'),
            ]);
    }
}
