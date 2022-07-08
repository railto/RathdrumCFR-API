<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth:')->group(function (): void {
    Route::post('login', App\Http\Handlers\API\Auth\LoginHandler::class)->name('login');
});
