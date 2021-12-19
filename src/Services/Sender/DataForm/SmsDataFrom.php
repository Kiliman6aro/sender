<?php
namespace App\Services\Sender\DataForm;

use App\Models\Voucher;

class SmsDataFrom implements DataFrom
{

    private  $to;
    private  $from;
    private  $msg;
    private  $type = 'sms';

    public function setData(array $data, Voucher $voucher)
    {

        $from = $data['senderMobile'] != '' ? $data['senderMobile'] : "033737117";
        $to = $data['mobile'] ?? $voucher->myMobile;

        $text = $data['msg'] . "" . PHP_EOL;
        $text .= $data['friendName'];

        $this->from = $from;
        $this->to = $to;
        $this->msg = $text;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    public function getType()
    {
        return $this->type;
    }

}