<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;
 public $mailData;
    /**
     * Create a new message instance.
     */
    public function __construct($welcomeMessage)
    {
        $this->mailData = $welcomeMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail  from LARAVEL_WEB_APP',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $mailData=$this->mailData;
        return new Content(
            view: 'email.contactMail' 
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
