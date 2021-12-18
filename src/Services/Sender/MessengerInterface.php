<?php

namespace App\Services\Sender;

use App\Models\Voucher;

interface MessengerInterface
{
    public function send(Voucher $voucher, array $data);
}