<?php

namespace App\Controllers;

use App\Http\Request\Sender\SenderHttpRequest;
use App\Library\Container;
use App\Library\Translator;
use App\Models\Voucher;
use App\Services\Sender\ClientSender;
use Illuminate\Validation\Factory;

class GiftController
{
    public function sendThanks($id)
    {
        $data = $_POST;

        try {

            $senderHttpRequest = (new SenderHttpRequest(new Factory(new Translator(), new Container()), $data));
            $senderValidation = $senderHttpRequest->getValidator();

            if ($senderValidation->fails()) {
                throw new \Exception($senderValidation->errors()->first());
            }

            $form = $senderHttpRequest->getFrom()->setData($senderValidation->getData(), Voucher::find($id));

            $sender = (new ClientSender())->getFactory($form);

            $sender->createNotification()->send();

        } catch (\Exception $e) {

            return json_encode(['error' => $e->getMessage()]);
        }
    }
}