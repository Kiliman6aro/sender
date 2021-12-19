<?php
namespace App\Services\Sender;


abstract class NotificationModel
{
    private  $to;
    private  $from;
    private  $msg;

    public function __construct(string $to, string $from, string $msg)
    {
        $this->from = $from;
        $this->to = $to;
        $this->msg = $msg;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

}