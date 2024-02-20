<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build(): self
    {
        return $this->to(config('ln-prints.contact.mail'))
            ->replyTo($this->data['email'], $this->data['name'])
            ->subject(config('app.name') . ' - ' . 'Contact')
            ->markdown('emails.contact')
            ->with([
                'data' => $this->data,
            ]);
    }
}
