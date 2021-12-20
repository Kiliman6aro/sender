<?php
namespace App\Services\Sender;

use App\Library\Mail;

class EmailSender implements Sender
{
    private $senderCreator;
    private $from;
    private $to;
    private $msg;
    private $subject;


    public function __construct(SenderCreator $senderCreator)
    {
        $this->senderCreator = $senderCreator;

        $this->from = $this->senderCreator->getData()['email'];
        $this->to =  $this->senderCreator->getVoucher()->myEmail;
        $this->msg = 'mail.newsite.thanks';
        $this->subject =
            $this->senderCreator->getVoucher()->senderName . ", " .
            $this->senderCreator->getData()['subject'] .
            $this->senderCreator->getData()['friendName'] . "!";


    }
    public function send()
    {
        Mail::send($this->to, $this->from, $this->subject, $this->msg);
    }
}