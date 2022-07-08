<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;

use Laravel\Sanctum\Sanctum;
use App\Http\Resources\API\V1\DefibResource;

use function Pest\Laravel\getJson;

it('returns a list of publicly accessible defibs to a guest', function () {
    $public = Defib::factory(random_int(1, 10))->public()->create();
    $private = Defib::factory(random_int(1, 10))->private()->create();

    $publicResource = DefibResource::collection($public);
    $privateResource = DefibResource::collection($private);

    getJson(route('api:v1:defibs:index'))
        ->assertOk()
        ->assertJsonCount($public->count())
        ->assertExactJson($publicResource->jsonSerialize())
        ->assertJsonMissingExact($privateResource->jsonSerialize());
});

it('returns a list of all defibs to an authenticated user', function () {
    Sanctum::actingAs(User::factory()->create());
    $defibs = Defib::factory(random_int(1, 10))->create();
    $defibResourceCollection = DefibResource::collection($defibs);

    getJson(route('api:v1:defibs:index'))
        ->assertOk()
        ->assertJsonCount($defibs->count())
        ->assertExactJson($defibResourceCollection->jsonSerialize());
});
