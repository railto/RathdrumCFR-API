<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\Auth;

use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Requests\API\Auth\LoginRequest;

class LoginHandler
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $user = $request->user();

        if (!$user) {
            return new JsonResponse(['error' => 'Authentication Failure'], Http::UNAUTHORIZED);
        }

        $token = $user->createToken($request->fingerprint());

        $userArray = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        return new JsonResponse(['token' => $token->plainTextToken, 'user' => $userArray], Http::OK);
    }
}
