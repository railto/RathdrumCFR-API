<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::as('auth:')->group(static function (): void {
    Route::post('login', App\Http\Handlers\API\Auth\LoginHandler::class)->name('login');
});
