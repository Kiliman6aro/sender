<?php

namespace App\Services\Sender;


class FactorySender
{
    public function execute(array $data): MessengerInterface
    {

        if(!empty($data['senderMobile'])) {
            return new PhoneMessenger();
        }

        return new MailMessenger();
    }
}