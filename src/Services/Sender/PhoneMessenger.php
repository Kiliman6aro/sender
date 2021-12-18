<?php

namespace App\Services\Sender;

use App\Library\Sms;
use App\Models\Voucher;

class PhoneMessenger implements MessengerInterface
{

    public function send(Voucher $voucher, array $data)
    {
        $from = $data['senderMobile'] != '' ? $data['senderMobile'] : "033737117";
        $to = $data['mobile'] ?? $voucher->myMobile;

        $text = $data['msg'] . "" . PHP_EOL;
        $text .= $data['friendName'];

        Sms::api($from, $to, $text);
    }
}