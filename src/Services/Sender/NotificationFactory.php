<?php
namespace App\Services\Sender;

interface NotificationFactory
{
    public function createNotification(): Notification;
}