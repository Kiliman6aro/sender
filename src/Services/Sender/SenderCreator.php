<?php

namespace App\Services\Sender;


use App\Models\Voucher;

class SenderCreator extends AbstractSenderCreator
{
    private $data;
    private $voucher;

    public function __construct(array $data, Voucher $voucher)
    {
        $this->data = $data;
        $this->voucher = $voucher;
    }

    public function creatorSender(): Sender
    {
        if($this->data['senderMobile']) {
            return new SmsSender($this);
        }

        return new EmailSender($this);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getVoucher(): Voucher
    {
        return $this->voucher;
    }
}