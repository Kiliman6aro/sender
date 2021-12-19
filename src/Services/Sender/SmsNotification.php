<?php
namespace App\Services\Sender;

use App\Library\Sms;

class SmsNotification extends NotificationModel implements Notification
{

    public function send()
    {
        Sms::api($this->getFrom(), $this->getTo(), $this->getMsg());
    }
}