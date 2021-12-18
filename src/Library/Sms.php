<?php

namespace App\Library;

class Sms
{

    public static function api(string $from, string $to, string $text)
    {
        printf("Send sms from: %s  to: %s with content: %s\n", $from, $to, $text);
    }
}