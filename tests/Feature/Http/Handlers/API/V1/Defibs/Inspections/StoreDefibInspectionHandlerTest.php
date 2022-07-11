<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Defib;
use App\Models\Member;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;
use App\Models\DefibInspection;
use JustSteveKing\StatusCode\Http;

use function Pest\Laravel\postJson;

it('allows an authenticated user to add an inspection to a defib', function () {
    Sanctum::actingAs(User::factory()->create());
    $defib = Defib::factory()->create();
    $member = Member::factory()->create();
    $inspectionData = DefibInspection::factory(['member_uuid' => $member->uuid])->make()->toArray();

    expect(DefibInspection::count())->toEqual(0);

    $result = postJson(route('api:v1:defibs:inspections:store', ['uuid' => $defib->uuid]), $inspectionData)
        ->assertStatus(Http::CREATED);

    expect(DefibInspection::count())->toEqual(1)
        ->and($result['data']['inspections'][0]['notes'])->toBe($inspectionData['notes'])
        ->and($result['data'])->toMatchArray($defib->with('inspections'))
        ->and($defib->fresh()->pads_expire_at->format('Y-m-d'))->toBe($inspectionData['pads_expire_at']);
});

it('will not allow a defib inspection to be saved with an invalid member_uuid', function () {
    Sanctum::actingAs(User::factory()->create());
    $defib = Defib::factory()->create();
    $inspectionData = DefibInspection::factory()->make()->toArray();

    expect(DefibInspection::count())->toEqual(0);

    postJson(route('api:v1:defibs:inspections:store', ['uuid' => $defib->uuid]), $inspectionData)
        ->assertStatus(Http::UNPROCESSABLE_ENTITY)
        ->assertExactJson(['message' => 'Invalid Member']);

    expect(DefibInspection::count())->toEqual(0);
});

it('will not allow an inspection to be created against a defib that does not exist', function () {
    Sanctum::actingAs(User::factory()->create());
    $uuid = Str::uuid()->toString();
    $inspectionData = DefibInspection::factory()->make()->toArray();

    expect(DefibInspection::count())->toEqual(0);

    postJson(route('api:v1:defibs:inspections:store', ['uuid' => $uuid]), $inspectionData)
        ->assertStatus(Http::NOT_FOUND);

    expect(DefibInspection::count())->toEqual(0);
});
