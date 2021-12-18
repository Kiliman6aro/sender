<?php

namespace App\Library;

class Mail
{

    public static function send(string $from, string $to, string $subject, string $text)
    {
        printf("Send email from: %s  to: %s with subject %s and content: %s\n",
            $from,
            $to,
            $subject,
            $text
        );
    }
}