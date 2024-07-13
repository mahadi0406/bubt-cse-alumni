<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $subject, protected $message, protected $attachment = null){

    }

    public function build(): NotificationMail
    {
        $email = $this->subject($this->subject)
            ->markdown('emails.notification');

        if ($this->attachment) {
            $email->attach($this->attachment);
        }

        return $email;
    }
}
