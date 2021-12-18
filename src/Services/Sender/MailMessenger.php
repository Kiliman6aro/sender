<?php

namespace App\Services\Sender;

use App\Library\Mail;
use App\Models\Voucher;

class MailMessenger implements MessengerInterface
{

    public function send(Voucher $voucher, array $data)
    {
        $mailTemplate = 'mail.newsite.thanks';

        $subject = $voucher->senderName . ", " . $data['subject'] . $data['friendName'] . "!";

        Mail::send($data['email'], $voucher->myEmail, $subject, $mailTemplate);
    }
}