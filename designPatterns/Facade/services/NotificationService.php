<?php

namespace DesignPatterns\Facade\services;

class NotificationService
{
    public function sendNotification($message): string
    {
       return 'receive message from web.php : ' . $message;
    }
}
