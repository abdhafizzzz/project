<?php

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    // ...

    // public function build()
    // {
    //     return $this->view('emails.reset-password');
    // }

    public function build()
{
    return $this->subject('Password Reset Request')
        ->view('emails.reset-password', ['token' => $this->token]);
}

}

