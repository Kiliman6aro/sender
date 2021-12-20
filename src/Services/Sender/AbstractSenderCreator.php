<?php

namespace App\Services\Sender;

abstract class AbstractSenderCreator
{
    abstract public function creatorSender():Sender;
}