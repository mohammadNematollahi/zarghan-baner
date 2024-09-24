<?php

namespace App\Services\Email\Traits;

trait EmailService 
{
    private static $details = [];
    private static $subject;
    private static $from = ["address" => null , "name" => null];
    private static $to;

    protected function setDetails($details)
    {
        self::$details = $details;
    }

    protected function getDetails()
    {
        return self::$details;
    }

    protected function setSubject($subject)
    {
        self::$subject = $subject;
    }

    protected function getSubject()
    {
        return self::$subject;
    }

    protected function setFrom($address , $name)
    {
        self::$from = [
            [
                "address" => $address,
                "name" => $name
            ]
        ];
    }

    protected function getFrom()
    {
        return self::$from;
    }

    protected function setTo($to)
    {
        self::$to = $to;
    }

    protected function getTo()
    {
        return self::$to;
    }
}