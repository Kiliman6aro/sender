<?php
namespace App\Services\Sender;

use App\Library\Mail;

class EmailNotification extends NotificationModel implements Notification
{
    private $subject;

    public function __construct(string $to, string $from, string $msg, string $subject)
    {
        parent::__construct($to, $from, $msg);
        $this->subject = $subject;
    }

    public function send()
    {
        Mail::send($this->getTo(), $this->getFrom(), $this->subject, $this->getMsg());
    }
}