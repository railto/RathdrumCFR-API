<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;
use Laravel\Sanctum\Sanctum;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\DefibResource;

use function Pest\Laravel\getJson;

it('returns defib details for an authenticated user', function () {
    Sanctum::actingAs(User::factory()->create()->givePermissionTo('defib.view'));
    $defib = Defib::factory()->create();

    getJson(route('api:v1:defibs:show', ['uuid' => $defib->uuid]))
        ->assertStatus(Http::OK)
        ->assertExactJson(['data' => (DefibResource::make($defib))->jsonSerialize()]);
});

it('returns error if invalid uuid passed', function () {
    Sanctum::actingAs(User::factory()->create()->givePermissionTo('defib.view'));
    $uuid = Str::uuid()->toString();

    getJson(route('api:v1:defibs:show', ['uuid' => $uuid]))
    ->assertStatus(Http::NOT_FOUND);
});
