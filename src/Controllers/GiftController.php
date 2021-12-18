<?php

namespace App\Controllers;

use App\Library\Container;
use App\Library\Translator;
use App\Models\Voucher;
use App\Services\Sender\FactorySender;
use Illuminate\Validation\Factory;

class GiftController
{
    public function sendThanks()
    {
        $data = $_POST;

        try {

            if(!isset($_GET['voucher_id'])) {
                throw new \Exception('Missing required parameter voucher_id');
            }

            if(empty($data['email']) && empty($data['senderMobile'])) {
                throw new \Exception('Email or senderMobile cannot be empty');
            }

            if(!empty($data['email']) && !empty($data['senderMobile'])) {
                throw new \Exception('Can choose only one type of sending');
            }

            $factory = new Factory(new Translator(), new Container());

            if(!empty($data['email'])) {
                $validator = $factory->make($data, [
                    'email' => 'email'
                ]);

                if ($validator->fails()) {
                    throw new \Exception('Invalid Email');
                }
            }

            $sender = (new FactorySender())->execute($data);
            $sender->send(Voucher::find($_GET['voucher_id']), $data);

        } catch (\Exception $e) {

            return json_encode(['error' => $e->getMessage()]);
        }
    }
}