<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RecoverPasswordRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function user(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        return (new UserResource($user))
            ->response();
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = User::create($request->validated());

        event(new Registered($user));

        return (new UserResource($user))
            ->response();
    }

    public function recover(RecoverPasswordRequest $request): JsonResponse
    {
        try {
            Password::sendResetLink($request->validated());
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 401);
        }

        return response()->json([
            'message' => 'A recover email has been sent! Check your mail.',
        ]);
    }
}
