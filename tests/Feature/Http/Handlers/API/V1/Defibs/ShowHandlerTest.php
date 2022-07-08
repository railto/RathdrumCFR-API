<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;
use Laravel\Sanctum\Sanctum;
use App\Http\Resources\API\V1\DefibResource;

use function Pest\Laravel\getJson;

it('returns defib details for an authenticated user', function () {
    Sanctum::actingAs(User::factory()->create());
    $defib = Defib::factory()->create();
    $defibResource = new DefibResource($defib);

    getJson(route('api:v1:defibs:show', $defib->id))
        ->assertOk()
        ->assertExactJson($defibResource->jsonSerialize());
});
