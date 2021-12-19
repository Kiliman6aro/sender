<?php
namespace App\Services\Sender\DataForm;

use App\Models\Voucher;

class  EmailDataForm implements DataFrom
{

    private  $to;
    private  $from;
    private  $msg;
    private  $subject;
    private  $type = 'email';

    public function setData(array $data, Voucher $voucher)
    {

        $this->from = $data['email'];
        $this->to = $voucher->myEmail;
        $this->msg = 'mail.newsite.thanks';
        $this->subject = $voucher->senderName . ", " . $data['subject'] . $data['friendName'] . "!";

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

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    public function getType()
    {
        return $this->type;
    }


}