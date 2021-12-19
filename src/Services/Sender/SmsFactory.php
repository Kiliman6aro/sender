<?php
namespace App\Services\Sender;

use App\Services\Sender\DataForm\DataFrom;

class SmsFactory implements NotificationFactory
{
    private  $dataFrom;

    public function __construct(DataFrom $dataFrom)
    {
        $this->dataFrom = $dataFrom;
    }

    public function createNotification(): Notification
    {
       return new SmsNotification($this->dataFrom->getTo(), $this->dataFrom->getFrom(), $this->dataFrom->getMsg());
    }
}