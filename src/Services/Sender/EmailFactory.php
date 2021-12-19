<?php
namespace App\Services\Sender;

use App\Services\Sender\DataForm\DataFrom;

class EmailFactory implements NotificationFactory
{
    private  $dataFrom;

    public function __construct(DataFrom $dataFrom)
    {
        $this->dataFrom = $dataFrom;
    }

    public function createNotification(): Notification
    {
        return new EmailNotification($this->dataFrom->getTo(), $this->dataFrom->getFrom(), $this->dataFrom->getSubject(), $this->dataFrom->getMsg());
    }

}