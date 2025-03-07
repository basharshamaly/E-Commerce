<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifiedAccountSellerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $actionLink;
    public $sellers;
    public $mail_body;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($actionLink, $sellers,  $mail_body)
    {
        $this->actionLink = $actionLink;
        $this->sellers = $sellers;
        $this->mail_body = $mail_body;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Verified Account Seller Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email-templates.seller-verify-template',
        );
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('Verify Your Seller Account')
            ->view('email-templates.seller-verify-template')
            ->with([
                'sellers' => $this->sellers,
                'actionLink' => $this->actionLink,
                'content' => $this->mail_body,
            ]);
    }


    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}