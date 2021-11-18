<?php

namespace Premgthb\ExabytesSms\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExabytesSmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        // to ensure exabyte credit only be used at staging and production
        if (app()->environment('production') || app()->environment('staging')) {
            
            $message = $notification->toExabytes($notifiable);
            $to = $notifiable->routeNotificationFor('exabytes');

            $response = Http::get('https://smsportal.exabytes.my/isms_send.php', [
                'un' => config('exabytes.username'),
                'pwd' => config('exabytes.password'),
                'dstno' => $to,
                'msg' => $message,
                'type' => 1,
                'agreedterm' => 'YES'
            ]);

            if ($response->body() === '-1004 = INSUFFICIENT CREDITS') {
                Log::emergency("Exabytes Insufficient Credit");
            }
        }
    }
}
