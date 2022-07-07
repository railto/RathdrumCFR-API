<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Handlers\API\V1\HealthcheckHandler::class)->name('ping');
