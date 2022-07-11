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

        $token = $request->user()->createToken($request->fingerprint());

        return new JsonResponse(['token' => $token->plainTextToken], Http::OK);
    }
}
