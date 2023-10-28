<?php

namespace DesignPatterns\Factory\Notifications;

use DesignPatterns\Factory\NotificationInterface;

class EmailNotification implements NotificationInterface
{
    public function sendNotification($data)
    {
        // Logic to send email notification
        // ...
        return "Email notification sent.\n";
    }
}
