<?php

declare(strict_types=1);

use App\Mail\ContactFormMail;

use function Pest\Laravel\post;

it('sends an email to site admin when someone fills in the contact form', function () {
    Mail::fake();

    post(route('api:contact:submit'), ['name' => 'Test User', 'email' => 'test@user.com', 'message' => 'This is a test message']);

    Mail::assertSent(ContactFormMail::class);
});
