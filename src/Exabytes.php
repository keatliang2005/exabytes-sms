<?php

namespace Premgthb\ExabytesSms;

use Exception;
use Illuminate\Support\Facades\Http;

class Exabytes
{
    /**
     * Generate OTP function
     */
    public function generateOtp()
    {
        $otp = sprintf("%04d", mt_rand(0,9999));

        return $otp;
    }


    /**
     * Send message function
     */
    public function sendMessage($data)
    {
        // dd(1);
        $data = [
            'un' => env("EXABYTES_SMS_USERNAME", 'exabytes'),
            'pwd' => env("EXABYTES_SMS_PASSWORD", 'exabytes123'),
            'dstno' => $data['to'],
            'msg' => $data['message'],
            'type' => 1,
            'sender_id' => env('EXABYTE_SENDER_ID', '60000'),
            'agreedterm' => 'YES'
        ];
        // dd($data);

        Http::get('https://smsportal.exabytes.my/isms_send.php?', $data);

        return response()->json(['message' => 'SMS sent successfully to'. $data['dstno']], 200 );
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
