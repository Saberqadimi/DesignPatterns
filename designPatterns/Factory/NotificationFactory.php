<?php

namespace DesignPatterns\Factory;

class NotificationFactory
{
    public static function createNotification($className, $data = "default Data")
    {
        $serviceName = __NAMESPACE__ . "\Notifications\\" . ucfirst($className) . 'Notification';
        $notificationInstance = app($serviceName);

        return self::send($notificationInstance, $data);
    }

    public static function send($notificationInstance, $data)
    {
        return $notificationInstance->sendNotification($data);
    }
}
