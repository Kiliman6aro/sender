<?php

namespace App\Services\Sender;

use App\Services\Sender\DataForm\DataFrom;

class ClientSender
{
    public function getFactory(DataFrom $dataFrom): NotificationFactory
    {
        if($dataFrom->getType() == 'sms') {
            return  new SmsFactory($dataFrom);
        }

        return new EmailFactory($dataFrom);
    }
}