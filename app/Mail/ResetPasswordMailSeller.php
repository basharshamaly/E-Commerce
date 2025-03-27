<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMailSeller extends Mailable
{
    use Queueable, SerializesModels;

    public $actionLink;
    public $sellers;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($actionLink, $sellers)
    {
        $this->actionLink = $actionLink;
        $this->sellers = $sellers;
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
            ->view('email-templates.seller-forgot-email-temblate')
            ->with([
                'actionLink' => $this->actionLink,
                'seller' => $this->sellers,

            ]);
    }
}
