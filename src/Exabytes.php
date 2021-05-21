<?php

namespace Exabytes\SmsNotifications;

use Exception;
use Illuminate\Support\Facades\Http;

class Exabytes
{
    public function sendMessage($data) {

        $data = [
            'un' => env('EXABYTE_SMS_USERNAME', 'exabytes'),
            'pwd' => env('EXABYTE_SMS_PASSWORD', 'exabytes123'),
            'dstno' => $data['to'],
            'msg' => $data['message'],
            'type' => 1,
            'sender_id' => env('EXABYTE_SENDER_ID', '60000'),
            'agreedterm' => 'YES'
        ];

        $response = http_build_query($data);

        $url = 'https://smsportal.exabytes.my/isms_send.php?'.$response;
        // $response = Http::post('https://smsportal.exabytes.my/isms_send.php', $data);
        // dd($url);

        return $url;
        // }
        // catch (Exception $e){
        //     return response()->json(['error' => 'SMS not sent'], 500);
        // }

        // if($response->body() === '-1004 = INSUFFICIENT CREDITS')
        // {
        //     Bugsnag::notifyError('Exabyte SMS Endpoint Failure', 'Error Code: '. $response->getStatusCode().',Message: '.$response->body());
        // } 
    }


}