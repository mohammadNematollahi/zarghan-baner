<?php

namespace App\Services\Email;

use Illuminate\Support\Facades\Mail;
use App\Services\Email\MailViewProvider;
use App\Services\Email\Traits\CallMethod;
use App\Services\Email\Traits\EmailService;

class SendMail
{
    use CallMethod , EmailService;

    protected function send()
    {
        Mail::to($this->getTo())->send(new MailViewProvider($this->getDetails() , $this->getSubject() , $this->getFrom()));
        return true;
    }
}