<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendVerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $code = 0;

    public function __construct(int $code)
    {
        $this->code = $code;
    }


    public function build()
    {   $code = $this->code;
        return $this->from('bekwebdeveloper@gmail.com', 'Bask verification!')
            ->view('emails.sendCode', compact('code'));
    }
}

