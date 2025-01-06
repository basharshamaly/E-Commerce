<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMailer extends Mailable
{
    use Queueable, SerializesModels;
    public $mail_body;
    public $admin;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_body, $admin)
    {
        $this->mail_body = $mail_body;
        $this->admin = $admin;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Reset Password Mailer',
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'))
            ->subject('Reset Password')
            ->view('email-templates.admin-reset-email-template')
            ->with([
                'admin' => $this->admin,
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
