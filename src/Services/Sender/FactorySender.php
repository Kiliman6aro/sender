<?php

namespace App\Services\Sender;


class FactorySender
{
    public function execute(array $data)
    {

        if(!empty($data['email'])) {
            return new MailMessenger();
        }


        if(!empty($data['senderMobile'])) {
            return new PhoneMessenger();
        }
    }
}