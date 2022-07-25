<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Handlers\API\HealthcheckHandler;
use App\Http\Handlers\API\Defibs\ShowDefibHandler;
use App\Http\Handlers\API\Defibs\ListDefibsHandler;
use App\Http\Handlers\API\Defibs\StoreDefibHandler;
use App\Http\Handlers\API\Defibs\UpdateDefibHandler;
use App\Http\Handlers\API\Members\StoreMemberHandler;
use App\Http\Handlers\API\Defibs\Notes\StoreDefibNoteHandler;
use App\Http\Handlers\API\Defibs\Inspections\StoreDefibInspectionsHandler;

Route::post('auth/login', App\Http\Handlers\API\Auth\LoginHandler::class)->name('auth:login');

Route::get('/ping', HealthcheckHandler::class)->name('ping');
Route::get('defibs/', ListDefibsHandler::class)->name('defibs:index');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('defibs')->as('defibs:')->group(function () {
        Route::post('/', StoreDefibHandler::class)->name('store')->can('defib.create');
        Route::get('/{uuid}', ShowDefibHandler::class)->name('show')->can('defib.view');
        Route::put('/{uuid}', UpdateDefibHandler::class)->name('update')->can('defib.update');

        Route::prefix('/{uuid}/notes')->as('notes:')->group(function () {
            Route::post('/', StoreDefibNoteHandler::class)->name('store')->can('defib.note');
        });

        Route::prefix('/{uuid}/inspections')->as('inspections:')->group(function () {
            Route::post('/', StoreDefibInspectionsHandler::class)->name('store')->can('defib.inspect');
        });
    });

    Route::prefix('members')->as('members:')->group(function () {
        Route::post('/', StoreMemberHandler::class)->name('store')->can('member.create');
    });
});
