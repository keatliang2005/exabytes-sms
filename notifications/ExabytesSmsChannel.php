<?php

namespace Premgthb\ExabytesSms\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class ExabytesSmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        // to ensure exabyte credit only be used at staging and production
        if (app()->environment('production') || app()->environment('staging')) {
            
            $message = $notification->toExabytes($notifiable);
            $to = $notifiable->routeNotificationFor('exabytes');

            $response = Http::get('https://smsportal.exabytes.my/isms_send.php', [
                'un' => env('EXABYTES_SMS_USERNAME'),
                'pwd' => env('EXABYTES_SMS_PASSWORD'),
                'dstno' => $to,
                'msg' => $message,
                'type' => 1,
                'agreedterm' => 'YES'
            ]);

            if ($response->body() === '-1004 = INSUFFICIENT CREDITS') {
                Bugsnag::notifyError('Exabyte SMS Endpoint Failure', 'Error Code: ' . $response->getStatusCode() . ',Message: ' . $response->body());
            }
        }
    }
}
