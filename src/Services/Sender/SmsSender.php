<?php
namespace App\Services\Sender;

use App\Library\Sms;

class SmsSender implements Sender
{
    private $senderCreator;
    private $from;
    private $to;
    private $msg;

    public function __construct(SenderCreator $senderCreator)
    {
        $this->senderCreator = $senderCreator;
        $this->from = $this->senderCreator->getData()['senderMobile'] != '' ? $this->senderCreator->getData()['senderMobile'] : "033737117";
        $this->to = $this->senderCreator->getData()['mobile'] ?? $this->senderCreator->getVoucher()->myMobile;

        $text = $this->senderCreator->getData()['msg'] . "" . PHP_EOL;
        $text .= $this->senderCreator->getData()['friendName'];

        $this->msg = $text;

    }
    public function send()
    {
        Sms::api($this->from, $this->to, $this->msg);
    }
}