<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Handlers\API\V1\HealthcheckHandler;
use App\Http\Handlers\API\V1\Defibs\ShowDefibHandler;
use App\Http\Handlers\API\V1\Defibs\ListDefibsHandler;
use App\Http\Handlers\API\V1\Defibs\StoreDefibHandler;
use App\Http\Handlers\API\V1\Defibs\UpdateDefibHandler;
use App\Http\Handlers\API\V1\Members\StoreMemberHandler;
use App\Http\Handlers\API\V1\Defibs\Notes\StoreDefibNoteHandler;

Route::get('/', HealthcheckHandler::class)->name('ping');

Route::get('defibs/', ListDefibsHandler::class)->name('defibs:index');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('defibs')->as('defibs:')->group(function () {
        Route::post('/', StoreDefibHandler::class)->name('store');
        Route::get('/{uuid}', ShowDefibHandler::class)->name('show');
        Route::put('/{uuid}', UpdateDefibHandler::class)->name('update');

        Route::prefix('/{uuid}/notes')->as('notes:')->group(function () {
            Route::post('/', StoreDefibNoteHandler::class)->name('store');
        });
    });

    Route::prefix('members')->as('members:')->group(function () {
        Route::post('/', StoreMemberHandler::class)->name('store');
        Route::get('/', function () {
            return \App\Http\Resources\API\V1\MemberResource::collection(\App\Models\Member::all());
        });
    });
});
