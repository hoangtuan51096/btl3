<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateAccount extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($user)
    {
        $this->user = $user;
    }


    public function build()
    {
        return $this->view('emails.create', [
            'user' => $this->user
        ]);
    }
}
