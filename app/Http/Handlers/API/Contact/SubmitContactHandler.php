<?php

declare(strict_types=1);

namespace App\Http\Handlers\API\Contact;

use App\Mail\ContactFormMail;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\API\Contact\SubmitContactRequest;

class SubmitContactHandler
{
    public function __invoke(SubmitContactRequest $request): JsonResponse
    {
        Mail::to(config('app.admin_email'))->send(new ContactFormMail(strval($request->get('name')), strval($request->get('email')), strval($request->get('message'))));

        return new JsonResponse(['data' => ['success' => true]], Http::CREATED);
    }
}
