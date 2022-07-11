<?php

declare(strict_types=1);

namespace App\Exceptions;

use Throwable;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception): JsonResponse
    {
        return new JsonResponse(['message' => $exception->getMessage()], Http::UNAUTHORIZED);
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request): JsonResponse
    {
        return new JsonResponse(['message' => $e->getMessage()], $e->status);
    }
}
