<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(protected string $name, protected string $email, protected string $message)
    {
    }

    public function build(): self
    {
        return $this->markdown('mail.contact-form-mail', ['name' => $this->name, 'email' => $this->email, 'message' => $this->message])->subject('New Contact Form Submission');
    }
}
