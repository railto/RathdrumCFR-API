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

it('fails when the email address is missing', function () {
    postJson(route('api:auth:login'), ['password' => 'someRandomPassword'])
        ->assertStatus(Http::UNPROCESSABLE_ENTITY)
        ->assertExactJson(["message" => "The email field is required."]);
});

it('fails when the password is missing', function () {
    postJson(route('api:auth:login'), ['email' => 'not@real.email'])
        ->assertStatus(Http::UNPROCESSABLE_ENTITY)
        ->assertExactJson(["message" => "The password field is required."]);
});

it('fails when invalid credentials are passed', function () {
    postJson(route('api:auth:login'), ['email' => 'not@real.email', 'password' => 'someRandomPassword'])
        ->assertStatus(Http::UNPROCESSABLE_ENTITY)
        ->assertExactJson(["message" => "These credentials do not match our records."]);
});

it('rate limits authentication attempts', function () {
    $attempt = 0;

    while ($attempt < 5) {
        postJson(route('api:auth:login'), ['email' => 'not@real.email', 'password' => 'someRandomPassword']);
        $attempt++;
    }

    postJson(route('api:auth:login'), ['email' => 'not@real.email', 'password' => 'someRandomPassword'])
        ->assertStatus(Http::UNPROCESSABLE_ENTITY)
        ->assertExactJson(["message" => "Too many login attempts. Please try again in 60 seconds."]);
});
