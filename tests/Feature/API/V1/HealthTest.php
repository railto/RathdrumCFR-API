<?php

declare(strict_types=1);

use function Pest\Laravel\getJson;

it('can run the health check URL to make sure application is online', function () {
    getJson(route('api:v1:ping'))
        ->assertOk();
});
