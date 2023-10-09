<?php

namespace Premgthb\ExabytesSms\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExabytesSmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (app()->runningUnitTests() || app()->environment('local')) {
            Log::info('Exabyte SMS not send, env local or unit test');
            return;
        }

        $message = $notification->toExabytes($notifiable);
        $to = $notifiable->routeNotificationFor('exabytes');

        $response = Http::get('https://smsportal.exabytes.my/isms_send.php', [
            'un'         => config('exabytes.username'),
            'pwd'        => config('exabytes.password'),
            'dstno'      => $to,
            'msg'        => $message,
            'type'       => 1,
            'agreedterm' => 'YES',
        ]);

        if (! in_array($response->body(), ['2000 = SUCCESS', ''])) {
            Log::emergency($response->body());
        }
        
    }
}
