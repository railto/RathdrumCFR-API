<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Str;
use JustSteveKing\StatusCode\Http;

use function Pest\Laravel\postJson;

it('allows an authenticated user to add a note to a defib', function () {
    Sanctum::actingAs(User::factory()->create());
    $defib = Defib::factory()->create();

    $result = postJson(route('api:v1:defibs:notes:store', ['uuid' => $defib->uuid]), ['note' => 'This is a test note'])
        ->assertStatus(Http::CREATED);

    expect($result['data'])->toMatchArray($defib->with('notes'))
        ->and($result['data']['notes'][0]['note'])->toBe('This is a test note');
});

it('does not allow a user to create a note on a defib that does not exist', function () {
    Sanctum::actingAs(User::factory()->create());
    $uuid = Str::uuid()->toString();

    postJson(route('api:v1:defibs:notes:store', ['uuid' => $uuid]), ['note' => 'This will fail'])
        ->assertStatus(Http::NOT_FOUND);
});
