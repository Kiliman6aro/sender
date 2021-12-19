<?php

namespace App\Services\Sender\DataForm;

use App\Models\Voucher;

interface DataFrom
{
    public function setData(array $data, Voucher $model);
}