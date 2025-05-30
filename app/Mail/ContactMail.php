<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $mailSubject; //no podemos usar $subject porque es una palabra reservada
    public $content;

    // public $mailData;


    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $mailSubject, $content)
    {
        //dd($name, $email, $mailSubject, $message); // ver los resultados en la consola network

        // $this->mailData = $mailData;
        $this->name = $name;
        $this->email = $email;
        $this->mailSubject = $mailSubject;
        $this->content = $content;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // subject: $this->mailData['subject'],
            // to: env('MAIL_FROM_ADDRESS'),
            // from: $this->mailData['email'],
            subject: $this->mailSubject,
            to: env('MAIL_FROM_ADDRESS'),
            from: $this->email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.contact-mail',
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
