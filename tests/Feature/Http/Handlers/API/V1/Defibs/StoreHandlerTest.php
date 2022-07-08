<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;
use Laravel\Sanctum\Sanctum;

use JustSteveKing\StatusCode\Http;

use App\Http\Resources\API\V1\DefibResource;

use function Pest\Laravel\postJson;

it('allows an authenticated user to create a new defib', function () {
    Sanctum::actingAs(User::factory()->create());
    $data = Defib::factory()->make()->toArray();

    expect(Defib::count())->toEqual(0);

    $result = postJson(route('api:v1:defibs:store', $data));

    expect(Defib::count())->toEqual(1);
    $defib = Defib::first();
    $resource = new DefibResource($defib);

    $result->assertStatus(Http::CREATED)
        ->assertExactJson($resource->jsonSerialize());
});

it('does not allow an unauthenticated user to create a new defib', function () {
    $data = Defib::factory()->make()->toArray();

    expect(Defib::count())->toEqual(0);

    postJson(route('api:v1:defibs:store', $data))
        ->assertStatus(Http::UNAUTHORIZED);

    expect(Defib::count())->toEqual(0);
});
