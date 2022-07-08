<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Handlers\API\V1\HealthcheckHandler::class)->name('ping');

Route::prefix('defibs')->as('defibs:')->group(static function (): void {
    Route::get('/', App\Http\Handlers\API\V1\Defibs\IndexHandler::class)->name('index');

    Route::middleware(['auth:sanctum'])->group(static function (): void {
        Route::post('/', App\Http\Handlers\API\V1\Defibs\StoreHandler::class)->name('store');
        Route::get('/{defib}', App\Http\Handlers\API\V1\Defibs\ShowHandler::class)->name('show');
        Route::put('/{defib}', App\Http\Handlers\API\V1\Defibs\UpdateHandler::class)->name('update');
    });
});
