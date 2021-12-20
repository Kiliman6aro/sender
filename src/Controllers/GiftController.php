<?php

namespace App\Controllers;

use App\Http\Request\Sender\SenderHttpRequest;
use App\Library\Container;
use App\Library\Translator;
use App\Models\Voucher;
use App\Services\Sender\SenderCreator;
use Illuminate\Validation\Factory;

class GiftController
{
    public function sendThanks($id)
    {
        $data = $_POST;

        try {

            $senderValidation = ((new SenderHttpRequest(new Factory(new Translator(), new Container()), $data)))->getValidator();

            if ($senderValidation->fails()) {
                throw new \Exception($senderValidation->errors()->first());
            }

            (new SenderCreator($senderValidation->getData(), Voucher::find($id)))->creatorSender()->send();

        } catch (\Exception $e) {

            return json_encode(['error' => $e->getMessage()]);
        }
    }
}