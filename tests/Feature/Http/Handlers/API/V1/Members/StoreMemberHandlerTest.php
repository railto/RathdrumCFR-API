<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Member;
use Laravel\Sanctum\Sanctum;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\MemberResource;

use function Pest\Laravel\postJson;

it('allows an authenticated user to create a new member record', function () {
    Sanctum::actingAs(User::factory()->create()->givePermissionTo('member.create'));
    $data = Member::factory()->make()->toArray();

    expect(Member::count())->toEqual(0);
    $result = postJson(route('api:v1:members:store'), $data);
    expect(Member::count())->toEqual(1);

    $member = Member::first();

    $result->assertStatus(Http::CREATED)
        ->assertExactJson(['data' => (MemberResource::make($member))->jsonSerialize()]);
});
