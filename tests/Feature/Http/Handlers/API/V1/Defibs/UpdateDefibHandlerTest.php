<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;

use Laravel\Sanctum\Sanctum;
use JustSteveKing\StatusCode\Http;

use App\Http\Resources\API\V1\DefibResource;

use function Pest\Laravel\putJson;

it('allows an authenticated user to update a defib', function () {
    Sanctum::actingAs(User::factory()->create());
    $defib = Defib::factory()->create();
    $defib->name = 'Updated Defib';

    putJson(route('api:v1:defibs:update', $defib->uuid), $defib->toArray())
        ->assertStatus(Http::ACCEPTED)
        ->assertExactJson(['data' => (DefibResource::make($defib))->jsonSerialize()]);
});
