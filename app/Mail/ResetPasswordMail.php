<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $actionLink;
    public $admin;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($actionLink, $admin)
    {
        $this->actionLink = $actionLink;
        $this->admin = $admin;
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
            ->view('email-templates.admin-forgot-email-template')
            ->with([
                'actionLink' => $this->actionLink,
                'admin' => $this->admin,

            ]);
    }
}
