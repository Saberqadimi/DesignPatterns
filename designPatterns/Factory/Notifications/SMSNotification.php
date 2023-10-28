<?php

namespace DesignPatterns\Factory\Notifications;

use DesignPatterns\Factory\NotificationInterface;

class SMSNotification implements NotificationInterface
{
    public function sendNotification($data)
    {
        // Logic to send SMS notification
        // ...
        return "SMS notification sent.\n";
    }

}
