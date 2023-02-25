<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\SendVerificationCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function __invoke()
    {

        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('gazisimon702@gmail.com')->send(new SendVerificationCodeMail(3));

        dd("Email is sent successfully.");
    }
}
