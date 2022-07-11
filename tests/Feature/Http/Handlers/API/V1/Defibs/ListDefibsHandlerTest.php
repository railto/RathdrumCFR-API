<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;
use Laravel\Sanctum\Sanctum;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;

use function Pest\Laravel\getJson;

it('returns a list of publicly accessible defibs to a guest', function () {
    $public = Defib::factory(rand(1, 100))->public()->create();
    $private = Defib::factory(rand(1, 100))->private()->create();

    getJson(route('api:v1:defibs:index'))
        ->assertStatus(Http::OK)
        ->assertJsonCount($public->count(), 'data')
        ->assertExactJson(['data' => DefibResource::collection($public)->jsonSerialize()])
        ->assertJsonMissingExact(['data' => DefibResource::collection($private)]);
});

it('returns a list of all defibs to an authenticated user', function () {
    Sanctum::actingAs(User::factory()->create());
    $defibs = Defib::factory(rand(1, 100))->create();

    getJson(route('api:v1:defibs:index'))
        ->assertOk()
        ->assertJsonCount($defibs->count(), 'data')
        ->assertExactJson(['data' => DefibResource::collection($defibs)->jsonSerialize()]);
});
