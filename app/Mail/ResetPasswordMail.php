<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ResetPasswordMail extends Mailable
{
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function build()
    {
        return $this->subject('Reset Password')
            ->view('mail.reset-password');
    }
}

