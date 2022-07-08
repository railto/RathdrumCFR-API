<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;
use Laravel\Sanctum\Sanctum;

use JustSteveKing\StatusCode\Http;

use App\Http\Resources\API\V1\DefibResource;

use function Pest\Laravel\postJson;

it('allows an authenticated user to add a note to a defib', function () {
    Sanctum::actingAs(User::factory()->create());
    $defib = Defib::factory()->create();

    postJson(route('api:v1:defibs:notes:store', $defib->id), ['note' => 'This is a test note'])
        ->assertStatus(Http::CREATED)
        ->assertExactJson(['data' => (new DefibResource($defib))->jsonSerialize()]);
});
