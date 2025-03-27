<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormResetPasswordMailSeller extends Mailable
{
    use Queueable, SerializesModels;

    public $sellers;
    public $new_password;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sellers,$new_password)
    {

        $this->sellers = $sellers;
        $this->new_password = $new_password;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject('Your password has been changed')
            ->view('email-templates.seller-email-reset-template')
            ->with([
                'seller' => $this->sellers,
                'new_password' => $this->new_password,
            ]);
    }
}