<?php

namespace App\Http\Handlers\API\V1\Members;

use App\Models\Member;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Resources\API\V1\MemberResource;
use App\Http\Requests\API\V1\StoreMemberRequest;

class StoreMemberHandler
{
    public function __invoke(StoreMemberRequest $request): JsonResponse
    {
        $member = Member::create($request->validated());

        return new JsonResponse(['data' => new MemberResource($member)], Http::CREATED);
    }
}
