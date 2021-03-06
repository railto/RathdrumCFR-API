<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;
use Laravel\Sanctum\Sanctum;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;

use function Pest\Laravel\postJson;

it('allows an authenticated user with permission to create a new defib', function () {
    Sanctum::actingAs(User::factory()->create()->givePermissionTo('defib.create'));
    $data = Defib::factory()->make()->toArray();

    expect(Defib::count())->toEqual(0);

    $result = postJson(route('api:defibs:store', $data));

    expect(Defib::count())->toEqual(1);
    $defib = Defib::first();

    $result->assertStatus(Http::CREATED)
        ->assertExactJson(['data' => (DefibResource::make($defib))->jsonSerialize()]);
});

it('does not allow an authenticated user without permission to create a new defib', function () {
    Sanctum::actingAs(User::factory()->create());
    $data = Defib::factory()->make()->toArray();

    expect(Defib::count())->toEqual(0);

    postJson(route('api:defibs:store', $data))
        ->assertStatus(Http::FORBIDDEN);

    expect(Defib::count())->toEqual(0);
});

it('does not allow an unauthenticated user to create a new defib', function () {
    $data = Defib::factory()->make()->toArray();

    expect(Defib::count())->toEqual(0);

    postJson(route('api:defibs:store', $data))
        ->assertStatus(Http::UNAUTHORIZED);

    expect(Defib::count())->toEqual(0);
});
