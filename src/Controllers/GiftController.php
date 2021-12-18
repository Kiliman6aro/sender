<?php

namespace App\Controllers;

use App\Library\Container;
use App\Library\Translator;
use App\Models\Voucher;
use App\Services\NewSendVoucherService;
use Illuminate\Validation\Factory;

class GiftController
{
    public function sendThanks()
    {
        $data = $_POST;


        $factory = new Factory(new Translator(), new Container());

        $validator = $factory->make($data, [
            'email' => 'required|required'
        ]);

        if ($validator->fails()) {
            exit (json_encode(['error' => 'Email is required']));
        }
        $voucher = Voucher::find($_GET['voucher_id']);

        if (!empty($data['email']) || !empty($data['gratitudeEmail'])) {
            NewSendVoucherService::send($voucher, $data);
        }
        if ($data['mobile'] != '') {
            $text = $data['msg'] . "" . PHP_EOL;
            $text .= $data['friendName'];
            NewSendVoucherService::sendSms($voucher, $text, $data);
        }
    }
}