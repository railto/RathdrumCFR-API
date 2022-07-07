<?php

declare(strict_types=1);

use App\Models\User;
use JustSteveKing\StatusCode\Http;

use function Pest\Laravel\postJson;

it('can log a user in', function () {
    $user = User::factory()->create();

    expect($user->tokens->count())
        ->toEqual(0);

    postJson(route('api:auth:login'), ['email' => $user->email, 'password' => 'password'])
        ->assertOk()
        ->assertJsonStructure(['token']);

    expect($user->refresh()->tokens->count())
        ->toEqual(1);
});

it('returns the correct status code when there is data missing', function () {
    postJson(route('api:auth:login'), [])
        ->assertStatus(Http::UNPROCESSABLE_ENTITY);
});
