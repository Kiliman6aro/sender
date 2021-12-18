<?php

namespace App\Services;

use App\Library\Mail;
use App\Library\Sms;
use App\Models\Voucher;

class NewSendVoucherService
{

    public static function send(Voucher $voucher, array $data)
    {
        $mailTemplate = 'mail.newsite.thanks';
        $data['subject'] = $subject = $voucher->senderName . ", " . $data['subject'] . $data['friendName'] . "!";
        $data['friendName'] = $data['from'] . $data['friendName'];
        $data['greeting'] = $data['msg'];
        Mail::send($data['email'], $voucher->myEmail, $data['subject'], $mailTemplate);
    }

    public static function sendSms(Voucher $voucher, $text, array $data)
    {
        $from = $data['senderMobile'] != '' ? $data['senderMobile'] : "033737117";
        $to = $data['mobile'] ?? $voucher->myMobile;
        Sms::api($from, $to, $text);
    }
}